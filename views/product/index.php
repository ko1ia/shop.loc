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
            <div class="col-md-3 col-sm-6">
    		<span class="thumbnail">
      			<div style="height: 200px; width: 100%;">
                    <img style="height: 100%; width: 100%; object-fit: cover"
                         src="<?= '/' . explode(',', $product->image)[0] ?>" alt="Photo">
                </div>
      			<h4 class="coupon-title"><a href="/product/<?= $product->slug ?>"><?= $product->title ?></a></h4>
      			<div class="ratings">
                    <span class="ti-star"></span>
                    <span class="ti-star"></span>
                    <span class="ti-star"></span>
                    <span class="ti-star"></span>
                    <span class="ti-star"></span>
                </div>
      			<p style="height: 30px; overflow: hidden;"><?= $product->content ?>. </p>
      			<hr class="line">
      			<div class="row">
      				<div class="col-md-6 col-sm-6">
      					<h4 class="price"><?= $product->price ?> руб.</h4>
      				</div>
      				<div class="col-md-6 col-sm-6">
                        <form class="add-to-basket" method="post" action="<?= Url::to(['basket/add']); ?>">
                            <input type="hidden" name="id" value="<?= $product->id; ?>">
                            <?=
                            Html::hiddenInput(Yii::$app->request->csrfParam, Yii::$app->request->csrfToken);
                            ?>
                            <button type="submit" class="btn btn-danger right">В корзину</button>
                        </form>
      				</div>

      			</div>
    		</span>
            </div>
        <?php endforeach; ?>

        <div class="col-md-12">
            <nav aria-label="Постраничная навигация">
                <?= LinkPager::widget(['pagination' => $pages,
                    'options' => [
                        'tag' => 'div',
                        'class' => 'pagination pagination-lg',
                    ],
                    'activePageCssClass' => 'active',
                ]); ?>
            </nav>
        </div>



        <!-- //coupon wrapper -->

    </div>
</div>
