<?php
/**
 * Created by PhpStorm.
 * User: Николай
 * Date: 08.12.2019
 * Time: 21:02
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

            'title',
            'price',

            [
                'attribute' => 'image',
                'format' => 'html',
                'value' => function ($data) {
                    $image = explode(',', $data['image']);
                    return Html::img(Yii::getAlias('@web').'/'.$image[0],
                        ['height' => '70px']);
                },
            ],


            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{delete}, {update}',
                'buttons' => [
                    'delete' => function ($url,$model) {
                        $url = '/admin/deleteproduct?id='. $model->id;
                        return Html::a(
                            '<span class="text-danger ti-trash"></span>',
                            $url);
                    },
                    'update' => function ($url,$model) {
                        $url = '/admin/updateproduct?id='. $model->id;
                        return Html::a(
                            '<span class="text-danger ti-pencil-alt"></span>',
                            $url);
                    },
                ],
            ],
        ],
    ]); ?>
</div>

<?php $this->endContent(); ?>
