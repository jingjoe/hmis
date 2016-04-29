<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Appstore */

$this->title = 'ปรับปรุงโปรแกรม : ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'คลังโปรแกรม', 'url' => ['index']];

?>

<div class="appstore-update">
      <div class="panel panel-info">
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
