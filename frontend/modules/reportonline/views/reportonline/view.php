<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\modules\reportonline\models\Reportonline */

$this->title =''. ' '.'ชื่อรายงาน : ' . ' ' . $model->name. ' '.'สถานะ : ' . ' ' . $model->statusname;
$this->params['breadcrumbs'][] = ['label' => 'ขอรายงานออนไลน์', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reportonline-view">

     <div class="bg-success">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>

    <p>
        <?= Html::a('<i class="glyphicon glyphicon-floppy-save"></i> แก้ไข', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('<i class="glyphicon glyphicon-repeat"></i> ลงรับ', ['reportonline/confirm','id'=> $model->id], ['class' => 'btn btn-info']) ?>
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
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            'personname',
            //'fullname',
            //'pname',
            //'fname',
            //'lname',
            'departgroupname',
            'departname',
            'typename',
            'name',
            'details:ntext',
            [
            'format'=>'raw',
            'attribute'=>'image',
            'value'=>$model->getPhotosViewer()
            ],
            ['attribute'=>'files','format'=>'html','value'=>!$model->files?'':Html::a('ดาวน์โหลด', ['/reportonline/reportonline/download','type'=>'files','id'=>$model->id])],
            ['attribute'=>'order_date','format'=>'html','value'=>Yii::$app->thaiFormatter->asDate($model->order_date,'long')],
            ['attribute'=>'defined_date','format'=>'html','value'=>Yii::$app->thaiFormatter->asDate($model->defined_date,'long')],
            'unit',
            'linkname',
            ['attribute'=>'finish_date','format'=>'html','value'=>Yii::$app->thaiFormatter->asDateTime($model->finish_date,'long')],
            'statusname',
            ['attribute'=>'create_date','format'=>'html','value'=>Yii::$app->thaiFormatter->asDateTime($model->create_date,'long')],
            ['attribute'=>'modify_date','format'=>'html','value'=>Yii::$app->thaiFormatter->asDateTime($model->modify_date,'long')],
            'loginname',
            'updatename',
        ],
    ]) ?>

  </div>
    </div>
</div>
    <?= \bluezed\scrollTop\ScrollTop::widget() ?>