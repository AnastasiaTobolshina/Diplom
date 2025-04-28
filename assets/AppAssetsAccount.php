<?php
/**
 * @link https://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license https://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAssetsAccount extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'account-dist/css/plugins.css',
        'account-dist/css/swiper.css',
        'account-dist/css/style.css',
        'account-dist/css/coloring.css',
    ];
    public $js = [
        'account-dist/js/plugins.js',
        'account-dist/js/designesia.js',    
        "account-dist/js/swiper.js",
        "account-dist/js/custom-marquee.js",
        "account-dist/js/custom-swiper-1.js",
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap5\BootstrapAsset'
    ];
}
