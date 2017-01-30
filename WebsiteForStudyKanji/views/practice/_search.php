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

    <div class="row">
        <div class="col-xs-8 col-sm-4 col-md-4">
           <?= $form->field($model, 'practice_ch') ?>
        </div>
        <div class="col-xs-8 col-sm-4 col-md-4">
           <?= $form->field($model, 'practice_no') ?>
        </div>
        <div class="col-xs-8 col-sm-4 col-md-4">
            <?= $form->field($model, 'question') ?>
        </div>
    </div>

<!--     = $form->field($model, 'meaning')

    = $form->field($model, 'pron') -->

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
