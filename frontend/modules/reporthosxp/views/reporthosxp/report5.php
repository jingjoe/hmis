<?php

use miloschuman\highcharts\Highcharts;
use yii\web\JsExpression;
use kartik\grid\GridView;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
$this->title = 'รายงานจำนวนประชากรจำแนกตามสถานะการอยู่อาศัย TYPEAREA 1-5';
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
    <div class="panel-heading"> <h3 class="panel-title"><span class="glyphicon glyphicon glyphicon-signal"></span> จำนวนประชากรจำแนกตามสถานะการอยู่อาศัย TYPEAREA 1-5</h3> </div>
    <div class="panel-body">
        <div id="container-column"></div>
        <?php

        $categ = [];
        for ($i = 0; $i < count($chart); $i++) {
            $categ[] = $chart[$i]['village_name'];
        }
        $js_categ = implode("','", $categ);

        $type1 = [];
        for ($i = 0; $i < count($chart); $i++) {
            $type1[] = $chart[$i]['type1'];
        }
        $js_type1 = implode(",", $type1);

        $type2 = [];
        for ($i = 0; $i < count($chart); $i++) {
            $type2[] = $chart[$i]['type2'];
        }
        $js_type2 = implode(",", $type2);

        $type3 = [];
        for ($i = 0; $i < count($chart); $i++) {
            $type3[] = $chart[$i]['type3'];
        }
        $js_type3 = implode(",", $type3);
        
        $type4 = [];
        for ($i = 0; $i < count($chart); $i++) {
            $type4[] = $chart[$i]['type4'];
        }
        $js_type4 = implode(",", $type4);
        
        $type5 = [];
        for ($i = 0; $i < count($chart); $i++) {
            $type5[] = $chart[$i]['type5'];
        }
        $js_type5 = implode(",", $type5);

        $this->registerJs(" $(function () {
                            $('#container-column').highcharts({
                                chart: {
                                    type: 'column'
                                },
                                title: {
                                    text: 'รายงานจำนวนประชากรจำแนกตามสถานะการอยู่อาศัย TYPEAREA 1-5',
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
                                    name: 'type1',
                                    data: [$js_type1]
                                }, {
                                    name: 'type2',
                                    data: [$js_type2]
                                }, {
                                    name: 'type3',
                                    data: [$js_type3]
                                }, {
                                    name: 'type4',
                                    data: [$js_type4]    
                                }, {
                                    name: 'type5',
                                    data: [$js_type5]
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
                           <h4 class="modal-title" id="gridSystemModalLabel">SQL : จำนวนประชากรจำแนกตามสถานะการอยู่อาศัย TYPEAREA 1-5</h4>
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
                    'attribute' => 'village_name',
                    'header' => 'ชื่อหมู่บาน'
                ],
                [
                    'attribute' => 'all_person',
                    'header' => 'จำนวนทั้งหมด'
                ],
                [
                    'attribute' => 'type1',
                    'header' => 'TYPEAREA 1'
                ],
                [
                    'attribute' => 'type2',
                    'header' => 'TYPEAREA 2'
                ],
                [
                    'attribute' => 'type3',
                    'header' => 'TYPEAREA 3'
                ],
                [
                    'attribute' => 'type4',
                    'header' => 'TYPEAREA 4'
                ],
                [
                    'attribute' => 'type5',
                    'header' => 'TYPEAREA 5'
                ],
                [
                    'attribute' => 'type1+3',
                    'header' => 'TYPEAREA 1+3'
                ]
            ],
        ]);
        ?>
    </div>
</div>
<?= \bluezed\scrollTop\ScrollTop::widget() ?>