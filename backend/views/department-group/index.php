<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'ฝ่าย';
$this->params['breadcrumbs'][] = ['label' => 'แผนก', 'url' => ['department/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="department-group-index">
    <div class="row">
        <div class="col-md-6 col-xs-12">
            <?= Html::a('<span class="glyphicon glyphicon-plus"></span> บันทึกฝ่าย', ['create'], ['class' => 'btn btn-success', 'title' => 'บันทึกฝ่าย',]) ?>
        </div>
        <div class="col-md-6 col-xs-12">
            <div class="pull-right"></div>
        </div>
    </div>
<br>
 <?php Pjax::begin();?>  
        <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'panel' => [
        'type' => GridView::TYPE_SUCCESS,
        'type' => 'success',   
        ],
        'responsive' => true,
        'hover' => true,
        'floatHeader' => true,
        'pjax'=>true,
        'pjaxSettings'=>[
            'neverTimeout'=> true,
            'beforeGrid'=>'',
            'afterGrid'=>'',
        ],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'depart_group_name',
            'create_date',
            'loginname',
            ['class' => 'yii\grid\ActionColumn', 
                'template' => '{update}<span class="glyphicon glyphicon-option-vertical"></span>{delete}'],   
            ],
    ]); ?>
<?php Pjax::end();?>
</div>
<?= \bluezed\scrollTop\ScrollTop::widget() ?>