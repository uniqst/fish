<?php



use yii\helpers\Html;

use yii\helpers\Url;

use yii\grid\GridView;

use yii\bootstrap\Modal;



/* @var $this yii\web\View */

/* @var $dataProvider yii\data\ActiveDataProvider */



$this->title = 'Свойства категорий';

?>

<div class="in-category-index">



  <p>

        <?= Html::button('Cоздать cвойство категории', ['value' => Url::to(['create']) , 'class' => 'btn btn-success' , 'id' => 'modalButton']) ?>

    </p>



    <?php

       Modal::begin([

    'header' => '<h2>Создание свойства</h2>',

    'id' => 'modal',

    'size' => 'modal-lg',

    ]);

    echo "<div id='modalContent'></div>";



    Modal::end();

    ?>

    <?= GridView::widget([

        'dataProvider' => $dataProvider,

        'columns' => [

            ['class' => 'yii\grid\SerialColumn'],



            'id',

            // 'category_id',

            [

                'attribute' => 'category_id',

                'value' => function($data){

                    return $data->category->name;

                },

            ],

            'name',



            ['class' => 'yii\grid\ActionColumn'],

        ],

    ]); ?>

</div>

