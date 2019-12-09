<?php
/**
 * Created by PhpStorm.
 * User: Николай
 * Date: 08.12.2019
 * Time: 20:57
 */

use yii\grid\GridView;
use yii\helpers\Html; ?>
<?php $this->beginContent('@app/views/layouts/admin-layout.php'); ?>
<div class="col-sm-8">
    <h4>Новые заказы</h4>
    <?= GridView::widget([
        'dataProvider' => $orderNew,
        'tableOptions' => [
            'class' => 'table table-striped table-bordered'
        ],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn',],

            'name',
            'phone',
            'address',
            [
                'attribute' => 'delivery',
                'format' => 'html',
                'value' => function ($data) {
                    switch ($data->delivery) {
                        case 1: return '<span class="text-danger">Почта</span>';
                        case 2: return '<span class="text-warning">Курьер</span>';
                        case 3: return '<span class="text-warning">Самовывоз</span>';
                        default: return 'Ошибка';
                    }
                },
            ],
            'comment:ntext',
            'amount',
            [
                'attribute' => 'status',
                'format' => 'html',
                'value' => function ($data) {
                    switch ($data->status) {
                        case 0: return '<span class="text-danger">Новый</span>';
                        case 1: return '<span class="text-warning">Обработан</span>';
                        case 2: return '<span class="text-warning">Оплачен</span>';
                        case 3: return '<span class="text-warning">Доставлен</span>';
                        case 4: return '<span class="text-success">Завершен</span>';
                        default: return 'Ошибка';
                    }
                },
            ],
            'created',


            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{delete}',
                'buttons' => [
                    'delete' => function ($url,$model) {
                        $url = '/admin/deleteorder?id='. $model->id;
                        return Html::a(
                            'Обработать</span>',
                            $url);
                    },
                ],
            ],
        ],
    ]); ?>

    <h4>Заказы в работе</h4>
    <?= GridView::widget([
        'dataProvider' => $orderProcess,
        'tableOptions' => [
            'class' => 'table table-striped table-bordered'
        ],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn',],

            'name',
            'phone',
            'address',
            [
                'attribute' => 'delivery',
                'format' => 'html',
                'value' => function ($data) {
                    switch ($data->delivery) {
                        case 1: return '<span class="text-danger">Почта</span>';
                        case 2: return '<span class="text-warning">Курьер</span>';
                        case 3: return '<span class="text-warning">Самовывоз</span>';
                        default: return 'Ошибка';
                    }
                },
            ],
            'comment:ntext',
            'amount',
            [
                'attribute' => 'status',
                'format' => 'html',
                'value' => function ($data) {
                    switch ($data->status) {
                        case 0: return '<span class="text-danger">Новый</span>';
                        case 1: return '<span class="text-warning">Обработан</span>';
                        case 2: return '<span class="text-warning">Оплачен</span>';
                        case 3: return '<span class="text-warning">Доставлен</span>';
                        case 4: return '<span class="text-success">Завершен</span>';
                        default: return 'Ошибка';
                    }
                },
            ],
            'created',


            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{delete}',
                'buttons' => [
                    'delete' => function ($url,$model) {
                        $url = '/admin/deleteorder?id='. $model->id;
                        return Html::a(
                            'Закрыть заказ</span>',
                            $url);
                    },
                ],
            ],
        ],
    ]); ?>
</div>

<?php $this->endContent(); ?>

