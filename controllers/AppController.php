<?php
/**
 * Created by PhpStorm.
 * User: Николай
 * Date: 26.11.2019
 * Time: 21:00
 */

namespace app\controllers;


use Yii;
use yii\web\Controller;

class AppController extends Controller
{
    protected function setMetaTags($title = '', $keywords = '', $description = '') {
        $this->view->title = $title ?: Yii::$app->params['defaultTitle'];
        $this->view->registerMetaTag([
            'name' => 'keywords',
            'content' => $keywords ?: Yii::$app->params['defaultKeywords']
        ]);
        $this->view->registerMetaTag([
            'name' => 'description',
            'content' => $description ?: Yii::$app->params['defaultDescription']
        ]);
    }
}