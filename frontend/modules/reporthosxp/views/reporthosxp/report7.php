<?php

use miloschuman\highcharts\Highcharts;
use yii\web\JsExpression;
use kartik\grid\GridView;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
$this->title = 'รายงานจำนวนผู้ป่วยโรคเรื้อรังที่ขึ้นทะเบียนโรงเรื้อรังงานส่งเสริม(PCU)';
$this->params['breadcrumbs'][] = ['label' => 'รายงานสำหรับสนับสนุนการบริหารจัดการทางด้านสาธารณสุข จากฐาน HOSxP', 'url' => ['/reporthosxp/reporthosxp/index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div style='display: none'>
    <?= Highcharts::widget([
        'scripts' => [
            'highcharts-more',
            'themes/grid',
            //'modules/exporting',
            'modules/solid-gauge',
        ]
    ]);
    ?>
</div>

<div class="panel panel-default">
    <div class="panel-heading"> <h3 class="panel-title"><span class="glyphicon glyphicon glyphicon-signal"></span> รายงานจำนวนผู้ป่วยโรคเรื้อรังที่ขึ้นทะเบียนโรงเรื้อรังงานส่งเสริม(PCU) ตามรหัสโรค ICD-10 อ้างอิงกลุ่มโรคตาม สปสช.</h3> </div>
    <div class="panel-body">
        <div id="container-column"></div>
        <?php

        $categ = [];
        for ($i = 0; $i < count($chart); $i++) {
            $categ[] = $chart[$i]['clinic_name'];
        }
        $js_categ = implode("','", $categ);

        $cc = [];
        for ($i = 0; $i < count($chart); $i++) {
            $cc[] = $chart[$i]['cc'];
        }
        $js_cc = implode(",", $cc);

       

        $this->registerJs(" $(function () {
                            $('#container-column').highcharts({
                                chart: {
                                    type: 'column'
                                },
                                title: {
                                    text: 'รายงานจำนวนผู้ป่วยโรคเรื้อรังที่ขึ้นทะเบียนโรงเรื้อรังงานส่งเสริม(PCU) ตามรหัสโรค ICD-10 อ้างอิงกลุ่มโรคตาม สปสช.',
                                    x: -20 //center
                                },
                                subtitle: {
                                    text: '',
                                    x: -20
                                },
                                xAxis: {
                                      categories: ['$js_categ'],
                                },
                                yAxis: {
                                    title: {
                                        text: 'จำนวน(คน)'
                                    },
                                    plotLines: [{
                                        value: 0,
                                        width: 1,
                                        color: '#808080'
                                    }]
                                },
                                tooltip: {
                                    valueSuffix: ''
                                },
                                legend: {
                                    layout: 'vertical',
                                    align: 'right',
                                    verticalAlign: 'middle',
                                    borderWidth: 0
                                },
                                credits: {
                                    enabled: false
                                },
                                series: [{
                                    name: 'จำนวน (คน)',
                                    data: [$js_cc]
                                }]
                            });
                        });
             ");
        ?>
<br>
         <div class="box-tools pull-right">
             <!-- dialog sql -->
             <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target=".bs-example-modal-lg">sql script</button>
             <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
                 <div class="modal-dialog modal-lg">
                     <div class="modal-content">
                       <div class="modal-header">
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                           <h4 class="modal-title" id="gridSystemModalLabel">SQL : รายงานจำนวนผู้ป่วยโรคเรื้อรังที่ขึ้นทะเบียนโรงเรื้อรังงานส่งเสริม(PCU) ตามรหัสโรค ICD-10 อ้างอิงกลุ่มโรคตาม สปสช.</h4>
                       </div>
                      <div class="modal-body">
                          <?= $sql ?>
                      </div>
                      <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                      </div>
                     </div>
                 </div>
             </div>
         </div>
<br><br> 
        <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'panel' => [
            'type' => GridView::TYPE_DEFAULT,
            'after' => 'วันที่ประมวลผล '.date('Y-m-d H:i:s').' น.',
        ],
        'responsive' => true,
        'hover' => true,
        'floatHeader' => true,
        'pjax' => true,
        'pjaxSettings' => [
            'neverTimeout' => true,
            'beforeGrid' => '',
            'afterGrid' => '',
        ],
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                [
                    'attribute' => 'clinic_name',
                    'header' => 'ชื่อคลินิก'
                ],
                [
                    'attribute' => 'cc',
                    'header' => 'จำนวน (คน)'
                ]
            ],
        ]);
        ?>
    </div>
</div>
<?= \bluezed\scrollTop\ScrollTop::widget() ?>