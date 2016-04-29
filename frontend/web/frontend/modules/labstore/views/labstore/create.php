<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\modules\labstore\models\Labstore */

$this->title = 'Create Labstore';
$this->params['breadcrumbs'][] = ['label' => 'Labstores', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="labstore-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
