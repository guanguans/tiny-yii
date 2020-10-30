<?php

define('YII_DEBUG', true);

require __DIR__.'/vendor/autoload.php';
require __DIR__.'/Yii.php';

class Pay extends \yii\base\Component
{
    private $wechat;

    public function init()
    {
        parent::init();
    }

    public function getWechat()
    {
        return $this->wechat;
    }

    public function setWechat($wechat)
    {
        $this->wechat = $wechat;
    }
}

$config = [
    'components' => [
        'pay' => [
            'class'  => Pay::className(),
            'wechat' => 'This is Wechat.',
        ],
    ],
];

$application = new yii\base\Application($config);

var_dump($application);
printf('-------------------------------------------------------------------------');

var_dump($application->get('pay'));
printf('-------------------------------------------------------------------------');

var_dump(Yii::$container);
printf('-------------------------------------------------------------------------');

var_dump(Yii::$app);
printf('-------------------------------------------------------------------------');

var_dump(new Pay([
    'wechat' => 'This is Wechat.',
]));
printf('-------------------------------------------------------------------------');
