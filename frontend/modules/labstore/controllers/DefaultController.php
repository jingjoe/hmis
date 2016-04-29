<?php

namespace frontend\modules\labstore\controllers;

use yii\web\Controller;

class DefaultController extends Controller
{
    public function actionIndex()
    {
        return $this->redirect(['labstore/index']);
    }
}
