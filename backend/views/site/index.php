<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
$this->title = 'ตั้งค่าระบบ : setting-hmis';
?>
<div class="site-index">
    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
 <!--row1 -->
 <div class="panel panel-default">
     <div class="panel-heading" role="tab" id="heading1">
         <h4 class="panel-title">
             <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse1" aria-expanded="true" aria-controls="collapse1">
                <span class="glyphicon glyphicon-cog" aria-hidden="true">จัดการระบบ</span>
             </a>
         </h4>
     </div>

     <div id="collapse1" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading1">
         <div class="panel-body">

             <div class="row">
                <div class="col-sm-6 col-md-2">
                     <div class="thumbnail center-block">
                         <?php echo Html::a(Html::img(Yii::getAlias('@web') . '/images/user.png', ['alt' => 'some', 'class' => 'img-responsive']), ['/user/admin/index']); ?>
                         <div class="" align="center">
                             <span class="text-muted">จัดการผู้ใช้งานระบบ</span>
                         </div>
                     </div>
                </div>
                 
                <div class="col-sm-6 col-md-2">
                     <div class="thumbnail center-block">
                         <?php echo Html::a(Html::img(Yii::getAlias('@web') . '/images/permission.png', ['alt' => 'some', 'class' => 'img-responsive']), ['/admin']); ?>
                         <div class="" align="center">
                             <span class="text-muted">กำหนดสิทธิการใช้งาน</span>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>

 <!--row2 -->
       <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="heading2">
                <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse2" aria-expanded="false" aria-controls="collapse2">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true">จัดการข้อมูลพื้นฐานของหน่วยงาน</span>
                    </a>
                </h4>
            </div>

            <div id="collapse2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading2">
                <div class="panel-body">

                  <div class="row">
                        <div class="col-sm-6 col-md-2">
                            <div class="thumbnail center-block">
                                <?php echo Html::a(Html::img(Yii::getAlias('@web') . '/images/appstore.png', ['alt' => 'some', 'class' => 'img-responsive']), ['appstore/index']); ?>
                                <div class="" align="center">
                                    <span class="text-muted">บันทึกโปรแกรม Appstore</span>
                                </div>
                        </div>
                        </div>
                        <div class="col-sm-6 col-md-2">
                            <div class="thumbnail center-block">
                                <?php echo Html::a(Html::img(Yii::getAlias('@web') . '/images/hospital.png', ['alt' => 'some', 'class' => 'img-responsive']), ['hospital/index']); ?>
                                <div class="" align="center">
                                    <span class="text-muted">บันทึกชื่อหน่วยงาน</span>
                                </div>

                        </div>
                        </div>
                        <div class="col-sm-6 col-md-2">
                            <div class="thumbnail center-block">
                                <?php echo Html::a(Html::img(Yii::getAlias('@web') . '/images/department.png', ['alt' => 'some', 'class' => 'img-responsive']), ['department/index']); ?>
                                <div class="" align="center">
                                    <span class="text-muted">บันทึกฝ่ายและแผนก</span>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
 
 
 
 
  <!--row3 -->
        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="heading3">
                <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse3" aria-expanded="false" aria-controls="collapse3">
                       <span class="glyphicon glyphicon-th-list" aria-hidden="true">จัดการบุคลากร</span>
                    </a>
                </h4>
            </div>

            <div id="collapse3" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading3">
                <div class="panel-body">

                    <div class="row">
                        <div class="col-sm-6 col-md-2">
                            <div class="thumbnail center-block">
                                <?php echo Html::a(Html::img(Yii::getAlias('@web') . '/images/personal.png', ['alt' => 'some', 'class' => 'img-responsive']), ['personal/index']); ?>
                                <div class="" align="center">
                                    <span class="text-muted">บันทึกข้อมูลบุคลากร</span>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
<!--row4 -->
        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="heading4">
                <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse4" aria-expanded="false" aria-controls="collapse4">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true">จัดการวัสดุและครุภัณฑ์</span>
                    </a>
                </h4>
            </div>
            <div id="collapse4" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading4">
                <div class="panel-body">

                </div>
            </div>
        </div>

    </div>
</div>
