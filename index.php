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

$application = new yii\console\Application($config);
// var_dump($application);
// var_dump(Yii::$app);
$exitCode = $application->run();
exit($exitCode);
