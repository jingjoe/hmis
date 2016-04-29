
<?php
$this->title = Yii::t('app', 'ผลงานการรับไว้รักษาในโรงพยาบาลผู้ป่วยโรคหืด สิทธิ UC');
$this->params['breadcrumbs'][] = ['label' => 'ตรวจสอบ qof', 'url' => ['qof/index']];
$this->params['breadcrumbs'][] = ['label' => 'อัตราการรับไว้รักษาในโรงพยาบาลผู้ป่วยโรคหืด สิทธิ UC', 'url' => ['qof/rep2_2']];

use kartik\grid\GridView;
use yii\helpers\Html;

?>

<div class="panel panel-primary">
    <div class="panel-heading"><h4><font color="#FFFF00">ผลงานการรับไว้รักษาในโรงพยาบาลผู้ป่วยโรคหืด สิทธิ UC</font></h4></div>
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
            'attribute' => 'an',
            'header' => 'AN'
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
            'attribute' => 'age_y',
            'header' => 'อายุ/ปี'
        ],
        [
            'attribute' => 'informaddr',
            'header' => 'ที่อยู่'
        ],
        [
            'attribute' => 'dchdate',
            'header' => 'วันรับบริการ'
        ],
        [
            'attribute' => 'pttype',
            'header' => 'สิทธิ'
        ],
        [
            'attribute' => 'pdx',
            'header' => 'ICD10'
        ],
        [
            'attribute' => 'doc_name',
            'header' => 'ผู้ให้บริการ'
        ],
        [
            'attribute' => 'visit',
            'header' => 'ครั้ง'
        ]
    ]
]);
?>
<?= \bluezed\scrollTop\ScrollTop::widget() ?>
