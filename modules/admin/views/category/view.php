<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\data\ActiveDataProvider;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Category */

$this->title = $model->name;

?>
<div class="category-view">


    <p>
        <?= Html::a('Обновить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            // 'parent_id',
               [
                'attribute' => 'parent_id',
                'value' =>  
                     $model->category->name ? $model->category->name : "Нет",
            ],
            // 'img',
            'name',
        ],
    ]) ?>
     <?= GridView::widget([
        'dataProvider' => new ActiveDataProvider(['query' => $model->getInCategory()]),
            'filterModel' => $searchModel,

        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'name',
            ['class' => 'yii\grid\ActionColumn',
             'controller' => '/admin/in-category',
            ],
        ],
    ]); ?>

</div>
