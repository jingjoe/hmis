<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\modules\right\models\Right */

$this->title = 'ชื่อ : ' . ' ' . $model->fullname .'  '.'เลขบัตรประชาชน : ' . ' ' . $model->cid ;
$this->params['breadcrumbs'][] = ['label' => 'รายชื่อผู้ขึ้นทะเบียนสิทธิ OFC/LGO', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;

?>
<div class="right-view">

    <div class="bg-success">
        <div class="panel-body">
            <h3><?= Html::encode($this->title) ?></h3>
        </div>
        <div class="panel-footer">
          <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'hn',
                'cid',
                'fullname',
                ['attribute'=>'regdate','format'=>'html','value'=>Yii::$app->thaiFormatter->asDate($model->regdate,'long')],
                ['attribute'=>'dateaffect','format'=>'html','value'=>Yii::$app->thaiFormatter->asDate($model->dateaffect,'long')],
                'pttype.pttype_name',
                ['attribute'=>'create_date','format'=>'html','value'=>Yii::$app->thaiFormatter->asDateTime($model->create_date,'long')],
                ['attribute'=>'modify_date','format'=>'html','value'=>Yii::$app->thaiFormatter->asDateTime($model->modify_date,'long')],
                'loginname',
                'updatename'
            ],
        ]) ?>
        </div>
    </div>
</div>
