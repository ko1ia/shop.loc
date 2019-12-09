<?php

/* @var $this yii\web\View */

use app\assets\AppAsset;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager; ?>
<div class="row">
    <div class="col-sm-3">
        <div class="widget categories b-b-0">
            <!-- /widget heading -->
            <div class="widget-heading">
                <h3 class="widget-title text-dark">
                    Каталог
                </h3>
                <div class="clearfix"></div>
            </div>
            <div class="widget-body">
                <!-- Sidebar navigation -->
                <ul class="nav sidebar-nav">
                    <?php foreach ($categories as $category): ?>
                        <?php if ($category->id_parent == null): ?>
                            <li class="dropdown">

                                <a type="button" class="ripple-effect dropdown-toggle" href="#" data-toggle="dropdown"
                                   aria-expanded="false"><?= $category->name ?> <b class="caret"></b>
                                </a>
                                <ul class="dropdown-menu">
                                    <?php foreach ($category->categories as $subcat): ?>
                                        <li><a href="/catalog/category/<?= $subcat->id ?>"
                                               tabindex="-1"><?= $subcat->name ?></a></li>
                                    <?php endforeach; ?>
                                </ul>
                            </li>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </ul>
                <!-- Sidebar divider -->
            </div>
        </div>
        <!--/search form -->
        <div class="widget">
            <!-- /widget heading -->
            <div class="widget-heading">
                <h3 class="widget-title text-dark">
                    Топ продаж
                </h3>
                <div class="widget-widgets"><a href="#">Подробнее <span class="ti-angle-right"></span></a></div>
                <div class="clearfix"></div>
            </div>
            <div class="widget-body">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 thumb">
                        <div class="thumb-inside">
                            <a class="thumbnail" href="#"> <img class="img-responsive" src="http://placehold.it/240x240"
                                                                alt=""> </a> <span class="favorite"><a href="#"
                                                                                                       data-toggle="tooltip"
                                                                                                       data-placement="left"
                                                                                                       title=""
                                                                                                       data-original-title="Save store"><i
                                            class="ti-heart"></i></a></span>
                        </div>
                        <div class="store_name text-center">
                            <h5>CoolStore</h5>
                        </div>
                    </div>
                    <!-- /thumb -->
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 thumb">
                        <div class="thumb-inside">
                            <a class="thumbnail" href="#"> <img class="img-responsive" src="http://placehold.it/240x240"
                                                                alt=""> </a> <span class="favorite"><a href="#"
                                                                                                       data-toggle="tooltip"
                                                                                                       data-placement="left"
                                                                                                       title=""
                                                                                                       data-original-title="Save store"><i
                                            class="ti-heart"></i></a></span>
                        </div>
                        <div class="store_name text-center">
                            <h5>Onlinestore</h5>
                        </div>
                    </div>
                    <!-- /thumb -->
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 thumb">
                        <div class="thumb-inside">
                            <a class="thumbnail" href="#"> <img class="img-responsive" src="http://placehold.it/240x240"
                                                                alt=""> </a> <span class="favorite"><a href="#"
                                                                                                       data-toggle="tooltip"
                                                                                                       data-placement="left"
                                                                                                       title=""
                                                                                                       data-original-title="Save store"><i
                                            class="ti-heart"></i></a></span>
                        </div>
                        <div class="store_name text-center">
                            <h5>VendorShop</h5>
                        </div>
                    </div>
                    <!-- /thumb -->
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 thumb">
                        <div class="thumb-inside">
                            <a class="thumbnail" href="#"> <img class="img-responsive" src="http://placehold.it/240x240"
                                                                alt=""> </a> <span class="favorite"><a href="#"
                                                                                                       data-toggle="tooltip"
                                                                                                       data-placement="left"
                                                                                                       title=""
                                                                                                       data-original-title="Save store"><i
                                            class="ti-heart"></i></a></span>
                        </div>
                        <div class="store_name text-center">
                            <h5>Shopname</h5>
                        </div>
                    </div>
                    <!-- /thumb -->
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 thumb">
                        <div class="thumb-inside">
                            <a class="thumbnail" href="#"> <img class="img-responsive" src="http://placehold.it/240x240"
                                                                alt=""> </a> <span class="favorite"><a href="#"
                                                                                                       data-toggle="tooltip"
                                                                                                       data-placement="left"
                                                                                                       title=""
                                                                                                       data-original-title="Save store"><i
                                            class="ti-heart"></i></a></span>
                        </div>
                        <div class="store_name text-center">
                            <h5>Storename</h5>
                        </div>
                    </div>
                    <!-- /thumb -->
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 thumb">
                        <div class="thumb-inside">
                            <a class="thumbnail" href="#"> <img class="img-responsive" src="http://placehold.it/240x240"
                                                                alt=""> </a> <span class="favorite"><a href="#"
                                                                                                       data-toggle="tooltip"
                                                                                                       data-placement="left"
                                                                                                       title=""
                                                                                                       data-original-title="Save store"><i
                                            class="ti-heart"></i></a></span>
                        </div>
                        <div class="store_name text-center">
                            <h5>VendorStore</h5>
                        </div>
                    </div>
                    <!-- /thumb -->
                </div>
            </div>
        </div>
        <!-- //popular stores widget -->
        <div class="widget">
            <!-- /widget heading -->
            <div class="widget-heading">
                <h3 class="widget-title text-dark">
                    Популярные метки
                </h3>
                <div class="clearfix"></div>
            </div>
            <div class="widget-body">
                <ul class="tags">
                    <li><a href="#" class="tag">
                            Coupons
                        </a>
                    </li>
                    <li><a href="#" class="tag">
                            Discounts
                        </a>
                    </li>
                    <li><a href="#" class="tag">
                            Deals
                        </a>
                    </li>
                    <li><a href="#" class="tag">
                            Shopname
                        </a>
                    </li>
                    <li><a href="#" class="tag">
                            Ebay
                        </a>
                    </li>
                    <li><a href="#" class="tag">
                            Fashion
                        </a>
                    </li>
                    <li><a href="#" class="tag">
                            Shoes
                        </a>
                    </li>
                    <li><a href="#" class="tag">
                            Kids
                        </a>
                    </li>
                    <li><a href="#" class="tag">
                            Travel
                        </a>
                    </li>
                    <li><a href="#" class="tag">
                            Vacations
                        </a>
                    </li>
                    <li><a href="#" class="tag">
                            Hosting
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- // tags -->
    </div>
    <!--/col -->
    <div class="col-sm-9">
        <!-- end: Widget -->

        <?php foreach ($products as $key => $product): ?>
            <div class="coupon-wrapper coupon-single featured">
                <div class="row">
                    <?php if ($key == 0): ?>
                        <div class="ribbon-wrapper hidden-xs">
                            <div class="ribbon">Новое</div>
                        </div>
                    <?php endif; ?>
                    <div class="coupon-data col-sm-2 text-center">
                        <div class="savings text-center">
                            <div style="height: 100px; width: 100%;">
                                <img style="height:100%; width: 100%; object-fit: cover"
                                     src="<?= '/' . explode(',', $product->image)[0] ?>" alt="Photo"
                                     class="img-responsive">
                            </div>
                        </div>
                        <!-- end:Savings -->
                    </div>
                    <!-- end:Coupon data -->
                    <div class="coupon-contain col-sm-7">
                        <!--                            <ul class="list-inline list-unstyled">-->
                        <!--                                <li class="sale label label-pink">Sale</li>-->
                        <!--                                <li class="popular label label-success">98% success</li>-->
                        <!--                                <li><span class="used-count">78 used</span> </li>-->
                        <!--                            </ul>-->
                        <h4 class="coupon-title"><a href="/product/<?= $product->slug ?>"><?= $product->title ?></a>
                        </h4>
                        <p data-toggle="collapse" data-target="#more"><?= $product->content ?></p>
                        <p id="more" class="collapse">Подробное описание товара</p>
                        <ul class="coupon-details list-inline">
                            <li class="list-inline-item">
                                <div class="btn-group" role="group" aria-label="...">
                                    <button type="button" class="btn btn-default btn-xs" data-toggle="tooltip"
                                            data-placement="left" title="" data-original-title="Понравилось"><i
                                                class="ti-thumb-up"></i></button>
                                    <button type="button" class="btn btn-default btn-xs" data-toggle="tooltip"
                                            data-placement="top" title="" data-original-title="Не понравилось"><i
                                                class="ti-thumb-down"></i></button>
                                </div>
                                <!-- end:Btn group -->
                            </li>
                            <li class="list-inline-item">15 понравилось</li>
                            <li class="list-inline-item"><a href="/product/<?= $product->slug ?>">Подробнее</a></li>
                        </ul>
                        <!-- end:Coupon details -->
                    </div>
                    <!-- end:Coupon cont -->

                    <div class="button-contain col-sm-3 text-center">
                        <h3><?= $product->price ?> рублей</h3>
                        <form class="add-to-basket" method="post"
                              action="<?= Url::to(['basket/add']); ?>">

                            <input type="hidden" name="id"
                                   value="<?= $product->id; ?>">
                            <?=
                            Html::hiddenInput(
                                Yii::$app->request->csrfParam,
                                Yii::$app->request->csrfToken
                            );
                            ?>
                            <input name="count" type="number" value="1"/>
                            <button type="submit" class="btn btn-danger ripple">Добавить в корзину<span
                                        class="md-ripple"></span></button>

                        </form>

                    </div>
                </div>

                <!-- //row -->
            </div>
        <?php endforeach; ?>


        <nav aria-label="Постраничная навигация">
            <?= LinkPager::widget(['pagination' => $pages,
                'options' => [
                    'tag' => 'div',
                    'class' => 'pagination pagination-lg',
                ],
                'activePageCssClass' => 'active',
            ]); ?>
        </nav>


        <!-- //coupon wrapper -->

    </div>
</div>
