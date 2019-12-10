<?php
/**
 * Created by PhpStorm.
 * User: Николай
 * Date: 08.12.2019
 * Time: 21:43
 */

use yii\helpers\Html;
use yii\helpers\Url;

?>

<section class="results m-t-30">
    <div class="container">

            <?php if (!empty($products)): ?>
        <h3>Результаты поиска</h3>
        <div class="widget m-t-20">
            <?php foreach ($products as $product): ?>

                <div class="coupon-wrapper coupon-single featured">
                    <div class="row">
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
            <?php else: ?>

            <h3>Поиск не дал результатов</h3>

            <?php endif; ?>

    </div>
</section>
