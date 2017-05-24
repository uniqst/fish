<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Product */

$this->title = 'Создать товар';

?>
<div class="product-create">


    <?= $this->render('_form', [
        'model' => $model,
        'catid' => $catid,
        'qwe' => $qwe,
        'qqq' => $qqq,
    ]) ?>

</div>
