<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Request */
/* @var $form ActiveForm */

$name = '';
$email = '';
$phone = '';
$address = '';
$delivery = '';
$comment = '';
if (Yii::$app->session->hasFlash('checkout-data')) {
    $data = Yii::$app->session->getFlash('checkout-data');
    $name = Html::encode($data['name']);
    $email = Html::encode($data['email']);
    $phone = Html::encode($data['phone']);
    $address = Html::encode($data['address']);
    $delivery = Html::encode($data['delivery']);
    $comment = Html::encode($data['comment']);
}
?>

<div class="col-md-8">
    <div class="widget">
        <div class="widget-body">
            <h4>Оформление заказа</h4>
            <div class="alert alert-warning">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <strong> <sup style="color: red;">*</sup> - обязательны для заполнения.</strong>
            </div>
            <?php
            $success = false;
            if (Yii::$app->session->hasFlash('checkout-success')) {
                $success = Yii::$app->session->getFlash('checkout-success');
            }
            ?>

            <?php if (!$success): ?>
                <?php if (Yii::$app->session->hasFlash('checkout-errors')): ?>
                    <div class="alert alert-warning alert-dismissible" role="alert">
                        <button type="button" class="close"
                                data-dismiss="alert" aria-label="Закрыть">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <p>При заполнении формы допущены ошибки</p>
                        <?php $allErrors = Yii::$app->session->getFlash('checkout-errors'); ?>
                        <ul>
                            <?php foreach ($allErrors as $errors): ?>
                                <?php foreach ($errors as $error): ?>
                                    <li><?= $error; ?></li>
                                <?php endforeach; ?>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <?php $form = ActiveForm::begin([
                    'class' => 'form-horizontal',
                ]); ?>
                <fieldset>
                    <?= $form->field($order, 'name', ['template' => '
                <label class="col-md-3 control-label">{label} <sup style="color: red;">*</sup>
                        </label>
                        <div class="col-md-7">{input}</div>
                '])->textInput(['value' => $name]); ?>
                    <?= $form->field($order, 'email', ['template' => '
                <label class="col-md-3 control-label">{label} <sup style="color: red;">*</sup>
                        </label>
                        <div class="col-md-7">{input}</div>
                '])->input('email', ['value' => $email]); ?>
                    <?= $form->field($order, 'phone', ['template' => '
                <label class="col-md-3 control-label">{label} <sup style="color: red;">*</sup>
                        </label>
                        <div class="col-md-7">{input}</div>
                '])->textInput(['value' => $phone]); ?>
                    <?= $form->field($order, 'address', ['template' => '
                <label class="col-md-3 control-label">{label} <sup style="color: red;">*</sup>
                        </label>
                        <div class="col-md-7">{input}</div>
                '])->textarea(['rows' => 2, 'class' => 'form-control', 'value' => $address]); ?>
                    <?= $form->field($order, 'delivery', ['template' => '
                <label class="col-md-3 control-label">{label} <sup style="color: red;">*</sup>
                        </label>
                        <div class="col-md-7">{input}</div>
                '])->radioList([
                        '1' => 'Отправка почтой',
                        '2' => 'Курьер',
                        '3' => 'Самовывоз',
                    ], ['class' => 'form-control', 'value' => $delivery]); ?>
                    <?= $form->field($order, 'comment', ['template' => '
                <label class="col-md-3 control-label">{label}
                        </label>
                        <div class="col-md-7">{input}</div>
                '])->textarea(['rows' => 2, 'class' => 'form-control', 'value' => $comment]); ?>
                </fieldset>
                <?= Html::submitButton('Оформить заказ', ['class' => 'btn btn-danger']); ?>
                <?php ActiveForm::end(); ?>

            <?php else: ?>
                <p>Ваш заказ успешно оформлен, спасибо за покупку.</p>
            <?php endif; ?>


        </div>
    </div>
</div>
<div class="col-md-4">
    <h4>Ваш заказ</h4>
    <?php if (!empty($basket)): ?>
        <table class="table table-striped">
            <tr>
                <th>Наименование</th>
                <th>Количество</th>
                <th>Цена, руб.</th>
                <th>Сумма, руб.</th>
            </tr>
            <?php foreach ($basket['products'] as $item): ?>
                <tr>
                    <td><?= $item['name']; ?></td>
                    <td class="text-right"><?= $item['count']; ?>
                    </td>
                    <td class="text-right"><?= $item['price']; ?></td>
                    <td class="text-right"><?= $item['price'] * $item['count']; ?></td>
                </tr>
            <?php endforeach; ?>
            <tr>
                <td colspan="3" class="text-right">Итого</td>
                <td class="text-right"><?= $basket['amount']; ?></td>
            </tr>
        </table>
    <?php else: ?>
        <p>Ваша корзина пуста</p>
    <?php endif; ?>
</div>
<div class="request-index">


</div><!-- request-index -->
