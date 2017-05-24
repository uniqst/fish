<?php



/* @var $this \yii\web\View */

/* @var $content string */



use yii\helpers\Html;

use yii\helpers\Url;

use yii\bootstrap\Nav;

use yii\bootstrap\NavBar;

use yii\bootstrap\Modal;

use yii\widgets\Breadcrumbs;

use app\assets\AppAsset;

use app\models\Category;

use app\models\Product;

use app\models\Pages;

use app\components\CategoryWidget;

use app\components\MenuWidget;

use app\modules\admin\models\Options;

use yii\widgets\Pjax;




AppAsset::register($this);

$q = Yii::$app->request->get('q');

?>

<!DOCTYPE html>

<html lang="<?= Yii::$app->language ?>">

<head>

    <meta charset="<?= Yii::$app->charset ?>">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?= Html::csrfMetaTags() ?>

    <title><?= Html::encode($this->title) ?></title>



    <link rel="shortcut icon" href="/web/upload/logo.jpg" type="image/x-icon">




<!--    <script-->

<!--        src="   https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"-->

<!--        integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="-->

<!--        crossorigin="anonymous"></script>-->

    <?php $this->head() ?>

</head>

<body>

<div class="wrap">



    <div class="header">

        <div class="container-fluid padding-lrg header-desc">

            <div class="pull-left">

                <a href="#"><img style="height: 50px;" class="img img-responsive" src="<?= Url::to(['web/upload/logo.jpg']) ?>"></a>

            </div>



            <div style="text-align: center; position: relative"><span class="glyphicon glyphicon-earphone" style="margin-right: 3px;font-size: 16px"></span>+38

                067 555 10 50

            </div>

            <div style="text-align: center; position: relative"><span class="glyphicon glyphicon-earphone"

                                                                      style="margin-right: 3px;font-size: 16px"></span>+38

                067 555 10 50

            </div>



        </div>



    </div>



    <?



    NavBar::begin([

        'options' => [



        ],

        'innerContainerOptions' => ['class' => 'main-nav'],

    ]);

    $pages = Pages::find()->all();

    $menuItems = [['label' => 'Главная', 'url' => '/']];

    foreach ($pages as $page) {

        $menuItems[] = ['label' => $page->label, 'url' => Url::to(['site/pages', 'alias' => $page->alias])];

    }



    echo Nav::widget([

        'options' => ['class' => 'navbar-nav navbar'],

        'items' =>

            $menuItems,

    ]);

    echo Nav::widget([

        'options' => ['class' => 'navbar-nav navbar-right'],

        'items' => [

            '<form class="navbar-form navbar-left" method="get" action="/site/search">

                        <div class="form-group">

                            <input class="form-control" type="text" placeholder="Введите запрос..." name="q" value="' . $q . '">

                        </div>

                         <button type="submit" class="btn btn-default">Искать</button>

             </form>',

            '<li class="myorder"><a href="#" onclick="getCart()" >Корзина<span class="glyphicon glyphicon-shopping-cart" style="margin-left: 10px"></span></a></li>',

        ],

    ]);

    NavBar::end();

    ?>



    <div class="content" >

        <div class="container-fluid" style="margin-top: 20px;">

            <?= Breadcrumbs::widget([

                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],

            ]) ?>

        </div>
 <?php Pjax::begin(); ?>

        <?= $content ?>
<?php Pjax::end(); ?>
    </div>

</div>



