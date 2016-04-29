<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\modules\right\models\Right */

$this->title = 'ชื่อสิทธิการรักษา : ' . ' ' . $model->pttype_name ;
$this->params['breadcrumbs'][] = ['label' => 'Rights', 'url' => ['index']];

?>
<div class="pttype-view">

    <div class="bg-success">
        <div class="panel-body">
            <h3><?= Html::encode($this->title) ?></h3>
        </div>
        <div class="panel-footer">
          <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'pttype_code',
                'pttype_name',
                ['attribute'=>'create_date','format'=>'html','value'=>Yii::$app->thaiFormatter->asDateTime($model->create_date,'long')],
                ['attribute'=>'modify_date','format'=>'html','value'=>Yii::$app->thaiFormatter->asDateTime($model->modify_date,'long')],
                'loginname',
                'updatename'
            ],
        ]) ?>
        </div>
    </div>
</div>
