 <?php use yii\helpers\Url;
use app\modules\admin\models\Category;

 ?>
 <ul>
                <h3>Категории</h3>
                <?php foreach ($category as $cat) { ?>
                    <!--                    <li><a href="#">--><?//= $cat->name ?><!--</a></li>-->

                    <div class="btn-group dropdown">
                        <a  href="<?= Url::to(['site/category','id'=>$cat->id ])?>" class="btn" data-label-placement><?=$cat->name ?></a>

                        <a data-toggle="dropdown" data-hover="dropdown" class="btn dropdown-toggle"><span class="fa fa-angle-right" style="position: absolute;right: 10px;font-size: 15px"></span></a>

                        <ul class="dropdown-menu pull-middle pull-right pull-middle-true">
                            <?php
                            $categ = Category::find()->where(['parent_id' => $cat['id']])->all();
                            foreach($categ as $c){
                            
                                ?>
                                <li><a href="<?= Url::to(['site/category','id'=>$c['id'] ])?>"><?=$c['name'];?></a></li>
                            <?php }?>
                        </ul>
                    </div>

                <?php } ?>
            </ul>
