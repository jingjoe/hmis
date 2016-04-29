<?php
$this->title = Yii::t('app', 'ระบบการจัดการความเสี่ยง');
$this->params['breadcrumbs'][] = 'ระบบการจัดการความเสี่ยง';

use kartik\grid\GridView;
use yii\helpers\Html;
use kartik\date\DatePicker;
use yii\bootstrap\ActiveForm;

?>
<div class="row row-offcanvas row-offcanvas-right">
    <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar">
        <div class="list-group">
            <a href="#" class="list-group-item active">เมนูหลัก</a>
            <a href="#" class="list-group-item">รายงานความเสี่ยง</a>
            <a href="#" class="list-group-item">ลงทะเบียนความเสี่ยง</a>
            <a href="#" class="list-group-item">ทบทวนความเสี่ยง</a>
            <a href="#" class="list-group-item">รายงาน</a>
            <a href="#" class="list-group-item">ช่วยเหลือ</a>
        </div>
    </div><!--/.sidebar-offcanvas-->

    <div class="col-xs-12 col-sm-9">
        <p class="pull-right visible-xs">
            <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">Toggle nav</button>
        </p>

        <div class="row">
            <div class="jumbotron">
                <h1>Hello, world!</h1>
                <p>...</p>
                <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a></p>
            </div>
        </div><!--/row-->
    </div><!--/.col-xs-12.col-sm-9-->
</div><!--/row-->


    

