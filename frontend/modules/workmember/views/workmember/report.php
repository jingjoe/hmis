
<?php

use kartik\grid\GridView;
use yii\helpers\Html;
use kartik\date\DatePicker;
use yii\bootstrap\ActiveForm;

$this->title = 'รายงานงานที่ปฏิบัติ';
$this->params['breadcrumbs'][] = ['label' => 'งานที่ปฏิบัติ', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class='bg-success'>
    <?php $form = ActiveForm::begin(['layout' => 'inline']); ?>
    <div class="form-group">
        <label class="control-label"> เลือกวันที่ </label>
        <?php
        echo DatePicker::widget([
            'name' => 'date1',
            'value' => $date1,
            'language' => 'th',
            'pluginOptions' => [
                'format' => 'yyyy-mm-dd',
                'changeMonth' => true,
                'changeYear' => true,
                'todayHighlight' => true
            ]
        ]);
        ?>

    </div>
    <div class="form-group">
        <label class="control-label"> ถึง </label>
        <?php
        echo DatePicker::widget([
            'name' => 'date2',
            'value' => $date2,
            'language' => 'th',
            'pluginOptions' => [
                'format' => 'yyyy-mm-dd',
                'changeMonth' => true,
                'changeYear' => true,
                'todayHighlight' => true
            ]
        ]);
        ?>
    </div>
    <div class="form-group">
        <?= Html::submitButton('ประมวลผล', ['class' => 'btn btn-warning btn-flat']) ?>
    </div><!-- /.input group -->
    <?php ActiveForm::end(); ?>
</div>
<br>

<div class="bg-success">
    <div class="panel-body"></div>
    <div class="panel-footer">
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
                ]
            ],
        ]);
        ?>
    </div>
</div>

</div>
<?= \bluezed\scrollTop\ScrollTop::widget() ?>



