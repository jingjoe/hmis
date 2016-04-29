<?php
use kartik\grid\GridView;
use yii\helpers\Html;
use kartik\date\DatePicker;
use yii\bootstrap\ActiveForm;

$this->title = 'ตรวจสอบจำนวนสั่ง X-Ray แต่ไม่ได้ลงรับโดยแผนก X-Ray';
$this->params['breadcrumbs'][] = ['label' => 'ตรวจสอบข้อมูลบริการและข้อมูลพื้นฐาน', 'url' => ['/hosxpwarning/hosxpwarning/index']];
$this->params['breadcrumbs'][] = 'ตรวจสอบจำนวนสั่ง X-Ray แต่ไม่ได้ลงรับโดยแผนก X-Ray';
?>

<div class="panel panel-primary">
    <div class="panel-heading"><h4><font color="#FFFF00">ตรวจสอบจำนวนสั่ง X-Ray แต่ไม่ได้ลงรับโดยแผนก X-Ray</font></h4>
    <h6><p><font color="#FFFFFF"> ตรวจสอบการลงรับ X-Ray เปรียบเทียบกับการสั่ง X-Ray ของแต่ละแผนก </font></p></h6>
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
            'attribute' => 'pt_xn',
            'header' => 'XN'
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
            'attribute' => 'order_date_time',
            'header' => 'วันสั่ง X-Ray'
        ],
            [
            'attribute' => 'department',
            'header' => 'แผนกที่สั่ง'
        ],
        [
            'attribute' => 'xray_list',
            'header' => 'ชื่อ X-Ray'
        ],
        [
            'attribute' => 'confirm_all',
            'header' => 'Confirm'
        ],
    ]
]);
  ?>
<?= \bluezed\scrollTop\ScrollTop::widget() ?>