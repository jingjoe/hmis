<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\modules\labstore\models\Labstore */

$this->title =''. ' '.'HN : ' . ' ' . $model->hn. ' '.'เลขที่ใบแลป : ' . ' ' . $model->lab_number;
$this->params['breadcrumbs'][] = ['label' => 'จัดเก็บใบแลป', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="labstore-view">
    <div class="bg-success">
         <h1><?= Html::encode($this->title) ?></h1>
    </div>

  <p>
        <?= Html::a('ปรับปรุง', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('ลบ', ['delete', 'id' => $model->id], [
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
            'hn',
            'lab_number',
            'file:ntext',
            ['attribute'=>'file','format'=>'html','value'=>!$model->file?'':Html::a('ดาวน์โหลด', ['/labstore/labstore/download','type'=>'file','id'=>$model->id])],
            'labgroupname',
            'visit',           
            'note:ntext',
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