<?php

namespace frontend\modules\sqlscript\controllers;

use yii\web\Controller;

class DefaultController extends Controller
{
    public function actionIndex()
    {
        //return $this->render('index');
         return $this->redirect(['sqlscript/index']);
    }
}
