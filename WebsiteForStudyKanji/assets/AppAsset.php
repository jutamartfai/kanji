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
        'css/site.css',
        'mytemp/css/bootstrap.min.css',
        'mytemp/css/business-casual.css',
        'mytemp/css/practice.css',
    ];
    public $js = [
        'mytemp/js/jquery.js',
        'mytemp/js/jquery-3.1.1.js',
        'mytemp/jquery_ui/jquery-ui.min.js',
        'mytemp/js/bootstrap.min.js',
        'mytemp/js/practice.js',
        // 'mytemp/js/bootbox.min.js',
        // 'mytemp/js/main.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
