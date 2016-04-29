<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use backend\models\Hospital;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'หน่วยงาน';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hospital-index">
    <div class="row">
        <div class="col-md-6 col-xs-12">
            <?= Html::a('<span class="glyphicon glyphicon-plus"></span> บันทึกชื่อหน่วยงาน', ['create'], ['class' => 'btn btn-success', 'title' => 'บันทึกชื่อหน่วยงาน',]) ?>
        </div>
        <div class="col-md-6 col-xs-12">
            <div class="pull-right"></div>
        </div>
    </div>
<br> 
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
            'hos_code',
            'hos_name',
            'hos_address',
            'hos_tel',
            'create_date',
            ['class' => 'yii\grid\ActionColumn', 
                'template' => '{view}<span class="glyphicon glyphicon-option-vertical"></span>{update}<span class="glyphicon glyphicon-option-vertical"></span>{delete}'],   
            ],
    ]); ?>
</div>

