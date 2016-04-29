<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Personal */

$this->title = 'ปรับปรุงบุคลากรชื่อ : ' . ' ' . $model->fname. '  ' . $model->lname;
$this->params['breadcrumbs'][] = ['label' => 'บุคลากร', 'url' => ['index']];
?>
<div class="personal-update">
    <div class="panel panel-info">
        <div class="panel-body">
            <h2><?= Html::encode($this->title) ?></h2>
         
        </div>
        <div class="panel-footer">
            <?=
            $this->render('_form', [
                'model' => $model,
               // 'dep '=> $dep
            ])
            ?>
        </div>
    </div>
</div>

