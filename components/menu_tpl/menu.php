<?php
use yii\helpers\Url;

?>
<li>
    <a href="<?= Url::to(['site/catalog', 'name' => $category['name'], 'id' => $category['id']])?>">
        <?= $category['name']?>
        <?php if( isset($category['childs']) ): ?>
            <span class="badge"><i class="glyphicon glyphicon-triangle-bottom"></i></span>
        <?php endif;?>
    </a>
    <?php if( isset($category['childs']) ): ?>
        <ul>
            <?= $this->getMenuHtml($category['childs'])?>
        </ul>
    <?php endif;?>
</li>


<!--<div class="btn-group">-->
<!--    <a data-toggle="dropdown" class="btn  dropdown-toggle">--><?//=$cat->name ?><!--<span class="fa fa-angle-right" style="position: absolute;right: 10px;font-size: 15px"></span></a>-->
<!--    <ul class="dropdown-menu bullet pull-middle pull-right pull-middle-true">-->
<!--        <li><a href="#">--><?//=$cat->name ?><!--</a></li>-->
<!--        <li><a href="#">Another action</a></li>-->
<!--        <li><a href="#">Something else here</a></li>-->
<!---->
<!--        <li><a href="#">Separated link</a></li>-->
<!--        <li><a href="#">Separated link</a></li>-->
<!--        <li><a href="#">Separated link</a></li>-->
<!--        <li><a href="#">Separated link</a></li>-->
<!--    </ul>-->
<!--</div>-->