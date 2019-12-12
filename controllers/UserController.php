<?php
/**
 * Created by PhpStorm.
 * User: Николай
 * Date: 18.09.2019
 * Time: 22:11
 */

namespace app\controllers;


use app\models\LoginForm;
use app\models\RegisterForm;
use app\models\Request;
use app\models\User;
use Yii;
use yii\web\Controller;

class UserController extends AppController
{

//    Авторизация
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

//    Регистрация
    public function actionRegister()
    {
        if(!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new RegisterForm();

        if($model->load(Yii::$app->request->post()) && $model->validate()) {
            $user = new User();
            $user->fio = $model->fio;
            $user->username = $model->username;
            $user->password = $model->password;
            $user->email = $model->email;
            $user->telephone = $model->telephone;
            $user->role = 0;
            $user->save(false);
            return $this->goHome();
        }

        return $this->render('register', [
            'model' => $model
        ]);
    }

//    Личный кабинет
    public function actionCabinet()
    {
        $this->setMetaTags('Кабинет');
        $order = Request::find()->where(['user_id' => Yii::$app->user->id])->all();

        return $this->render('cabinet', ['orders' => $order]);
    }

//    Выход
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}