<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\InCategory */

$this->title = 'Редактирование свойства категории: ' . $model->name;

?>
<div class="in-category-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
