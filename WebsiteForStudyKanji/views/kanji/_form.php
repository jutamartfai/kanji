<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Kanji */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kanji-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'kanji_ch')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kanji_no')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kanji')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'meaning')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jp_pron')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cn_pron')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'line_num')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ex_vocab')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'how_to')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
