<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use common\models\Appstore;
use kartik\widgets\FileInput;

/* @var $this yii\web\View */
/* @var $model common\models\Appstore */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="appstore-form">
    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data'] ]); ?>
    <div class="row">
        <div class="col-md-12 col-xs-12">
            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-12 col-xs-12">
            <?= $form->field($model, 'detail')->textarea(['rows' => 2]) ?>
        </div>
    </div>
    
    <div class="row">
         <div class="col-md-2 col-xs-12">
            <div class="well text-center">
                <?= Html::img($model->getPhotoViewer(), ['style' => 'width:100px;', 'class' => 'img-rounded']); ?>
            </div>
        </div>
        <div class="col-md-8 col-xs-12">
             <?= $form->field($model, 'img')->fileInput() ?>
            <p class="help-block">รองรับนามสกุล png,jpg ขนาดไฟล์ กว้าง:150px ,สูง:150px</p>
        </div>

        <div class="col-md-2 col-xs-12">
            <?= $form->field($model, 'status')->dropDownList($model->itemAlias('status')) ?>
        </div>
    </div>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'บันทึก' : 'ปรับปรุง', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
