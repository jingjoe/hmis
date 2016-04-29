<?php

use yii\helpers\Html;
use yii\helpers\VarDumper;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use yii\helpers\ArrayHelper;
use kartik\widgets\Select2;
use kartik\widgets\DepDrop;
use kartik\widgets\FileInput;

use backend\models\Pname;
use backend\models\Sex;
use backend\models\Religion;
use backend\models\Bloodgroup;
use backend\models\Marrystatus;
use backend\models\Position;
use backend\models\Persontype;
use backend\models\Education;
use backend\models\Department;
use backend\models\DepartmentGroup;

/* @var $this yii\web\View */
/* @var $model backend\models\Personal */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="personal-form">
    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data'] ]); ?>
<!--row1 -->    
    <div class="row">
        <div class="col-md-2 col-xs-12">
            <?= $form->field($model, 'pid')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-2 col-xs-12">
            <?= $form->field($model, 'cid')->widget(\yii\widgets\MaskedInput::className(), ['mask' => '9-9999-99999-99-9']) ?>
        </div>
        <div class="col-md-2 col-xs-12">
            <?=
            $form->field($model, 'pname_id')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(Pname::find()->all(), 'pname_id', 'pname_name'),
                'options' => ['placeholder' => 'เลือกคำนำหน้า'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]);
            ?>
        </div>
        <div class="col-md-2 col-xs-12">
            <?= $form->field($model, 'fname')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-3 col-xs-12">
            <?= $form->field($model, 'lname')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-1 col-xs-12">
            <?= $form->field($model, 'nickname')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

<!--row2 -->
    <div class="row">
        <div class="col-md-2 col-xs-12">
            <?=
            $form->field($model, 'sex_id')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(Sex::find()->all(), 'sex_id', 'sex_name'),
                'options' => ['placeholder' => 'เลือกเพศ'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]);
            ?>
        </div>
        <div class="col-md-3 col-xs-12">
            <?php
            echo '<label class="control-label">วันเกิด</label>';
            echo DatePicker::widget([
                'model' => $model,
                'attribute' => 'birthdate',
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
        <div class="col-md-1 col-xs-12">
            <?= $form->field($model, 'age')->textInput(['maxlength' => true]) ?>
        </div>

        <div class="col-md-2 col-xs-12">
            <?=
            $form->field($model, 'religion_id')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(Religion::find()->all(), 'religion_id', 'religion_name'),
                'options' => ['placeholder' => 'เลือกศาสนา'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]);
            ?>
        </div>
        <div class="col-md-2 col-xs-12">
            <?=
            $form->field($model, 'bloodgroup_id')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(Bloodgroup::find()->all(), 'bloodgroup_id', 'bloodgroup_name'),
                'options' => ['placeholder' => 'เลือกกรุ๊ปเลือด'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]);
            ?>
        </div>
        <div class="col-md-2 col-xs-12">
            <?=
            $form->field($model, 'marrystatus_id')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(Marrystatus::find()->all(), 'marrystatus_id', 'marrystatus_name'),
                'options' => ['placeholder' => 'เลือกสถานภาพ'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]);
            ?>
        </div>

    </div>
<!--row3 -->
            <?= $form->field($model, 'address1')->textarea(['rows' => 2]) ?>
<!--row4 -->
            <?= $form->field($model, 'address2')->textarea(['rows' => 2]) ?>
<!--row5 -->    
    <div class="row">
        <div class="col-md-2 col-xs-12">
            <?= $form->field($model, 'phone')->widget(\yii\widgets\MaskedInput::className(), ['mask' => '999-9999999',]) ?>
        </div>
        <div class="col-md-3 col-xs-12">
            <?=
            $form->field($model, 'email')->widget(\yii\widgets\MaskedInput::className(), [
                'name' => 'input-36',
                'clientOptions' => [
                    'alias' => 'email',
                ],
            ])
            ?>
        </div>
        <div class="col-md-3 col-xs-12">
            <?= $form->field($model, 'line')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-4 col-xs-12">
            <?= $form->field($model, 'facebook')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
<!--row6 -->
            <?= $form->field($model, 'skill')->textarea(['rows' => 2]) ?>

<!--row7 -->
    <div class="row">
        <div class="col-md-3 col-xs-12">
            <?= $form->field($model, 'education_id')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(Education::find()->all(), 'education_id', 'education_name'),
                'options' => ['placeholder' => 'เลือกระดับการศึกษา'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]);
            ?>
        </div>
        <div class="col-md-3 col-xs-12">
            <?php
            echo '<label class="control-label">วันเข้าทำงาน</label>';
            echo DatePicker::widget([
                'model' => $model,
                'attribute' => 'startwork_date',
                'language' => 'th',
                'options' => ['placeholder' => 'วันเข้าทำงาน'],
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
            <?= $form->field($model, 'position_id')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(Position::find()->all(), 'position_id', 'position_name'),
                'options' => ['placeholder' => 'เลือกตำแหน่ง'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]);
            ?>
        </div>
        <div class="col-md-2 col-xs-12">
            <?= $form->field($model, 'salary')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
<!--row8 -->
    <div class="row">
        <!-----------------Start DepDrop แผนก---------------->
        <div class="col-md-5 col-xs-12">
            <?=
            $form->field($model, 'depart_group_id')->dropdownList(
                    ArrayHelper::map(DepartmentGroup::find()->all(), 'depart_group_id', 'depart_group_name'), [
                'id' => 'ddl-departgroup',
                'prompt' => 'เลือกฝ่าย'
                    ]
            );
            ?>
        </div>

        <div class="col-md-5 col-xs-12">
            <?= $form->field($model, 'depart_id')->widget(DepDrop::classname(), [
                'options' => ['id' => 'ddl-depart'],
                'data' => [],
                //'data' => $dep,
                'type' => DepDrop::TYPE_SELECT2,
                'pluginOptions' => [
                    'depends' => ['ddl-departgroup'],
                    'placeholder' => 'เลือกแผนก',
                    'url' => Url::to(['/personal/get-depart'])
                ]
            ]);
            ?>
        </div>
        <div class="col-md-2 col-xs-12">
            <?= $form->field($model, 'persontype_id')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(Persontype::find()->all(), 'persontype_id', 'persontype_name'),
                'options' => ['placeholder' => 'เลือกสถานะ'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]);
            ?>
        </div>
    </div>
    <!-----------------End DepDrop แผนก---------------->   
    <div class="row">
        <div class="col-md-2 col-xs-12">
            <div class="well text-center">
                <?= Html::img($model->getPhotoViewer(), ['style' => 'width:100px;', 'class' => 'img-rounded']); ?>
            </div>
        </div>
        <div class="col-md-10 col-xs-12">
            <?= $form->field($model, 'img')->fileInput() ?>
            <p class="help-block">รองรับนามสกุล png,jpg ขนาดไฟล์ กว้าง:150px ,สูง:150px</p>
        </div>
    </div>


    <div class="form-group">
<?= Html::submitButton($model->isNewRecord ? 'บันทึก' : 'ปรับปรุง', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

<?php ActiveForm::end(); ?>

</div>
<?= \bluezed\scrollTop\ScrollTop::widget() ?>