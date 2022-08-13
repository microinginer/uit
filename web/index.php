<?php

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../env.php';
require __DIR__ . '/../vendor/yiisoft/yii2/Yii.php';
require __DIR__ . '/../debug-tools.php';

$config = require __DIR__ . '/../config/web.php';

mb_internal_encoding("UTF-8");

(new yii\web\Application($config))->run();
