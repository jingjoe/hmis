<?php

namespace frontend\modules\reportonline\controllers;

use Yii;
use frontend\modules\reportonline\models\Reportonline;
use frontend\modules\reportonline\models\ReportonlineSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

// Add upload
use yii\web\UploadedFile;
use yii\helpers\Json;
use yii\helpers\ArrayHelper;
use yii\helpers\BaseFileHelper;
use yii\helpers\Html;
use yii\helpers\Url;

use backend\models\Department;
use backend\models\DepartmentGroup;

//AccessControl
use mdm\admin\components\AccessControl;
use yii\filters\VerbFilter;

/**
 * ReportonlineController implements the CRUD actions for Reportonline model.
 */
class ReportonlineController extends Controller{
    public function behaviors(){
        return [
            'access' => [
                'class' => AccessControl::className(),
                'allowActions' => ['index']
            ],

            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Reportonline models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ReportonlineSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Reportonline model.
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
     * Creates a new Reportonline model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
              $model = new Reportonline();

    if ($model->load(Yii::$app->request->post()) && $model->validate()) {
        $model->files = $model->upload($model,'files');
        $model->image = $model->uploadMultiple($model,'image');
        $model->save();
        return $this->redirect(['view', 'id' => $model->id]);
    } else {
        return $this->render('create', [
            'model' => $model,
        ]);
    }
    }

    /**
     * Updates an existing Reportonline model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
       $model = $this->findModel($id);

    if ($model->load(Yii::$app->request->post()) && $model->validate()) {
        $model->files = $model->upload($model,'files');
        $model->image = $model->uploadMultiple($model,'image');
        $model->save();
        return $this->redirect(['view', 'id' => $model->id]);
    }  else {
        return $this->render('update', [
            'model' => $model,
        ]);
    }
    }
    
        public function actionConfirm($id)
    {
       $model = $this->findModel($id);

    if ($model->load(Yii::$app->request->post()) && $model->validate()) {
        $model->files = $model->upload($model,'files');
        $model->image = $model->uploadMultiple($model,'image');
        $model->save();
        return $this->redirect(['view', 'id' => $model->id]);
    }  else {
        return $this->render('confirm', [
            'model' => $model,
        ]);
    }
    }

    /**
     * Deletes an existing Reportonline model.
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
     * Finds the Reportonline model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Reportonline the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Reportonline::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
// function ดึงแผนก DepDrop 2 ตัวเลือก
      public function actionGetDepart() {
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $parents = $_POST['depdrop_parents'];
            if ($parents != null) {
                $depart_group_id = $parents[0];
                $out = $this->getDepart($depart_group_id);
                echo Json::encode(['output' => $out, 'selected' => '']);
                return;
            }
        }
        echo Json::encode(['output' => '', 'selected' => '']);
    }
    
    protected function GetDepart($id) {
        $datas = Department::find()->where(['depart_group_id' => $id])->all();
        return $this->MapData($datas, 'depart_id', 'depart_name');
    }
    
    protected function MapData($datas, $fieldId, $fieldName) {
        $obj = [];
        foreach ($datas as $key => $value) {
            array_push($obj, ['id' => $value->{$fieldId}, 'name' => $value->{$fieldName}]);
        }
        return $obj;
    }
 
// funtion download รับค่ามาจาก view     
    public function actionDownload($type, $id) {
        $model = $this->findModel($id);
        if ($type === 'files') {
            Yii::$app->response->sendFile($model->getFilesPath() . '/' . $model->files);
            //$model->count_doc +=1; // นับจำนวนดาวน์โหลด
            $model->save();
        }
    }
}
