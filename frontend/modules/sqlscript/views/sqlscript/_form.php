<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\widgets\Select2;

// add upload
use yii\helpers\Url;
use kartik\widgets\TypeaheadBasic;
use kartik\widgets\FileInput;
use yii\helpers\VarDumper;
use frontend\modules\sqlscript\models\Program;

/* @var $this yii\web\View */
/* @var $model frontend\modules\sqlscript\models\Sqlscript */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sqlscript-form">
    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
    <div class="row">
        <div class="col-md-2 col-xs-12">
            <?=
            $form->field($model, 'program_id')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(Program::find()->all(), 'program_id', 'program_name'),
                'options' => ['placeholder' => 'เลือก..'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]);
            ?>
        </div>
        <div class="col-md-10 col-xs-12">
            <?= $form->field($model, 'sql_name')->textInput(['maxlength' => true]) ?>
        </div>

    </div>

    <?= $form->field($model, 'sql_script')->textarea(['rows' => 10]) ?>
    <div class="row">
        <div class="col-md-12 col-xs-12">
            <?=
            $form->field($model, 'files')->widget(FileInput::classname(), [
                //'options' => ['accept' => 'image/*'],
                'pluginOptions' => [
                    'initialPreview' => empty($model->files) ? [] : [
                        Yii::getAlias('@web') . '/sqlscript/' . $model->files,
                            ],
                    'allowedFileExtensions' => ['pdf','cds','txt','sql'],
                    'showPreview' => false,
                    'showCaption' => true,
                    'showRemove' => true,
                    'showUpload' => false
                ]
            ]);
            ?>
            <p class="help-block">รองรับนามสกุล cds,txt,sql,pdf ขนาดไฟล์ไม่เกิน 10 Mb</p>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton('<i class="glyphicon glyphicon-save"></i> ' . ($model->isNewRecord ? 'บันทึก' : 'ปรับปรุง'), ['class' => ($model->isNewRecord ? 'btn btn-success' : 'btn btn-primary') . ' btn-lg btn-block']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div>
