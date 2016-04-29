<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\modules\workrecord\models\Workrecord */

$this->title = $model->name;
$this->title =''. ' '.'ชื่องาน : ' . ' ' . $model->name. ' '.'สถานะ : ' . ' ' . $model->statusname;
$this->params['breadcrumbs'][] = ['label' => 'รายการงานปที่ฏิบัติ', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="workrecord-view">

    <p>
        <?= Html::a('<i class="glyphicon glyphicon-floppy-save"></i> แก้ไข', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('<i class="glyphicon glyphicon-repeat"></i> ลงรับ', ['/workmember/workmember/confirm','id'=> $model->id], ['class' => 'btn btn-info']) ?>
        <?= Html::a('<i class="glyphicon glyphicon-floppy-remove"></i> ลบ', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'คุณแน่ใจหรือว่าต้องการลบรายการนี้หรือไม่ ?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <div class="panel panel-success">
        <div class="panel-body">
            <h3><?= Html::encode($this->title) ?></h3>
        </div>
        <div class="panel-footer">
            <?=
            DetailView::widget([
                'model' => $model,
                'attributes' => [
                    //'id',
                    'name',
                    'detail:ntext',
                    ['attribute' => 'order_date', 'format' => 'html', 'value' => Yii::$app->thaiFormatter->asDate($model->order_date, 'long')],
                    ['attribute' => 'defined_date', 'format' => 'html', 'value' => Yii::$app->thaiFormatter->asDate($model->defined_date, 'long')],
                    ['attribute' => 'create_date', 'format' => 'html', 'value' => Yii::$app->thaiFormatter->asDateTime($model->create_date, 'long')],
                    ['attribute' => 'modify_date', 'format' => 'html', 'value' => Yii::$app->thaiFormatter->asDateTime($model->modify_date, 'long')],
                    'loginname',
                    'updatename',
                    'personassign',
                    'statusname',
                ],
            ])
            ?>

        </div>
    </div>
</div>
<?= \bluezed\scrollTop\ScrollTop::widget() ?>