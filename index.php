<?php

define('YII_DEBUG', true);

require __DIR__.'/vendor/autoload.php';
require __DIR__.'/Yii.php';

$config = [
    'id'         => 'yii2-basic-console',
    'basePath'   => dirname(__DIR__),
    'bootstrap'  => [],
    'components' => [],
    'modules'    => [],
    'params'     => [],
];

$web     = new yii\web\Application($config);
$console = new yii\console\Application($config);

var_dump($web);
var_dump($console);
var_dump(Yii::$app);
