<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\KanjiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Kanjis';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kanji-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <!-- <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingThree">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          search kanji
        </a>
      </h4>
    </div>
    <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
      <div class="panel-body"> -->
    <div class="panel-group">
        <div class="panel panel-default">
            <!-- <div class="panel-heading">search kanji</div> -->
            <div class="panel-body">
            <?php echo $this->render('_search', ['model' => $searchModel]); ?>
      </div>
    </div>
  </div>

    <p>
        <?= Html::a('Create Kanji', ['create'], ['class' => 'btn btn-success']) ?>
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

                        'kanji_ch',
                        'kanji_no',
                        'kanji',
                        //'meaning',
                        //'jp_pron',
                        //'cn_pron',
                        //'line_num',
                        //'ex_vocab:ntext',
                        //'how_to',

                        [
                            'class' => 'yii\grid\ActionColumn',
                            'buttonOptions'=>['class'=>'btn btn-default'],
                            'template'=>'<div class="btn-group btn-group-sm text-center" role="group"> {view} {update} {delete} </div>',
                            //'options'=> ['style'=>'width:20px;'],
                            'contentOptions'=>[
                                'noWrap' => true
                            ],
                        ],
                    ],
                ]); ?>

                <br><br>
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                <!-- chapter 1 -->
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingThree">
                      <h4 class="panel-title">
                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#ch1" aria-expanded="false" aria-controls="collapseThree">
                          chapter 1
                        </a>
                      </h4>
                    </div>
                    <div id="ch1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                        <div class="panel-body">
                            <table class="table table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th>ตัวอักษรคันจิ</th>
                                        <th>ความหมาย</th>
                                        <th>การจัดการ</th>
                                    </tr>
                                </thead>
                                <?php foreach ($model_ch1 as $key => $value) : ?>
                                <tbody>
                                    <tr>
                                        <td><?= $value->kanji; ?></td>
                                        <td><?= $value->meaning; ?></td>
                                        <td>
                                            <div class="btn-group btn-group-sm text-center" role="group">
                                                <?= Html::a('<span class="glyphicon glyphicon-eye-open"></span>', ['update', 'kanji_ch' => $value->kanji_ch, 'kanji_no' => $value->kanji_no], ['class' => 'btn btn-info']) ?>
                                                <?= Html::a('<span class="glyphicon glyphicon-pencil"></span>', ['update', 'kanji_ch' => $value->kanji_ch, 'kanji_no' => $value->kanji_no], ['class' => 'btn btn-info']) ?>
                                                <?= Html::a('<span class="glyphicon glyphicon-trash"></span>', ['delete', 'kanji_ch' => $value->kanji_ch, 'kanji_no' => $value->kanji_no], [
                                                    'class' => 'btn btn-danger',
                                                    'data' => [
                                                        'confirm' => 'Are you sure you want to delete this item?',
                                                        'method' => 'post',
                                                    ],
                                                ]) ?>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                                <?php endforeach ; ?>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- end chapter 1 -->
                <!-- chapter 2 -->
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingThree">
                      <h4 class="panel-title">
                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#ch2" aria-expanded="false" aria-controls="collapseThree">
                          chapter 2
                        </a>
                      </h4>
                    </div>
                    <div id="ch2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                        <div class="panel-body">
                            <table class="table table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th>ตัวอักษรคันจิ</th>
                                        <th>ความหมาย</th>
                                        <th>การจัดการ</th>
                                    </tr>
                                </thead>
                                <?php foreach ($model_ch2 as $key => $value) : ?>
                                <tbody>
                                    <tr>
                                        <td><?= $value->kanji; ?></td>
                                        <td><?= $value->meaning; ?></td>
                                        <td>
                                            <div class="btn-group btn-group-sm text-center" role="group">
                                                <?= Html::a('<span class="glyphicon glyphicon-eye-open"></span>', ['update', 'kanji_ch' => $value->kanji_ch, 'kanji_no' => $value->kanji_no], ['class' => 'btn btn-info']) ?>
                                                <?= Html::a('<span class="glyphicon glyphicon-pencil"></span>', ['update', 'kanji_ch' => $value->kanji_ch, 'kanji_no' => $value->kanji_no], ['class' => 'btn btn-info']) ?>
                                                <?= Html::a('<span class="glyphicon glyphicon-trash"></span>', ['delete', 'kanji_ch' => $value->kanji_ch, 'kanji_no' => $value->kanji_no], [
                                                    'class' => 'btn btn-danger',
                                                    'data' => [
                                                        'confirm' => 'Are you sure you want to delete this item?',
                                                        'method' => 'post',
                                                    ],
                                                ]) ?>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                                <?php endforeach ; ?>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- end chapter 2 -->
                </div>
            </div>
        </div>
    </div>
</div>
