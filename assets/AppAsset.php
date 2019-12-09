<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web/web';
    public $css = [
        'css/bootstrap.min.css',
        'css/icons.css',
        'css/animate.min.css',
        'css/animsition.min.css',
        'css/owl.carousel/assets/owl.carousel.css',
        'css/style.css',
        'css/site.css',
    ];
    public $js = [
        'https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js',
        'https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js',
        'js/jquery.min.js',
        'js/bootstrap.min.js',
        'js/animsition.min.js',
        'css/owl.carousel/owl.carousel.min.js',
        'js/kupon.js',

    ];
    public $depends = [
        'yii\web\YiiAsset',
    ];
}
