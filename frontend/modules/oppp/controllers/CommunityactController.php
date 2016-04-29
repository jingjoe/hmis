<?php

namespace frontend\modules\oppp\controllers;

use yii\web\Controller;
use yii\db\Query;
use Yii;
use yii\data\ArrayDataProvider;
use mdm\admin\components\AccessControl;
use yii\filters\VerbFilter;

class CommunityactController extends Controller {  
    
    public function behaviors(){
        return [
            'access' => [
                'class' => AccessControl::className(),
            ],

            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }
    public function actionIndex() {

        $date1 = "";
        $date2 = "";
        if (Yii::$app->request->isPost) {
            $date1 = $_POST['date1'];
            $date2 = $_POST['date2'];
        }
          
        
        $sql = "select ca.community_activity_service_id AS com_id
        ,(SELECT hospitalcode FROM opdconfig) AS hospcode 
        ,ca.community_activity_service_tambon_id AS vid
        ,ca.community_activity_service_date_start AS date_start
        ,ca.community_activity_service_date_finish AS date_filnish
        ,CONCAT(ca.provis_comactivity_code, ' : ' ,pc.provis_comactivity_name) AS comactivity
        ,doc.name AS  provider
        ,ca.community_activity_service_date_entry AS d_update
        FROM community_activity_service ca
        INNER JOIN provis_comactivity pc ON pc.provis_comactivity_code=ca.provis_comactivity_code
        INNER JOIN doctor doc ON doc.code=ca.doctor
        WHERE ca.community_activity_service_date_finish BETWEEN '$date1' AND '$date2' ";
        
        $data = Yii::$app->db2->createCommand($sql)->queryAll();
        $dataProvider = new ArrayDataProvider([
            'allModels'=>$data,
        ]);

        return $this->render('index', ['dataProvider' => $dataProvider, 'date1' => $date1, 'date2' => $date2]);
    }  
}

