<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="container">
    <div style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
        <div class="panel panel-default" >
            <div class="panel-heading">
                <div class="panel-title">Авторизация</div>
                <div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="#" class="text-danger">Забыли пароль?</a></div>
            </div>

            <div style="padding-top:30px" class="panel-body" >

                <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>

                    <?php $form = ActiveForm::begin([
                            'id' => 'loginform',
                            'layout' => 'horizontal',
                        ]); ?>

                    <?= $form->field($model, 'username', [
                            'template' => '
                            <div class="input-group col-lg-offset-1 col-lg-10">
                        <span class="input-group-addon"><i class="ti-user"></i></span>
                        {input}
                    </div>
                    <div class="col-lg-offset-1 col-lg-10">
                    {error}
                    </div>'
                    ])->textInput(['class' => 'form-control', 'placeholder' => 'Логин']) ?>

                    <?= $form->field($model, 'password', [
                        'template' => '
                            <div class="input-group col-lg-offset-1 col-lg-10">
                        <span class="input-group-addon"><i class="ti-lock"></i></span>
                        {input}
                    </div>
                    <div class="col-lg-offset-1 col-lg-10">
                    {error}
                    </div>']
                    )->passwordInput(['class' => 'form-control', 'placeholder' => 'Пароль']) ?>

                    <?= $form->field($model, 'rememberMe')->checkbox([
                        'template' => "
                        <div class=\"input-group\ col-lg-offset-1 col-lg-8\">
                            <div class=\"checkbox checkbox-danger\">
                               {input}
                                <label for=\"checkbox2\">Запомнить вход</label>
                            </div>
                        </div>
                        ", ['id' => 'checkbox2']]) ?>

                    <div class="form-group">
                        <div class="col-lg-offset-1 col-lg-11">
                            <?= Html::submitButton('Войти', ['class' => 'btn btn-success', 'name' => 'login-button']) ?>
                        </div>
                    </div>
                <?php ActiveForm::end(); ?>

                    <div class="form-group">
                        <div class="col-md-12 control">
                            <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
                                Нет аккаунта!
                                <a href="#" class="text-danger">
                                    Создать сейчас
                                </a>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>

<!--<div class="site-login">-->
<!--    <h1>--><?//= Html::encode($this->title) ?><!--</h1>-->
<!---->
<!--    <p>Please fill out the following fields to login:</p>-->
<!---->
<!--    --><?php //$form = ActiveForm::begin([
//        'id' => 'login-form',
//        'layout' => 'horizontal',
//        'fieldConfig' => [
//            'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
//            'labelOptions' => ['class' => 'col-lg-1 control-label'],
//        ],
//    ]); ?>
<!---->
<!--        --><?//= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>
<!---->
<!--        --><?//= $form->field($model, 'password')->passwordInput() ?>
<!---->
<!--        --><?//= $form->field($model, 'rememberMe')->checkbox([
//            'template' => "<div class=\"col-lg-offset-1 col-lg-3\">{input} {label}</div>\n<div class=\"col-lg-8\">{error}</div>",
//        ]) ?>
<!---->
<!--        <div class="form-group">-->
<!--            <div class="col-lg-offset-1 col-lg-11">-->
<!--                --><?//= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
<!--            </div>-->
<!--        </div>-->
<!---->
<!--    --><?php //ActiveForm::end(); ?>
<!---->
<!--    <div class="col-lg-offset-1" style="color:#999;">-->
<!--        You may login with <strong>admin/admin</strong> or <strong>demo/demo</strong>.<br>-->
<!--        To modify the username/password, please check out the code <code>app\models\User::$users</code>.-->
<!--    </div>-->
<!--</div>-->
