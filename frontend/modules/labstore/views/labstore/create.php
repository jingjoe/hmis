<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\modules\labstore\models\Labstore */

$this->title = 'สร้างไฟล์จัดเก็บใบแลป';
$this->params['breadcrumbs'][] = ['label' => 'จัดเก็บใบแลป', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="labstore-create">
    <div class="bg-success">
        <div class="panel-body">
            <h3><?= Html::encode($this->title) ?></h3>
        </div>
        <div class="panel-footer">
            <?=
            $this->render('_form', [
                'model' => $model,
            ])
            ?>
        </div>
    </div>
</div>



  
