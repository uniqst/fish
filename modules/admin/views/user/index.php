<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\bootstrap\Modal;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Пользователи';
?>
<div class="user-index">

    <p>
        <?= Html::button('Cоздать пользователя', ['value' => Url::to(['create']) , 'class' => 'btn btn-success' , 'id' => 'modalButton']) ?>
    </p>

    <?php
       Modal::begin([
    'header' => '<h2>Пользователи</h2>',
    'id' => 'modal',
    'size' => 'modal-lg',
    ]);
    echo "<div id='modalContent'></div>";

    Modal::end();
    ?>

<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'username',
            'password',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>

