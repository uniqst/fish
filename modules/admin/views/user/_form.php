<?php



use yii\helpers\Html;

use yii\widgets\ActiveForm;



/* @var $this yii\web\View */

/* @var $model app\modules\admin\models\User */

/* @var $form yii\widgets\ActiveForm */

?>



<div class="user-form">



    <?php $form = ActiveForm::begin(); ?>



    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>



    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>



    <div class="form-group">

        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>

    </div>



    <?php ActiveForm::end(); ?>



</div>

