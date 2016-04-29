<?php
$this->title = Yii::t('app', 'ตรวจสอบแฟ้ม person');
$this->params['breadcrumbs'][] = ['label' => 'ตรวจสอบ 43 แฟ้ม', 'url' => ['oppp/index']];
$this->params['breadcrumbs'][] = 'ตรวจสอบแฟ้ม person';

use yii\helpers\Html;
?>
<div class="panel panel-primary">
    <div class="panel-heading">   <h4><font color="#FFFF00">ตรวจสอบ แฟ้ม PERSON และ PATIENT</font></h4></font></h4>
        <h6><p><font color="#FFFFFF">ข้อมูลทั่วไปของประชาชนในเขตรับผิดชอบและผู้ที่มาใช้บริการ ประกอบด้วย (1. ประชาชนทุกคนที่อาศัยในเขตรับผิดชอบ,2.ประชาชนทุกคนที่มีชื่ออยู่ในทะเบียนบ้านในเขตรับผิดชอบ 3.ผู้มารับบริการที่อาศัยอยู่นอกเขตรับผิดชอบ)  เขตรับผิดชอบ ในส่วนของโรงพยาบาล หมายถึง ตำบลที่ตั้งของโรงพยาบาล หรือพื้นที่รับผิดชอบในส่วนของบริการระดับปฐมภูมิ
                เก็บข้อมูลโดยการสำรวจ  กำหนดให้ทำการสำรวจปีละ 1  ครั้ง ภายในเดือนสิงหาคม  และปรับฐานข้อมูลให้แล้วเสร็จภายในวันที่  1 ตุลาคม ของทุกปี</font></p></h6>
    </div>
</div>
<?php echo Html::a('PERSON', ['person/index1'], ['class' => 'btn btn-warning']); ?>  
<?php echo Html::a('PATIENT', ['person/index2'], ['class' => 'btn btn-warning']); ?> <br>

