<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\VarDumper;
use yii\helpers\Url;
use kartik\date\DatePicker;
use yii\helpers\ArrayHelper;
use kartik\widgets\Select2;
use kartik\widgets\FileInput;
use kartik\widgets\DepDrop;
// ลิงค์โมดูล dropdownlist
use frontend\modules\reportonline\models\Link;
use frontend\modules\reportonline\models\ReportStatus;
use frontend\modules\reportonline\models\ReportType;
use backend\models\Pname;
use backend\models\Department;
use backend\models\DepartmentGroup;
use backend\models\Personal;
use dektrium\user\models\User;

/* @var $this yii\web\View */
/* @var $model frontend\modules\reportonline\models\Reportonline */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="reportonline-form">

<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?> 
    <div class="row">
        <div class="col-md-3 col-xs-12">
    <?=
    $form->field($model, 'personal_id')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Personal::find()->all(), 'id', 'fullname'),
        'options' => ['placeholder' => 'เลือก..','disabled'=> 'True'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);
    ?>
        </div>
        <div class="col-md-4 col-xs-12">
            <?=
            $form->field($model, 'depart_group_id')->dropdownList(ArrayHelper::map(DepartmentGroup::find()->all(), 'depart_group_id', 'depart_group_name'), 
                [
                'disabled' => True,
                'id' => 'ddl-departgroup',
                'prompt' => 'เลือกฝ่าย'
                ]
            );
            ?>
        </div>

        <div class="col-md-5 col-xs-12">
<?=
$form->field($model, 'depart_id')->widget(DepDrop::classname(), [
    'options' => ['id' => 'ddl-depart'],
    'data' => [],
    //'data' => $dep,
    'type' => DepDrop::TYPE_SELECT2,
    'pluginOptions' => [
        'depends' => ['ddl-departgroup'],
        'placeholder' => 'เลือกแผนก','disabled'=> 'True',
        'url' => Url::to(['/reportonline/reportonline/get-depart'])
    ]
]);
?>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-3 col-xs-12">
<?=
$form->field($model, 'reporttype_id')->widget(Select2::classname(), [
    'data' => ArrayHelper::map(ReportType::find()->all(), 'reporttype_id', 'reporttype_name'),
    'options' => ['placeholder' => 'เลือก..','disabled'=> 'True'],
    'pluginOptions' => [
        'allowClear' => true
    ],
]);
?>
        </div>
        <div class="col-md-9 col-xs-12">
<?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

<?= $form->field($model, 'details')->textarea(['rows' => 6]) ?>

    <?=
    $form->field($model, 'image[]')->widget(FileInput::classname(), [
        'options' => [
            'accept' => 'image/*',
            'multiple' => true,
            'disabled'=> True
        ],
        'pluginOptions' => [
            'initialPreview' => empty($model->image) ? [] : [
                Yii::getAlias('@web') . '/reportonline/' . $model->image,
                    ],
            'allowedFileExtensions' => ['gif', 'jpg', 'png'],
            'showPreview' => true,
            'showCaption' => true,
            'showRemove' => true,
            'showUpload' => false
        ]
    ]);
    ?>

    <?=
    $form->field($model, 'files')->widget(FileInput::classname(), [
        'options' => [
           'disabled'=> True
        ],
        'pluginOptions' => [
            'initialPreview' => empty($model->files) ? [] : [
                Yii::getAlias('@web') . '/reportonline/' . $model->files,
            ],
            'allowedFileExtensions' => ['pdf', 'doc', 'docx', 'xls', 'xlsx', 'ppt', 'pptx', 'rar', 'zip'],
            'showPreview' => false,
            'showCaption' => true,
            'showRemove' => true,
            'showUpload' => false
        ]
    ]);
    ?>

    <p>รองรับไฟล์นามสกุล 'pdf','doc','docx','xls','xlsx','ppt','pptx','rar','zip' ขนาดไฟล์ไม่เกิน 5 MB</p>

    <div class="row">
        <div class="col-md-3 col-xs-12">
            <?php
            echo '<label class="control-label">วันขอรายงาน</label>';
            echo DatePicker::widget([
                'model' => $model,
                'attribute' => 'order_date',
                'language' => 'th',
                'options' => ['placeholder' => 'ปี-เดือน-วัน','disabled'=> 'True'],
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
            echo '<label class="control-label">วันกำหนดส่ง</label>';
            echo DatePicker::widget([
                'model' => $model,
                'attribute' => 'defined_date',
                'language' => 'th',
                'options' => ['placeholder' => 'ปี-เดือน-วัน','disabled'=> 'True'],
                'pluginOptions' => [
                    'todayHighlight' => true,
                    'todayBtn' => true,
                    'format' => 'yyyy-mm-dd',
                    'autoclose' => true,
                ]
            ]);
            ?>
        </div>
        <div class="col-md-2 col-xs-12">
            <?= $form->field($model, 'unit')->textInput(['maxlength' => true,'disabled'=> True]) ?>
        </div>
        <div class="col-md-4 col-xs-12">
            <?=
            $form->field($model, 'link_id')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(Link::find()->all(), 'link_id', 'link_name'),
                'options' => ['placeholder' => 'เลือก..','disabled'=> 'True'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]);
            ?>
        </div>
    </div> 	
    <div class="row">
        <div class="col-md-6 col-xs-12">

            <?php
            echo '<label class="control-label">วันแล้วเสร็จ</label>';
            echo DatePicker::widget([
                'model' => $model,
                'attribute' => 'finish_date',
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
         <div class="col-md-6 col-xs-12">

            <?=
            $form->field($model, 'report_status_id')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(ReportStatus::find()->all(), 'report_status_id', 'report_status_name'),
                'options' => ['placeholder' => 'เลือก..'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]);
            ?>
        </div>

    </div>
     
<div class="form-group">
        <?= Html::submitButton('<i class="glyphicon glyphicon-ok"></i> ' . ($model->isNewRecord ? 'บันทึก' : 'ลงรับ'), ['class' => ($model->isNewRecord ? 'btn btn-success' : 'btn btn-primary') . ' btn-lg btn-block']) ?>
    </div>
<?php ActiveForm::end(); ?>

</div>
<?= \bluezed\scrollTop\ScrollTop::widget() ?>