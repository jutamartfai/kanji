<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Practice */

$this->title = $model->question.', '.$model->meaning.', '.$model->pron;
// $title = $model->practice_ch;
// $title2 = $model->practice_no;
// $this->params['breadcrumbs'][] = ['label' => 'Practices', 'url' => ['index']];
// $this->params['breadcrumbs'][] = $title;
// $this->params['breadcrumbs'][] = $title2;
?>
<div class="practice-view">

<!--     <h1><?= Html::encode($this->title) ?></h1> -->

    <p>
        <?= Html::a('<span class="glyphicon glyphicon-pencil"></span>&nbsp;แก้ไข', ['update', 'practice_ch' => $model->practice_ch, 'practice_no' => $model->practice_no], ['class' => 'btn btn-primary']) ?>
        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete"><span class="glyphicon glyphicon-trash"></span>&nbsp;ลบ</button>
        <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="exampleModalLabel">ต้องการลบหรือไม่?</h4>
                </div>
                <div class="modal-body">
                    <center><p><?= $model->question; ?>, &nbsp; <?= $model->meaning; ?>, &nbsp; <?= $model->pron; ?></p></center>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
                    <?= Html::a('ลบ', ['deletes', 'practice_ch' => $model->practice_ch, 'practice_no' => $model->practice_no], ['class' => 'btn btn-danger']) ?>
                </div>
              </div>
            </div>
        </div>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'practice_ch',
            // 'practice_no',
            //'question',
            //'meaning',
            //'pron',
            [
                'format'=>'raw',
                'attribute'=>'question',
                'value'=>Html::img($model->photoViewer,['class'=>'img-thumbnail','style'=>'width:200px;'])
            ],
            [
                'format'=>'raw',
                'attribute'=>'meaning',
                'value'=>Html::img($model->photoViewer2,['class'=>'img-thumbnail','style'=>'width:200px;'])
            ],
            [
                'format'=>'raw',
                'attribute'=>'pron',
                'value'=>Html::img($model->photoViewer3,['class'=>'img-thumbnail','style'=>'width:200px;'])
            ],
        ],
    ]) ?>

</div>

