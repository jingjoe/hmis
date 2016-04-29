<?php
use kartik\grid\GridView;
use yii\helpers\Html;
use kartik\date\DatePicker;
use yii\bootstrap\ActiveForm;

$this->title = 'ตรวจสอบทะเบียนผู้ป่วย (patient)ที่มี typearea เป็นค่าว่าง หรือ ไม่เท่ากับ 4 เป็นรายบุคคล';
$this->params['breadcrumbs'][] = ['label' => 'ตรวจสอบข้อมูลบริการและข้อมูลพื้นฐาน', 'url' => ['/hosxpwarning/hosxpwarning/index']];
$this->params['breadcrumbs'][] = 'ตรวจสอบทะเบียนผู้ป่วย (patient)ที่มี typearea เป็นค่าว่าง หรือ ไม่เท่ากับ 4 เป็นรายบุคคล';
?>
<div class="panel panel-primary">
    <div class="panel-heading"><h4><font color="#FFFF00">ตรวจสอบทะเบียนผู้ป่วย (patient)ที่มี typearea เป็นค่าว่าง หรือ ไม่เท่ากับ 4 เป็นรายบุคคล </font></h4>
    <h6><p><font color="#FFFFFF"> จนท.หรือผู้ที่เกี่ยวข้องเกี่ยวกับทะเบียนผู้ป่วย(patient)ที่ห้องบัตร บันทึกข้อมูลให้สมบูรณ์และครบถ้วนในแต่ละครั้ง </font></p></h6>
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
            'header' => 'CID'
        ],
        [
            'attribute' => 'full_name',
            'header' => 'ชื่อ-นามสกุล'
        ],
        [
            'attribute' => 'informaddr',
            'header' => 'ที่อยู่'
        ],
          [
            'attribute' => 'type_area',
            'header' => 'สถานะบุคคล'
        ],
        [
            'attribute' => 'last_update',
            'header' => 'วันที่อับเดท'
        ],
    ]
]);
  ?>
<?= \bluezed\scrollTop\ScrollTop::widget() ?>