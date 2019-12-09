<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic',
    'name' => 'Дипломная работа',
    'language' => 'ru',
    'layout' => '@app/views/layouts/shop',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'asd',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => $db,

        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                'index' => 'site/index',
                'product/<slug>' => 'product/product',
                'catalog/category/<category:\d+>/page/<page:\d+>' => 'product/category',
                'catalog/category/<category:\d+>' => 'product/category',
                'catalog/category/<category:\d+>/sort/<sort:\d>' => 'product/category',
                'product/page/<page:\d+>' => 'product/category',
                'product' => 'product/category',
                'product/sort/<sort:\d>' => 'product/category',
                'search' => 'product/search',
                'login' => 'user/login',
                'logout' => 'user/logout',
                'register' => 'user/register',
                'cabinet' => 'user/cabinet',
                'admin' => 'admin/index',
                'admin/create' => 'product/create',
                'admin/users' => 'admin/users',
                'admin/orders' => 'admin/orders',
                'admin/products' => 'admin/products',
                'basket' => 'basket/index',
                'order/checkout' => 'request/checkout'

            ],
        ],

    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        'allowedIPs' => ['*'],
    ];
}

return $config;
