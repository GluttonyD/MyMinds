<?php
/**
 * Created by PhpStorm.
 * User: Aritomo
 * Date: 23.08.2018
 * Time: 21:09
 */

namespace frontend\assets;

use yii\web\AssetBundle;


class MyAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/minds.css'
    ];
    public $js = [
        'js/minds.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\jui\JuiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}