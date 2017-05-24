<?php

use yii\helpers\Html;
use yii\helpers\Url;


/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Order */

$this->title = 'Редактирование заказа №: ' . $model->id;

?>
<div class="order-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

  
</div>
