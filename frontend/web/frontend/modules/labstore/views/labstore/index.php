<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\modules\labstore\models\LabstoreSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Labstores';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="labstore-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Labstore', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'hn',
            'lab_number',
            'file:ntext',
            'lab_group_id',
            // 'note',
            // 'visit',
            // 'create_date',
            // 'modify_date',
            // 'created_by',
            // 'updated_by',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
