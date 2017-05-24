<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\CatOption */

$this->title = 'Create Cat Option';
$this->params['breadcrumbs'][] = ['label' => 'Cat Options', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cat-option-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
