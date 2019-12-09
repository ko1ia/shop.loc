<?php
/**
 * Created by PhpStorm.
 * User: Николай
 * Date: 09.12.2019
 * Time: 16:51
 */

?>

<h4>Ваши заказы</h4>
<?php foreach ($orders as $order): ?>

    <div class="row m-t-30">
        <div class="col-md-9">
            <span class="pull-left"><i class="ti-package" style="font-size: 70px;"></i></span>
            <div class="col-md-8">
                <p>Имя - <?= $order['name'] ?>.
                </p>
                <p>Email - <?= $order['email'] ?>.
                </p>
                <p>Телефон - <?= $order['phone'] ?>.
                </p>
                <span class="button_my">
                    <a href="#">Удалить</a> <a href="#">Оплатить</a>
                </span>
            </div>
        </div>
        <div class="col-md-3 dph-reviews">
            <p><span><?php
                    switch ($order['status']) {
                        case 0: echo '<span class="text-danger">Новый</span>'; break;
                        case 1: echo '<span class="text-warning">Обработан</span>'; break;
                        case 2: echo '<span class="text-warning">Оплачен</span>'; break;
                        case 3: echo '<span class="text-warning">Доставлен</span>'; break;
                        case 4: echo '<span class="text-success">Завершен</span>'; break;
                        default: return 'Ошибка';
                    } ?></span></p>
        </div>
    </div>

<?php endforeach; ?>
