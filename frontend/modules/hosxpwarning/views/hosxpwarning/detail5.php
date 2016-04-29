<?php
use kartik\grid\GridView;
use yii\helpers\Html;
use kartik\date\DatePicker;
use yii\bootstrap\ActiveForm;

$this->title = 'ตรวจสอบประเภทการวินิจฉัยโรคผู้ป่วยนอก ค่าของประเภทการวินิจฉัยไม่เป็นไปตามมาตรฐาน คือ ค่าไม่เท่ากับ 1-7 หรือ เป็นค่าว่าง';
$this->params['breadcrumbs'][] = ['label' => 'ตรวจสอบข้อมูลบริการและข้อมูลพื้นฐาน', 'url' => ['/hosxpwarning/hosxpwarning/index']];
$this->params['breadcrumbs'][] = 'ตรวจสอบประเภทการวินิจฉัยโรคผู้ป่วยนอก ค่าของประเภทการวินิจฉัยไม่เป็นไปตามมาตรฐาน คือ ค่าไม่เท่ากับ 1-7 หรือ เป็นค่าว่าง';
?>

<div class="panel panel-primary">
    <div class="panel-heading"><h4><font color="#FFFF00">ตรวจสอบประเภทการวินิจฉัยโรคผู้ป่วยนอก ค่าของประเภทการวินิจฉัยไม่เป็นไปตามมาตรฐาน คือ ค่าไม่เท่ากับ 1-7 หรือ เป็นค่าว่าง</font></h4>
    <h6><p><font color="#FFFFFF"> ประเภทการวินิจฉัยโรคผู้ป่วยนอก  อ้างอิงแฟ้ม DIAGNOSIS_OPD ตามโครงสร้างมาตรฐานข้อมูลด้านสุขภาพกระทรวงสาธารณสุข (43/50 แฟ้ม) </font></p></h6>
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
            'header' => 'HN'
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
            'attribute' => 'vstdate',
            'header' => 'วันรับบริการ'
        ],
            [
            'attribute' => 'icd10',
            'header' => 'วินิจฉัย'
        ],
            [
            'attribute' => 'diagtype',
            'header' => 'ประเภทวินิจฉัย'
        ],
        [
            'attribute' => 'doctor_name',
            'header' => 'แพทย์'
        ],
    ]
]);
  ?>
<?= \bluezed\scrollTop\ScrollTop::widget() ?>