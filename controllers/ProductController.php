<?php
/**
 * Created by PhpStorm.
 * User: Николай
 * Date: 18.09.2019
 * Time: 23:16
 */

namespace app\controllers;


use app\models\Category;
use app\models\Product;
use Yii;
use yii\data\Pagination;
use yii\helpers\VarDumper;
use yii\web\Controller;
use yii\web\UploadedFile;

class ProductController extends AppController
{

    public function actionSearch()
    {
        if (Yii::$app->request->isPost) {
            $query = Yii::$app->request->post('search');
            $products = Product::find()->where(['LIKE', 'title', $query])->all();
            return $this->render('search', compact('products'));

        }
    }


    public function actionCategory($category = null)
    {
        $categories = Category::find()->where(['id_parent' => null])->all();
        $query = (new Product())->getProduct($category);

        if(Yii::$app->request->post('search')){
            return $this->redirect('/search/'.Yii::$app->request->post('search'));
        }

        $pages = new Pagination([
            'totalCount' => $query->count(),
            'pageSize' => 5,
            'forcePageParam' => false,
            'pageSizeParam' => false
        ]);
        $products = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();
        if($category != null) {
            $this->setMetaTags(
                'Товары из категории | '.Category::find()->where(['id' => $category])->one()->name,
                Yii::$app->params['defaultKeywords'],
                Yii::$app->params['defaultDescription']
            );
        } else {
            $this->setMetaTags(
                Yii::$app->params['defaultTitle'],
                Yii::$app->params['defaultKeywords'],
                Yii::$app->params['defaultDescription']
            );
        }


        return $this->render('index',[
            'products' => $products,
            'categories' => $categories,
            'category' => $category,
            'pages' => $pages
        ]);
    }

    public function actionProduct($slug)
    {
        if(is_numeric($slug)) {
            $product = Product::findOne(['id' => $slug]);
        } else {
            $product = Product::findOne(['slug' => $slug]);
        }


        $this->setMetaTags(
            $product->title . ' | ' . Yii::$app->params['shopName'],
                $product->keywords,
                $product->description
        );

        return $this->render('view', [
            'product' => $product
        ]);
    }

    function keywords($text, $repeatWordCount = 3, $minWordLength = 1) {
        $chars = ['!','#','.','?',',']; // символы для удаления
        $text_ok = str_replace($chars, '', $text);
        $arrayWords = explode(' ', $text_ok);
        $tmpArr = [];
        $resultArray = [];

        foreach ($arrayWords as $val) {
            if (strlen($val) >= $minWordLength) {
                $val = mb_strtolower($val);
                if (array_key_exists($val, $tmpArr)) {
                    $tmpArr[$val]++;
                } else {
                    $tmpArr[$val] = 1;
                }
            }

            if ($tmpArr[$val] >= $repeatWordCount) {;
                $resultArray[$val] = $tmpArr[$val];
            }
        }
        arsort($resultArray);
        $arr = array_slice($resultArray, 0, 20);

        $result = array_keys($arr);
        $str = implode(', ', $result);

        return $str;
    }
    public function actionCreate()
    {
        $model = new Product();

        if($model->load(\Yii::$app->request->post())) {
            $model->imageFile = UploadedFile::getInstances($model, 'imageFile');
            $images_path = '';

            foreach ($model->imageFile as $image) {
                $images_path .= 'images/' . Yii::$app->security->generateRandomString(5) . '.' . $image->extension. ',';
            }
            $model->image = $images_path;
            $model->keywords = $this->keywords($model->content, 1, 7);
            $model->description = $model->title. ' | '. $model->content ;

            $images_array = explode(',', $model->image);
            array_pop($images_array);


            if($model->save()){
                $i = 0;
                foreach ($model->imageFile as $image) {
                    $image->saveAs($images_array[$i]);
                    $i++;
                }

                return $this->redirect('/');
            }
        }

        return $this->render('create',[
            'model' => $model,
        ]);
    }
}