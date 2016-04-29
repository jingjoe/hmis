<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\PersonalSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="personal-search">
    <?php
    $form = ActiveForm::begin([
                'action' => ['index'],
                'method' => 'get',
    ]);
    ?>
    <?= $form->field($model, 'cid')->widget(\yii\widgets\MaskedInput::className(), ['mask' => '9-9999-99999-99-9',]) ?>
    <div class="form-group">
    <?= Html::submitButton('ค้นหา', ['class' => 'btn btn-primary']) ?>
    </div>
 
    <?php ActiveForm::end(); ?>
</div>
 