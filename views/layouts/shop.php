<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

$asset = AppAsset::register($this);
?>
<?php $this->beginPage() ?>

<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="shortcut icon" href="#">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<div class="site-wrapper">
    <!-- Navigation Bar-->
    <header class="header">
        <div class="top-nav navbar m-b-0 b-0">
            <div class="container">
                <div class="row">
                    <!-- LOGO -->
                    <div class="topbar-left col-sm-3 col-xs-3">
                        <a href="index.html" class="logo"> <img style="height: 40px;" src="<?=$asset->baseUrl ?>/images/logo.png" alt="" class="img-responsive"> </a>
                    </div>
                    <!-- End Logo container-->
                    <div class="menu-extras col-sm-9 col-xs-9">

                        <ul class="nav navbar-nav navbar-right pull-right">

                            <li>
                                <form class="navbar-form app-search pull-left hidden-xs" method="post" action="<?= Url::to(['search']) ?>" role="search">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Найти товар ..." name="search">
                                        <?=
                                        Html::hiddenInput(
                                            Yii::$app->request->csrfParam,
                                            Yii::$app->request->csrfToken
                                        );
                                        ?>
                                        <div class="input-group-btn">
                                            <button class="btn btn-danger" type="submit"><i class="ti-search"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </li>
                            <li class="dropdown hidden-xs">
                                <a href="#" data-target="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true"> <i class="ti-shopping-cart"></i>
                                    <span class="badge badge-xs badge-danger" id="basket-count">0</span></a>
                                <ul class="dropdown-menu dropdown-menu-lg noclose">
                                    <li class="notifi-title">Корзина</li>
                                    <li class="list-group">
                                        <!-- list item-->

                                        <!-- last list item -->
                                    </li>

                                </ul>
                            </li>
                            <?php if (Yii::$app->user->isGuest): ?>
                            <li class="dropdown user-box">
                                <a href="" class="dropdown-toggle profile btn btn-default" data-toggle="dropdown" aria-expanded="true">
                                    Кабинет
                                </a>
                                <ul class="dropdown-menu" style="margin-top:16px">
                                    <li><a href="/login">Войти</a> </li>
                                    <li><a href="/register">Регистрация</a> </li>
                                </ul>
                            </li>
                            <?php else: ?>
                            <li class="dropdown user-box">
                                <a href="" class="dropdown-toggle profile btn btn-default" data-toggle="dropdown" aria-expanded="true">
                                    <?=Yii::$app->user->identity->username?>
                                </a>
                                <ul class="dropdown-menu" style="margin-top:16px">
                                    <?php if(Yii::$app->user->identity->role == 1): ?>
                                    <li><a href="/admin">Админка</a> </li>
                                    <?php endif; ?>
                                    <li><a href="/cabinet">Кабинет</a> </li>
                                    <li><a href="/logout">Выйти</a> </li>

                                </ul>
                            </li>
                            <?php endif; ?>
                        </ul>


                        <div class="menu-item">
                            <!-- Mobile menu toggle-->
                            <a class="navbar-toggle">
                                <div class="lines"> <span></span> <span></span> <span></span> </div>
                            </a>
                            <!-- End mobile menu toggle-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="navbar-custom shadow">
            <div class="container">
                <div id="navigation">
                    <!-- Navigation Menu-->
                    <ul class="navigation-menu">
                        <li> <a href="/index"><i class="ti-home"></i> <span> Главная </span> </a> </li>
                        <li class="has-submenu">
                            <a href="/product"><i class="ti-package"></i> <span> Товары </span> </a>
                        </li>

