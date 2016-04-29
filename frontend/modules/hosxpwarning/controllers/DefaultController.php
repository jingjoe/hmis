<?php

namespace frontend\modules\hosxpwarning\controllers;

use yii\web\Controller;

class DefaultController extends Controller{
    public function actionIndex(){
        return $this->redirect(['hosxpwarning/index']);
    }
}
