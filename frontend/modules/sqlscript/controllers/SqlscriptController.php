<?php

namespace frontend\modules\sqlscript\controllers;

use Yii;
use frontend\modules\sqlscript\models\Sqlscript;
use frontend\modules\sqlscript\models\SqlscriptSearch;
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
 * SqlscriptController implements the CRUD actions for Sqlscript model.
 */
class SqlscriptController extends Controller {

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
     * Lists all Sqlscript models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new SqlscriptSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Sqlscript model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Sqlscript model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {

        $model = new Sqlscript();
        $model->token_upload = substr(Yii::$app->getSecurity()->generateRandomString(), 10);

        if ($model->load(Yii::$app->request->post())) {

            //  $this->Uploads(false);

            $model->files = UploadedFile::getInstance($model, 'files');

            if ($model->files && $model->validate()) {
                $fileName = md5($model->files->baseName . time()) . '.' . $model->files->extension;
                $image = $model->files;
                $model->files = $fileName;
                $image->saveAs('sqlscript/' . $fileName);
                if ($model->save()) {
                    return $this->redirect(['view', 'id' => $model->sql_id]);
                }
            } else if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->sql_id]);
            }
        }

        return $this->render('create', [
                    'model' => $model
        ]);
    }

    /**
     * Updates an existing Sqlscript model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {

        $model = $this->findModel($id);
        $tempResume = $model->files;

        if ($model->load(Yii::$app->request->post())) {

            //$this->Uploads(false);

            $model->files = UploadedFile::getInstance($model, 'files');
            if ($model->files && $model->validate()) {
                $fileName = md5($model->files->baseName . time()) . '.' . $model->files->extension;
                $image = $model->files;
                $model->files = $fileName;
                $image->saveAs('sqlscript/' . $fileName);
                if ($model->save()) {
                   // return $this->redirect(['view', 'id' => $model->sql_id]);
                    return $this->redirect('index.php?r=sqlscript/sqlscript/index');
                }
            } else {
                $model->files = $tempResume;
                if ($model->save()) {
                    return $this->redirect('index.php?r=sqlscript/sqlscript/index');
                }
            }
        }
        return $this->render('update', [
                    'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Sqlscript model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Sqlscript model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Sqlscript the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Sqlscript::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
// รับค่ามาจาก from เพื่อ ดาวน์โหลด 
    public function actionDownload($type, $id) {
        $model = $this->findModel($id);
        if ($type === 'files') {
            Yii::$app->response->sendFile($model->getDocPath() . '/' . $model->files);
            $model->hits +=1; // นับจำนวนดาวน์โหลด
            $model->save();
        }
    }

}
