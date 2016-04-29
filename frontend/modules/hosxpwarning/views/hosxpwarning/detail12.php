<?php
use kartik\grid\GridView;
use yii\helpers\Html;
use kartik\date\DatePicker;
use yii\bootstrap\ActiveForm;

$this->title = 'ตรวจสอบจำนวนผู้ป่วยใน (IPD) ที่ Admit แล้วยังไม่จำหน่ายรายบุคคคล';
$this->params['breadcrumbs'][] = ['label' => 'ตรวจสอบข้อมูลบริการและข้อมูลพื้นฐาน', 'url' => ['/hosxpwarning/hosxpwarning/index']];
$this->params['breadcrumbs'][] = 'ตรวจสอบจำนวนผู้ป่วยใน (IPD) ที่ Admit แล้วยังไม่จำหน่ายรายบุคคคล';
?>

<div class="panel panel-primary">
    <div class="panel-heading"><h4><font color="#FFFF00">ตรวจสอบจำนวนผู้ป่วยใน (IPD) ที่ Admit แล้วยังไม่จำหน่ายรายบุคคคล</font></h4>
    <h6><p><font color="#FFFFFF"> ตรวจสอบจำนวนผู้ป่วยใน (IPD) ที่ Admit แล้วยังไม่จำหน่ายรายบุคคคล </font></p></h6>
    </div>
</div>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'panel' => [
        'type' => GridView::TYPE_DEFAULT,
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
            'class' => 'yii\grid\SerialColumn'
        ],
        [
            'attribute' => 'hn',
            'header' => 'hn'
        ],
        [
            'attribute' => 'cid',
            'header' => 'เลข 13 หลัก'
        ],
        [
            'attribute' => 'full_name',
            'header' => 'ชื่อ-นามสกุล'
        ],
            [
            'attribute' => 'an',
            'header' => 'AN'
        ],
            [
            'attribute' => 'regdatetime',
            'header' => 'วันที่ Admit'
        ],
        [
            'attribute' => 'dchtype',
            'header' => 'สถานะจำหน่าย'
        ]
    ]
]);
  ?>
<?= \bluezed\scrollTop\ScrollTop::widget() ?>