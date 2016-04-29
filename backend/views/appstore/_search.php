<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\AppstoreSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="appstore-search">
    <?php
    $form = ActiveForm::begin([
                'action' => ['index'],
                'method' => 'get',
    ]);
    ?>
    <?= $form->field($model, 'name')->textInput(array('placeholder' => 'ระบุชื่อโปรแกรม')); ?>
    <div class="form-group">
    <?= Html::submitButton('ค้นหา', ['class' => 'btn btn-primary']) ?>
    </div>
 
    <?php ActiveForm::end(); ?>
</div>
