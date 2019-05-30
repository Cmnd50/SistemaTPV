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
class DashboardAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        //'css/site.css',
        'template/css/plugins/toastr/toastr.min.css',
        'template/css/bootstrap.min.css',
        'template/font-awesome/css/font-awesome.css',
        'template/css/animate.css',
        'template/css/style.css',
        'template/css/plugins/iCheck/custom.css',
        //'template/css/plugins/colorpicker/bootstrap-colorpicker.min.css',
        //'template/css/plugins/datapicker/datepicker3.css',
        //'template/css/plugins/clockpicker/clockpicker.css',
        //'template/css/plugins/daterangepicker/daterangepicker-bs3.css',

    ];
    public $js = [
        // 'template/js/jquery-3.2.1.min.js',
        //'template/js/demo.js',
        'template/js/bootstrap.min.js',
        'template/js/plugins/metisMenu/jquery.metisMenu.js',
        'template/js/plugins/slimscroll/jquery.slimscroll.min.js',
        'template/js/inspinia.js',
        'template/js/plugins/pace/pace.min.js',
        'template/js/plugins/iCheck/icheck.min.js',
        'template/js/jquery.maskMoney.min.js',
        'template/js/jquery.tagsinput.js',
        'template/js/bootstrap-datetimepicker.js',
        'template/js/plugins/colorpicker/bootstrap-colorpicker.min.js',
        //'template/js/plugins/clockpicker/clockpicker.js',
        //'template/js/plugins/daterangepicker/daterangepicker.js',
        //'template/js/plugins/datapicker/bootstrap-datepicker.js',
        'template/js/plugins/toastr/toastr.min.js',
        // 'js/main.js',
        'js/bootbox.min.js',

    ];
    public $depends = [
        //'yii\web\YiiAsset',
        //'yii\bootstrap\BootstrapAsset',
    ];
}
