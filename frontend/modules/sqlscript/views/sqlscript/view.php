<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\modules\sqlscript\models\Sqlscript */

$this->title =''. ' '.'ชื่อโปรแกรม : ' . ' ' . $model->programname. ' '.'ชื่อคำสั่ง SQL : ' . ' ' . $model->sql_name;
$this->params['breadcrumbs'][] = ['label' => 'ชุดคำสั่ง', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sqlscript-view">
    <div class="bg-success">
         <h1><?= Html::encode($this->title) ?></h1>
    </div>
    <p>
        <?= Html::a('ปรับปรุง', ['update', 'id' => $model->sql_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('ลบ', ['delete', 'id' => $model->sql_id], [
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
            //'sql_id',
            'programname',
            'sql_name',
            'sql_script:ntext',
            //'files:html',//url
            ['attribute'=>'files','format'=>'html','value'=>!$model->files?'':Html::a('ดาวน์โหลด', ['/sqlscript/sqlscript/download','type'=>'files','id'=>$model->sql_id])],
            'hits',
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