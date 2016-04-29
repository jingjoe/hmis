<?php
$this->title = Yii::t('app', 'ตรวจสอบแฟ้ม labor');
$this->params['breadcrumbs'][] = ['label' => 'ตรวจสอบ 43 แฟ้ม', 'url' => ['oppp/index']];
$this->params['breadcrumbs'][] = 'ตรวจสอบกลุ่มแฟ้ม labor';

use yii\helpers\Html;
?>
<div class="panel panel-primary">
    <div class="panel-heading">   <h4><font color="#FFFF00">ตรวจสอบ แฟ้ม LABOR</font></h4></font></h4>
        <h6><p><font color="#FFFFFF">ข้อมูลประวัติการคลอด ของหญิงคลอดในเขตรับผิดชอบ และหญิงคลอดผ้มูารับบริการ ประกอบด้วย 1) หญิงตั้งครรภ์ที่คลอดทุกคนที่อาศัยอยู่ในเขตรับผิดชอบ
        2) หญิงตั้งครรภ์ที่คลอดที่อาศัยอยู่นอกเขตรับผิดชอบ ที่มาใช้บริการคลอด เป็นแฟ้มสะสมการจัดสง่ ข้อมูลให้ส่วนกลาง ให้ส่งครั้งเดียวเมื่อมีการจัดเก็บข้อมูลครบทุกกิจกรรมในแฟ้ม</font></p></h6>
    </div>
</div>
<?php echo Html::a('ตรวจสอบบัญชี 2', ['labor/labor1'], ['class' => 'btn btn-warning']); ?>  
<?php echo Html::a('ตรวจสอบทะเบียนคลอด', ['labor/labor2'], ['class' => 'btn btn-warning']); ?> <br>
