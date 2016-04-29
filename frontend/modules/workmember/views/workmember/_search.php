<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\modules\workrecord\models\WorkrecordSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="workmember-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>
    <div class="form-group">
         <?= $form->field($model, 'globalSearch')->textInput(array('placeholder' => 'ระบุคำค้นหา')); ?>

    </div>
    <div class="form-group">
        <?= Html::submitButton('<i class="glyphicon glyphicon-search"></i> ค้นหา', ['class' => 'btn btn-primary']) ?>  </li> 
    </div>    
    

    <?php ActiveForm::end(); ?>

</div>
