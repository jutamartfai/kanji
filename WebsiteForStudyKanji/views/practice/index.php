<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PracticeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Practices';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="practice-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingThree">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          search practice
        </a>
      </h4>
    </div>
    <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
      <div class="panel-body">
            <?php echo $this->render('_search', ['model' => $searchModel]); ?>

      </div>
    </div>
  </div>

    <p>
        <?= Html::a('Create Practice', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <div class="panel-group">
        <div class="panel panel-default">
            <!-- <div class="panel-heading">Panel with panel-default class</div> -->
            <div class="panel-body">
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    //'filterModel' => $searchModel,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],

                        'practice_ch',
                        'practice_no',
                        'question',
                        //'meaning',
                        //'pron',

                        [
                            'class' => 'yii\grid\ActionColumn',
                            'buttonOptions'=>['class'=>'btn btn-default'],
                            'template'=>'<div class="btn-group btn-group-sm text-center" role="group"> {view} {update} {delete} </div>',
                            //'options'=> ['style'=>'width:100px;'],
                            'contentOptions'=>[
                                'noWrap' => true
                            ],
                        ],
                    ],
                ]); ?>
            </div>
        </div>
    </div>
</div>
