<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;

// add pop up windows form
use yii\bootstrap\Modal;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'สิทธิการรักษา';
$this->params['breadcrumbs'][] = ['label' => 'รายชื่อผู้ขึ้นทะเบียนสิทธิ', 'url' => ['/right/right/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pttype-index">

    <div class="row">
        <div class="col-md-6 col-xs-12">          
            <?= Html::a('<span class="glyphicon glyphicon-plus"></span> เพิ่มสิทธิการรักษา', ['/right/pttype/create'], ['class' => 'btn btn-success', 'title' => 'เพิ่มสิทธิการรักษา',]) ?>
        </div>
    </div>
    <br>
    <?php Pjax::begin(['id'=>'pttype_pjax']); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
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
            'pttype_code',
            'pttype_name',
            'create_date',
            'loginname',
            ['class' => 'yii\grid\ActionColumn', 'template' => '{update}<span class="glyphicon glyphicon-option-vertical"></span>{delete}'],            
        ],
    ]); ?>
 <?php Pjax::end();?>
</div>
<?= \bluezed\scrollTop\ScrollTop::widget() ?>
