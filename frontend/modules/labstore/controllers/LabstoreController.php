<?php

namespace frontend\modules\labstore\controllers;

use Yii;
use frontend\modules\labstore\models\Labstore;
use frontend\modules\labstore\models\LabstoreSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

// Add upload
use yii\web\UploadedFile;
use yii\helpers\Json;
use yii\helpers\ArrayHelper;
use yii\helpers\BaseFileHelper;
use yii\helpers\Html;
use yii\helpers\Url;

// AccessControl
use mdm\admin\components\AccessControl;
use yii\filters\VerbFilter;

/**
 * LabstoreController implements the CRUD actions for Labstore model.
 */
class LabstoreController extends Controller
{
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
     * Lists all Labstore models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new LabstoreSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Labstore model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionCreate() {

        $model = new Labstore();
        $model->token_upload = substr(Yii::$app->getSecurity()->generateRandomString(), 10);

        if ($model->load(Yii::$app->request->post())) {

            //  $this->Uploads(false);

            $model->file = UploadedFile::getInstance($model, 'file');

            if ($model->file && $model->validate()) {
                $fileName = ($model->file);
                $image = $model->file;
                $model->file = $fileName;
                $image->saveAs('labstore/' . $fileName);
                if ($model->save()) {
                    return $this->redirect(['view', 'id' => $model->id]);
                }
            } else if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        return $this->render('create', [
                    'model' => $model
        ]);
    }
    
    /**
     * Updates an existing Labstore model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */

    public function actionUpdate($id) {

        $model = $this->findModel($id);
        $tempResume = $model->file;

        if ($model->load(Yii::$app->request->post())) {

            //$this->Uploads(false);

            $model->file = UploadedFile::getInstance($model, 'file');
            if ($model->file && $model->validate()) {
                $fileName = ($model->file);
                $image = $model->file;
                $model->file = $fileName;
                $image->saveAs('labstore/' . $fileName);
                if ($model->save()) {
                   // return $this->redirect(['view', 'id' => $model->sql_id]);
                    return $this->redirect('index.php?r=labstore/labstore/index');
                }
            } else {
                $model->file = $tempResume;
                if ($model->save()) {
                    return $this->redirect('index.php?r=labstore/labstore/index');
                }
            }
        }
        return $this->render('update', [
                    'model' => $model,
        ]);
    }
    
    /**
     * Deletes an existing Labstore model.
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
     * Finds the Labstore model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Labstore the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Labstore::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    // รับค่ามาจาก from เพื่อ ดาวน์โหลด 
    public function actionDownload($type, $id) {
        $model = $this->findModel($id);
        if ($type === 'file') {
            Yii::$app->response->sendFile($model->getDocPath() . '/' . $model->file);
            $model->visit +=1; // นับจำนวนดาวน์โหลด
            $model->save();
        }
    }
}
