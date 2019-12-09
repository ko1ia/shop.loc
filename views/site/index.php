<?php

/* @var $this yii\web\View */

$this->title = 'Главная';

use app\assets\AppAsset; ?>
<div class="row">
    <div class="col-sm-12">
        <!-- Main component for a primary marketing message or call to action -->
        <div class="slide-wrap shadow">
            <div class="main-slider owl-carousel owl-theme owl-center owl-loaded">


                <div class="owl-stage-outer">
                    <div class="owl-stage"
                         style="transition: all 0s ease 0s; width: 3771px; transform: translate3d(0px, 0px, 0px);">
                        <div class="owl-item active center" style="width: 1247px; margin-right: 10px;"><a href="#"
                                                                                                          class="item"
                                                                                                          data-hash="one">
                                <img src="http://placehold.it/1500x500" alt=""> </a></div>
                        <div class="owl-item" style="width: 1247px; margin-right: 10px;">
                            <div class="item" data-hash="two"><img src="http://placehold.it/1500x500" alt=""></div>
                        </div>
                        <div class="owl-item" style="width: 1247px; margin-right: 10px;">
                            <div class="item" data-hash="three"><img src="http://placehold.it/1500x500" alt=""></div>
                        </div>
                    </div>
                </div>
                <div class="owl-controls">
                    <div class="owl-nav">
                        <div class="owl-prev" style="display: none;">prev</div>
                        <div class="owl-next" style="display: none;">next</div>
                    </div>
                    <div class="owl-dots" style="display: none;"></div>
                </div>
            </div>
            <!-- /.carosuel -->
            <div class="carousel-tabs clearfix">
                <a class="col-sm-4 tab url" href="#one">
                    <div class="media">
                        <div class="media-left media-middle"><img src="http://placehold.it/120x50" alt=""></div>
                        <div class="media-body">
                            <h4 class="media-heading">Upto 30% Rewards</h4>
                            <p>Up to 70% off on Clothing ...</p>
                        </div>
                    </div>
                </a>
                <a class="col-sm-4 tab url" href="#two">
                    <div class="media">
                        <div class="media-left media-middle"><img src="http://placehold.it/120x50" alt=""></div>
                        <div class="media-body">
                            <h4 class="media-heading">Upto 70% Rewards</h4>
                            <p>Up to 70% off on Clothing ...</p>
                        </div>
                    </div>
                </a>
                <a class="col-sm-4 tab url" href="#three">
                    <div class="media">
                        <div class="media-left media-middle"><img src="http://placehold.it/120x50" alt=""></div>
                        <div class="media-body">
                            <h4 class="media-heading">Upto 50% Rewards</h4>
                            <p>Up to 70% off on Clothing ...</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <!--/slide wrap -->
    </div>
    <!-- /col 12 -->
</div>