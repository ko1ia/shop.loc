<?php
/**
 * Created by PhpStorm.
 * User: Николай
 * Date: 18.09.2019
 * Time: 22:22
 */
$this->title = 'Админ панель - добавить товар';

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
?>
<?php $this->beginContent('@app/views/layouts/admin-layout.php'); ?>
<div class="col-sm-8">
    <div class="widget">
        <!-- /widget heading -->
        <div class="widget-heading">
            <h3 class="widget-title text-dark">
                Создание товара
            </h3>
            <div class="clearfix"></div>
        </div>
        <div class="widget-body">
            <?php $form = ActiveForm::begin([
                'id' => 'loginform',
                'layout' => 'horizontal',
            ]); ?>

            <?= $form->field($model, 'title', [
                'template' => '
                            <div class="input-group col-lg-offset-1 col-lg-10">
                        <span class="input-group-addon"><i class="ti-text"></i></span>
                        {input}
                    </div>
                    <div class="col-lg-offset-1 col-lg-10">
                    {error}
                    </div>'
            ])->textInput(['class' => 'form-control', 'placeholder' => 'Название товара']) ?>

            <?= $form->field($model, 'content', [
                    'template' => '
                            <div class="input-group col-lg-offset-1 col-lg-10">
                        <span class="input-group-addon"><i class="ti-align-justify"></i></span>
                        {input}
                    </div>
                    <div class="col-lg-offset-1 col-lg-10">
                    {error}
                    </div>']
            )->textarea(['class' => 'form-control', 'placeholder' => 'Описание товара']) ?>

            <?= $form->field($model, 'category_id', [
                    'template' => '
                            <div class="input-group col-lg-offset-1 col-lg-10">
                        <span class="input-group-addon"><i class="ti-layout-list-thumb"></i></span>
                        {input}
                    </div>
                    <div class="col-lg-offset-1 col-lg-10">
                    {error}
                    </div>']
            )->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\Category::find()->where(['not', ['id_parent' => null]])->all(), 'id', 'name'), ['class' => 'select form-control']) ?>


            <?= $form->field($model, 'imageFile[]', [
                    'template' => '
                            <div class="input-group col-lg-offset-1 col-lg-10">
                        <span class="input-group-addon"><i class="ti-image"></i></span>
                        {input}
                    </div>
                    <div class="col-lg-offset-1 col-lg-10">
                    {error}
                    </div>']
            )->fileInput(['multiple' => true, 'class' => 'form-control']) ?>

            <?= $form->field($model, 'price', [
                'template' => '
                            <div class="input-group col-lg-offset-1 col-lg-10">
                        <span class="input-group-addon"><i class="ti-money"></i></span>
                        {input}
                    </div>
                    <div class="col-lg-offset-1 col-lg-10">
                    {error}
                    </div>'
            ])->textInput(['class' => 'form-control', 'placeholder' => 'Цена']) ?>

            <div class="form-group">
                <div class="col-lg-offset-1 col-lg-11">
                    <?= Html::submitButton('Создать товар', ['class' => 'btn btn-success', 'name' => 'login-button']) ?>
                </div>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
<?php $this->endContent(); ?>
