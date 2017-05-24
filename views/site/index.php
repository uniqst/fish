<?php



use yii\widgets\LinkPager;

use yii\helpers\Url;



/* @var $this yii\web\View */

/* @var $form yii\bootstrap\ActiveForm */

/* @var $model app\models\ContactForm */

use app\models\Category;

use app\models\Product;

use app\components\CategoryWidget;

use yii\helpers\Html;



$this->title = 'Итернет-магазин техники';



//d($category);



?>



<div class="container-fluid">


    <div>

        <div id="slider" class="carousel slide main-carousel hidden-xs" data-ride="carousel">

            <ol class="carousel-indicators">

                <li data-target="#slider" data-slide-to="0" class="active" style="z-index: 30"></li>

                <li data-target="#slider" data-slide-to="1" style="z-index: 30"></li>

                <li data-target="#slider" data-slide-to="2" style="z-index: 30"></li>

            </ol>

            <div class="carousel-inner text-lite-color" role="listbox">

                <div class="item sl1 active">



                    <div class="carousel-caption slide1 animated fadeIn">



                        <p class='animated fadeInDown first'><span> 24/7</span> НАШІ СПЕЦІАЛІСТИ</p>

                        <p class="animated zoomIn second">Акция Акция Акция</p>

                        <span><img class="animated fadeInUp fourth" src="images/pulse-long-white.png"

                                   style="width: auto;height: 20px;margin: 8px 0"></span>

                        <p class='animated fadeInDown third'>Lorem ipsum dolor sit amet, consectetur adipisicing elit.

                            Aliquam aspernatur consequuntur cum dignissimos dolorem ea earum.</p>

                    </div>

                </div>



                <div class="item sl2">



                    <div class="carousel-caption slide2 animated fadeInRight">



                        <p class='animated fadeInDown first'><span>Акция Акция</span></p>

                        <p class="animated zoomIn second">От 19999 грн</p>

                        <span><img class="animated fadeInUp fourth" src="images/pulse-long-black.png"

                                   style="width: auto;height: 20px;margin: 3px 0 8px"></span>

                        <p class='animated fadeInDown third'>До Ваших послуг: <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</span>

                        </p>

                    </div>

                </div>



                <div class="item sl3">



                    <div class="carousel-caption slide3 animated fadeIn">



                        <p class='animated fadeInDown first'><span>90%</span> скидка</p>

                        <p class="animated zoomIn second">унікальна програма</p>

                        <span><img class="animated fadeInUp fourth" src="images/pulse-long-white.png"

                                   style="width: auto;height: 20px;margin: 8px 0"></span>



                        <p class='animated fadeInDown third'>До Ваших послуг: <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</span>

                        </p>

                    </div>

                </div>



            </div>



        </div>



    </div>



    <div class="row">

        <div class="col-md-3 categories">

            <ul class="hidden-xs hidden-sm">

                <h3>Категории</h3>

                <?php foreach ($category as $cat) { ?>

                    <!--                    <li><a href="#">--><? //= $cat->name ?><!--</a></li>-->



                    <div class="btn-group dropdown">

                        <a href="<?= Url::to(['site/category', 'id' => $cat->id]) ?>" class="btn"

                           data-label-placement><?= $cat->name ?></a>



                        <a data-toggle="dropdown" data-hover="dropdown" class="btn dropdown-toggle"><span

                                class="fa fa-angle-right" style="position: absolute;right: 10px;font-size: 15px"></span></a>



                        <ul class="dropdown-menu pull-middle pull-right pull-middle-true">

                            <?php

                            $categ = Category::find()->where(['parent_id' => $cat['id']])->all();

                            foreach ($categ as $c) {

                                //$count = Product::find()->where(['category_id' => $c->id])->count();

                                ?>

                                <li><a href="<?= Url::to(['site/category', 'id' => $c['id']]) ?>"><?= $c['name']; ?></a>

                                </li>

                            <?php } ?>

                        </ul>

                    </div>



                <?php } ?>

            </ul>



            <!-- START MOBILE MENU AREA -->

            <div class="mobile-menu-area hidden-lg hidden-md">

                <div class="container">

                    <div class="row">

                        <div class="col-xs-12">

                            <div class="mobile-menu">

                                <nav id="dropdown">

                                    <ul>





                                        <?php foreach ($category as $cat): ?>

                                            <? $categ = Category::find()->where(['parent_id' => $cat['id']])->all(); ?>

                                            <button class="accordion" ><?= $cat['name'] ?></button>

                                            <div class="panel">

                                                <ul>

                                                    <?php foreach ($categ as $c): ?>

                                                        <li>

                                                            <a href="<?= Url::to(['site/category', 'id' => $c['id']]) ?>"><?= $c['name']; ?></a>

                                                        </li>

                                                    <?php endforeach; ?>

                                                </ul>

                                            </div>

                                        <?php endforeach; ?>



                                    </ul>

                                </nav>

                            </div>

                        </div>

                    </div>

                </div>

            </div>





        </div>



        <div class="col-md-9 prod-window">

            <div class="content_top" style="border-color: #999999">

                <div class="heading">

                    <h3>Новые товары</h3>

                </div>



                <div class="see pull-right">

                    <p><a href="<?=Url::to(['site/catalog'])?>">Смотреть все</a></p>

                </div>

            </div>



            <div class="row products">

                <?php

                echo $this->render('_product', [

                    'product' => $product,

                ]);

                ?>

            </div>


            <div class="content_top" style="border-color: #999999">

                <div class="heading">

                    <h3>

                        Топ продаж

                    </h3>

                </div>



               <!--  <div class="see pull-right">

                    <p><a href="<?=Url::to(['site/top'])?>">Смотреть все</a></p>

                </div> -->

            </div>

            <?php if(count($top) > 0):?>

            <div class="row products">
    
                <?php
                echo

                $this->render('_product', [

                    'product' => $top

                ]);

                ?>
            <?php else:?>
                <h3>Пока товаров нет</h3>
            <?php endif;?>
            </div>



        </div>





    </div>





</div>

