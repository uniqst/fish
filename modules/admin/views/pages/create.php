<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\pages */

$this->title = 'Создание страницы';
?>
<div class="pages-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
