<?php



/* @var $this yii\web\View */

/* @var $form yii\bootstrap\ActiveForm */

/* @var $model app\models\LoginForm */



use yii\helpers\Html;

use yii\helpers\Url;

use yii\bootstrap\ActiveForm;

use app\models\Product;

use app\models\Category;

use app\modules\admin\models\InCategory;

use app\modules\admin\models\CatOption;





//d($prod);



$this->title = $title;

$this->params['breadcrumbs'][] = $this->title;

?>

<?php



/* @var $this yii\web\View */



$this->title = $prod->name;



$this->params['breadcrumbs'];

?>



<div class="container-fluid">

    <div class="row">

        <div class="col-md-3 categories hidden-sm hidden-xs">

                      <?php echo $this->render('_category', compact('category'))?>



            </div>

            <div class="col-md-9 description" >



             <div class="col-md-6">





                 <div class="flexslider">

                     <ul class="slides">

                     <?php foreach($img as $im):?>

                         <li class="img-container" data-thumb="<?=Url::to(['web/'.$im->name])?>">

                             <img src="<?=Url::to(['web/'.$im->name])?>" />

                         </li>

                    <?php endforeach;?>

                   

                     </ul>

                 </div>

                <style type="text/css">

               .img-container {

                    line-height: 3000px;

                    height: 300px;

/*                    background: red;

*/                }



                .img-container img{

                   vertical-align: middle;

                   margin: auto;

                }

                </style>

    <script

        src="https://code.jquery.com/jquery-3.2.1.min.js"

        integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="

        crossorigin="anonymous"></script>
  <script type="text/javascript">

                function fix_size() {

        var images = $('.img-container img');

        images.each(setsize);



        function setsize() {

            var img = $(this),

                img_dom = img.get(0),

                container = img.parents('.img-container');

            if (img_dom.complete) {

                resize();

            } else img.one('load', resize);



            function resize() {

                if ((container.width() / container.height()) < (img_dom.width / img_dom.height)) {

                    img.width('100%');

                    img.height('auto');

                    return;

                }

                img.height('100%');

                img.width('auto');

            }

        }

    }

    $(window).on('resize', fix_size);

    fix_size();





        </script>

             </div>

             <div class="col-md-6 single-right">

                <h3><?=$prod->name?></h3>



                <?php if ($prod->price_promo != 0){?>

                <span class="textimg text-danger"><span style="text-decoration: line-through; "><?=$prod->price?> грн</span><span class="text-success"> <?=$prod->price_promo?> грн</span></span>

                <?php  } else {?>

                <span class="textimg text-success"><?=$prod->price?> грн</span>

                <?php  }?>



                <div  style="margin-top: 30px;margin-bottom: 60px">
                    <a class="add-to-cart btn btn-danger" data-id="<?= $prod->id ?>" href="#">Добавить в корзину</a>
                </div>
                <?php $pr = Product::find()->where(['id' => Yii::$app->request->get('id')])->one()?>
                <p>Код товара: <?=$pr->key?></p>
                <?php $in = InCategory::find()->where(['id' => $go])->all();?>

                <?php foreach($in as $i):?>

                <h3><?=$i->name;?></h3>

                <ul>

                <?php $group = CatOption::find()->where(['incat_id' => $i->id])->joinWith(['product' => function(yii\db\ActiveQuery $query) use($prod){

                        $query->where(['group' => $prod->group]);



                    }])->all(); ?>
                <?php foreach($group as $gg):?>

                    <?php if($gg->product_id != $id):?>
      
                    <li><a href="<?=Url::to(['site/single-product', 'id' => $gg->product_id])?>"><?php echo $gg->value;?></li></a>

                    </li>  

                    <?php endif;?>

                <?php endforeach;?>

                </ul>

                <?php endforeach;?>



            

           

            </div>



            <div class="clearfix"> </div>



            <div>



                <!-- Nav tabs -->

                <div class="product-tabs" >

                    <ul class="nav nav-tabs " role="tablist" >

                        <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Описание</a></li>

                        <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Характеристики</a></li>

                        <!--                    <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Messages</a></li>-->

                        <!--                    <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Settings</a></li>-->

                    </ul>



                    <!-- Tab panes -->

                    <div class="tab-content" >

                        <div role="tabpanel" class="tab-pane active" id="home">

                            <?=$prod->description ?>

                        </div>

                        <div role="tabpanel" class="tab-pane" id="profile">

                            <table class="table">

                                <?php foreach ($incat as $in){ ?>

                                <?php if(!empty($in->catOption->value)):?>

                                <tr>

                                    <td><?=$in->name?></td>

                                    <td><?=$in->catOption->value?></td>

                                </tr>

                            <?php endif;?>

                                <?php }?>

                            </table>



                        </div>

                       

                    </div>

                </div>



    </div>











</div>



</div>

</div>

