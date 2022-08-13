<?php

namespace app\assets;


use yii\web\AssetBundle;

/**
 * Class ErrorAsset
 * @package app\assets
 */
class ErrorAsset extends AssetBundle
{
    public $depends = [
        AdminLteAsset::class,
    ];
}
