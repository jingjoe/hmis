<?php
use kartik\grid\GridView;
use yii\helpers\Html;
use kartik\date\DatePicker;
use yii\bootstrap\ActiveForm;

$this->title = 'ตรวจสอบทะเบียนผู้ป่วย (person) มี TYPEAREA เป็นค่าว่าง';
$this->params['breadcrumbs'][] = ['label' => 'ตรวจสอบข้อมูลบริการและข้อมูลพื้นฐาน', 'url' => ['/hosxpwarning/hosxpwarning/index']];
$this->params['breadcrumbs'][] = 'ตรวจสอบทะเบียนผู้ป่วย (person) มี TYPEAREA เป็นค่าว่าง';
?>

<div class="panel panel-primary">
    <div class="panel-heading"><h4><font color="#FFFF00">ตรวจสอบทะเบียนผู้ป่วย (person) มี TYPEAREA เป็นค่าว่าง</font></h4>
    <h6><p><font color="#FFFFFF"> ตรวจสอบทะเบียนผู้ป่วย (person) อ้างอิงแฟ้ม PERSON ตามโครงสร้างมาตรฐานข้อมูลด้านสุขภาพกระทรวงสาธารณสุข (43/50 แฟ้ม) </font></p></h6>
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
            'attribute' => 'person_id',
            'header' => 'PID'
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
            'attribute' => 'age_y',
            'header' => 'อายุ/ปี'
        ],
            [
            'attribute' => 'village_name',
            'header' => 'หมู่บ้าน'
        ],
            [
            'attribute' => 'house_regist_type_id',
            'header' => 'สถานะบุคคล'
        ],
        [
            'attribute' => 'discharge',
            'header' => 'สถานะการอยู่อาศัย'
        ],
        [
            'attribute' => 'last_update',
            'header' => 'วันอับเดท'
        ],
    ]
]);
  ?>
<?= \bluezed\scrollTop\ScrollTop::widget() ?>