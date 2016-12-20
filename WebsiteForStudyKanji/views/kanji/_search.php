<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\KanjiSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kanji-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'kanji_ch') ?>

    <?= $form->field($model, 'kanji_no') ?>

    <?= $form->field($model, 'kanji') ?>

    <?= $form->field($model, 'meaning') ?>

    <?= $form->field($model, 'jp_pron') ?>

    <?php // echo $form->field($model, 'cn_pron') ?>

    <?php // echo $form->field($model, 'line_num') ?>

    <?php // echo $form->field($model, 'ex_vocab') ?>

    <?php // echo $form->field($model, 'how_to') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
