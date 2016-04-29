<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\modules\sqlscript\models\Sqlscript */

$this->title = 'บันทึกชุดคำสั่ง sql';
$this->params['breadcrumbs'][] = ['label' => 'ชุดคำสั่ง', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sqlscript-create">

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
