<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Personal */

$this->title = $model->fname. '  ' . $model->lname. ' '.'รหัสบุคลากร : ' . ' ' . $model->pid. ' '.'สถานะ : ' . ' ' . $model->pertypename;
$this->params['breadcrumbs'][] = ['label' => 'บุคลากร', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="personal-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('ปรับปรุง', ['update', 'id' => $model->id, 'pid' => $model->pid, 'cid' => $model->cid], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('ลบ', ['delete', 'id' => $model->id, 'pid' => $model->pid, 'cid' => $model->cid], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
            'format'=>'raw',
            'attribute'=>'img',
            'value'=>Html::img($model->photoViewer,['class'=>'img-thumbnail','style'=>'width:200px;'])
            ],
            'cid',
            //'pname',
            'fullname',
           // 'lname',
            'nickname',
            'sexname',
            'age',
            'religionname',
            'bloodname',
            'marryname',
           // 'birthdate',
            ['attribute'=>'birthdate','format'=>'html','value'=>Yii::$app->thaiFormatter->asDate($model->birthdate,'long')],
            'address1:ntext',
            'address2:ntext',
            'phone',
            'email:email',
            'line',
            'facebook',
            'skill',
            'educationname',
            //'startwork_date',
            ['attribute'=>'startwork_date','format'=>'html','value'=>Yii::$app->thaiFormatter->asDate($model->startwork_date,'long')],
            'positionname',
            'salary',
            'departgroupname',
            'departname',
            ['attribute'=>'create_date','format'=>'html','value'=>Yii::$app->thaiFormatter->asDateTime($model->create_date,'long')],
            ['attribute'=>'modify_date','format'=>'html','value'=>Yii::$app->thaiFormatter->asDateTime($model->modify_date,'long')],
            'loginname',
            'updatename'
        ],
    ]) ?>
</div>
<?= \bluezed\scrollTop\ScrollTop::widget() ?>