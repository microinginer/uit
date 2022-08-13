<?php

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Class SignAssets
 * @package app\modules\adminable\assets
 */
class SignAssets extends AssetBundle
{
    /**
     * @var string
     */
    public $sourcePath = '@vendor/almasaeed2010';

    /**
     * @var array
     */
    public $css = [
        'adminlte/plugins/icheck-bootstrap/icheck-bootstrap.css',
    ];

    /**
     * @var array
     */
    public $js = [

    ];

    /**
     * @var array
     */
    public $depends = [
        'app\assets\AdminLteAsset',
    ];
}
