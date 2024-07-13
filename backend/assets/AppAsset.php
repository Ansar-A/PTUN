<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        "tabler/demo/dist/css/tabler.min.css",
        "tabler/demo/dist/css/tabler-flags.min.css",
        "tabler/demo/dist/css/tabler-payments.min.css",
        "tabler/demo/dist/css/tabler-vendors.min.css",
        "tabler/demo/dist/css/demo.min.css",
    ];
    public $js = [
        "tebler/dome/dist/libs/apexcharts/dist/apexcharts.min.js",
        "tebler/dome/dist/libs/jsvectormap/dist/js/jsvectormap.min.js",
        "tebler/dome/dist/libs/jsvectormap/dist/maps/world.js",
        "tebler/dome/dist/libs/jsvectormap/dist/maps/world-merc.js",
        "tebler/dome/dist/js/tabler.min.js",
        "tebler/dome/dist/js/demo.min.js",
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
