<?php

use yii\helpers\Html;

$this->title = 'บันทึกสิทธิการรักษา';
$this->params['breadcrumbs'][] = ['label' => 'สิทธิการรักษา', 'url' => ['index']];
?>
<div class="pttype-create">
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