<div class="footer  fadeIn animated " style=" -webkit-animation-duration: 12s; /* Safari 4.0 - 8.0 */

    animation-duration: 2s;">

    <div class="wrap container-fluid" style="color:#325252;padding-top: 20px">

        <!--        <div class="section group">-->

        <!--            <div class="col_1_of_4 span_1_of_4">-->

        <!--                <h4>Information</h4>-->

        <!--                <ul>-->

        <!--                    <li><a href="about.html">About Us</a></li>-->

        <!--                    <li><a href="contact.html">Customer Service</a></li>-->

        <!--                    <li><a href="#">Advanced Search</a></li>-->

        <!--                    <li><a href="delivery.html">Orders and Returns</a></li>-->

        <!--                    <li><a href="contact.html">Contact Us</a></li>-->

        <!--                </ul>-->

        <!--            </div>-->

        <!--            <div class="col_1_of_4 span_1_of_4">-->

        <!--                <h4>Why buy from us</h4>-->

        <!--                <ul>-->

        <!--                    <li><a href="about.html">About Us</a></li>-->

        <!--                    <li><a href="contact.html">Customer Service</a></li>-->

        <!--                    <li><a href="#">Privacy Policy</a></li>-->

        <!--                    <li><a href="contact.html">Site Map</a></li>-->

        <!--                    <li><a href="#">Search Terms</a></li>-->

        <!--                </ul>-->

        <!--            </div>-->

        <!--            <div class="col_1_of_4 span_1_of_4">-->

        <!--                <h4>My account</h4>-->

        <!--                <ul>-->

        <!--                    <li><a href="contact.html">Sign In</a></li>-->

        <!--                    <li><a href="index.html">View Cart</a></li>-->

        <!--                    <li><a href="#">My Wishlist</a></li>-->

        <!--                    <li><a href="#">Track My Order</a></li>-->

        <!--                    <li><a href="contact.html">Help</a></li>-->

        <!--                </ul>-->

        <!--            </div>-->

        <!--            <div class="col_1_of_4 span_1_of_4">-->

        <!--                <h4>Contact</h4>-->

        <!--                <ul>-->

        <!--                    <li><span>+91-123-456789</span></li>-->

        <!--                    <li><span>+00-123-000000</span></li>-->

        <!--                </ul>-->

        <!---->

        <!--            </div>-->

        <!--        </div>-->



        <div class="col-sm-5">

            <h4>My-Dream</h4>

            <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci at commodi ea eum fugit inventore

                ipsum numquam repellendus soluta vel. </p>

        </div>

        <div class="col-sm-3 col-md-offset-1">

            <h4>Контакты</h4>

            <span>email@email.com.ua</span><br>

            <span>+380934445556</span><br>

        </div>

        <?php $social = Options::find()->one();?>

        <div class="col-sm-3 social">

            <h4>Социальные сети</h4>

            <?php if(!empty($social->vk)):?>

            <a href="http://www.<?=$social->vk?>" target="_blank"><i class="fa fa-vk"></i></a>

            <?php endif;?>

             <?php if(!empty($social->facebook) && $social->vk != 0):?>

            <a href="http://www.<?=$social->facebook?>" target="_blank"><i class="fa fa-facebook"></i></a>

            <?php endif;?>

             <?php if(!empty($social->twitter) && $social->vk != 0):?>

             <a href="http://www.<?=$social->twitter?>" target="_blank"><i class="fa fa-twitter"></i></a>

            <?php endif;?>

             <?php if(!empty($social->youtube) && $social->vk != 0):?>

             <a href="http://www.<?=$social->youtube?>" target="_blank"><i class="fa fa-youtube"></i></a>

            <?php endif;?>

             <?php if(!empty($social->skype) && $social->vk != 0):?>

             <a href="http://www.<?=$social->skype?>" target="_blank"><i class="fa fa-skype"></i></a>

            <?php endif;?>

             <?php if(!empty($social->google) && $social->vk != 0):?>

             <a href="http://www.<?=$social->google?>" target="_blank"><i class="fa fa-google"></i>

            <?php endif;?></a>

             <?php if(!empty($social->instagram) && $social->vk != 0):?>

             <a href="http://www.<?=$social->instagram?>" target="_blank"><i class="fa fa-instagram"></i></a>

            <?php endif;?>

        </div>



    </div>

    <div class="copy_right">

        <p>My Dream © Все права защищены | Разработчики сайта:<a href="http://www.uniq-st.com" target="_blank">

                uniq-st.com</a></p>

    </div>

</div>



<?php

Modal::Begin([

    'header' => '<h2>Корзина</h2>',

    'id' => 'cart',

    'size' => 'modal-lg',

    'footer' => '<button class="btn btn-default" data-dismiss="modal">Продолжить покупки</button>

        <a href="' . Url::to(["cart/view"]) . '" class="btn btn-success">Оформить заказ</a>

        <button class="btn btn-danger" onclick="clearCart()" >Очистить корзину</button>'

]);

