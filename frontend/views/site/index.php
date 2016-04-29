<?php

/* @var $this yii\web\View */

$this->title = 'Hospital Management Information Systems';
use yii\helpers\Html;
?>
<div class="bg-joe"></div>
<div class="jumbotron-joe">
    <h1>Hospital Management Information Systems</h1>
    <p class="lead">ระบบบริหารจัดการสารสนเทศสำหรับโรงพยาบาล</p>
</div>
<!-- row1 -->
<div class="row-fluid servive-block servive-block-in">
    <div class="row">
        <div class="col-sm-6 col-md-2">
            <div class="thumbnail center-block">
            <?php echo Html::a(Html::img(Yii::getAlias('@web') . '/images/ractie.png', ['alt' => 'some', 'class' => 'img-responsive']), ['/workmember/default']); ?>
                <div class="" align="center">
                    <span class="text-muted">บันทึกการปฏิบัติงาน</span>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-2">
            <div class="thumbnail center-block">
            <?php echo Html::a(Html::img(Yii::getAlias('@web') . '/images/report_online.png', ['alt' => 'some', 'class' => 'img-responsive']), ['/reportonline/default']); ?>
            <div class="" align="center">
                <span class="text-muted">ขอรายงานสาธารณสุข</span>
            </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-2">
            <div class="thumbnail center-block">
            <?php echo Html::a(Html::img(Yii::getAlias('@web') . '/images/meeting.png', ['alt' => 'some', 'class' => 'img-responsive']), ['meeting/default']); ?>
            <div class="" align="center">
                <span class="text-muted">จองห้องประชุมออนไลน์</span>
            </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-2">
            <div class="thumbnail center-block">
            <?php echo Html::a(Html::img(Yii::getAlias('@web') . '/images/car.png', ['alt' => 'some', 'class' => 'img-responsive']), ['car/default']); ?>
            <div class="" align="center">
                <span class="text-muted">ขอใช้รถยนต์ออนไลน์</span>
            </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-2">
            <div class="thumbnail center-block">
            <?php echo Html::a(Html::img(Yii::getAlias('@web') . '/images/repair.png', ['alt' => 'some', 'class' => 'img-responsive']), ['computer/default']); ?>
            <div class="" align="center">
                <span class="text-muted">แจ้งซ่อมคอมพิวเตอร์</span>
            </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-2">
            <div class="thumbnail center-block">
            <?php echo Html::a(Html::img(Yii::getAlias('@web') . '/images/document.png', ['alt' => 'some', 'class' => 'img-responsive']), ['document/default']); ?>
            <div class="" align="center">
                <span class="text-muted">ระบบเอกสารอิเล็กทรอนิกส์</span>
            </div>
            </div>
        </div>
    </div>
</div>

<!-- row2 -->
<div class="row-fluid servive-block servive-block-in">
    <div class="row">
        <div class="col-sm-6 col-md-2">
        <div class="thumbnail center-block">
            <?php echo Html::a(Html::img(Yii::getAlias('@web') . '/images/risk.png', ['alt' => 'some', 'class' => 'img-responsive']), ['rm/default']); ?>
            <div class="" align="center">
                <span class="text-muted">Risk Management</span>
            </div>
        </div>
        </div>
        <div class="col-sm-6 col-md-2">
            <div class="thumbnail center-block">
                <?php echo Html::a(Html::img(Yii::getAlias('@web') . '/images/rights.png', ['alt' => 'some', 'class' => 'img-responsive']), ['right/default']); ?>
                <div class="" align="center">
                    <span class="text-muted">ตรวจสอบสิทธิ OFC/LGO</span>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-2">
            <div class="thumbnail center-block">
                <?php echo Html::a(Html::img(Yii::getAlias('@web') . '/images/check.png', ['alt' => 'some', 'class' => 'img-responsive']), ['oppp/default']); ?>
                <div class="" align="center">
                    <span class="text-muted">ตรวจสอบ 43/50 แฟ้ม</span>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-2">
            <div class="thumbnail center-block">
                <?php echo Html::a(Html::img(Yii::getAlias('@web') . '/images/qof.png', ['alt' => 'some', 'class' => 'img-responsive']), ['qof/default']); ?>
                <div class="" align="center">
                    <span class="text-muted">ตัวชี้วัด QOF 2559</span>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-2">
            <div class="thumbnail center-block">
                <?php echo Html::a(Html::img(Yii::getAlias('@web') . '/images/sqlscript.png', ['alt' => 'some', 'class' => 'img-responsive']), ['sqlscript/default']); ?>
                <div class="" align="center">
                    <span class="text-muted">Report/SqlScript</span>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-2">
            <div class="thumbnail center-block">
                <?php echo Html::a(Html::img(Yii::getAlias('@web') . '/images/datawarning.png', ['alt' => 'some', 'class' => 'img-responsive']), ['hosxpwarning/default']); ?>
                <div class="" align="center">
                    <span class="text-muted">ตรวจสอบข้อมูล HOSxP</span>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- row3 -->
<div class="row-fluid servive-block servive-block-in">
    <div class="row">
        <div class="col-sm-6 col-md-2">
        <div class="thumbnail center-block">
            <?php echo Html::a(Html::img(Yii::getAlias('@web') . '/images/report.png', ['alt' => 'some', 'class' => 'img-responsive']), ['reporthosxp/default']); ?>
            <div class="" align="center">
                <span class="text-muted">Report HOSxP</span>
            </div>
        </div>
        </div>
        <div class="col-sm-6 col-md-2">
            <div class="thumbnail center-block">
                <?php echo Html::a(Html::img(Yii::getAlias('@web') . '/images/kpis.png', ['alt' => 'some', 'class' => 'img-responsive']), ['kpi/default']); ?>
                <div class="" align="center">
                    <span class="text-muted">ระบบรายงานตัวชี้วัด</span>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-2">
            <div class="thumbnail center-block">
                <?php echo Html::a(Html::img(Yii::getAlias('@web') . '/images/lab_store.png', ['alt' => 'some', 'class' => 'img-responsive']), ['labstore/default']); ?>
                <div class="" align="center">
                    <span class="text-muted">จัดเก็บใบแลป</span>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-2">
            <div class="thumbnail center-block">
                <?php echo Html::a(Html::img(Yii::getAlias('@web') . '/images/unitcost.png', ['alt' => 'some', 'class' => 'img-responsive']), ['unitcost/default']); ?>
                <div class="" align="center">
                    <span class="text-muted">บันทึกเกณฑ์การกระจาย</span>
                </div>
            </div>
        </div>
    </div>
</div>
<?= \bluezed\scrollTop\ScrollTop::widget() ?>


