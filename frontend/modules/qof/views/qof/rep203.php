
<?php
$this->title = Yii::t('app', 'อัตราการใช้บริการของผู้ป่วยในด้วยโรคเบาหวานที่มีภาวะแทรกซ้อนระยะสั้น สิทธิ UC');
$this->params['breadcrumbs'][] = ['label' => 'ตรวจสอบ qof', 'url' => ['qof/index']];
$this->params['breadcrumbs'][] = 'อัตราการใช้บริการของผู้ป่วยในด้วยโรคเบาหวานที่มีภาวะแทรกซ้อนระยะสั้น สิทธิ UC';

use kartik\grid\GridView;
use yii\helpers\Html;
use kartik\date\DatePicker;
use yii\bootstrap\ActiveForm;

?>
<div class="panel panel-primary">
    <div class="panel-heading"><h4><font color="#FFFF00">อัตราการใช้บริการของผู้ป่วยในด้วยโรคเบาหวานที่มีภาวะแทรกซ้อนระยะสั้น สิทธิ UC (ผู้รับผิดชอบ รจนา   จันทรักษ์)</font></h4>
     <h6><p><font color="#FFFFFF">จำนวนครั้งของผู้ป่วยในด้วยโรคเบาหวานที่มีภาวะแทรกซ้อนระยะสั้น ซึ่งประกอบด้วยภาวะ Ketoacidosis,Hyperrosmolarity,Hypoglycemia,Coma อายุ 15 ปีขึ้นไป สิทธิ UC ที่ลงทะเบียนสิทธิหน่วยบริการประจำ
     ช่วง 1 เมษายน 2558 ถึง 31 มีนาคม 2559) เกณฑ์เป้าหมายน้อยกว่า 3.64 (รหัสที่ให้ 'E100'-'E101' OR 'E110'-'E111' OR 'E120'-'E121' OR 'E130'-'E131' OR 'E140'-'E141')</font></p></h6>
    </div>
</div>
<div class='well'>
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

<?php
echo GridView::widget([
    'dataProvider' => $dataProvider,
    'panel' => [
        'type' => GridView::TYPE_DEFAULT,
        //'before' => Html::a('<i class="glyphicon glyphicon-repeat"></i> Reload', ['/dental/index'], ['class' => 'btn btn-info']),
        //'after' => 'วันที่ประมวลผล '.date('Y-m-d H:i:s').' น.',
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
        [
            'class'=>'yii\grid\SerialColumn'
        ],
        [
            'attribute' => 'village_name',
            'header' => 'หมู่บ้าน'
        ],
        [
            'label' => 'เป้าหมาย (คน)',
            'format' => 'raw',
            'value' => function($model){
                return  Html::a(Html::encode($model['b']),['/qof/qof/goal203' ,'id'=>$model['village_id']]);
            }// end value
        ],
        [
            'label' => 'ผลงาน  (คน)',
            'format' => 'raw',
            'value' => function($model) use($date1,$date2){
                return  Html::a(Html::encode($model['a']),['/qof/qof/result203' ,'id'=>$model['village_id'], 'date1' => $date1, 'date2' => $date2]);
            }// end value
        ]
    ]
]);
?>
<?= \bluezed\scrollTop\ScrollTop::widget() ?>
