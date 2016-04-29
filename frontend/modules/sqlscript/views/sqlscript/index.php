<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel frontend\modules\sqlscript\models\SqlscriptSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'ชุดคำสั่ง sql';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="sqlscript-index">
    
    <div class="row">
        <div class="col-md-6 col-xs-12">
            <?= Html::a('<span class="glyphicon glyphicon-plus"></span> เพิ่มชุดคำสั่ง', ['create'], ['class' => 'btn btn-success']) ?>
        </div>
        <div class="col-md-6 col-xs-12">
            <div class="pull-right">
                <form class="form-inline">
                    <div class="form-group">
                        <?php echo $this->render('_search', ['model' => $searchModel]); ?>
                </form>
            </div>
        </div>
    </div>
</div>
    <?php Pjax::begin(); ?>   
    <?=GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'panel' => [
            'type' => GridView::TYPE_SUCCESS,
            'type' => 'success',
        ],
        'responsive' => true,
        'hover' => true,
        'floatHeader' => true,
        'pjax' => true,
        'pjaxSettings' => [
            'neverTimeout' => true,
            'beforeGrid' => '',
            'afterGrid' => '',
        ],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            //'sql_id',
            'sql_name',
            'programname',
            //'sql_script:ntext',
            //'files:ntext',
            // 'hits',
            // 'create_date',
            // 'modify_date',
            // 'created_by',
            // 'updated_by',
            ['class' => 'yii\grid\ActionColumn',
                'template' => '{view}<span class="glyphicon glyphicon-option-vertical"></span>{update}<span class="glyphicon glyphicon-option-vertical"></span>{delete}'
            ],
        ],
    ]);
    ?>
    <?php Pjax::end(); ?>
    </div>
    <?= \bluezed\scrollTop\ScrollTop::widget() ?>
