<?php
/**
 * Created by PhpStorm.
 * User: Николай
 * Date: 16.09.2019
 * Time: 18:16
 */

namespace app\models;

use Yii;
use yii\base\Model;

class RegisterForm extends Model
{
    public $fio;
    public $username;
    public $password;
    public $password2;
    public $email;
    public $telephone;
    public $role = 0;

    public function rules()
    {
        return [
            [['fio', 'username', 'password', 'email', 'telephone'], 'required'],
            ['password2', 'compare', 'compareAttribute' => 'password', 'message' => 'Пароли не совподают']
        ];
    }
}