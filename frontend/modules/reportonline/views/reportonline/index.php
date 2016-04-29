<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel frontend\modules\reportonline\models\ReportonlineSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'ขอรายงานออนไลน์';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reportonline-index">
        <div class="row">
        <div class="col-md-6 col-xs-12">
            <?= Html::a('<span class="glyphicon glyphicon-plus"></span> ขอรายงาน', ['create'], ['class' => 'btn btn-success']) ?>
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
            //'personal_id',
            'name',
            'personname',
            'departname',
            'order_date',
            'defined_date',
            //'statusname',
[ // แสดงข้อมูลออกเป็นสีตามเงื่อนไข
          'attribute' => 'report_status_id',
          'format'=>'html',
          'value'=>function($model, $key, $index, $column){
            return $model->report_status_id==1 ? "<i class=\"glyphicon glyphicon-remove\"></i>" : "<i class=\"glyphicon glyphicon-ok\"></i>";
          }
        ],
        ['class' => 'yii\grid\ActionColumn',
                'template' => '{view}<span class="glyphicon glyphicon-option-vertical"></span>{update}<span class="glyphicon glyphicon-option-vertical"></span>{delete}'],
        ],
    ]);
    ?>
    <?php Pjax::end(); ?>
    </div>
    <?= \bluezed\scrollTop\ScrollTop::widget() ?>