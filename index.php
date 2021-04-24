<?php

/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

use yii\components\Pay;

define('YII_DEBUG', true);

require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/Yii.php';

$config = require __DIR__ . '/config/main.php';
$application = new yii\base\Application($config);

dump(Yii::$app);
dump(Yii::$app->pay);
dump(Yii::$app->get('pay'));
dump(Yii::$app->pay->wechat);
dump(Yii::$app->pay->getWechat());

$pay = new Pay(['wechat' => 'This is Wechat component.']);
dump($pay);
