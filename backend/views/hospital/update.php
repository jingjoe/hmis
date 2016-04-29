<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Hospital */

$this->title = 'ปรับปรุงหน่วยงาน : ' . ' ' . $model->hos_name;
$this->params['breadcrumbs'][] = ['label' => 'หน่วยงาน', 'url' => ['index']];

?>
<div class="hospital-update">
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
