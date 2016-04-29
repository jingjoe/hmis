<?php

namespace frontend\modules\workmember\controllers;

use Yii;
use frontend\modules\workmember\models\Workmember;
use frontend\modules\workmember\models\WorkmemberSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

use yii\web\ForbiddenHttpException;
use yii\web\Session;
use yii\db\Query;
use yii\data\ArrayDataProvider;

//AccessControl
use mdm\admin\components\AccessControl;
use yii\filters\VerbFilter;

/**
 * WorkrecordController implements the CRUD actions for Workrecord model.
 */
class WorkmemberController extends Controller{
    public function behaviors(){
        return [
            'access' => [
                'class' => AccessControl::className()
            ],

            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actionIndex($search = NULL) {
        
        if (!empty($search)) {
            $se = $search;
        } else {
            $se = '';
        }
        $user_id = Yii::$app->user->identity->id;
        
        $sql = "SELECT w.id,w.name,w.order_date,w.defined_date,CONCAT(n.pname_name,p.fname,' ',p.lname) AS ful_name,r.report_status_name
        FROM workrecord w
        LEFT OUTER JOIN l_report_status r ON r.report_status_id=w.status_id
        LEFT OUTER JOIN personal p ON p.id=w.assign_id
        LEFT OUTER JOIN l_pname n ON n.pname_id=p.pname_id
        WHERE w.name like '%$se%' AND w.created_by ='$user_id'";
        $data = Yii::$app->db->createCommand($sql)->queryAll();
        $dataProvider = new ArrayDataProvider([
            'allModels'=>$data,
            'pagination'=>[
            'pageSize'=>10 //แบ่งหน้า
        ]
        ]);
        $searchModel = new WorkmemberSearch();

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,]);
    }
  
    public function actionView($id=NULL)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionCreate()
    {
        $model = new Workmember();        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['/workmember/workmember/index']);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }
        public function actionConfirm($id)
    {
       $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['/workmember/workmember/index']);
        } else {
            return $this->render('confirm', [
                'model' => $model,
            ]);
        }
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['/workmember/workmember/index']);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }
    
    public function actionReport() {
        
        $user_id = Yii::$app->user->identity->id;
        $date1 = "";
        $date2 = "";
        if (Yii::$app->request->isPost) {
            $date1 = $_POST['date1'];
            $date2 = $_POST['date2'];
        }
       $sql = "SELECT w.id,w.name,w.order_date,w.defined_date,CONCAT(n.pname_name,p.fname,' ',p.lname) AS ful_name,r.report_status_name
        FROM workrecord w
        LEFT OUTER JOIN l_report_status r ON r.report_status_id=w.status_id
        LEFT OUTER JOIN personal p ON p.id=w.assign_id
        LEFT OUTER JOIN l_pname n ON n.pname_id=p.pname_id
        WHERE  w.order_date BETWEEN '$date1' AND '$date2' AND w.created_by ='$user_id'";
        
        $data = Yii::$app->db->createCommand($sql)->queryAll();
           $dataProvider = new ArrayDataProvider([
            'allModels'=>$data,
            'pagination'=>[
            'pageSize'=>10 //แบ่งหน้า
        ]
        ]);
        return $this->render('report', ['dataProvider' => $dataProvider, 'date1' => $date1, 'date2' => $date2]);
    }

    protected function findModel($id)
    {
        if (($model = Workmember::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
