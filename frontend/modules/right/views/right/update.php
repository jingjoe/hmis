<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\modules\right\models\Right */

$this->title = 'ปรับปรุงผู้มีสิทธิ : ' . ' ' . $model->fullname ;
$this->params['breadcrumbs'][] = ['label' => 'รายชื่อผู้ขึ้นทะเบียนสิทธิ OFC/LGO', 'url' => ['index']];
?>
<div class="right-update">
    <div class="bg-success">
        <div class="panel-body">
            <h3><?= Html::encode($this->title) ?></h3>
        </div>
        <div class="panel-footer">
            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
        </div>
    </div>
</div>
