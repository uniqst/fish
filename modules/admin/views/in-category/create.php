<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\InCategory */

$this->title = 'Создание свойства категории';

?>
<div class="in-category-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
