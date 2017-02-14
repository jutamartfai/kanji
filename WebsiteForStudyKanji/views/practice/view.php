<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Practice */

$title = $model->practice_ch;
$title2 = $model->practice_no;
$this->params['breadcrumbs'][] = ['label' => 'Practices', 'url' => ['index']];
$this->params['breadcrumbs'][] = $title;
$this->params['breadcrumbs'][] = $title2;
?>
<div class="practice-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'practice_ch' => $model->practice_ch, 'practice_no' => $model->practice_no], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'practice_ch' => $model->practice_ch, 'practice_no' => $model->practice_no], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'practice_ch',
            'practice_no',
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

