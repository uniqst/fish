<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use app\modules\admin\models\Category;
use yii\bootstrap\Modal;
use yii\widgets\Pjax;


/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Категории';
?>
<div class="category-index">
    <p>
        <?= Html::button('Cоздать категорию', ['value' => Url::to(['create']) , 'class' => 'btn btn-success' , 'id' => 'modalButton']) ?>
    </p>
    <?php
       Modal::begin([
    'header' => '<h2>Создание категории</h2>',
    'id' => 'modal',
    'size' => 'modal-lg',
    ]);
    echo "<div id='modalContent'></div>";

    Modal::end();
    ?>
    <?php Pjax::begin(['id' => 'branchesGrid']);?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            // 'parent_id',
             [
                'attribute' => 'parent_id',
                'value'     => function($data){
                    return $data->category->name ? $data->category->name : "Нет";
                },
            ],
            'name',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end();?>
</div>
