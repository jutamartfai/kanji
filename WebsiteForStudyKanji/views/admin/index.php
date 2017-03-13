<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AdminSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Admins';
// $this->params['breadcrumbs'][] = $this->title;
?>
<div class="admin-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="panel-group">
        <div class="panel panel-default">
            <!-- <div class="panel-heading">Panel with panel-default class</div> -->
            <div class="panel-body">
                <?php echo $this->render('_search', ['model' => $searchModel]); ?>
            </div>
        </div>
    </div>

    <p>
        <?= Html::a('Create Admin', ['create'], ['class' => 'btn btn-success']) ?>
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

                        'username',
                        'password',

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
