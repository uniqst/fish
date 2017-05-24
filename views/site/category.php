 <?php

 

use app\components\CategoryWidget;

use yii\helpers\Html;

use yii\helpers\Url;

use yii\bootstrap\ActiveForm;

use app\models\Qwe;

use app\modules\admin\models\InCategory;

use app\modules\admin\models\CatOption;

use app\modules\admin\models\Product;

use yii\db\ActiveQuery;



$this->title = $title->name;

$this->params['breadcrumbs'][] = $this->title;



?>

<div class="container-fluid">

    <div class="row">

        <div class="col-md-3 categories options">





            <h3><?= $this->title ?></h3>

            <?php if($categ->id == 0):?>

              <div class="btn-group dropdown">

                <?php foreach($categ as $cat):?>

                    <li><a href="<?=Url::to(['site/category', 'id' => $cat->id])?>" class="btn" data-label-placement=""><?=$cat->name?></a></li>

                <?php endforeach;?>

              </div>

            <?php else:?>

            <form method="get" action="">

                <input type="hidden" name="id" value="<?= Yii::$app->request->get('id') ?>" class="btn btn-success">



                <ul class="list-group">

                    <?php foreach ($categ->inCategory as $c): ?>
                        <?php if(!empty($c->option)):?>
                        <h4 class='list-group-item-heading'><?= $c->name ?></h4>

                        <div style="margin-bottom: 20px">

                        <?php foreach($c->allOption as $option ): ?>



                            <?php if (!empty($val))

                                if (in_array((string)$option->value, (array)$val))

                                    $checked = "checked";

                                else

                                    $checked = "";

                            ?>

                            <p class="list-group-item-text"> <input type="checkbox" <?=$checked?> onclick="this.form.submit();"

                                                                    name='value[<?= (string)$option->value ?>]' id="check<?= $option->value ?>">

                                <label for="check<?= $option->value ?>"><?= $option->value ?></label></p>

                        <?php endforeach; ?>

                        </div>
                             <?php endif;?>

                    <?php endforeach; ?>

                </ul>

            </form>

        <?php endif;?>

        </div>



        <div class="col-md-9 prod-window" style="margin-top: -25px;">

            <div class="row products">

                <?php

                echo $this->render('_product', [

                    'product' => $product,

                    'value' => $value,

                ]);

                ?>

            </div>

        </div>

    </div>

</div>