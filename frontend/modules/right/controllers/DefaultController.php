<?php

namespace frontend\modules\right\controllers;

use yii\web\Controller;

class DefaultController extends Controller{
    
    public function actionIndex()
    {
        //return $this->render('index');
        return $this->redirect(['right/index']);
    }
}
