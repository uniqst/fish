<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\options */

$this->title = 'Настройки сайта';
?>
<div class="options-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
