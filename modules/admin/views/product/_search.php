<?php

use yii\helpers\Html; 
use yii\widgets\ActiveForm; 

/* @var $this yii\web\View */ 
/* @var $model app\modules\admin\models\Products */ 
/* @var $form yii\widgets\ActiveForm */ 
?> 

<div class="product-search"> 

    <?php $form = ActiveForm::begin([ 
        'action' => ['index'], 
        'method' => 'get', 
    ]); ?> 

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'category_id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'group') ?>

    <?= $form->field($model, 'description') ?>

    <?php // echo $form->field($model, 'price') ?>

    <?php // echo $form->field($model, 'price_promo') ?>

    <?php // echo $form->field($model, 'photo') ?>

    <div class="form-group"> 
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?> 
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?> 
    </div> 

    <?php ActiveForm::end(); ?> 

</div> 