<?php
    $images = explode(',', $product->image);
    array_pop($images);

use yii\helpers\Html;use yii\helpers\Url; ?>

<div class="col-sm-12 col-md-12 col-lg-12">

<div class="container">

    <!-- product -->
    <div class="product-content product-wrap clearfix product-deatil">
        <div class="row">
            <div class="col-md-5 col-sm-12 col-xs-12 ">
                <div class="product-image">
                    <div id="myCarousel-2" class="carousel slide">
                        <ol class="carousel-indicators">
                            <li data-target="#myCarousel-2" data-slide-to="0" class=""></li>
                            <li data-target="#myCarousel-2" data-slide-to="1" class="active"></li>
                            <li data-target="#myCarousel-2" data-slide-to="2" class=""></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="item active">
                                <img style="height: 300px; width: 100%; object-fit: cover" src="<?= \yii\helpers\Url::base(true) . '/' . $images[0] ?>" alt="<?=$product->title ?>">
                            </div>
                            <?php
                            array_shift($images);
                            foreach ($images as $image): ?>
                                <div class="item">
                                    <img style="height: 300px; width: 100%; object-fit: cover" src="<?= \yii\helpers\Url::base(true) . '/' . $image ?>" alt="<?=$product->title ?>">
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <a class="left carousel-control" href="#myCarousel-2" data-slide="prev"> <span
                                    class="ti-angle-left"></span> </a>
                        <a class="right carousel-control" href="#myCarousel-2" data-slide="next"> <span
                                    class="ti-angle-right"></span> </a>
                    </div>
                </div>
            </div>
            <div class="col-md-7 col-sm-12 col-xs-12">

                <h2 class="name">
                    <?=$product->title ?>
                </h2>
                <hr>
                <h3 class="price-container">
                    <?=$product->price ?> рублей
                </h3>
                <hr>
                <div class="description description-tabs">
                    <div id="myTabContent" class="tab-content">
                        <div class="tab-pane fade active in" id="more-information">
                            <br>
                            <strong>Описание</strong>
                            <p><?=$product->content ?></p>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-12 col-md-6 col-lg-6">
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
                            <button type="submit" class="btn btn-danger btn-lg">Добавить в корзину<span
                                        class="md-ripple"></span></button>

                        </form>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-6">
                        <div class="btn-group pull-right">
                            <button class="btn btn-white btn-default"><i class="ti-star"></i> Добавить в избранное </button>
                            <button class="btn btn-white btn-default"><i class="ti-user"></i> Написать продавцу</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end product -->
</div>
</div>