<?php

namespace app\models;

use Yii;
use yii\behaviors\SluggableBehavior;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property int $category_id
 * @property string $title
 * @property string $keywords
 * @property string $description
 * @property string $content
 * @property int $price
 * @property string $image
 *
 * @property Category $category
 */
class Product extends \yii\db\ActiveRecord
{
    public function behaviors()
    {
        return [
            [
                'class' => SluggableBehavior::className(),
                'attribute' => 'title',
                'immutable' => true,//неизменный
                'ensureUnique'=>true,//генерировать уникальный
            ],
        ];
    }

    public $imageFile;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'content', 'slug', 'keywords', 'description', 'price'], 'required'],
            [['category_id', 'price'], 'integer'],
            [['content'], 'string'],
            [['title'], 'string', 'max' => 100],
            ['slug', 'safe'],
            [['image'], 'string', 'max' => 255],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'id']],
            [['imageFile'], 'file', 'maxSize' => 1024 * 1024 * 2, 'extensions' => 'jpeg, jpg, png', 'maxFiles' => 3, 'skipOnEmpty' => true],
        ];
    }



    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_id' => 'Category ID',
            'title' => 'Название',
            'content' => 'Описание',
            'price' => 'Цена',
            'image' => 'Картинка',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }


    public function getProduct($category)
    {
        if($category == null){
        $query = Product::find()->orderBy('id desc');
        return $query;


        } else if (Category::find()->where(['id' => $category, 'id_parent' => null])->exists()){
            $cats = Category::find()->all();
            $catSuccess = [];
            foreach ($cats as $cat) {
                if($cat->id_parent == $category){
                    array_push($catSuccess, $cat->id);
                }
            }
            $query = Product::find()->where(['category_id' => $catSuccess]);
            return $query;
        }

        else {
            $query = Product::find()->where(['category_id' => $category])->orderBy('id desc');
            return $query;
        }
    }
}
