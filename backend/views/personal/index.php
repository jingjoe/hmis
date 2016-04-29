<?php
use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\PersonalSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'บุคลากร';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="personal-index">
    <div class="row">
        <div class="col-md-8 col-xs-12">
            <?= Html::a('<span class="glyphicon glyphicon-plus"></span> บันทึกบุคลากร', ['create'], ['class' => 'btn btn-success', 'title' => 'บันทึกบุคลากร',]) ?>
            <?= Html::a('<span class="glyphicon glyphicon-plus"></span> ค่าตอบแทน', ['#'], ['class' => 'btn btn-danger', 'title' => 'ค่าตอบแทน',]) ?>
            <?= Html::a('<span class="glyphicon glyphicon-plus"></span> บันทึกผลงานวิชาการ', ['#'], ['class' => 'btn btn-info', 'title' => 'บันทึกผลงานวิชาการ',]) ?>
            <?= Html::a('<span class="glyphicon glyphicon-plus"></span> เครื่องราช ฯ', ['#'], ['class' => 'btn btn-warning', 'title' => 'เครื่องราช ฯ',]) ?>
            <?= Html::a('<span class="glyphicon glyphicon-plus"></span> ลงเวลาการปฏิบัติงาน', ['#'], ['class' => 'btn btn-primary', 'title' => 'ลงเวลาการปฏิบัติงาน',]) ?>
        </div>
        <div class="col-md-4 col-xs-12">
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
            [
            'options'=>['style'=>'width:150px;'],
            'format'=>'raw',
            'attribute'=>'img',
            'value'=>function($model){
              return Html::tag('div','',[
                'style'=>'width:150px;height:160px;
                          border-top: 10px solid rgba(255, 255, 255, .46);
                          background-image:url('.$model->photoViewer.');
                          background-size: cover;
                          background-position:center center;
                          background-repeat:no-repeat;
                          ']);
            }
            ],
            'pid',
            'cid',
            'fullname',
            'positionname',
            'create_date',   
            ['class' => 'yii\grid\ActionColumn', 
                'template' => '{view}<span class="glyphicon glyphicon-option-vertical"></span>{update}<span class="glyphicon glyphicon-option-vertical"></span>{delete}'],   
        ],
    ]); ?>
 <?php Pjax::end();?>
</div>
<?= \bluezed\scrollTop\ScrollTop::widget() ?>

