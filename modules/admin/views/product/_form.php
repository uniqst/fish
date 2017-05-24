<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use app\components\CategoryWidget;
use mihaildev\ckeditor\CKEditor;
use yii\web\UploadedFile;
use app\modules\admin\models\Product;
use app\modules\admin\models\Category;
use app\modules\admin\models\InCategory;
use app\modules\admin\models\catOption;
use app\modules\admin\models\Image;
use yii\grid\GridView;
use yii\data\ActiveDataProvider;

$dataProvider = new ActiveDataProvider([
            'query' => Image::find()->where(['product_id' => Yii::$app->request->get('id')]),
     
        ]);

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Product */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($qqq, 'imageFiles[]', [
    "template" => "<label>Фото</label>\n{input}\n{hint}\n{error}"
    ])->fileInput(['multiple' => true, 'accept' => 'image/*']) ?>

  <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            // ['class' => 'yii\grid\SerialColumn'],
            // 'name',
            [
                'attribute' => 'name',
                'value' => function($data){
                        return "<img src='/web/". $data->name ."' style='width: 150px;'/>";
                },
                'format' => 'html',
            ],
            ['class' => 'yii\grid\ActionColumn',
                'controller' => '/admin/image',
                'template' => '{delete}',
            ],

        ],
    ]); ?>

    <div class="form-group field-product-category_id has-success">
        <label class="control-label" for="product-category_id">Категория</label>
        <select id="product-category_id" class="form-control" name="Product[category_id]">
            <?=CategoryWidget::widget(['tpl' => 'select_product', 'model' => $model])?>
        </select>
    </div>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'group')->textInput(['maxlength' => true]) ?>

    <?php
    echo $form->field($model, 'description')->widget(CKEditor::className(),[
        'editorOptions' => [
        'preset' => 'basic', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
        'inline' => false, //по умолчанию false
        ],
        ]);
        ?>
        <?= $form->field($model, 'price')->textInput() ?>

        <?= $form->field($model, 'price_promo')->textInput() ?>

        
        <?
        if (!empty($catid)){
            foreach ($catid as $cat){
                if(!empty($cat->catOption)){
                    echo $form->field($cat->catOption, 'value',  [
                "template" => "<label> $cat->name</label>\n{input}\n{hint}\n{error}"
                    ])->textInput(['name' => 'value['.$cat->catOption->id.']']); 
                }else{
                $cat1 = New catOption();
                echo $form->field($cat1, 'value',  [
                "template" => "<label>".$cat->name."</label>\n{input}\n{hint}\n{error}"
                    ])->textInput(['name' => 'createvalue['.$cat->id.']']); 
               }
            }
        }

        ?>


        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
<!-- <script type="text/javascript">
    $('form#($model->formName())').on('beforeSubmit', function(e))
    {
        var \$form = $(this);
        $.post(
                \$form.attr("action"),
                \$form.serialize()
            )
                .done(function(result){
                    if(result.message == 'Success')
                }
                    $(document).find('#secondModal').modal('hide');
                    $.pjax
    }
</script> -->