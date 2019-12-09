<?php
/**
 * Created by PhpStorm.
 * User: Николай
 * Date: 08.12.2019
 * Time: 20:35
 */

use yii\grid\GridView;
use yii\helpers\Html; ?>
<?php $this->beginContent('@app/views/layouts/admin-layout.php'); ?>
<div class="col-sm-8">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'tableOptions' => [
            'class' => 'table table-striped table-bordered'
        ],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn',],

            'fio',
            'username',
            'password',
            'email:email',
            //'role',
            //'telephone',


            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{delete}',
                'buttons' => [
                    'delete' => function ($url,$model) {
                        return Html::a(
                            '<span class="text-danger ti-trash">Удалить</span>',
                            $url);
                    },
                ],
            ],
        ],
    ]); ?>
</div>

<?php $this->endContent(); ?>
