<?php

use yii\widgets\LinkPager;

use app\models\Product;

use yii\helpers\Url;



/* @var $this yii\web\View */



$this->title = 'Поиск|'.$q;

?>

<div class="container-fluid">



    <?php if(!empty($product)):?>

        <h2>Поиск по запросу: <?=$q?>, найдено <?=count($product)?> товаров</h2>

        <div class="site-index">

            <div class="body-content">

              <?=$this->render('_product', compact('product'));?>

                </div>

                <div class="clearfix"></div>

                <?=LinkPager::widget(['pagination' => $pagination])?>

            </div>

        </div>

    <?php else:?>

        <h2>По запросу <?=$q?> ничего не найдено...</h2>

    <?php endif;?>





</div>

