<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\modules\sqlscript\models\Sqlscript */

$this->title = 'ปรับปรุงชุดคำสั้ง sql : ' . ' ' . $model->sql_name;
$this->params['breadcrumbs'][] = ['label' => 'ชุดคำสั่ง', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->sql_id, 'url' => ['view', 'id' => $model->sql_id]];
//$this->params['breadcrumbs'][] = 'Update';
?>
<div class="sqlscript-update">

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
