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

        'https://fonts.googleapis.com/css?family=PT+Sans+Narrow:400,700|Roboto+Condensed:300,400,700&amp;subset=cyrillic',

        'https://fonts.googleapis.com/css?family=Open+Sans:400,700&amp;subset=cyrillic',

        'https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&amp;subset=cyrillic',

        'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css',

        'css/flexslider.css',

        'css/animate.css',

        'css/owl.carousel.css',

        'css/dropdowns-enhancement.css',

        'css/owl.carousel.css',

        'css/site.css',

        'css/my-style.css',

        'css/responsive.css',

        'css/bootstrap-dropdownhover.min.css',





    ];

    public $js = [

        'js/wow.min.js',

        'js/jquery.flexslider-min.js',

        'js/jquery.cookie.js',

        'js/jquery.accordion.js',

        'js/dropdowns-enhancement.js',

        'js/bootstrap-dropdownhover.min.js',

        'js/owl.carousel.min.js',

        'js/jquery.maskedinput.js',

        'js/jqBootstrapValidation.js',

        'js/contact_me.js',

        'js/main.js',

   /*     '//code.jquery.com/ui/1.12.1/jquery-ui.js'*/

    ];

    public $depends = [

        'yii\web\YiiAsset',

        'yii\bootstrap\BootstrapPluginAsset',

    ];

}

