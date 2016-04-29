<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Personal */

$this->title = 'บันทึกบุคลากร';
$this->params['breadcrumbs'][] = ['label' => 'บุคลากร', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="personal-create">
    <div class="panel panel-info">
        <div class="panel-body">
            <h2><?= Html::encode($this->title) ?></h2>
            <div class="pull-right"><span class="label label-warning">เลขทะเบียนบุคคลล่าสุด : 001</span></div>
        </div>
        <div class="panel-footer">
            <?=
            $this->render('_form', [
                'model' => $model,
               // 'dep '=> $dep
            ])
            ?>
        </div>
    </div>
</div>
