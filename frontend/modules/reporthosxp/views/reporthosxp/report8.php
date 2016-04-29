<?php

use miloschuman\highcharts\Highcharts;
use yii\web\JsExpression;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
$this->title = 'รายงานข้อมูลโรงพยาบาลเพื่อเตรียมคำนวณอัตรากำลังคนในตาราง SIMULATION';
$this->params['breadcrumbs'][] = ['label' => 'รายงานสำหรับสนับสนุนการบริหารจัดการทางด้านสาธารณสุข จากฐาน HOSxP', 'url' => ['/reporthosxp/reporthosxp/index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class='bg-success'>
    <?php $form = ActiveForm::begin(['layout' => 'inline']); ?>
    <div class="form-group">
        <label class="control-label"> เลือกวันที่ </label>
        <?php
        echo DatePicker::widget([
            'name' => 'date1',
            'value' => $date1,
            'language' => 'th',
            'pluginOptions' => [
                'format' => 'yyyy-mm-dd',
                'changeMonth' => true,
                'changeYear' => true,
                'todayHighlight' => true
            ]
        ]);
        ?>

    </div>
    <div class="form-group">
        <label class="control-label"> ถึง </label>
        <?php
        echo DatePicker::widget([
            'name' => 'date2',
            'value' => $date2,
            'language' => 'th',
            'pluginOptions' => [
                'format' => 'yyyy-mm-dd',
                'changeMonth' => true,
                'changeYear' => true,
                'todayHighlight' => true
            ]
        ]);
        ?>
    </div>
    <div class="form-group">
        <?= Html::submitButton('ประมวลผล', ['class' => 'btn btn-warning btn-flat']) ?>
    </div><!-- /.input group -->
    <?php ActiveForm::end(); ?>
</div>
<br>

<div class="panel panel-default">
    <div class="panel-heading"> <h3 class="panel-title"><span class="glyphicon glyphicon glyphicon-signal"></span> รายงานข้อมูลโรงพยาบาลเพื่อเตรียมคำนวณอัตรากำลังคนในตาราง SIMULATION ข้อมูลวันที่ <?=$date1 ?> ถึง <?=$date2 ?></h3> </div>
    <div class="panel-body">
        <div class="bs-example" data-example-id="bordered-table">
            <table class="table table-bordered table-hover dataTable">
                <thead>
                    <tr bgcolor="#6E6E6E">
                        <th>ข้อ</th>
                        <th>งาน/กิจกรรม</th>
                        <th>ความหมาย</th>
                        <th>หน่วยนับ</th>
                        <th>วิชาชีพ</th>
                        <th>ปริมาณ</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>จำนวนผู้ป่วยนอกรวม</td>
                        <td>จำนวนผู้ป่วยนอก ทั้งในและนอกเวลาราชการ  นับรวมผู้ใช้บริการที่ ER. เป็นจำนวนผู้ใช้บริการทุกประเภท ไม่นับ จำนวนผู้ป่วยที่ตรวจที่ รพ.สต.และศสม.</td>
                        <td>ครั้ง/ปี</td>
                        <td>แพทย์,เภสัชกร,พยาบาล</td>
                        <td><input type="text" class="form-control" placeholder="<?php echo number_format($sim01); ?>" disabled></td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>จำนวนวันนอนรวมผู้ป่วยใน (IPD.) ทั้งหมด</td>
                        <td>วันนอน คือ IP day รวมทุกแผนก</td>
                        <td>จำนวนวันนอนรวม (วัน/ปี)</td>
                        <td>แพทย์,เภสัชกร,พยาบาล</td>
                        <td><input type="text" class="form-control" placeholder="<?php echo number_format($sim02); ?>" disabled></td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>จำนวนผู้คลอดปกติ</td>
                        <td>คลอด NL ไม่นับ C/S (ให้รหัส ICD-10 O800)</td>
                        <td>ราย/ปี</td>
                        <td>แพทย์,เภสัชกร,พยาบาล</td>
                        <td><input type="text" class="form-control" placeholder="<?php echo number_format($sim03); ?>" disabled></td>
                    </tr>
                    <tr>
                        <th scope="row">4</th>
                        <td>จำนวนผู้คลอดผิดปกติ</td>
                        <td>คลอดโดย F/E, V/E, breech ไม่นับ C/S (ให้รหัส ICD-10 O81 ถึง O83)</td>
                        <td>ราย/ปี</td>
                        <td>แพทย์,เภสัชกร,พยาบาล</td>
                        <td><input type="text" class="form-control" placeholder="<?php echo number_format($sim04); ?>" disabled></td>
                    </tr>
                    <tr>
                        <th scope="row">5</th>
                        <td>ทันตกรรมทั่วไป</td>
                        <td>ตรวจ 2, เวชศาสตร์ช่องปาก 1-6, ทันตหัตถการ 1, 2, 3, ปริทันต์ 1, 2 , ทันตศัลย์ 1-2</td>
                        <td>ครั้ง</td>
                        <td>ทันตแพทย์</td>
                        <td><input type="text" class="form-control" placeholder="<?php echo number_format($sim05); ?>" disabled></td>
                    </tr>
                    <tr>
                        <th scope="row">6</th>
                        <td>จำนวนผู้ป่วยรับบริการรังสีทั่วไป</td>
                        <td>x-ray ทั่วไป, x-ray เคลื่อนที่, x-ray ฟันและฟันทั้งปาก (ไม่นับ x-ray ที่ห้องฟัน), x-ray ด้วยรถ x-ray (ไม่นับ x-ray ซ้ำ **)</td>
                        <td>Study (organ)</td>
                        <td>นักรังสีการแพทย์/จพ.รังสี</td>
                        <td><input type="text" class="form-control" placeholder="<?php echo number_format($sim06); ?>" disabled></td>
                    </tr>
                    <tr>
                        <th scope="row">7</th>
                        <td>งานบริการผู้ป่วยนอก/ใน กลุ่ม Musculoskeletal conditon</td>
                        <td>ICD10 M00-M99 (ทั้งในและนอกเวลาราชการ) นับเฉพาะตรวจโดยนักกายภาพบำบัด ****</td>
                        <td>จำนวน visits</td>
                        <td>นักกายภาพบำบัด</td>
                        <td><input type="text" class="form-control" placeholder="<?php echo number_format($sim07_1); ?> / <?php echo number_format($sim07_2); ?>" disabled></td>
                    </tr>
                    <tr>
                        <th scope="row">8</th>
                        <td>งานบริการผู้ป่วยนอก/ใน กลุ่ม Neurological conditon</td>
                        <td>ICD10 G00-G99, H00-H99,F01-F99(ทั้งในและนอกเวลาราชการ) นับเฉพาะตรวจโดยนักกายภาพบำบัด ****</td>
                        <td>จำนวน visits</td>
                        <td>นักกายภาพบำบัด</td>
                        <td><input type="text" class="form-control" placeholder="<?php echo number_format($sim08_1); ?> / <?php echo number_format($sim08_2); ?>" disabled></td>
                    </tr>
                    <tr>
                        <th scope="row">9</th>
                        <td>งานบริการผู้ป่วยนอก/ใน กลุ่ม Cariopulmonary conditon</td>
                        <td>ICD10 I00-I99, J00-J99,(ทั้งในและนอกเวลาราชการ) นับเฉพาะตรวจโดยนักกายภาพบำบัด ****</td>
                        <td>จำนวน visits</td>
                        <td>นักกายภาพบำบัด</td>
                        <td><input type="text" class="form-control" placeholder="<?php echo number_format($sim09_1); ?> / <?php echo number_format($sim09_2); ?>" disabled></td>
                    </tr>
                    <tr>
                        <th scope="row">10</th>
                        <td>งานบริการผู้ป่วยนอก/ใน กลุ่ม Miscellaneous systen</td>
                        <td>ICD10 A00-B99, E00-E89, C00-D89, P00-P96, Q00-Q99, R00-R99, Z00-Z99 (ทั้งในและนอกเวลาราชการ) นับเฉพาะตรวจโดยนักกายภาพบำบัด ****</td>
                        <td>จำนวน visits</td>
                        <td>นักกายภาพบำบัด</td>
                        <td><input type="text" class="form-control" placeholder="<?php echo number_format($sim10_1); ?> / <?php echo number_format($sim10_2); ?>" disabled></td>
                    </tr>
                    <tr>
                        <th scope="row">11</th>
                        <td>งานโลหิตวิทยา</td>
                        <td>จำนวนตรวจวิเคราะห์ที่ใช้เครื่องตรวจอัตโนมัติและ Manual ทั้งในและนอกเวลาราชการ/ นับ CBC เป็น 1 เทสต์ไม่แยกย่อย ส่วนการทดสอบอื่นๆ ให้นับเป็นเทสต์</td>
                        <td>จำนวนการทดสอบ (เทสต์)</td>
                        <td>นักเทคนิค/ นักวิทย์ (ธนาคารเลือด)/ จพ.วิทย์</td>
                        <td><input type="text" class="form-control" placeholder="<?php echo '-'; ?>" disabled></td>
                    </tr>
                    <tr>
                        <th scope="row">12</th>
                        <td>งานจุลทรรศน์ศาสตร์คลินิก</td>
                        <td>จำนวนตรวจวิเคราะห์ที่ใช้เครื่องตรวจอัตโนมัติและ Manual ทั้งในและนอกเวลาราชการ/ นับ UA เป็น 1 เทสต์ไม่แยกย่อย ส่วนการทดสอบอื่นๆ ให้นับเป็นเทสต์</td>
                        <td>จำนวนการทดสอบ (เทสต์)</td>
                        <td>นักเทคนิค/ นักวิทย์ (ธนาคารเลือด)/ จพ.วิทย์</td>
                        <td><input type="text" class="form-control" placeholder="<?php echo '-'; ?>" disabled></td>
                    </tr>
                    <tr>
                        <th scope="row">13</th>
                        <td>งานเคมีคลินิก</td>
                        <td>จำนวนตรวจวิเคราะห์ที่ใช้เครื่องตรวจอัตโนมัติและ Manual ทั้งในและนอกเวลาราชการ/แยกเป็นรายเทสต์ ไม่นับเป็นชุด</td>
                        <td>จำนวนการทดสอบ (เทสต์)</td>
                        <td>นักเทคนิค/ นักวิทย์ (ธนาคารเลือด)/ จพ.วิทย์</td>
                        <td><input type="text" class="form-control" placeholder="<?php echo '-'; ?>" disabled></td>
                    </tr>
                    <tr>
                        <th scope="row">14</th>
                        <td>งานภูมิคุ้มกันวิทยาคลินิก</td>
                        <td>จำนวนตรวจวิเคราะห์ที่ใช้เครื่องตรวจอัตโนมัติและ Manual ทั้งในและนอกเวลาราชการ/แยกเป็นรายเทสต์ ไม่นับเป็นชุด</td>
                        <td>จำนวนการทดสอบ (เทสต์)</td>
                        <td>นักเทคนิค/ นักวิทย์ (ธนาคารเลือด)/ จพ.วิทย์</td>
                        <td><input type="text" class="form-control" placeholder="<?php echo '-'; ?>" disabled></td>
                    </tr>
                    <tr>
                        <th scope="row">15</th>
                        <td>งานจุลชีววิทยาคลินิก</td>
                        <td>จำนวนตรวจวิเคราะห์ที่ใช้เครื่องตรวจอัตโนมัติและ Manual ทั้งในและนอกเวลาราชการ/แยกเป็นรายเทสต์ </td>
                        <td>จำนวนการทดสอบ (เทสต์)</td>
                        <td>นักเทคนิค/ นักวิทย์ (ธนาคารเลือด)/ จพ.วิทย์</td>
                        <td><input type="text" class="form-control" placeholder="<?php echo '-'; ?>" disabled></td>
                    </tr>
                    <tr>
                        <th scope="row">15</th>
                        <td>งานอณูชีวโมเลกุล</td>
                        <td>จำนวนตรวจวิเคราะห์ที่ใช้เครื่องตรวจอัตโนมัติและ manual  ทั้งในและนอกเวลาราชการ /แยกตามเทสต์ที่ตรวจ ไม่นับรวมการตรวจอณูชีวโมเลกุลชั้นสูง เช่น การตรวจยีนดื้อยาต่างๆ</td>
                        <td>จำนวนการทดสอบ (เทสต์)</td>
                        <td>นักเทคนิค/ นักวิทย์ (ธนาคารเลือด)/ จพ.วิทย์</td>
                        <td><input type="text" class="form-control" placeholder="<?php echo '-'; ?>" disabled></td>
                    </tr>
                </tbody>
            </table>
        </div>   
    </div>
</div>
<?= \bluezed\scrollTop\ScrollTop::widget() ?>