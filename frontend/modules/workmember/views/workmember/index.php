<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\grid\GridView;
use yii\widgets\Pjax;

//use yii\web\Session;
// add pop up windows form
use yii\bootstrap\Modal;
use yii\helpers\Url;
use backend\models\Personal;

/* @var $this yii\web\View */
/* @var $searchModel frontend\modules\workrecord\models\WorkrecordSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'งานที่ปฏิบัติ';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="workmember-index">
    <div class="row">
        <div class="col-md-4 col-xs-12">
            <?= Html::a('<span class="glyphicon glyphicon-plus"></span> บันทึกการปฏิบัติงาน', ['/workmember/workmember/create'], ['class' => 'btn btn-success', 'title' => 'บันทึกการปฏิบัติงาน']) ?>
            <?= Html::a('<span class="glyphicon glyphicon-list-alt"></span> รายงาน', ['/workmember/workmember/report'], ['class' => 'btn btn-info', 'title' => 'รายงาน']) ?>
        </div>
    </div>
   <br>  
    <div class="row">  
        <?php
        $form = ActiveForm::begin([
                    'action' => ['index'],
                    'method' => 'get',
        ]);
        ?>
        <div class="col-md-12">
            <div class="input-group input-group-sm">
                <input type="text" name="search" id="search" class="form-control" placeholder="ระบุคำค้นหา..">
                <span class="input-group-btn">
                    <button class="btn btn-info btn-flat" type="submit">ค้นหา</button>
                </span>
            </div>
        </div> 
    </div>
    <br>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            //'id',
            [
            'attribute' => 'name',
            'header' => 'ชื่องาน'
            ],
            //'detail:ntext',
            [
            'attribute' => 'order_date',
            'header' => 'วันหมอบหมาย'
            ],
            [
            'attribute' => 'defined_date',
            'header' => 'วันแล้วเสร็จ'
            ],
            [
            'attribute' => 'ful_name',
            'header' => 'ชื่อผู้มอบหมาย'
            ],
            [
            'attribute' => 'report_status_name',
            'header' => 'สถานะ'
            ],
            //['class' => 'yii\grid\ActionColumn'], 
            [
            'label' => 'ดู',
            'format' => 'raw',
            'value' => function($data) {
                return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', ['/workmember/workmember/view','id'=>$data['id']], ['class' => 'btn btn-success btn-xs']);
            }// end value
            ],
            [
            'label' => 'แก้ไข',
            'format' => 'raw',
            'value' => function($data) {   
                return Html::a('<span class="glyphicon glyphicon-pencil"></span>', ['/workmember/workmember/update','id'=>$data['id']], ['class' => 'btn btn-warning btn-xs']);
            }// end value
            ],
            [
            'label' => 'ลบ',
            'format' => 'raw',
            'value' => function($data) {              
                return Html::a('<span class="glyphicon glyphicon-trash"></span>', ['/workmember/workmember/delete','id'=>$data['id']], ['class' => 'btn btn-danger btn-xs']);
            }// end value
            ]

        ],
    ]); ?>
</div>
<?= \bluezed\scrollTop\ScrollTop::widget() ?>

