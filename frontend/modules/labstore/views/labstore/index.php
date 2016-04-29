<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel frontend\modules\labstore\models\LabstoreSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'จัดเก็บใบแลป';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="labstore-index">
    <div class="row">
        <div class="col-md-12 col-xs-12">
            <?= Html::a('<span class="glyphicon glyphicon-plus"></span> เพิ่มใบแลป', ['create'], ['class' => 'btn btn-success']) ?>
        </div>
</div>
<br>
    <?php Pjax::begin(); ?>  
    <?= GridView::widget([
       'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'panel' => [
            'type' => GridView::TYPE_SUCCESS,
        ],
        'responsive' => true,
        'hover' => true,
        'floatHeader' => true,
        'pjax' => true,
        'pjaxSettings' => [
            'neverTimeout' => true,
            'beforeGrid' => '',
            'afterGrid' => '',
        ],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            //'id',
            ['attribute'=>'hn',
            'width' => '100px',
            'hAlign' => 'center',
            ],
            ['attribute'=>'lab_number',
            'width' => '100px',
            'hAlign' => 'center',
            ],
            'file:ntext',
            'labgroupname',
            // 'note',
            ['attribute'=>'visit',
            'width' => '100px',
            'hAlign' => 'center',
            ],
            //'create_date:date',
            [
            'attribute'=>'create_date',
            'value' => function ($model, $index, $widget) {
                return Yii::$app->formatter->asDate($model->create_date);
            },
            'filterType' => GridView::FILTER_DATE,
            'filterWidgetOptions' => [
                'pluginOptions' => [
                    'format' => 'yyyy-mm-dd',
                    'autoclose' => true,
                    'todayHighlight' => true,
                ]
            ],
            'width' => '200px',
            'hAlign' => 'center',
            ],
            // 'modify_date',
            'loginname',
            // 'updated_by',
            //['class' => 'yii\grid\ActionColumn'],
            [
            'class' => 'yii\grid\ActionColumn',
            'options'=>['style'=>'width:120px;'],
            'buttonOptions'=>['class'=>'btn btn-default'],
            'template'=>'<div class="btn-group btn-group-sm text-center" role="group"> {view} {update} {delete} </div>'
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>
    </div>
    <?= \bluezed\scrollTop\ScrollTop::widget() ?>