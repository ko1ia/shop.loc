<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\RegisterForm */
/* @var $form ActiveForm */
?>

<div class="container">
    <div style="margin-top:50px;" class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
        <div class="panel panel-default" >
            <div class="panel-heading">
                <div class="panel-title">Регистрация</div>
            </div>

            <div style="padding-top:30px" class="panel-body" >

                <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>

                <?php $form = ActiveForm::begin([
                    'id' => 'loginform'
                ]); ?>

                <?= $form->field($model, 'fio', [
                    'template' => '
                            <div class="input-group col-lg-offset-1 col-lg-10">
                        <span class="input-group-addon"><i class="ti-pencil-alt"></i></span>
                        {input}
                    </div>
                    <div class="col-lg-offset-1 col-lg-10">
                    {error}
                    </div>
                    '
                ])->textInput(['class' => 'form-control', 'placeholder' => 'ФИО']) ?>

                <?= $form->field($model, 'username', [
                    'template' => '
                            <div class="input-group col-lg-offset-1 col-lg-10">
                        <span class="input-group-addon"><i class=" ti-user"></i></span>
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
                    </div>'
                ])->textInput(['class' => 'form-control', 'placeholder' => 'Пароль']) ?>

                <?= $form->field($model, 'password2', [
                    'template' => '
                            <div class="input-group col-lg-offset-1 col-lg-10">
                        <span class="input-group-addon"><i class="ti-lock"></i></span>
                        {input}
                    </div>
                    <div class="col-lg-offset-1 col-lg-10">
                    {error}
                    </div>'
                ])->textInput(['class' => 'form-control', 'placeholder' => 'Повторите пароль']) ?>

                <?= $form->field($model, 'email', [
                    'template' => '
                            <div class="input-group col-lg-offset-1 col-lg-10">
                        <span class="input-group-addon"><i class="ti-email"></i></span>
                        {input}
                    </div>
                    <div class="col-lg-offset-1 col-lg-10">
                    {error}
                    </div>'
                ])->textInput(['class' => 'form-control', 'placeholder' => 'Email']) ?>

                <?= $form->field($model, 'telephone', [
                    'template' => '
                            <div class="input-group col-lg-offset-1 col-lg-10">
                        <span class="input-group-addon"><i class="ti-mobile"></i></span>
                        {input}
                    </div>
                    <div class="col-lg-offset-1 col-lg-10">
                    {error}
                    </div>'
                ])->textInput(['class' => 'form-control', 'placeholder' => 'Телефон']) ?>

                <div class="form-group">
                    <div class="col-lg-offset-1 col-lg-11">
                        <?= Html::submitButton('Создать аккаунт', ['class' => 'btn btn-success', 'name' => 'login-button']) ?>
                    </div>
                </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>