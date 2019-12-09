<?php

use app\widgets\Alert;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $content string */
?>
<?php $this->beginPage() ?>
    <?php $this->beginBody() ?>
        <div class="row">
            <div class="col-sm-3">
                <div class="widget categories b-b-0">
                    <!-- /widget heading -->
                    <div class="widget-heading">
                        <h3 class="widget-title text-dark">
                            Меню
                        </h3>
                        <div class="clearfix"></div>
                    </div>
                    <div class="widget-body">
                        <!-- Sidebar navigation -->
                        <ul class="nav sidebar-nav">
                            <li>
                                <a class="ripple-effect dropdown-toggle" href="/admin"> <i class="ti-home">
                                    </i> Главная
                                </a>
                            </li>
                            <li class="dropdown">
                                <a class="ripple-effect dropdown-toggle" href="#" data-toggle="dropdown"> <i class="ti-user">
                                    </i> Пользователи  <b class="caret">
                                    </b>
                                </a>
                                <ul class="dropdown-menu">
                                    <li> <a href="/admin/users" tabindex="-1">Список</a></li>
                                </ul>
                                <ul class="dropdown-menu">
                                    <li> <a href="#" tabindex="-1">Забаненые</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a class="ripple-effect dropdown-toggle" href="#" data-toggle="dropdown"> <i class="ti-credit-card">
                                    </i> Заказы  <b class="caret">
                                    </b>
                                </a>
                                <ul class="dropdown-menu">
                                    <li> <a href="/admin/orders" tabindex="-1">Список заказов</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a class="ripple-effect dropdown-toggle" href="#" data-toggle="dropdown"> <i class="ti-package">
                                    </i> Товары  <b class="caret">
                                    </b>
                                </a>
                                <ul class="dropdown-menu">
                                    <li> <a href="/admin/create" tabindex="-1">Добавить товар</a>
                                    </li>
                                </ul>
                                <ul class="dropdown-menu">
                                    <li> <a href="/admin/products" tabindex="-1">Список товаров</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a class="ripple-effect dropdown-toggle" href="#"> <i class="ti-menu"></i> Категории товаров</a>
                            </li>
                        </ul>
                        <!-- Sidebar divider -->
                    </div>
                </div>
                <!--/search form -->
            </div>
            <!--/col -->
            <?= Alert::widget() ?>
            <?= $content ?>


        </div>


    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>
