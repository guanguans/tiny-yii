<?php

define('YII_DEBUG', true);

require __DIR__.'/vendor/autoload.php';
require __DIR__.'/Yii.php';

$config = [
    // 'id'         => 'yii2-basic-console',
    'components' => [
        'pay' => [
            'class'  => 'yii\console\Pay',
            'wechat' => 'This is Wechat.',
            'alipay' => 'This is Alipay.',
        ],
    ],
];

$application = new yii\console\Application($config);

var_dump(new yii\console\Pay([
    'wechat' => 'This is Wechat.',
    'alipay' => 'This is Alipay.',
]));
var_dump($application->get('pay'));
var_dump($application->getComponents());
// var_dump($application);
// var_dump(Yii::$container);
// var_dump(Yii::$app);
