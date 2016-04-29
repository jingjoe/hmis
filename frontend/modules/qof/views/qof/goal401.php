
<?php
$this->title = Yii::t('app', 'เป้าหมายเด็กอายุ 1 ปี');
$this->params['breadcrumbs'][] = ['label' => 'ตรวจสอบ qof', 'url' => ['qof/index']];
$this->params['breadcrumbs'][] = ['label' => 'เด็กอายุ 1 ปี ที่ได้รับวัคซีนโรคหัด', 'url' => ['qof/rep4_1']];

use kartik\grid\GridView;
use yii\helpers\Html;

?>

<div class="panel panel-primary">
    <div class="panel-heading"><h4><font color="#FFFF00">เป้าหมายเด็กอายุ 1 ปี</font></h4></div>
</div>
<?php
echo GridView::widget([
    'dataProvider' => $dataProvider,
    'panel' => [
        'type' => GridView::TYPE_DEFAULT,
        //'before' => Html::a('<i class="glyphicon glyphicon-repeat"></i> Reload', ['/dental/index'], ['class' => 'btn btn-info']),
        //'after' => 'วันที่ประมวลผล '.date('Y-m-d H:i:s').' น.',
    ],
    //'showFooter'=>TRUE,
    'responsive' => TRUE,
    'hover' => TRUE,
    'floatHeader' => TRUE,
    'pjax'=>TRUE,
    'pjaxSettings'=>[
        'neverTimeout'=> TRUE,
        'beforeGrid'=>'',
        'afterGrid'=>'',
    ],
    'columns' => [
        [
            'class'=>'yii\grid\SerialColumn'
        ],
        [
            'attribute' => 'pid',
            'header' => 'PID'
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
            'attribute' => 'birthdate',
            'header' => 'วันเกิด'
        ],
        [
            'attribute' => 'age_y',
            'header' => 'อายุ/ปี'
        ]
    ]
]);
?>
<?= \bluezed\scrollTop\ScrollTop::widget() ?>
