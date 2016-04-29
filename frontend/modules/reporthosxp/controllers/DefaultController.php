<?php

namespace frontend\modules\reporthosxp\controllers;

use yii\web\Controller;

class DefaultController extends Controller
{
    public function actionIndex()
    {
        return $this->redirect(['reporthosxp/index']);
    }
}
