<?php
use yii\helpers\Html;

$this->title = Yii::t('app', 'รายงานจากฐาน HOSxP');
$this->params['breadcrumbs'][] = 'รายงานสำหรับสนับสนุนการบริหารจัดการทางด้านสาธารณสุข จากฐาน HOSxP';
?>

<div class="panel panel panel-primary">
    <div class="panel-heading"><h3 class="panel-title"><i class="glyphicon glyphicon-signal"></i> รายงานสำหรับสนับสนุนการบริหารจัดการทางด้านสาธารณสุข จากฐาน HOSxP </h3></div>
    <div class="panel-body">
        <div class="well well-sm">
            <?= Html::a('<i class="glyphicon glyphicon-minus"></i> รายงานจำนวนผู้มารับบริการแยกตามแผนก', ['/reporthosxp/reporthosxp/rep1']); ?> <br>
            <?= Html::a('<i class="glyphicon glyphicon-minus"></i> รายงานจำนวนครั้งผู้ป่วยรับบริการทั่วไปจำแนกสิทธิและค่าใช้จ่าย', ['/reporthosxp/reporthosxp/rep2']); ?>  <br>
            <?= Html::a('<i class="glyphicon glyphicon-minus"></i> รายงานอันดับโรคผู้ป่วย OPD ตามรหัสโรค ICD-10', ['/reporthosxp/reporthosxp/rep3']); ?>  <br>
            <?= Html::a('<i class="glyphicon glyphicon-minus"></i> รายงานอันดับโรคผู้ป่วย IPD ตามรหัสโรค ICD-10', ['/reporthosxp/reporthosxp/rep4']); ?>  <br>
            <?= Html::a('<i class="glyphicon glyphicon-minus"></i> รายจำนวนประชากรในเขตพื้นที่รับผิดชอบจำแนกตามสถานะการอยู่อาศัย TYPEAREA 1-5', ['/reporthosxp/reporthosxp/rep5']); ?>  <br>
            <?= Html::a('<i class="glyphicon glyphicon-minus"></i> รายงานจำนวนผู้ป่วยโรคเรื้อรังที่ขึ้นทะเบียนคลินิกของหน่วยบริการ(OPD) ตามรหัสโรค ICD-10 อ้างอิงกลุ่มโรคตาม สปสช.', ['/reporthosxp/reporthosxp/rep6']); ?>  <br>
            <?= Html::a('<i class="glyphicon glyphicon-minus"></i> รายงานจำนวนผู้ป่วยโรคเรื้อรังที่ขึ้นทะเบียนโรงเรื้อรังงานส่งเสริม(PCU) ตามรหัสโรค ICD-10 อ้างอิงกลุ่มโรคตาม สปสช.', ['/reporthosxp/reporthosxp/rep7']); ?>  <br>
            <?= Html::a('<i class="glyphicon glyphicon-minus"></i> รายงานข้อมูลโรงพยาบาลเพื่อเตรียมคำนวณอัตรากำลังคนในตาราง SIMULATION แยกตามปีงบประมาณ ', ['/reporthosxp/reporthosxp/rep8']); ?>  <br>
            <?= Html::a('<i class="glyphicon glyphicon-minus"></i> รายงานจำนวนผู้มารับบริการแยกผู้ป่วย OPD/IPD ตามปีงบประมาณ', ['/reporthosxp/reporthosxp/rep9']); ?>  <br>
            <?= Html::a('<i class="glyphicon glyphicon-minus"></i> รายงานจำนวนประชากรในเขตรับผิดชอบแยกตามหมู่บ้าน', ['/reporthosxp/reporthosxp/rep10']); ?>  <br>
        </div>
    </div>
</div>
<?= \bluezed\scrollTop\ScrollTop::widget() ?>