<!--                        <li class="has-submenu">-->
<!--                            <a href="#"><i class="ti-announcement"></i> <span> Stores </span> </a>-->
<!--                            <ul class="submenu">-->
<!--                                <li><a href="store_profile.html">Store</a> </li>-->
<!--                                <li><a href="categories.html">Store categories</a> </li>-->
<!--                            </ul>-->
<!--                        </li>-->
<!--                        <li class="has-submenu">-->
<!--                            <a href="#"><i class="ti-layout-list-thumb"></i> <span> Pages </span> </a>-->
<!--                            <ul class="submenu">-->
<!--                                <li><a href="store_profile.html">Store</a> </li>-->
<!--                                <li><a href="categories.html">Search stores</a> </li>-->
<!--                                <li><a href="results.html">Coupos list</a> </li>-->
<!--                                <li><a href="results_2.html">Coupons grid</a> </li>-->
<!--                                <li><a href="results_3.html">Coupons grid images</a> </li>-->
<!--                                <li><a href="submit.html">Submit coupon</a> </li>-->
<!--                                <li><a href="faq.html">Faq</a> </li>-->
<!--                                <li><a href="pricing.html">Pricing</a> </li>-->
<!--                                <li><a href="contact.html">Contact</a> </li>-->
<!--                                <li><a href="features.html">Features</a> </li>-->
<!--                                <li><a href="blog_single.html">Blog</a> </li>-->
<!--                                <li><a href="blog_articles.html">Blog list</a> </li>-->
<!--                            </ul>-->
<!--                        </li>-->
                    </ul>
                    <!-- End navigation menu  -->
                </div>
            </div>
        </div>
    </header>
    <!-- Navigation ends -->
    <div class="wrapper">
        <div class="container m-t-30">
            <?= Alert::widget() ?>
            <?= $content ?>
        </div>
    </div>



    <!-- Footer -->
    <footer id="footer">
        <div class="btmFooter">
            <div class="container">
                <div class="col-sm-12 text-center m-t-20">
                    <p> <strong>
                            Copyright 2019
                        </strong> Магазин по продаже деревянных и металлических конструкций <i class="ti-heart">
                        </i> <strong>
                            by Ko1ia
                        </strong>
                    </p>
                </div>
                <div class="col-sm-12 text-center m-t-30">
                    <ul class="pay-opt list-inline list-unstyled">
                        <li>
                            <a href="#" title="#"> <img src="<?=$asset->baseUrl ?>/images/payment/amz-icon.png" class="img-responsive" alt=""> </a>
                        </li>
                        <li>
                            <a href="#" title="#"> <img src="<?=$asset->baseUrl ?>/images/payment/ax-icon.png" class="img-responsive" alt=""> </a>
                        </li>
                        <li>
                            <a href="#" title="#"> <img src="<?=$asset->baseUrl ?>/images/payment/mb-icon.png" class="img-responsive" alt=""> </a>
                        </li>
                        <li>
                            <a href="#" title="#"> <img src="<?=$asset->baseUrl ?>/images/payment/mst-icon.png" class="img-responsive" alt=""> </a>
                        </li>
                        <li>
                            <a href="#" title="#"> <img src="<?=$asset->baseUrl ?>/images/payment/mstr-icon.png" class="img-responsive" alt=""> </a>
                        </li>
                        <li>
                            <a href="#" title="#"> <img src="<?=$asset->baseUrl ?>/images/payment/paypal-icon.png" class="img-responsive" alt=""> </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <!-- start modal -->
    <!-- Large modal -->
    <div class="coupon_modal modal fade couponModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="ti-close"></i></span> </button>
                <div class="coupon_modal_content">

                    <div class="row">
                        <div class="col-sm-10 col-sm-offset-1 text-center">
                            <h2>Save 30% off New Domains Names</h2>
                            <p>Not applicable to ICANN fees, taxes, transfers,or gift cards. Cannot be used in conjunction with any other offer, sale, discount or promotion. After the initial purchase term.</p>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <h5 class="text-center text-uppercase m-t-20 text-muted">Click below to get your coupon code</h5>
                            </div>

                            <div class="col-sm-4 col-sm-offset-4 col-xs-6 col-xs-offset-3"> <a href="#" target="_blank" class="coupon_code alert alert-info"><span class="coupon_icon"><i class="ti-cut hidden-xs"></i></span>  DAZ50-8715
                                </a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="report">Did this coupon work? <span class="yes vote-link" data-src="#">Yes</span> <span class="no vote-link" data-src="#">No</span> </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end: Coupon modal content -->
            </div>



            <div class="newsletter-modal">
                <div class="newsletter-form">
                    <h4><i class="ti-email"></i>Sign up for our weekly email newsletter with the best money-saving coupons.</h4>
                    <div class="input-group">
                        <input class="form-control input-lg" placeholder="Email" type="text"> <span class="input-group-btn">
                           <button class="btn btn-danger btn-lg" type="button">
                           Subscribe
                           </button>
                           </span>
                    </div>
                    <p><small>We’ll never share your email address with a third-party.</small> </p>
                </div>
            </div>
            <ul class="nav nav-pills nav-justified">
                <li role="presentation" class="active"><a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="It worked"><i class="ti-check color-green"></i></a> </li>
                <li role="presentation"><a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="I love it"><i class="ti-heart color-primary"></i></a> </li>
                <li role="presentation"><a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="It didn't work"><i class="ti-close"></i></a> </li>
            </ul>


        </div>
    </div>
    <!-- end: Modall -->
</div>
</div>
<!-- //wrapper -->
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
