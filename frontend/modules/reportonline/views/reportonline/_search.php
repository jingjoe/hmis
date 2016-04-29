<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\modules\reportonline\models\ReportonlineSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="reportonline-search">

     <?php
    $form = ActiveForm::begin([
                'action' => ['index'],
                'method' => 'get',
    ]);
    ?>
    <?= $form->field($model, 'name')->textInput(array('placeholder' => 'ระบุชื่อรายงาน')); ?>
    <div class="form-group">
        <?= Html::submitButton('<i class="glyphicon glyphicon-search"></i> ค้นหา', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>


