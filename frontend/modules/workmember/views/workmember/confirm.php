<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\modules\workrecord\models\Workrecord */

$this->title = 'ยืนยันการปฏิบัติงาน';
$this->params['breadcrumbs'][] = ['label' => 'งานที่ปฏิบัติ', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="workmember-confirm">
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
