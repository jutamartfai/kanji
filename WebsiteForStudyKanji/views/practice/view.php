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
            'question',
            'meaning',
            'pron',
        ],
    ]) ?>

</div>

<?php
use yii\widgets\ActiveForm;
?>

<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

    <?= $form->field($model_upload, 'file')->fileInput() ?>

    <button>Submit</button>

<?php ActiveForm::end() ?>