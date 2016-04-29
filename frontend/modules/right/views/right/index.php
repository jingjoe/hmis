<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;

// add pop up windows form
use yii\bootstrap\Modal;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel frontend\modules\right\models\RightSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'รายชื่อผู้ขึ้นทะเบียนสิทธิ OFC/LGO';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="right-index">
    <div class="row">
        <div class="col-md-6 col-xs-12">
            <?= Html::a('<span class="glyphicon glyphicon-plus"></span> เพิ่มผู้มีสิทธิการรักษา', ['/right/right/create'], ['class' => 'btn btn-success', 'title' => 'เพิ่มข้อมูลผู้มีสิทธิ',]) ?>
            <?= Html::a('<span class="glyphicon glyphicon-plus"></span> เพิ่มสิทธิการรักษา', ['/right/pttype/index'], ['class' => 'btn btn-danger', 'title' => 'เพิ่มสิทธิการรักษา',]) ?>
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
    
    <?php Pjax::begin(['id'=>'right_pjax']); ?>
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
            'hn',
            'cid',
            'fullname',
            'regdate',
            'dateaffect',
            [
            'attribute' => 'pttype',
            'value' => 'pttype.pttype_name'
            ],
            'loginname',
            ['class' => 'yii\grid\ActionColumn', 
                'template' => '{view}<span class="glyphicon glyphicon-option-vertical"></span>{update}<span class="glyphicon glyphicon-option-vertical"></span>{delete}'
            ],   
        ],
    ]); ?>
 <?php Pjax::end();?>
</div>
