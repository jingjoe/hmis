<?php

namespace backend\controllers;

use Yii;
use backend\models\Personal;
use backend\models\PersonalSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\Json;
use yii\helpers\ArrayHelper;
use yii\helpers\BaseFileHelper;

use backend\models\Department;
use backend\models\DepartmentGroup;

//AccessControl
use mdm\admin\components\AccessControl;
use yii\filters\VerbFilter;

/**
 * PersonalController implements the CRUD actions for Personal model.
 */
class PersonalController extends Controller
{
    public function behaviors(){
        return [
            'access' => [
                'class' => AccessControl::className(),
                //'allowActions' => ['index']
            ],

            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        $searchModel = new PersonalSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($id, $pid, $cid)
    {
        return $this->render('view', [
            'model' => $this->findModel($id, $pid, $cid),
        ]);
    }

    public function actionCreate()
    {
        
        $model = new Personal();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->img = $model->upload($model,'img');
            $model->save();
            return $this->redirect(['view', 'id' => $model->id, 'pid' => $model->pid, 'cid' => $model->cid]);
        } else {
            return $this->render('create', [
                'model' => $model,
                 //'dep'=> []
            ]);
        }
    }
    public function actionUpdate($id, $pid, $cid)
    {
        
        $model = $this->findModel($id, $pid, $cid);
        //$dep = ArrayHelper::map($this->GetDepart($model->depart_group_id),'id','name');

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->img = $model->upload($model,'img');
            $model->save();
            return $this->redirect(['view', 'id' => $model->id, 'pid' => $model->pid, 'cid' => $model->cid]);
        }  else {
            return $this->render('update', [
                'model' => $model,
                 //'dep '=> $dep
            ]);
        }   
    }

    public function actionDelete($id, $pid, $cid)
    {
        $this->findModel($id, $pid, $cid)->delete();

        return $this->redirect(['index']);
    }

    protected function findModel($id, $pid, $cid)
    {
        if (($model = Personal::findOne(['id' => $id, 'pid' => $pid, 'cid' => $cid])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
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
}
