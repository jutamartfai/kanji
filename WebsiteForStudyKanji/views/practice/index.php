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
            <br>
                <?php $form = ActiveForm::begin(); ?>
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                <!-- chapter -->
                <?php foreach ($model_ch as $key => $chapter) : ?>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingThree">
                      <h4 class="panel-title">
                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#<?= $chapter->no; ?>" aria-expanded="false" aria-controls="collapseThree">
                            <?= $chapter->name; ?>
                        </a>
                      </h4>
                    </div>
                    <div id="<?= $chapter->no; ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                        <div class="panel-body">
                        <p>
                            <?= Html::a('Create Practice ch.'.$chapter->no, ['create', 'chapter' => $chapter->no ], ['class' => 'btn btn-success']) ?>
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
                                <?php foreach ($model as $key => $value) : ?>
                                    <?php if ($value->practice_ch==$chapter->no): ?>
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
                                    <?php endif ?>
                                <?php endforeach ; ?>
                            </table>
                        </div>
                    </div>
                </div>
                <?php endforeach ; ?>
                <!-- end chapter -->
                </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>
