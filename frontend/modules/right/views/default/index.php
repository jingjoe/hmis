<?php
$this->title = Yii::t('app', 'ขึ้นทะเบียนผู้มีสิทธิ');
$this->params['breadcrumbs'][] = 'ขึ้นทะเบียนผู้มีสิทธิ';

use kartik\grid\GridView;
use yii\helpers\Html;
use kartik\date\DatePicker;
use yii\bootstrap\ActiveForm;
?>
<div class="row">
    <div class="col-md-2 col-sm-4 sidebar-offcanvas">
        <div class="list-group">
            <a href="#" class="list-group-item active"></a>
            <?= Html::a('ลงทะเบียนผู้มิสิทธิ', ['right/index'], ['class' => 'list-group-item']) ?>
            <?= Html::a('เพิ่มสิทธิการรักษา', ['right/pttype'], ['class' => 'list-group-item']) ?>
        </div>
    </div>
    <div class="col-md-10 col-sm-8">

                <div class="input-group input-group-sm">
                    <input type="text" name="search" id="search" class="form-control" placeholder="ระบุเลข 13 หลัก..">
                    <span class="input-group-btn">
                        <button class="btn btn-info btn-flat" type="submit">ค้นหา</button>
                    </span>
                </div>
  
</div>



