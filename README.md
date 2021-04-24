# tiny-yii

> 简化版 Yii2，只保留 Yii2 最核心的部分(base)，便于深入理解 Yii2。

## 测试

### 代码

``` php
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
```

### 结果

``` php
yii\base\Application {#3
  +name: "Tiny Yii"
  -_components: []
  -_definitions: array:1 [
    "pay" => array:2 [
      "class" => "yii\components\Pay"
      "wechat" => "This is Wechat."
    ]
  ]
  -_events: []
  -_eventWildcards: []
  -_behaviors: null
}
yii\components\pay {#9
  -wechat: "This is Wechat."
  -_events: []
  -_eventWildcards: []
  -_behaviors: null
}
yii\components\pay {#9
  -wechat: "This is Wechat."
  -_events: []
  -_eventWildcards: []
  -_behaviors: null
}
"This is Wechat."
"This is Wechat."
yii\components\pay {#14
  -wechat: "This is Wechat component."
  -_events: []
  -_eventWildcards: []
  -_behaviors: null
}
```
