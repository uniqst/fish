<?php



use yii\helpers\Html;

use yii\helpers\Url;

use yii\grid\GridView;

use yii\bootstrap\Modal;

use app\modules\admin\models\Image;



/* @var $this yii\web\View */

/* @var $dataProvider yii\data\ActiveDataProvider */



$this->title = 'Список товаров';

?>

<div class="product-index">





    <p>

        <?= Html::button('Cоздать товар', ['value' => Url::to(['create']) , 'class' => 'btn btn-success' , 'id' => 'modalButton']) ?>

    </p>



    <?php

       Modal::begin([

    'header' => '<h2>Создание товара</h2>',

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



            // 'id',
            'key',

             [

                'attribute' => 'photo',

                 'value'     => function($data){

                    $img = Image::find()->where(['product_id' => $data->id])->one();

                    return '<img src="/web/' . $img->name . '" style="width: 150px;" />';

                },

                'format' => 'html',

            ],

            // 'category_id',

            [

                'attribute' => 'category_id',

                'value'     => function($data){

                    return $data->category->name;

                },

            ],

            'name',

            'price',

        

            ['class' => 'yii\grid\ActionColumn'],

        ],

    ]); ?>

</div>

