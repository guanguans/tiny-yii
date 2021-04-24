<?php

/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace yii\components;

class pay extends \yii\base\Component
{
    /**
     * @var string
     */
    private $wechat;

    public function init()
    {
        parent::init();
    }

    /**
     * @return string
     */
    public function getWechat()
    {
        return $this->wechat;
    }

    /**
     * @param $wechat
     */
    public function setWechat($wechat)
    {
        $this->wechat = $wechat;
    }
}
