<?php
/**
 * Created by PhpStorm.
 * User: Николай
 * Date: 04.12.2019
 * Time: 18:47
 */

namespace app\controllers;


use app\models\Basket;
use Yii;
use yii\web\Controller;

class BasketController extends AppController {

//    Страница корзины
    public function actionIndex() {
        $basket = (new Basket())->getBasket();
        return $this->render('index', ['basket' => $basket]);
    }

//    Добавить в корзину
    public function actionAdd() {

        $basket = new Basket();

        if (!Yii::$app->request->isPost) {
            return $this->redirect(['basket/index']);
        }

        $data = Yii::$app->request->post();
        if (!isset($data['id'])) {
            return $this->redirect(['basket/index']);
        }
        if (!isset($data['count'])) {
            $data['count'] = 1;
        }

        // добавляем товар и получаем содержимое корзины
        $basket->addToBasket($data['id'], $data['count']);

        if (Yii::$app->request->isAjax) { // с использованием AJAX
            $content = $basket->getBasket();
            return $this->asJson($content);
        } else { // без использования AJAX
            return $this->redirect(['basket/index']);
        }
    }

//    Удалить из корзины
    public function actionRemove($id) {
        $basket = new Basket();
        $basket->removeFromBasket($id);
        /*
         * Тут возможны две ситуации: пришел просто GET-запрос
         * или GET-запрос с использованием XmlHttpRequest
         */
        if (Yii::$app->request->isAjax) { // с использованием AJAX
            // layout-шаблон нам не нужен, только view-шаблон
            $this->layout = false;
            $content = $basket->getBasket();
            return $this->render('modal', ['basket' => $content]);
        } else { // без использования AJAX
            return $this->redirect(['basket/index']);
        }
    }

//    Очистить корзину
    public function actionClear() {
        $basket = new Basket();
        $basket->clearBasket();
        return $this->render('index');
    }

//    Получить корзину
    public function actionGet()
    {
        $basket = new Basket();

        if (Yii::$app->request->isAjax) { // с использованием AJAX
            $content = $basket->getBasket();
            return $this->asJson($content);
        }
    }
}