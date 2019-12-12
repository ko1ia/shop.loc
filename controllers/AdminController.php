<?php
/**
 * Created by PhpStorm.
 * User: Николай
 * Date: 18.09.2019
 * Time: 22:22
 */

namespace app\controllers;


use app\models\Product;
use app\models\Request;
use app\models\User;
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;

class AdminController extends AppController
{

//    Админка - главная страница
    public function actionIndex()
    {
        $this->setMetaTags('Админка');
        $product_count = count(Product::find()->all());
        $users_count = count(User::find()->all());
        $orderNew_count = count(Request::find()->where(['status' => 0])->all());
        $orderProcess_count = count(Request::find()->where(['IN', 'status', [1,2,3]])->all());
        return $this->render('index', compact('product_count', 'users_count', 'orderNew_count', 'orderProcess_count'));
    }

//    Админка - страница пользователей
    public function actionUsers()
    {
        $this->setMetaTags('Список пользователей');
        $dataProvider = new ActiveDataProvider([
            'query' => User::find(),
        ]);

        return $this->render('userlist', [
            'dataProvider' => $dataProvider,
        ]);
    }

//    Админка - страница заказов
    public function actionOrders()
    {
        $this->setMetaTags('Список заказов');
        $orderNew = new ActiveDataProvider([
            'query' => Request::find()->where(['status' => 0])->orderBy(['created' => SORT_ASC]),
        ]);

        $orderProcess = new ActiveDataProvider([
            'query' => Request::find()->where(['IN', 'status', [1,2,3]])
                ->orderBy(['updated' => SORT_ASC]),
        ]);

        return $this->render('orderlist', [
            'orderNew' => $orderNew,
            'orderProcess' => $orderProcess,
        ]);
    }

//    Заказ - сменить статус
    public function actionProcessorder($id)
    {
        $order = Request::findOne($id);
        if(isset($order)) {

            $order->status = 1;
            $order->save();
        }

        return $this->redirect(['admin/orders']);
    }


//    Админка - список продуктов
    public function actionProducts()
    {
        $this->setMetaTags('Список продуктов');
        $dataProvider = new ActiveDataProvider([
            'query' => Product::find()->orderBy('id desc'),
        ]);

        return $this->render('productlist', [
            'dataProvider' => $dataProvider,
        ]);
    }

//    Продукт - редактирование
    public function actionUpdateproduct($id)
    {
        $model = Product::findOne($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['admin/products']);
        }

        return $this->render('updateproduct', [
            'model' => $model,
        ]);
    }

//    Продукт - удалить
    public function actionDeleteproduct($id)
    {
        $product = Product::findOne($id);
        if(isset($product)) {

            $product->delete();
        }

        return $this->redirect(['admin/products']);
    }


}