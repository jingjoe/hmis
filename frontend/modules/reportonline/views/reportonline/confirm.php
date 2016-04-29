<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\modules\reportonline\models\Reportonline */

$this->title = 'ลงรับรายงาน : ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'ขอรายงานออนไลน์', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
//$this->params['breadcrumbs'][] = 'Update';
?>
<div class="reportonline-confirm">
    <div class="bg-success">
        <div class="panel-body">
            <h3><?= Html::encode($this->title) ?></h3>
        </div>
        <div class="panel-footer">
            <?=
            $this->render('_confirm', [
                'model' => $model,
            ])
            ?>
        </div>
    </div>

</div>
