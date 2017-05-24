<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Product */

$this->title = 'Редактирование товара : ' . $model->name;

?>
<div class="product-update">

    <?= $this->render('_form', [
        'model' => $model,
        'catid' => $catid,
        'catl'  => $catl,
        'qqq' => $qqq,
        'qwe' => $qwe,
    ]) ?>

</div>
