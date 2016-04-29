<?php
use kartik\grid\GridView;
use yii\helpers\Html;
use kartik\date\DatePicker;
use yii\bootstrap\ActiveForm;

$this->title = 'ตรวจสอบข้อมูลการบันทึกอุบัติเหตุ-ฉุกเฉิน ER  เป็นรายบุคคล';
$this->params['breadcrumbs'][] = ['label' => 'ตรวจสอบข้อมูลบริการและข้อมูลพื้นฐาน', 'url' => ['/hosxpwarning/hosxpwarning/index']];
$this->params['breadcrumbs'][] = 'ตรวจสอบข้อมูลการบันทึกอุบัติเหตุ-ฉุกเฉิน ER  เป็นรายบุคคล';
?>

<div class="panel panel-primary">
    <div class="panel-heading"><h4><font color="#FFFF00">ตรวจสอบข้อมูลการบันทึกอุบัติเหตุ-ฉุกเฉิน ER  เป็นรายบุคคล </font></h4>
    <h6><p><font color="#FFFFFF"> ตรวจสอบข้อมูลการบันทึกอุบัติเหตุ-ฉุกเฉิน ER  เป็นรายบุคคล อ้างอิงแฟ้ม ACCIDENT ตามโครงสร้างมาตรฐานข้อมูลด้านสุขภาพกระทรวงสาธารณสุข (43/50 แฟ้ม) </font></p></h6>
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
            'attribute' => 'full_name',
            'header' => 'ชื่อ-นามสกุล'
        ],
        [
            'attribute' => 'vstdate',
            'header' => 'วันรับบริการ'
        ],
            [
            'attribute' => 'visit_type',
            'header' => 'ประเภทการมารับบริการกรณีอุบัติเหตุฉุกเฉิน'
        ],
            [
            'attribute' => 'accident_alcohol_type_id',
            'header' => 'การดื่มแอลกอฮอลล์'
        ],
            [
            'attribute' => 'accident_drug_type_id',
            'header' => 'การใช้ยาสารเสพติด'
        ],
        [
            'attribute' => 'er_emergency_type',
            'header' => 'ระดับความเร่งด่วน'
        ],
        [
            'attribute' => 'accident_airway_type_id',
            'header' => 'การดูแลการหายใจ'
        ],
        [
            'attribute' => 'accident_bleed_type_id',
            'header' => 'การห้ามเลือด'
        ],
          [
            'attribute' => 'accident_splint_type_id',
            'header' => 'การใส่ splint'
        ],
        [
            'attribute' => 'accident_fluid_type_id',
            'header' => 'การให้น้ำเกลือ'
        ],
    ]
]);
  ?>
<?= \bluezed\scrollTop\ScrollTop::widget() ?>