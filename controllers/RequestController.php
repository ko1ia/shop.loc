<?php
/**
 * Created by PhpStorm.
 * User: Николай
 * Date: 08.12.2019
 * Time: 15:36
 */

namespace app\controllers;


use app\models\Basket;
use app\models\Request;
use app\models\RequestItem;
use Yii;
use yii\web\Controller;

class RequestController extends AppController
{
    public function actionCheckout()
    {
        $this->setMetaTags('Оформление заказа');
        $basket = (new Basket())->getBasket();
        $order = new Request();
        /*
         * Если пришли post-данные, загружаем их в модель...
         */
        if ($order->load(Yii::$app->request->post())) {
            // ...и проверяем эти данные
            if ( !$order->validate()) {
                // данные не прошли валидацию, отмечаем этот факт
                Yii::$app->session->setFlash(
                    'checkout-success',
                    false
                );
                // сохраняем в сессии введенные пользователем данные
                Yii::$app->session->setFlash(
                    'checkout-data',
                    [
                        'name' => $order->name,
                        'email' => $order->email,
                        'phone' => $order->phone,
                        'address' => $order->address,
                        'comment' => $order->comment
                    ]
                );
                /*
                 * Сохраняем в сессии массив сообщений об ошибках. Массив имеет вид
                 * [
                 *     'name' => [
                 *         'Поле «Ваше имя» обязательно для заполнения',
                 *     ],
                 *     'email' => [
                 *         'Поле «Ваш email» обязательно для заполнения',
                 *         'Поле «Ваш email» должно быть адресом почты'
                 *     ]
                 * ]
                 */
                Yii::$app->session->setFlash(
                    'checkout-errors',
                    $order->getErrors()
                );
            } else {
                /*
                 * Заполняем остальные поля модели — те которые приходят
                 * не из формы, а которые надо получить из корзины. Кроме
                 * того, поля created и updated будут заполнены с помощью
                 * метода Order::behaviors().
                 */
                $basket = new Basket();
                $content = $basket->getBasket();
                $order->amount = $content['amount'];
                // сохраняем заказ в базу данных
                $order->user_id = Yii::$app->user->id;
                $order->status = 0;
                $order->insert();
                $order->addItems($content);
                // очищаем содержимое корзины
                $basket->clearBasket();
                // данные прошли валидацию, заказ успешно сохранен
                Yii::$app->session->setFlash(
                    'checkout-success',
                    true
                );
            }
            // выполняем редирект, чтобы избежать повторной отправки формы
            return $this->refresh();
        }

        return $this->render('checkout', [
            'order' => $order,
            'basket' => $basket
        ]);
    }


}