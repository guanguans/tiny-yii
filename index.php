<?php

define('YII_DEBUG', true);

require __DIR__.'/vendor/autoload.php';
require __DIR__.'/Yii.php';

$config = [
    'components' => [
        'pay' => [
            'class'  => 'yii\components\Pay',
            'wechat' => 'This is Wechat.',
            'alipay' => 'This is Alipay.',
        ],
    ],
];

$application = new yii\base\Application($config);

var_dump(new yii\components\Pay([
    'wechat' => 'This is Wechat.',
    'alipay' => 'This is Alipay.',
]));
var_dump($application->get('pay'));
var_dump($application->getComponents());
// var_dump($application);
// var_dump(Yii::$container);
// var_dump(Yii::$app);
