<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PracticeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Practices';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="practice-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <div class="panel-group">
        <div class="panel panel-default">
            <div class="panel-body">
            <?php echo $this->render('_search', ['model' => $searchModel]); ?>
      </div>
    </div>
  </div>

    <div class="panel-group">
        <div class="panel panel-default">
            <div class="panel-body">
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    //'filterModel' => $searchModel,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],

                        //'practice_ch',
                        //'practice_no',
                        'question',
                        'meaning',
                        'pron',

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

                <br><br>
                <?php $form = ActiveForm::begin(); ?>
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
                        <p>
                            <?= Html::a('Create Practice Ch.1', ['create', 'chapter' => '01'], ['class' => 'btn btn-success']) ?>
                        </p>
                            <table class="table table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th>คำถาม</th>
                                        <th>ความหมาย</th>
                                        <th>คำอ่านตัวอักษร</th>
                                        <th>การจัดการ</th>
                                    </tr>
                                </thead>
                                <?php foreach ($model_ch1 as $key => $value) : ?>
                                <tbody>
                                    <tr>
                                        <td><?= $value->question; ?><br><br><?= Html::img($value->getPhotoViewer(),['style'=>'width:100px;','class'=>'img-rounded']); ?><br></td>
                                        <td><?= $value->meaning; ?><br><br><?= Html::img($value->getPhotoViewer2(),['style'=>'width:100px;','class'=>'img-rounded']); ?><br></td>
                                        <td><?= $value->pron; ?><br><br><?= Html::img($value->getPhotoViewer3(),['style'=>'width:100px;','class'=>'img-rounded']); ?><br></td>
                                        <td>
                                            <div class="btn-group btn-group-sm text-center" role="group">
                                                <?= Html::a('<span class="glyphicon glyphicon-eye-open"></span>', ['view', 'practice_ch' => $value->practice_ch, 'practice_no' => $value->practice_no], ['class' => 'btn btn-default']) ?>
                                                <?= Html::a('<span class="glyphicon glyphicon-pencil"></span>', ['update', 'practice_ch' => $value->practice_ch, 'practice_no' => $value->practice_no], ['class' => 'btn btn-info']) ?>
                                                <?= Html::a('<span class="glyphicon glyphicon-trash"></span>', ['delete', 'practice_ch' => $value->practice_ch, 'practice_no' => $value->practice_no], [
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
                        <p>
                            <?= Html::a('Create Practice Ch.2', ['create', 'chapter' => '02'], ['class' => 'btn btn-success']) ?>
                        </p>
                            <table class="table table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th>คำถาม</th>
                                        <th>ความหมาย</th>
                                        <th>คำอ่านตัวอักษร</th>
                                        <th>การจัดการ</th>
                                    </tr>
                                </thead>
                                <?php foreach ($model_ch2 as $key => $value) : ?>
                                <tbody>
                                    <tr>
                                        <td><?= $value->question; ?><br><br><?= Html::img($value->getPhotoViewer(),['style'=>'width:100px;','class'=>'img-rounded']); ?><br></td>
                                        <td><?= $value->meaning; ?><br><br><?= Html::img($value->getPhotoViewer2(),['style'=>'width:100px;','class'=>'img-rounded']); ?><br></td>
                                        <td><?= $value->pron; ?><br><br><?= Html::img($value->getPhotoViewer3(),['style'=>'width:100px;','class'=>'img-rounded']); ?><br></td>
                                        <td>
                                            <div class="btn-group btn-group-sm text-center" role="group">
                                                <?= Html::a('<span class="glyphicon glyphicon-eye-open"></span>', ['view', 'practice_ch' => $value->practice_ch, 'practice_no' => $value->practice_no], ['class' => 'btn btn-default']) ?>
                                                <?= Html::a('<span class="glyphicon glyphicon-pencil"></span>', ['update', 'practice_ch' => $value->practice_ch, 'practice_no' => $value->practice_no], ['class' => 'btn btn-info']) ?>
                                                <?= Html::a('<span class="glyphicon glyphicon-trash"></span>', ['delete', 'practice_ch' => $value->practice_ch, 'practice_no' => $value->practice_no], [
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
                <!-- chapter 3 -->
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingThree">
                      <h4 class="panel-title">
                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#ch3" aria-expanded="false" aria-controls="collapseThree">
                          chapter 3
                        </a>
                      </h4>
                    </div>
                    <div id="ch3" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                        <div class="panel-body">
                        <p>
                            <?= Html::a('Create Practice Ch.3', ['create', 'chapter' => '03'], ['class' => 'btn btn-success']) ?>
                        </p>
                            <table class="table table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th>คำถาม</th>
                                        <th>ความหมาย</th>
                                        <th>คำอ่านตัวอักษร</th>
                                        <th>การจัดการ</th>
                                    </tr>
                                </thead>
                                <?php foreach ($model_ch3 as $key => $value) : ?>
                                <tbody>
                                    <tr>
                                        <td><?= $value->question; ?><br><br><?= Html::img($value->getPhotoViewer(),['style'=>'width:100px;','class'=>'img-rounded']); ?><br></td>
                                        <td><?= $value->meaning; ?><br><br><?= Html::img($value->getPhotoViewer2(),['style'=>'width:100px;','class'=>'img-rounded']); ?><br></td>
                                        <td><?= $value->pron; ?><br><br><?= Html::img($value->getPhotoViewer3(),['style'=>'width:100px;','class'=>'img-rounded']); ?><br></td>
                                        <td>
                                            <div class="btn-group btn-group-sm text-center" role="group">
                                                <?= Html::a('<span class="glyphicon glyphicon-eye-open"></span>', ['view', 'practice_ch' => $value->practice_ch, 'practice_no' => $value->practice_no], ['class' => 'btn btn-default']) ?>
                                                <?= Html::a('<span class="glyphicon glyphicon-pencil"></span>', ['update', 'practice_ch' => $value->practice_ch, 'practice_no' => $value->practice_no], ['class' => 'btn btn-info']) ?>
                                                <?= Html::a('<span class="glyphicon glyphicon-trash"></span>', ['delete', 'practice_ch' => $value->practice_ch, 'practice_no' => $value->practice_no], [
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
                <!-- end chapter 3 -->
                <!-- chapter 4 -->
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingThree">
                      <h4 class="panel-title">
                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#ch4" aria-expanded="false" aria-controls="collapseThree">
                          chapter 4
                        </a>
                      </h4>
                    </div>
                    <div id="ch4" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                        <div class="panel-body">
                        <p>
                            <?= Html::a('Create Practice Ch.4', ['create', 'chapter' => '04'], ['class' => 'btn btn-success']) ?>
                        </p>
                            <table class="table table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th>คำถาม</th>
                                        <th>ความหมาย</th>
                                        <th>คำอ่านตัวอักษร</th>
                                        <th>การจัดการ</th>
                                    </tr>
                                </thead>
                                <?php foreach ($model_ch4 as $key => $value) : ?>
                                <tbody>
                                    <tr>
                                        <td><?= $value->question; ?><br><br><?= Html::img($value->getPhotoViewer(),['style'=>'width:100px;','class'=>'img-rounded']); ?><br></td>
                                        <td><?= $value->meaning; ?><br><br><?= Html::img($value->getPhotoViewer2(),['style'=>'width:100px;','class'=>'img-rounded']); ?><br></td>
                                        <td><?= $value->pron; ?><br><br><?= Html::img($value->getPhotoViewer3(),['style'=>'width:100px;','class'=>'img-rounded']); ?><br></td>
                                        <td>
                                            <div class="btn-group btn-group-sm text-center" role="group">
                                                <?= Html::a('<span class="glyphicon glyphicon-eye-open"></span>', ['view', 'practice_ch' => $value->practice_ch, 'practice_no' => $value->practice_no], ['class' => 'btn btn-default']) ?>
                                                <?= Html::a('<span class="glyphicon glyphicon-pencil"></span>', ['update', 'practice_ch' => $value->practice_ch, 'practice_no' => $value->practice_no], ['class' => 'btn btn-info']) ?>
                                                <?= Html::a('<span class="glyphicon glyphicon-trash"></span>', ['delete', 'practice_ch' => $value->practice_ch, 'practice_no' => $value->practice_no], [
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
                <!-- end chapter 4 -->
                <!-- chapter 5 -->
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingThree">
                      <h4 class="panel-title">
                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#ch5" aria-expanded="false" aria-controls="collapseThree">
                          chapter 5
                        </a>
                      </h4>
                    </div>
                    <div id="ch5" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                        <div class="panel-body">
                        <p>
                            <?= Html::a('Create Practice Ch.5', ['create', 'chapter' => '05'], ['class' => 'btn btn-success']) ?>
                        </p>
                            <table class="table table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th>คำถาม</th>
                                        <th>ความหมาย</th>
                                        <th>คำอ่านตัวอักษร</th>
                                        <th>การจัดการ</th>
                                    </tr>
                                </thead>
                                <?php foreach ($model_ch5 as $key => $value) : ?>
                                <tbody>
                                    <tr>
                                        <td><?= $value->question; ?><br><br><?= Html::img($value->getPhotoViewer(),['style'=>'width:100px;','class'=>'img-rounded']); ?><br></td>
                                        <td><?= $value->meaning; ?><br><br><?= Html::img($value->getPhotoViewer2(),['style'=>'width:100px;','class'=>'img-rounded']); ?><br></td>
                                        <td><?= $value->pron; ?><br><br><?= Html::img($value->getPhotoViewer3(),['style'=>'width:100px;','class'=>'img-rounded']); ?><br><br></td>
                                        <td>
                                            <div class="btn-group btn-group-sm text-center" role="group">
                                                <?= Html::a('<span class="glyphicon glyphicon-eye-open"></span>', ['view', 'practice_ch' => $value->practice_ch, 'practice_no' => $value->practice_no], ['class' => 'btn btn-default']) ?>
                                                <?= Html::a('<span class="glyphicon glyphicon-pencil"></span>', ['update', 'practice_ch' => $value->practice_ch, 'practice_no' => $value->practice_no], ['class' => 'btn btn-info']) ?>
                                                <?= Html::a('<span class="glyphicon glyphicon-trash"></span>', ['delete', 'practice_ch' => $value->practice_ch, 'practice_no' => $value->practice_no], [
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
                <!-- end chapter 5 -->
                <!-- chapter 6 -->
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingThree">
                      <h4 class="panel-title">
                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#ch6" aria-expanded="false" aria-controls="collapseThree">
                          chapter 6
                        </a>
                      </h4>
                    </div>
                    <div id="ch6" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                        <div class="panel-body">
                        <p>
                            <?= Html::a('Create Practice Ch.6', ['create', 'chapter' => '06'], ['class' => 'btn btn-success']) ?>
                        </p>
                            <table class="table table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th>คำถาม</th>
                                        <th>ความหมาย</th>
                                        <th>คำอ่านตัวอักษร</th>
                                        <th>การจัดการ</th>
                                    </tr>
                                </thead>
                                <?php foreach ($model_ch6 as $key => $value) : ?>
                                <tbody>
                                    <tr>
                                        <td><?= $value->question; ?><br><br><?= Html::img($value->getPhotoViewer(),['style'=>'width:100px;','class'=>'img-rounded']); ?><br></td>
                                        <td><?= $value->meaning; ?><br><br><?= Html::img($value->getPhotoViewer2(),['style'=>'width:100px;','class'=>'img-rounded']); ?><br></td>
                                        <td><?= $value->pron; ?><br><br><?= Html::img($value->getPhotoViewer3(),['style'=>'width:100px;','class'=>'img-rounded']); ?><br></td>
                                        <td>
                                            <div class="btn-group btn-group-sm text-center" role="group">
                                                <?= Html::a('<span class="glyphicon glyphicon-eye-open"></span>', ['view', 'practice_ch' => $value->practice_ch, 'practice_no' => $value->practice_no], ['class' => 'btn btn-default']) ?>
                                                <?= Html::a('<span class="glyphicon glyphicon-pencil"></span>', ['update', 'practice_ch' => $value->practice_ch, 'practice_no' => $value->practice_no], ['class' => 'btn btn-info']) ?>
                                                <?= Html::a('<span class="glyphicon glyphicon-trash"></span>', ['delete', 'practice_ch' => $value->practice_ch, 'practice_no' => $value->practice_no], [
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
                <!-- end chapter 6 -->
                <!-- chapter 7 -->
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingThree">
                      <h4 class="panel-title">
                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#ch7" aria-expanded="false" aria-controls="collapseThree">
                          chapter 7
                        </a>
                      </h4>
                    </div>
                    <div id="ch7" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                        <div class="panel-body">
                        <p>
                            <?= Html::a('Create Practice Ch.7', ['create', 'chapter' => '07'], ['class' => 'btn btn-success']) ?>
                        </p>
                            <table class="table table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th>คำถาม</th>
                                        <th>ความหมาย</th>
                                        <th>คำอ่านตัวอักษร</th>
                                        <th>การจัดการ</th>
                                    </tr>
                                </thead>
                                <?php foreach ($model_ch7 as $key => $value) : ?>
                                <tbody>
                                    <tr>
                                        <td><?= $value->question; ?><br><br><?= Html::img($value->getPhotoViewer(),['style'=>'width:100px;','class'=>'img-rounded']); ?><br></td>
                                        <td><?= $value->meaning; ?><br><br><?= Html::img($value->getPhotoViewer2(),['style'=>'width:100px;','class'=>'img-rounded']); ?><br></td>
                                        <td><?= $value->pron; ?><br><br><?= Html::img($value->getPhotoViewer3(),['style'=>'width:100px;','class'=>'img-rounded']); ?><br></td>
                                        <td>
                                            <div class="btn-group btn-group-sm text-center" role="group">
                                                <?= Html::a('<span class="glyphicon glyphicon-eye-open"></span>', ['view', 'practice_ch' => $value->practice_ch, 'practice_no' => $value->practice_no], ['class' => 'btn btn-default']) ?>
                                                <?= Html::a('<span class="glyphicon glyphicon-pencil"></span>', ['update', 'practice_ch' => $value->practice_ch, 'practice_no' => $value->practice_no], ['class' => 'btn btn-info']) ?>
                                                <?= Html::a('<span class="glyphicon glyphicon-trash"></span>', ['delete', 'practice_ch' => $value->practice_ch, 'practice_no' => $value->practice_no], [
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
                <!-- end chapter 7 -->
                <!-- chapter 8 -->
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingThree">
                      <h4 class="panel-title">
                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#ch8" aria-expanded="false" aria-controls="collapseThree">
                          chapter 8
                        </a>
                      </h4>
                    </div>
                    <div id="ch8" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                        <div class="panel-body">
                        <p>
                            <?= Html::a('Create Practice Ch.8', ['create', 'chapter' => '08'], ['class' => 'btn btn-success']) ?>
                        </p>
                            <table class="table table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th>คำถาม</th>
                                        <th>ความหมาย</th>
                                        <th>คำอ่านตัวอักษร</th>
                                        <th>การจัดการ</th>
                                    </tr>
                                </thead>
                                <?php foreach ($model_ch8 as $key => $value) : ?>
                                <tbody>
                                    <tr>
                                        <td><?= $value->question; ?><br><br><?= Html::img($value->getPhotoViewer(),['style'=>'width:100px;','class'=>'img-rounded']); ?><br></td>
                                        <td><?= $value->meaning; ?><br><br><?= Html::img($value->getPhotoViewer2(),['style'=>'width:100px;','class'=>'img-rounded']); ?><br></td>
                                        <td><?= $value->pron; ?><br><br><?= Html::img($value->getPhotoViewer3(),['style'=>'width:100px;','class'=>'img-rounded']); ?><br></td>
                                        <td>
                                            <div class="btn-group btn-group-sm text-center" role="group">
                                                <?= Html::a('<span class="glyphicon glyphicon-eye-open"></span>', ['view', 'practice_ch' => $value->practice_ch, 'practice_no' => $value->practice_no], ['class' => 'btn btn-default']) ?>
                                                <?= Html::a('<span class="glyphicon glyphicon-pencil"></span>', ['update', 'practice_ch' => $value->practice_ch, 'practice_no' => $value->practice_no], ['class' => 'btn btn-info']) ?>
                                                <?= Html::a('<span class="glyphicon glyphicon-trash"></span>', ['delete', 'practice_ch' => $value->practice_ch, 'practice_no' => $value->practice_no], [
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
                <!-- end chapter 8 -->
                <!-- chapter 9 -->
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingThree">
                      <h4 class="panel-title">
                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#ch9" aria-expanded="false" aria-controls="collapseThree">
                          chapter 9
                        </a>
                      </h4>
                    </div>
                    <div id="ch9" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                        <div class="panel-body">
                        <p>
                            <?= Html::a('Create Practice Ch.9', ['create', 'chapter' => '09'], ['class' => 'btn btn-success']) ?>
                        </p>
                            <table class="table table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th>คำถาม</th>
                                        <th>ความหมาย</th>
                                        <th>คำอ่านตัวอักษร</th>
                                        <th>การจัดการ</th>
                                    </tr>
                                </thead>
                                <?php foreach ($model_ch9 as $key => $value) : ?>
                                <tbody>
                                    <tr>
                                        <td><?= $value->question; ?><br><br><?= Html::img($value->getPhotoViewer(),['style'=>'width:100px;','class'=>'img-rounded']); ?><br></td>
                                        <td><?= $value->meaning; ?><br><br><?= Html::img($value->getPhotoViewer2(),['style'=>'width:100px;','class'=>'img-rounded']); ?><br></td>
                                        <td><?= $value->pron; ?><br><br><?= Html::img($value->getPhotoViewer3(),['style'=>'width:100px;','class'=>'img-rounded']); ?><br></td>
                                        <td>
                                            <div class="btn-group btn-group-sm text-center" role="group">
                                                <?= Html::a('<span class="glyphicon glyphicon-eye-open"></span>', ['view', 'practice_ch' => $value->practice_ch, 'practice_no' => $value->practice_no], ['class' => 'btn btn-default']) ?>
                                                <?= Html::a('<span class="glyphicon glyphicon-pencil"></span>', ['update', 'practice_ch' => $value->practice_ch, 'practice_no' => $value->practice_no], ['class' => 'btn btn-info']) ?>
                                                <?= Html::a('<span class="glyphicon glyphicon-trash"></span>', ['delete', 'practice_ch' => $value->practice_ch, 'practice_no' => $value->practice_no], [
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
                <!-- end chapter 9 -->
                <!-- chapter 10 -->
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingThree">
                      <h4 class="panel-title">
                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#ch10" aria-expanded="false" aria-controls="collapseThree">
                          chapter 10
                        </a>
                      </h4>
                    </div>
                    <div id="ch10" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                        <div class="panel-body">
                        <p>
                            <?= Html::a('Create Practice Ch.10', ['create', 'chapter' => '10'], ['class' => 'btn btn-success']) ?>
                        </p>
                            <table class="table table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th>คำถาม</th>
                                        <th>ความหมาย</th>
                                        <th>คำอ่านตัวอักษร</th>
                                        <th>การจัดการ</th>
                                    </tr>
                                </thead>
                                <?php foreach ($model_ch10 as $key => $value) : ?>
                                <tbody>
                                    <tr>
                                        <td><?= $value->question; ?><br><br><?= Html::img($value->getPhotoViewer(),['style'=>'width:100px;','class'=>'img-rounded']); ?><br></td>
                                        <td><?= $value->meaning; ?><br><br><?= Html::img($value->getPhotoViewer2(),['style'=>'width:100px;','class'=>'img-rounded']); ?><br></td>
                                        <td><?= $value->pron; ?><br><br><?= Html::img($value->getPhotoViewer3(),['style'=>'width:100px;','class'=>'img-rounded']); ?><br></td>
                                        <td>
                                            <div class="btn-group btn-group-sm text-center" role="group">
                                                <?= Html::a('<span class="glyphicon glyphicon-eye-open"></span>', ['view', 'practice_ch' => $value->practice_ch, 'practice_no' => $value->practice_no], ['class' => 'btn btn-default']) ?>
                                                <?= Html::a('<span class="glyphicon glyphicon-pencil"></span>', ['update', 'practice_ch' => $value->practice_ch, 'practice_no' => $value->practice_no], ['class' => 'btn btn-info']) ?>
                                                <?= Html::a('<span class="glyphicon glyphicon-trash"></span>', ['delete', 'practice_ch' => $value->practice_ch, 'practice_no' => $value->practice_no], [
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
                <!-- end chapter 10 -->
                <!-- chapter 11 -->
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingThree">
                      <h4 class="panel-title">
                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#ch11" aria-expanded="false" aria-controls="collapseThree">
                          chapter 11
                        </a>
                      </h4>
                    </div>
                    <div id="ch11" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                        <div class="panel-body">
                        <p>
                            <?= Html::a('Create Practice Ch.11', ['create', 'chapter' => '11'], ['class' => 'btn btn-success']) ?>
                        </p>
                            <table class="table table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th>คำถาม</th>
                                        <th>ความหมาย</th>
                                        <th>คำอ่านตัวอักษร</th>
                                        <th>การจัดการ</th>
                                    </tr>
                                </thead>
                                <?php foreach ($model_ch11 as $key => $value) : ?>
                                <tbody>
                                    <tr>
                                        <td><?= $value->question; ?><br><br><?= Html::img($value->getPhotoViewer(),['style'=>'width:100px;','class'=>'img-rounded']); ?><br></td>
                                        <td><?= $value->meaning; ?><br><br><?= Html::img($value->getPhotoViewer2(),['style'=>'width:100px;','class'=>'img-rounded']); ?><br></td>
                                        <td><?= $value->pron; ?><br><br><?= Html::img($value->getPhotoViewer3(),['style'=>'width:100px;','class'=>'img-rounded']); ?><br></td>
                                        <td>
                                            <div class="btn-group btn-group-sm text-center" role="group">
                                                <?= Html::a('<span class="glyphicon glyphicon-eye-open"></span>', ['view', 'practice_ch' => $value->practice_ch, 'practice_no' => $value->practice_no], ['class' => 'btn btn-default']) ?>
                                                <?= Html::a('<span class="glyphicon glyphicon-pencil"></span>', ['update', 'practice_ch' => $value->practice_ch, 'practice_no' => $value->practice_no], ['class' => 'btn btn-info']) ?>
                                                <?= Html::a('<span class="glyphicon glyphicon-trash"></span>', ['delete', 'practice_ch' => $value->practice_ch, 'practice_no' => $value->practice_no], [
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
                <!-- end chapter 11 -->
                <!-- chapter 12 -->
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingThree">
                      <h4 class="panel-title">
                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#ch12" aria-expanded="false" aria-controls="collapseThree">
                          chapter 12
                        </a>
                      </h4>
                    </div>
                    <div id="ch12" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                        <div class="panel-body">
                        <p>
                            <?= Html::a('Create Practice Ch.12', ['create', 'chapter' => '12'], ['class' => 'btn btn-success']) ?>
                        </p>
                            <table class="table table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th>คำถาม</th>
                                        <th>ความหมาย</th>
                                        <th>คำอ่านตัวอักษร</th>
                                        <th>การจัดการ</th>
                                    </tr>
                                </thead>
                                <?php foreach ($model_ch12 as $key => $value) : ?>
                                <tbody>
                                    <tr>
                                        <td><?= $value->question; ?><br><br><?= Html::img($value->getPhotoViewer(),['style'=>'width:100px;','class'=>'img-rounded']); ?><br></td>
                                        <td><?= $value->meaning; ?><br><br><?= Html::img($value->getPhotoViewer2(),['style'=>'width:100px;','class'=>'img-rounded']); ?><br></td>
                                        <td><?= $value->pron; ?><br><br><?= Html::img($value->getPhotoViewer3(),['style'=>'width:100px;','class'=>'img-rounded']); ?><br></td>
                                        <td>
                                            <div class="btn-group btn-group-sm text-center" role="group">
                                                <?= Html::a('<span class="glyphicon glyphicon-eye-open"></span>', ['view', 'practice_ch' => $value->practice_ch, 'practice_no' => $value->practice_no], ['class' => 'btn btn-default']) ?>
                                                <?= Html::a('<span class="glyphicon glyphicon-pencil"></span>', ['update', 'practice_ch' => $value->practice_ch, 'practice_no' => $value->practice_no], ['class' => 'btn btn-info']) ?>
                                                <?= Html::a('<span class="glyphicon glyphicon-trash"></span>', ['delete', 'practice_ch' => $value->practice_ch, 'practice_no' => $value->practice_no], [
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
                <!-- end chapter 12 -->
                <!-- chapter 13 -->
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingThree">
                      <h4 class="panel-title">
                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#ch13" aria-expanded="false" aria-controls="collapseThree">
                          chapter 13
                        </a>
                      </h4>
                    </div>
                    <div id="ch13" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                        <div class="panel-body">
                        <p>
                            <?= Html::a('Create Practice Ch.13', ['create', 'chapter' => '13'], ['class' => 'btn btn-success']) ?>
                        </p>
                            <table class="table table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th>คำถาม</th>
                                        <th>ความหมาย</th>
                                        <th>คำอ่านตัวอักษร</th>
                                        <th>การจัดการ</th>
                                    </tr>
                                </thead>
                                <?php foreach ($model_ch13 as $key => $value) : ?>
                                <tbody>
                                    <tr>
                                        <td><?= $value->question; ?><br><br><?= Html::img($value->getPhotoViewer(),['style'=>'width:100px;','class'=>'img-rounded']); ?><br></td>
                                        <td><?= $value->meaning; ?><br><br><?= Html::img($value->getPhotoViewer2(),['style'=>'width:100px;','class'=>'img-rounded']); ?><br></td>
                                        <td><?= $value->pron; ?><br><br><?= Html::img($value->getPhotoViewer3(),['style'=>'width:100px;','class'=>'img-rounded']); ?><br></td>
                                        <td>
                                            <div class="btn-group btn-group-sm text-center" role="group">
                                                <?= Html::a('<span class="glyphicon glyphicon-eye-open"></span>', ['view', 'practice_ch' => $value->practice_ch, 'practice_no' => $value->practice_no], ['class' => 'btn btn-default']) ?>
                                                <?= Html::a('<span class="glyphicon glyphicon-pencil"></span>', ['update', 'practice_ch' => $value->practice_ch, 'practice_no' => $value->practice_no], ['class' => 'btn btn-info']) ?>
                                                <?= Html::a('<span class="glyphicon glyphicon-trash"></span>', ['delete', 'practice_ch' => $value->practice_ch, 'practice_no' => $value->practice_no], [
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
                <!-- end chapter 13 -->
                <!-- chapter 14 -->
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingThree">
                      <h4 class="panel-title">
                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#ch14" aria-expanded="false" aria-controls="collapseThree">
                          chapter 14
                        </a>
                      </h4>
                    </div>
                    <div id="ch14" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                        <div class="panel-body">
                        <p>
                            <?= Html::a('Create Practice Ch.14', ['create', 'chapter' => '14'], ['class' => 'btn btn-success']) ?>
                        </p>
                            <table class="table table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th>คำถาม</th>
                                        <th>ความหมาย</th>
                                        <th>คำอ่านตัวอักษร</th>
                                        <th>การจัดการ</th>
                                    </tr>
                                </thead>
                                <?php foreach ($model_ch14 as $key => $value) : ?>
                                <tbody>
                                    <tr>
                                        <td><?= $value->question; ?><br><br><?= Html::img($value->getPhotoViewer(),['style'=>'width:100px;','class'=>'img-rounded']); ?><br></td>
                                        <td><?= $value->meaning; ?><br><br><?= Html::img($value->getPhotoViewer2(),['style'=>'width:100px;','class'=>'img-rounded']); ?><br></td>
                                        <td><?= $value->pron; ?><br><br><?= Html::img($value->getPhotoViewer3(),['style'=>'width:100px;','class'=>'img-rounded']); ?><br></td>
                                        <td>
                                            <div class="btn-group btn-group-sm text-center" role="group">
                                                <?= Html::a('<span class="glyphicon glyphicon-eye-open"></span>', ['view', 'practice_ch' => $value->practice_ch, 'practice_no' => $value->practice_no], ['class' => 'btn btn-default']) ?>
                                                <?= Html::a('<span class="glyphicon glyphicon-pencil"></span>', ['update', 'practice_ch' => $value->practice_ch, 'practice_no' => $value->practice_no], ['class' => 'btn btn-info']) ?>
                                                <?= Html::a('<span class="glyphicon glyphicon-trash"></span>', ['delete', 'practice_ch' => $value->practice_ch, 'practice_no' => $value->practice_no], [
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
                <!-- end chapter 14 -->
                </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>
