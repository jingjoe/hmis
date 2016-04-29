<?php

namespace backend\controllers;

use Yii;
use backend\models\Appstore;
use backend\models\AppstoreSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\helpers\BaseFileHelper;

//AccessControl
use mdm\admin\components\AccessControl;
use yii\filters\VerbFilter;

/**
 * AppstoreController implements the CRUD actions for Appstore model.
 */
class AppstoreController extends Controller
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
        $searchModel = new AppstoreSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionCreate()
    {
        
         $model = new Appstore();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->img = $model->upload($model,'img');
            $model->save();
            return $this->redirect('index.php?r=appstore/index');
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }  
    }

    public function actionUpdate($id)
    {
        
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->img = $model->upload($model,'img');
            $model->save();
            return $this->redirect('index.php?r=appstore/index');
        }  else {
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

    protected function findModel($id)
    {
        if (($model = Appstore::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
