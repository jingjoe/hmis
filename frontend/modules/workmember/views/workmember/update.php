<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\modules\workrecord\models\Workrecord */

$this->title = 'แก้ไขการปฏิบัติงาน: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'งานที่ปฏิบัติ', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>

<div class="workrecord-update">
    <div class="bg-success">
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
