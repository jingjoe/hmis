<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use kartik\date\DatePicker;
use yii\helpers\ArrayHelper;
use kartik\widgets\Select2;
use backend\models\Personal;
use dektrium\user\models\User;

/* @var $this yii\web\View */
/* @var $model frontend\modules\workrecord\models\Workrecord */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="workmember-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'detail')->textarea(['rows' => 6]) ?>

    <div class="row">
        <div class="col-md-4 col-xs-12">
            <?php
            echo '<label class="control-label">วันขอรายงาน</label>';
            echo DatePicker::widget([
                'model' => $model,
                'attribute' => 'order_date',
                'language' => 'th',
                'options' => ['placeholder' => 'ปี-เดือน-วัน'],
                'pluginOptions' => [
                    'todayHighlight' => true,
                    'todayBtn' => true,
                    'format' => 'yyyy-mm-dd',
                    'autoclose' => true,
                ]
            ]);
            ?>
        </div>
        <div class="col-md-4 col-xs-12">
            <?php
            echo '<label class="control-label">วันกำหนดส่ง</label>';
            echo DatePicker::widget([
                'model' => $model,
                'attribute' => 'defined_date',
                'language' => 'th',
                'options' => ['placeholder' => 'ปี-เดือน-วัน'],
                'pluginOptions' => [
                    'todayHighlight' => true,
                    'todayBtn' => true,
                    'format' => 'yyyy-mm-dd',
                    'autoclose' => true,
                ]
            ]);
            ?>
        </div>
        <div class="col-md-4 col-xs-12">
                <?=
    $form->field($model, 'assign_id')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Personal::find()->all(), 'id', 'fullname'),
        'options' => ['placeholder' => 'เลือก..'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);
    ?>
        </div>
      </div>

    <?=  $form->field($model, 'status_id')->hiddenInput(['value'=> 1])->label(false); ?>

    <div class="form-group">
        <?= Html::submitButton('<i class="glyphicon glyphicon-floppy-save"></i> ' . ($model->isNewRecord ? 'บันทึก' : 'แก้ไข'), ['class' => ($model->isNewRecord ? 'btn btn-success' : 'btn btn-primary') . ' btn-lg btn-block']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
