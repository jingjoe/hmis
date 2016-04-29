<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\widgets\Select2;

// Add upload
use yii\helpers\Url;
use kartik\widgets\TypeaheadBasic;
use kartik\widgets\FileInput;
use yii\helpers\VarDumper;
use frontend\modules\labstore\models\Labgroup;

/* @var $this yii\web\View */
/* @var $model frontend\modules\labstore\models\Labstore */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sqlscript-form">
    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
    <div class="row">
        <div class="col-md-2 col-xs-12">
            <?= $form->field($model, 'hn')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-2 col-xs-12">
            <?= $form->field($model, 'lab_number')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-2 col-xs-12">
            <?=
            $form->field($model, 'lab_group_id')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(Labgroup::find()->all(), 'lab_group_id', 'lab_group_name'),
                'options' => ['placeholder' => 'เลือก..'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]);
            ?>
        </div>
        <div class="col-md-6 col-xs-12">
            <?= $form->field($model, 'note')->textInput(['maxlength' => true]) ?>
        </div>

    </div>
    <div class="row">
        <div class="col-md-12 col-xs-12">
            <?=
            $form->field($model, 'file')->widget(FileInput::classname(), [
                //'options' => ['accept' => 'image/*'],
                'pluginOptions' => [
                    'initialPreview' => empty($model->file) ? [] : [
                        Yii::getAlias('@web') . '/labstore/' . $model->file,
                            ],
                    'allowedFileExtensions' => ['pdf'],
                    'showPreview' => false,
                    'showCaption' => true,
                    'showRemove' => true,
                    'showUpload' => false
                ]
            ]);
            ?>
            <p class="help-block"> กฎการตั้งชื่อ ไฟล์ต้องเป็นภาษาอังกฤษตัวพิมพ์เล็กผสมตัวเลขเท่านั้น รูปแบบ : lab_hn_labordernumber ( HN เป็นเลข 7 หลัก , LABORDER NUMBER เป็นเลขที่สั่งแลป )
                                   ตั้งชื่อไฟล์ ตามรูปแบบที่กำหนด (เช่น lab_0000001_1234) รองรับนามสกุล pdf ขนาดไม่เกิน 1 MB </p>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton('<i class="glyphicon glyphicon-save"></i> ' . ($model->isNewRecord ? 'จัดเก็บไฟล์' : 'ปรับปรุง'), ['class' => ($model->isNewRecord ? 'btn btn-success' : 'btn btn-primary') . ' btn-lg btn-block']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div>


