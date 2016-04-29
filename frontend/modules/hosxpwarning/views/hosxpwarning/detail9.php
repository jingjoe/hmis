<?php
use kartik\grid\GridView;
use yii\helpers\Html;
use kartik\date\DatePicker;
use yii\bootstrap\ActiveForm;

$this->title = 'ตรวจสอบประเภทที่อยู่อาศัย Housetype ไม่เท่ากับค่าว่าง';
$this->params['breadcrumbs'][] = ['label' => 'ตรวจสอบข้อมูลบริการและข้อมูลพื้นฐาน', 'url' => ['/hosxpwarning/hosxpwarning/index']];
$this->params['breadcrumbs'][] = 'ตรวจสอบประเภทที่อยู่อาศัย Housetype ไม่เท่ากับค่าว่าง';
?>

<div class="panel panel-primary">
    <div class="panel-heading"><h4><font color="#FFFF00">ตรวจสอบประเภทที่อยู่อาศัย Housetype ไม่เท่ากับค่าว่าง</font></h4>
    <h6><p><font color="#FFFFFF"> ตรวจสอบประเภทที่อยู่อาศัย อ้างอิงแฟ้ม HOUSE ตามโครงสร้างมาตรฐานข้อมูลด้านสุขภาพกระทรวงสาธารณสุข (43/50 แฟ้ม) </font></p></h6>
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
            'attribute' => 'house_id',
            'header' => 'รหัสบ้าน'
        ],
        [
            'attribute' => 'village_name',
            'header' => 'หมู่บ้าน'
        ],
        [
            'attribute' => 'address',
            'header' => 'บ้านเลขที่'
        ],
            [
            'attribute' => 'location_area_id',
            'header' => 'เขตพื้นที่'
        ],
            [
            'attribute' => 'house_type',
            'header' => 'ประเภทที่อยู่'
        ],
            [
            'attribute' => 'house_subtype',
            'header' => 'ประเภทบ้าน'
        ],
        [
            'attribute' => 'last_update',
            'header' => 'วันอับเดท'
        ],
    ]
]);
  ?>
<?= \bluezed\scrollTop\ScrollTop::widget() ?>