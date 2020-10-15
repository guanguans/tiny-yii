<?php

define('YII_DEBUG', true);

require __DIR__.'/vendor/autoload.php';
require __DIR__.'/Yii.php';

$config = [
    'id'         => 'yii2-basic-console',
    'bootstrap'  => [],
    'components' => [
        'pay' => [
            'class' => 'yii\console\Pay',
            'wechat' => 'This is Wechat.',
            'alipay' => 'This is Alipay.',
        ]
    ],
    'modules'    => [],
];

$application = new yii\console\Application($config);
var_dump($application);
// var_dump(Yii::$container);
// var_dump(Yii::$app);
// var_dump(Yii::$app->getRequest());

$exitCode = $application->run();
exit($exitCode);
