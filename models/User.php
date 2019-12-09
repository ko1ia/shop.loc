<?php

namespace app\models;

use Yii;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $fio
 * @property string $username
 * @property string $password
 * @property string $email
 * @property int $role
 * @property string $telephone
 */
class User extends \yii\db\ActiveRecord implements IdentityInterface
{

    public $authKey;
    public $password2;

    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAuthKey()
    {
        return $this->authKey;
    }

    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fio', 'username', 'password', 'email', 'telephone'], 'required'],
            [['role'], 'integer'],
            [['fio'], 'string', 'max' => 100],
            [['username', 'email'], 'string', 'max' => 50],
            [['password', 'telephone'], 'string', 'max' => 20],
            ['password2', 'compare', 'compareAttribute' => 'password'],

        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fio' => 'ФИО',
            'username' => 'Логин',
            'password' => 'Пароль',
            'email' => 'Email',
            'role' => 'Role',
            'telephone' => 'Телефон',
        ];
    }

    public function validatePassword($password)
    {
        return $this->password === $password;
    }

    public function getRequests()
    {
        return $this->hasMany(Request::className(), ['user_id' => 'id']);
    }
}
