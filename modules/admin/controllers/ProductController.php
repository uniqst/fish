<?php

namespace app\modules\admin\controllers;

use Yii;
use app\modules\admin\models\Product;
use app\modules\admin\models\Category;
use app\modules\admin\models\CatOption;
use app\modules\admin\models\InCategory;
use app\modules\admin\models\Image;
use app\modules\admin\models\UploadForm;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\db\ActiveQuery;

/**
 * PtoductController implements the CRUD actions for Product model.
 */
class ProductController extends AdminController
{
    /**
     * @inheritdoc
     */

    /**
     * Lists all Product models.
     * @return mixed
     */
   public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Product::find()->joinwith('category'),
             'pagination' => [
                'pageSize' => 15,
                 ],
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }
    /**
     * Displays a single Product model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Product model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */

    public function actionCreate()
    {
        $this->layout = false;
        $catid - new InCategory();
        $model = new Product();
        $qwe = new Image();
        $qqq = new UploadForm();   
        if ($model->load(Yii::$app->request->post())) {
            $model->group = Yii::$app->request->post('Product')['group'];
            $model->key = 1000 + $model->id;
            $model->save();

            if (Yii::$app->request->isPost) {
            $qqq->imageFiles = UploadedFile::getInstances($qqq, 'imageFiles');
            if ($qqq->upload()) {
               foreach ($_FILES['UploadForm']['name']['imageFiles'] as $file) {
                   $qwe = new Image();
                   $qwe->product_id = $model->id;
                   $qwe->name = 'upload/'.$file;
                   $qwe->save();
               }
            }
        }

             return $this->redirect(['update', 'id' => $model->id]);
        } else {
            return $this->render('create', compact('model', 'catid', 'qwe', 'qqq'));
        }
    }

    /**
     * Updates an existing Product model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $id = Yii::$app->request->get('id');
        $qqq = new UploadForm();   

        $product = Product::find()->where(['id' => $id])->with(['category.inCategory.catOption' => function(ActiveQuery $query){
            $query->where(['product_id' => Yii::$app->request->get('id')]);
        }])->one();
       
      
        $catid = $product->category->inCategory;
        $value = Yii::$app->request->post('value'); 
        $createvalue = Yii::$app->request->post('createvalue');
        if ($createvalue){
        foreach($createvalue as $key => $val){
            if (!empty($val)){
            $qwe = new CatOption();
            $qwe->incat_id = $key;
            $qwe->product_id = Yii::$app->request->get('id');
            $qwe->value = $val;
            $qwe->save();
          }
        }
    }
        if (!empty($value)){
        foreach($value as $key => $val){
            $cat = CatOption::find()->where(['id' => $key])->one();
            $cat->value = $val;
            $cat->save();
        }
    }
        if ($model->load(Yii::$app->request->post())) {
            $model->group = Yii::$app->request->post('Product')['group'];
            $model->key = 1000 + $model->id;
            $model->save();
          if (Yii::$app->request->isPost){
            $qqq->imageFiles = UploadedFile::getInstances($qqq, 'imageFiles');
            if($qqq->imageFiles){
                   print_r(Yii::$app->request);

            if ($qqq->upload()) {
               foreach ($_FILES['UploadForm']['name']['imageFiles'] as $file) {
                   $qwe = new Image();
                   $qwe->product_id = $model->id;
                   $qwe->name = 'upload/'.$file;
                   $qwe->save();
               }
           }
            }
        }
            return $this->redirect(['update', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'catid' => $catid,
                'catl' => $catl,
                'qqq' => $qqq,
            ]);
        }
    }

    /**
     * Deletes an existing Product model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Product model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Product the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Product::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
