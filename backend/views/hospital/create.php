<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Hospital */

$this->title = 'บันทึกชื่อหน่วยงาน';
$this->params['breadcrumbs'][] = ['label' => 'หน่วยงาน', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hospital-create">
    <div class="panel panel-info">
        <div class="panel-body">
            <h3><?= Html::encode($this->title) ?></h3>
        </div>
        <div class="panel-footer">
            <?=
            $this->render('_form', [
                'model' => $model,
            ])
            ?>
        </div>
    </div>
</div>
