<?php
/**
 * Created by PhpStorm.
 * User: Николай
 * Date: 18.09.2019
 * Time: 22:22
 */
$this->title = 'Админ панель';
?>
<?php $this->beginContent('@app/views/layouts/admin-layout.php'); ?>
    <div class="col col-sm-4">

        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Пользователей</h3>
            </div>
            <div class="panel-body"><h1><?= $users_count ?></h1></div>
        </div>

    </div>
    <div class="col col-sm-4">
        <div class="panel panel-success">
            <div class="panel-heading">
                <h3 class="panel-title">Товаров</h3>
            </div>
            <div class="panel-body"><h1><?= $product_count ?></h1></div>
        </div>
    </div>

    <div class="col col-sm-4">
        <div class="panel panel-danger">
            <div class="panel-heading">
                <h3 class="panel-title">Новых заказов</h3>
            </div>
            <div class="panel-body"><h1><?= $orderNew_count ?></h1></div>
        </div>
    </div>

    <div class="col col-sm-4">
        <div class="panel panel-warning">
            <div class="panel-heading">
                <h3 class="panel-title">Заказы в работе</h3>
            </div>
            <div class="panel-body"><h1><?= $orderProcess_count ?></h1></div>
        </div>
    </div>
<?php $this->endContent(); ?>