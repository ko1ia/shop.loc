<?php
/**
 * Created by PhpStorm.
 * User: Николай
 * Date: 04.12.2019
 * Time: 18:49
 */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Pjax;

$this->title = 'Корзина'

?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h1>Корзина</h1>
                <?php if (!empty($basket)): ?>
                    <table class="table table-bordered">
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
        </div>
        <a href="/order/checkout" class="btn btn-danger">Оформить заказ</a>
        <a href="<?= Url::to(['basket/clear']) ?>" class="btn btn-default">Очистить корзину</a>
    </div>
</section>
