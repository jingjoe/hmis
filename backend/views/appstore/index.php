<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;

use common\models\Appstore;

/* @var $this yii\web\View */
/* @var $searchModel common\models\AppstoreSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'คลังโปรแกรม';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="appstore-index">
    <div class="row">
        <div class="col-md-6 col-xs-12">
            <?= Html::a('<span class="glyphicon glyphicon-plus"></span> บันทึกโปรแกรม', ['create'], ['class' => 'btn btn-success', 'title' => 'บันทึกโปรแกรม',]) ?>
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
 <?php Pjax::begin();?>  
     <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'panel' => [
        'type' => GridView::TYPE_SUCCESS,
        'type' => 'success',   
        ],
        'responsive' => true,
        'hover' => true,
        'floatHeader' => true,
        'pjax'=>true,
        'pjaxSettings'=>[
            'neverTimeout'=> true,
            'beforeGrid'=>'',
            'afterGrid'=>'',
        ],
        'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        'name',
        'detail',
        'create_date',
        'visit',
        [
           'attribute'=>'status',
           'filter'=> $searchModel->itemAlias('status'),
           'value'=>function($model){
            return $model->statusName;
            }
        ], 
        [
            'class' => 'yii\grid\ActionColumn',
            'options'=>['style'=>'width:120px;'],
            'template'=>'<div class="btn-group btn-group-sm" role="group" aria-label="...">{update}{delete}</div>',
            'buttons'=>[
                'update'=>function($url,$model,$key){
                    return Html::a('<i class="glyphicon glyphicon-pencil"></i>',$url,['class'=>'btn btn-default']);
                },
                'delete'=>function($url,$model,$key){
                     return Html::a('<i class="glyphicon glyphicon-trash"></i>', $url,[
                       'title' => Yii::t('yii', 'Delete'),
                       'data-confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
                       'data-method' => 'post',
                       'data-pjax' => '0',
                       'class'=>'btn btn-default'
                       ]);
                }
            ]
            ],
        ],
    ]); ?>

 <?php Pjax::end();?>
</div>
<?= \bluezed\scrollTop\ScrollTop::widget() ?>

