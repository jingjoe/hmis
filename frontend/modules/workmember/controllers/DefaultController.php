<?php

namespace frontend\modules\workmember\controllers;

use yii\web\Controller;

class DefaultController extends Controller
{
    public function actionIndex()
    {
        return $this->redirect(['workmember/index']);
    }
}
