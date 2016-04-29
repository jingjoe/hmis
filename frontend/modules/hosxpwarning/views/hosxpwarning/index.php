<?php

use miloschuman\highcharts\Highcharts;
use yii\web\JsExpression;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\data\Pagination;

/* @var $this yii\web\View */
$this->title = 'ตรวจสอบข้อมูลบริการและข้อมูลพื้นฐาน';
$this->params['breadcrumbs'][] = 'ตรวจสอบข้อมูลบริการและข้อมูลพื้นฐาน';
?>

<div style='display: none'>
    <?=
    Highcharts::widget([
        'scripts' => [
            'highcharts-more',
            //'themes/grid',
            //'modules/exporting',
            'modules/solid-gauge',
        ]
    ]);
    ?>
</div>

<?php
//$webroot = Yii::$app->request->BaseUrl;
$this->registerJsFile('@web/js/chart-donut.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
?>

<div class="panel panel-warning">
    <div class="panel-heading"> <h3 class="panel-title"><span class="glyphicon glyphicon-warning-sign"></span> Data Warning On HOSxP ข้อมูล ณ.วันที่ <?= $date_start ?> ถึง <?= Yii::$app->formatter->asDate('now', 'php:Y-m-d'); ?>  </h3> </div>
    <div class="panel-body">
        <div class="row">
            <!-- col1--->
            <div class="col-md-4" style="text-align: center;">
                <?php
                $data1 = [];
                for ($i = 0; $i < count($chart1); $i++) {
                    $data1[] = $chart1[$i]['cc_hn'];
                }
                $js_cc1 = implode(",", $data1);

                $this->registerJs("
                                var obj_div=$('#chart1');
                                gen_donut(obj_div,'ไม่ลงผลวินิจฉัย OPD',$js_cc1);
                             ");
                ?>
                <div id="chart1" style="width: 300px; height: 200px; float: left"></div>
                <div class="form-group">
                    <div class="col-sm-10">
                        <?= Html::a('ดูรายละเอียด', ['/hosxpwarning/hosxpwarning/detail1'], ['class' => 'btn btn-info btn-xs']) ?>                      
                    </div>
                </div>
            </div>
            <!-- col2--->
            <div class="col-md-4" style="text-align: center;">
                <?php
                $data2 = [];
                for ($i = 0; $i < count($chart2); $i++) {
                    $data2[] = $chart2[$i]['cc_hn'];
                }
                $js_cc2 = implode(",", $data2);

                $this->registerJs("
                                var obj_div=$('#chart2');
                                gen_donut(obj_div,'ไม่ลงผลวินิจฉัย IPD',$js_cc2);
                             ");
                ?>
                <div id="chart2" style="width: 300px; height: 200px; float: left"></div>
                <div class="form-group">
                    <div class="col-sm-10">
                        <?= Html::a('ดูรายละเอียด', ['/hosxpwarning/hosxpwarning/detail2'], ['class' => 'btn btn-info btn-xs']) ?>
                    </div>
                </div>
            </div>
            <!-- col3--->
            <div class="col-md-4" style="text-align: center;">
                <?php
                $data3 = [];
                for ($i = 0; $i < count($chart3); $i++) {
                    $data3[] = $chart3[$i]['cc_hn'];
                }
                $js_cc3 = implode(",", $data3);

                $this->registerJs("
                                var obj_div=$('#chart3');
                                gen_donut(obj_div,'TYPEAREA มีค่าว่าง หรือ ไม่เท่ากับ 4',$js_cc3);
                             ");
                ?>
                <div id="chart3" style="width: 300px; height: 200px; float: left"></div>
                <div class="form-group">
                    <div class="col-sm-10">
                        <?= Html::a('ดูรายละเอียด', ['/hosxpwarning/hosxpwarning/detail3'], ['class' => 'btn btn-info btn-xs']) ?>
                    </div>
                </div>
            </div>
        </div>
        
<!--row2 -->
        <div class="row">
            <!-- col1--->
            <div class="col-md-4" style="text-align: center;">
                <?php
                $data4 = [];
                for ($i = 0; $i < count($chart4); $i++) {
                    $data4[] = $chart4[$i]['cc_hn'];
                }
                $js_cc4 = implode(",", $data4);

                $this->registerJs("
                                    var obj_div=$('#chart4');
                                    gen_donut(obj_div,'ข้อมูลอุบัติเหตุ-ฉุกเฉินไม่สมบูรณ์',$js_cc4);
                                 ");
                ?>
                <div id="chart4" style="width: 300px; height: 200px; float: left"></div>
                <div class="form-group">
                    <div class="col-sm-10">
                        <?= Html::a('ดูรายละเอียด', ['/hosxpwarning/hosxpwarning/detail4'], ['class' => 'btn btn-info btn-xs']) ?>
                    </div>
                </div>
            </div>
            <!-- col2--->
            <div class="col-md-4" style="text-align: center;">
                <?php
                $data5 = [];
                for ($i = 0; $i < count($chart5); $i++) {
                    $data5[] = $chart5[$i]['cc_hn'];
                }
                $js_cc5 = implode(",", $data5);

                $this->registerJs("
                                    var obj_div=$('#chart5');
                                    gen_donut(obj_div,'DiagType OPD ค่าไม่เท่ากับ 1-7 หรือ มีค่าว่าง',$js_cc5);
                                 ");
                ?>
                <div id="chart5" style="width: 300px; height: 200px; float: left"></div>
                <div class="form-group">
                    <div class="col-sm-10">
                        <?= Html::a('ดูรายละเอียด', ['/hosxpwarning/hosxpwarning/detail5'], ['class' => 'btn btn-info btn-xs']) ?>
                    </div>
                </div>
            </div>
            <!-- col3--->
            <div class="col-md-4" style="text-align: center;">
                <?php
                $data6 = [];
                for ($i = 0; $i < count($chart6); $i++) {
                    $data6[] = $chart6[$i]['cc_pid'];
                }
                $js_cc6 = implode(",", $data6);

                $this->registerJs("
                                    var obj_div=$('#chart6');
                                    gen_donut(obj_div,'Person Type 1 และ 3 ไม่เป็นคนไทย',$js_cc6);
                                 ");
                ?>
                <div id="chart6" style="width: 300px; height: 200px; float: left"></div>
                <div class="form-group">
                    <div class="col-sm-10">
                        <?= Html::a('ดูรายละเอียด', ['/hosxpwarning/hosxpwarning/detail6'], ['class' => 'btn btn-info btn-xs']) ?>
                    </div>
                </div>
            </div>
        </div>
<!--row3 -->
        <div class="row">
            <!-- col1--->
            <div class="col-md-4" style="text-align: center;">
                <?php
                $data7 = [];
                for ($i = 0; $i < count($chart7); $i++) {
                    $data7[] = $chart7[$i]['cc_pid'];
                }
                $js_cc7 = implode(",", $data7);

                $this->registerJs("
                                var obj_div=$('#chart7');
                                gen_donut(obj_div,'Person Type 1 และ 3 สถานะที่ไม่เท่ากับ 9',$js_cc7);
                             ");
                ?>
                <div id="chart7" style="width: 300px; height: 200px; float: left"></div>

                <div class="form-group">
                    <div class="col-sm-10">
                        <?= Html::a('ดูรายละเอียด', ['/hosxpwarning/hosxpwarning/detail7'], ['class' => 'btn btn-info btn-xs']) ?>
                    </div>
                </div>
            </div>
            <!-- col2--->
            <div class="col-md-4" style="text-align: center;">
                <?php
                $data8 = [];
                for ($i = 0; $i < count($chart8); $i++) {
                    $data8[] = $chart8[$i]['cc_pid'];
                }
                $js_cc8 = implode(",", $data8);

                $this->registerJs("
                                var obj_div=$('#chart8');
                                gen_donut(obj_div,'Person หมู่ 0 มี Type 1 และ 3',$js_cc8);
                             ");
                ?>
                <div id="chart8" style="width: 300px; height: 200px; float: left"></div>
                <div class="form-group">
                    <div class="col-sm-10">
                        <?= Html::a('ดูรายละเอียด', ['/hosxpwarning/hosxpwarning/detail8'], ['class' => 'btn btn-info btn-xs']) ?>
                    </div>
                </div>
            </div>
            <!-- col3--->
            <div class="col-md-4" style="text-align: center;">
                <?php
                $data9 = [];
                for ($i = 0; $i < count($chart9); $i++) {
                    $data9[] = $chart9[$i]['cc_house'];
                }
                $js_cc9 = implode(",", $data9);

                $this->registerJs("
                                var obj_div=$('#chart9');
                                gen_donut(obj_div,'ประเภทที่อยู่ HouseType ไม่เท่ากับค่าว่าง',$js_cc9);
                             ");
                ?>
                <div id="chart9" style="width: 300px; height: 200px; float: left"></div>
                <div class="form-group">
                    <div class="col-sm-10">
                        <?= Html::a('ดูรายละเอียด', ['/hosxpwarning/hosxpwarning/detail9'], ['class' => 'btn btn-info btn-xs']) ?>
                    </div>
                </div>
            </div>
        </div>
<!--row4 -->
        <div class="row">
        <!-- col1--->
            <div class="col-md-4" style="text-align: center;">
                <?php
                $data10 = [];
                for ($i = 0; $i < count($chart10); $i++) {
                    $data10[] = $chart10[$i]['cc_pid'];
                }
                $js_cc10 = implode(",", $data10);

                $this->registerJs("
                                var obj_div=$('#chart10');
                                gen_donut(obj_div,'Person TYPEAREA มีค่าว่าง',$js_cc10);
                             ");
                ?>
                <div id="chart10" style="width: 300px; height: 200px; float: left"></div>

                <div class="form-group">
                    <div class="col-sm-10">
                        <?= Html::a('ดูรายละเอียด', ['/hosxpwarning/hosxpwarning/detail10'], ['class' => 'btn btn-info btn-xs']) ?>
                    </div>
                </div>
            </div>
        <!-- col2--->
            <div class="col-md-4" style="text-align: center;">
                <?php
                $data11 = [];
                for ($i = 0; $i < count($chart11); $i++) {
                    $data11[] = $chart11[$i]['cc_hn'];
                }
                $js_cc11 = implode(",", $data11);

                $this->registerJs("
                                var obj_div=$('#chart11');
                                gen_donut(obj_div,'จำนวนสั่ง X-Ray แต่ไม่ได้ลงรับ',$js_cc11);
                             ");
                ?>
                <div id="chart11" style="width: 300px; height: 200px; float: left"></div>

                <div class="form-group">
                    <div class="col-sm-10">
                        <?= Html::a('ดูรายละเอียด', ['/hosxpwarning/hosxpwarning/detail11'], ['class' => 'btn btn-info btn-xs']) ?>
                    </div>
                </div>
            </div>
        <!-- col3--->
            <div class="col-md-4" style="text-align: center;">
                <?php
                $data12 = [];
                for ($i = 0; $i < count($chart12); $i++) {
                    $data12[] = $chart12[$i]['an_cc'];
                }
                $js_cc12 = implode(",", $data12);

                $this->registerJs("
                                var obj_div=$('#chart12');
                                gen_donut(obj_div,'ผู้ป่วยในที่ยังไม่จำหน่าย',$js_cc12);
                             ");
                ?>
                <div id="chart12" style="width: 300px; height: 200px; float: left"></div>

                <div class="form-group">
                    <div class="col-sm-10">
                        <?= Html::a('ดูรายละเอียด', ['/hosxpwarning/hosxpwarning/detail12'], ['class' => 'btn btn-info btn-xs']) ?>
                    </div>
                </div>
            </div>       
        </div> 

    </div>
</div>
<!-- pagination -->
<?php
$pagination = new Pagination([
    'totalCount' => 3,
    'pageSize' => 2
        ]);

echo \yii\widgets\LinkPager::widget([
    'pagination' => $pagination,
]);
?>
<?= \bluezed\scrollTop\ScrollTop::widget() ?>