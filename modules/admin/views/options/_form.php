<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\options */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="options-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'vk')->textInput(['style' => 'max-width: 350px;', 'class' => 'form-control']) ?>
    <?= $form->field($model, 'facebook')->textInput(['style' => 'max-width: 350px;', 'class' => 'form-control']) ?>
    <?= $form->field($model, 'twitter')->textInput(['style' => 'max-width: 350px;', 'class' => 'form-control']) ?>
    <?= $form->field($model, 'youtube')->textInput(['style' => 'max-width: 350px;', 'class' => 'form-control']) ?>
    <?= $form->field($model, 'skype')->textInput(['style' => 'max-width: 350px;', 'class' => 'form-control']) ?>
    <?= $form->field($model, 'google')->textInput(['style' => 'max-width: 350px;', 'class' => 'form-control']) ?>
    <?= $form->field($model, 'instagram')->textInput(['style' => 'max-width: 350px;', 'class' => 'form-control']) ?> 
    



    <div class="form-group">
        <?= Html::submitButton(
        $model->isNewRecord ? 'Create' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
