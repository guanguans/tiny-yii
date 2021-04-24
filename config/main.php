<?php

/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

return $config = [
    'name' => 'Tiny Yii',
    'components' => [
        'pay' => [
            'class' => \yii\components\Pay::class,
            'wechat' => 'This is Wechat.',
        ],
    ],
];
