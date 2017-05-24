 <?php use yii\helpers\Url;
use app\modules\admin\models\Category;

 ?>
  <div class="">

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
