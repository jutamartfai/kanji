<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PracticeSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="practice-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'practice_ch') ?>

    <?= $form->field($model, 'practice_no') ?>

    <?= $form->field($model, 'question') ?>

    <?= $form->field($model, 'meaning') ?>

    <?= $form->field($model, 'pron') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
