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

var_dump($application);
echo '-------------------------------------------------------------------------'.PHP_EOL;

var_dump($application->get('pay'));
echo '-------------------------------------------------------------------------'.PHP_EOL;

var_dump(Yii::$container);
echo '-------------------------------------------------------------------------'.PHP_EOL;

var_dump(Yii::$app);
echo '-------------------------------------------------------------------------'.PHP_EOL;

var_dump(new yii\components\Pay([
    'wechat' => 'This is Wechat.',
    'alipay' => 'This is Alipay.',
]));
echo '-------------------------------------------------------------------------'.PHP_EOL;
