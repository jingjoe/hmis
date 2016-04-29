<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\modules\right\models\Pttype */

$this->title = 'แก้ไขสิทธิ : ' . ' ' .  $model->pttype_name;
$this->params['breadcrumbs'][] = ['label' => 'สิทธิการรักษา', 'url' => ['/right/pttype/index']];
?>

<div class="pttype-update">
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

