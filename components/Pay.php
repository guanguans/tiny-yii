<?php

namespace yii\components;

use yii\base\Component;

class Pay extends Component
{
    private $wechat;

    private $alipay;

    public function init()
    {
        parent::init();
    }

    /**
     * @return mixed
     */
    public function getWechat()
    {
        return $this->wechat;
    }

    /**
     * @param  mixed  $wechat
     */
    public function setWechat($wechat)
    {
        $this->wechat = $wechat;
    }

    /**
     * @return mixed
     */
    public function getAlipay()
    {
        return $this->alipay;
    }

    /**
     * @param  mixed  $alipay
     */
    public function setAlipay($alipay)
    {
        $this->alipay = $alipay;
    }
}