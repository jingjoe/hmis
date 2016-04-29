<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use frontend\modules\right\models\Pttype;
use yii\helpers\ArrayHelper;
use kartik\widgets\Select2

/* @var $this yii\web\View */
/* @var $model frontend\modules\right\models\Right */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="right-form">

    <?php $form = ActiveForm::begin(); ?>
<!-- row1 -->
    <div class="row">
        <div class="col-md-2 col-xs-12">
            <?= $form->field($model, 'hn')->textInput(['maxlength' => 7]) ?>
        </div>
        <div class="col-md-3 col-xs-12">
            <?= $form->field($model, 'cid')->widget(\yii\widgets\MaskedInput::className(), ['mask' => '9-9999-99999-99-9']) ?>
        </div>
        <div class="col-md-7 col-xs-12">
             <?= $form->field($model, 'fullname')->textInput(['maxlength' => 100]) ?>
        </div>
    </div>
<!-- row2 -->
    <div class="row">
        <div class="col-md-3 col-xs-12">
        <?php
        echo '<label class="control-label">วันขึ้นทะเบียน</label>';
        echo DatePicker::widget([
            'model' => $model, 
            'attribute' => 'regdate',
            'language' => 'th',
            'options' => ['placeholder' => 'วันขึ้นทะเบียน'],
            'pluginOptions' => [
                'todayHighlight' => true,
                'todayBtn' => true,
                'format' => 'yyyy-mm-dd',
                'autoclose' => true,

            ]
            ]);
        ?>
        </div>
        <div class="col-md-3 col-xs-12">
        <?php
        echo '<label class="control-label">วันใช้สิทธิ</label>';
        echo DatePicker::widget([
            'model' => $model, 
            'attribute' => 'dateaffect',
            'language' => 'th',
            'options' => ['placeholder' => 'วันใช้สิทธิ'],
            'pluginOptions' => [
                'todayHighlight' => true,
                'todayBtn' => true,
                'format' => 'yyyy-mm-dd',
                'autoclose' => true,

            ]
            ]);
        ?>
        </div>
        <div class="col-md-6 col-xs-12">
            <?= $form->field($model, 'pttype_id')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(Pttype::find()->all(),'pttype_id','pttype_name'),
                'options' => ['placeholder' => 'กรุณาเลือกสิทธิ'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]);
            ?>
        </div>
    </div>
     
    <div class="form-group">
        <?= Html::submitButton('<i class="glyphicon glyphicon-floppy-save"></i> ' . ($model->isNewRecord ? 'บันทึก' : 'แก้ไข'), ['class' => ($model->isNewRecord ? 'btn btn-success' : 'btn btn-primary') . ' btn-lg btn-block']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
