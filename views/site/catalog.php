<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */
use yii\widgets\LinkPager;
use app\modules\admin\models\Category;

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Каталог товаров';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container-fluid">



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
           

            <div class="row products">
                <?php
                echo $this->render('_product', [
                    'product' => $product,
                ]);
                ?>

            </div>
         <?=LinkPager::widget([
                  'pagination' => $pagination,
                ]);
        ?>
        </div>


    </div>


</div>