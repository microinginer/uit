<?php


namespace app\assets;


use yii\web\AssetBundle;

/**
 * Class AdminLteAsset
 * @package app\modules\adminable\assets
 */
class AdminLteAsset extends AssetBundle
{
    /**
     * @var string
     */
    public $sourcePath = '@vendor/almasaeed2010/adminlte';

    public $css = [
        'plugins/fontawesome-free/css/all.min.css',
        'http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css',
        'dist/css/adminlte.min.css',
        'https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700',
    ];

    public $js = [
        'dist/js/adminlte.js',
        'plugins/chart.js/Chart.min.js',
    ];

    /**
     * @var array
     */
    public $depends = [
        'yii\web\YiiAsset',
        'yii\web\JqueryAsset',
        'yii\bootstrap4\BootstrapAsset',
        'yii\bootstrap4\BootstrapPluginAsset',
    ];
}
