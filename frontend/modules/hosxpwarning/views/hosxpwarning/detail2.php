<?php
use kartik\grid\GridView;
use yii\helpers\Html;
use kartik\date\DatePicker;
use yii\bootstrap\ActiveForm;

$this->title = 'ตรวจสอบไม่ลงผลวินิจฉัย IPD รายบุคคล';
$this->params['breadcrumbs'][] = ['label' => 'ตรวจสอบข้อมูลบริการและข้อมูลพื้นฐาน', 'url' => ['/hosxpwarning/hosxpwarning/index']];
$this->params['breadcrumbs'][] = 'ตรวจสอบไม่ลงผลวินิจฉัย IPD รายบุคคล';
?>

<div class="panel panel-primary">
    <div class="panel-heading"><h4><font color="#FFFF00">ตรวจสอบไม่ลงผลวินิจฉัย IPD รายบุคคล </font></h4>
    <h6><p><font color="#FFFFFF"> การลงผลวินิจฉัยผู้ป่วยในต้องดำเนินการให้เสร็จภายใน วันที่ 15 ของเดือนถัดไป ตามมติคณะกรรมการสารสนเทศ ลงวันที่ 01 มีนาคม 2559</font></p></h6>
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
            'attribute' => 'an',
            'header' => 'AN'
        ],
        [
            'attribute' => 'regdate',
            'header' => 'เวลา Admit'
        ],
          [
            'attribute' => 'ward_name',
            'header' => 'หอผู้ป่วย'
        ],
        [
            'attribute' => 'pdx',
            'header' => 'วนิจฉัยโรค'
        ],
    ]
]);
  ?>
<?= \bluezed\scrollTop\ScrollTop::widget() ?>