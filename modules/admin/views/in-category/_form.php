<?php

use app\modules\admin\models\Category;

use yii\helpers\Html;

use yii\widgets\ActiveForm;



/* @var $this yii\web\View */

/* @var $model app\modules\admin\models\InCategory */

/* @var $form yii\widgets\ActiveForm */

$categ = Category::find()->where(['not in', 'parent_id', 0])->all();

$items = [];

foreach($categ as $cat){

	$items = [$cat->id => $cat->name];

}

$params = ['name' => 'cat_id'];

?>



<div class="in-category-form">



    <?php $form = ActiveForm::begin(); ?>

	

    <?= $form->field($model, 'category_id')->dropDownList($items, $params) ?>



    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>



    <div class="form-group">

        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>

    </div>



    <?php ActiveForm::end(); ?>



</div>