Modal::End();

?>



<span style="position: fixed;bottom: 5%;right: 1%;z-index: 10;font-size:60px;outline: 0!important;" id='scrollup'

      class="spanMy text-uppercase text-center phone-icone-fixed wow pulse animated" data-wow-duration="2.0s" data-wow-iteration="infinite">



       <a href="#" class="btn btn-sm btn-transparent inverse" data-toggle="modal" data-target="#phoneModal" style="outline: 0!important;">

           <i

               class="glyphicon glyphicon-earphone" style="outline: 0!important;"></i>

       </a>

</span>









<div class="reanimation-modal modal fade" id="phoneModal" role="dialog">

    <div class="modal-dialog" style="background-color: #ffffff;padding:28px">

        <div class="modal-main">

            <h3 class="text-center">Бесплатная консультация</h3>

            <div class="close-modal" data-dismiss="modal">

                <div class="lr">

                    <div class="rl"></div>

                </div>

            </div>

            <form action="#" class="appointment-form" id="phoneForm">





                <!-- Nested Row Starts -->

                <div class="row">

                    <!-- Name Field Starts -->

                    <div class="col-md-12">

                        <div class="form-group has-feedback">

                            <label for="name" class="sr-only">Your Name: </label>

                            <input type="text" class="form-control animation" name="name" id="name" required="required"

                                   placeholder="Ваше имя">

                            <span class="fa fa-user form-control-feedback" aria-hidden="true"></span>

                        </div>

                    </div>

                    <!-- Name Field Ends -->

                    <!-- Email Field Starts -->

                    <input type="hidden" value="null" name="email" id="email">



                    </input>

                    <!-- Email Field Ends -->

                    <!-- Phone No Field Starts -->

                    <div class="col-md-12">

                        <div class="form-group has-feedback">

                            <label for="phone" class="sr-only">Phone Number: </label>

                            <input type="text" class="form-control animation phone-mask" name="phone" id="phone"

                                   required="required"

                                   placeholder="Ваш телефон">

                            <span class="fa fa-phone form-control-feedback" aria-hidden="true"></span>

                        </div>

                    </div>



                    <div class="col-md-12">

                        <div class="form-group has-feedback">

                            <label for="email" class="sr-only">E-mail Address: </label>

                            <input type="text" class="form-control animation" name="email" id="email" required="required"

                                   placeholder="Электронный адрес">

                            <span class="fa fa-envelope form-control-feedback" aria-hidden="true"></span>

                        </div>

                    </div>

                    <div class="col-md-12">

                        <div class="form-group has-feedback">

                            <label for="message" class="sr-only">Message: </label>

                            <textarea class="form-control animation" rows="8" name="message" id="message" required

                                  placeholder="Сообщение"></textarea>

                            <span class="fa fa-comment form-control-feedback" aria-hidden="true"></span>

                        </div>

                    </div>





                    <!-- Phone No Field Ends -->

                    <!-- Message Field Starts -->

                    <input type="hidden" value="..." name="message" id="message">

                    <!-- Message Field Ends -->

                    <div id="success2"></div>

                    <div class="text-center col-sm-12">

                        <input type="submit" class="btn btn-secondary animation col-sm-12" value="ПОЗВОНИТЕ МНЕ!">

                    </div>

                </div>

                <!-- Nested Row Ends -->

            </form>

        </div>





        <!-- Modal content-->

        <div class='modal-success hidden'><p class='text-center'><span class='fa fa-check-circle'></span></p>

            <h3>Спасибо! Наши специалисты свяжутся</h3>

            <div class="close-modal" data-dismiss="modal">

                <div class="lr">

                    <div class="rl"></div>

                </div>

            </div>

            <h3>с Вами в ближайшее время!</h3></div>



    </div>





</div>





<?php $this->endBody() ?>

<script>



    new WOW().init();

</script>

</body>

</html>

<?php $this->endPage() ?>

