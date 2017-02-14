<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'libs/bootstrap/css/bootstrap.min.css',
        'libs/bootstrap/css/bootstrap-theme.min.css',
        'css/main.css',
        'css/media.css',
        'libs/font-awesome-4.7.0/css/font-awesome.min.css'
    ];
    public $js = [
        'libs/bootstrap/js/bootstrap.min.js',
        'js/main.js'
    ];
    public $depends = [
        'yii\web\YiiAsset'
    ];
}
