<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\KanjiSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kanji-search">

    <?php $form = ActiveForm::begin([
        'action' => ['manage_kanji'],
        'method' => 'get',
    ]); ?>

    <div class="row">
        <div class="col-xs-8 col-sm-4 col-md-4">
           <?= $form->field($model, 'kanji_ch') ?>
        </div>
        <div class="col-xs-8 col-sm-4 col-md-4">
           <?= $form->field($model, 'kanji_no') ?>
        </div>
        <div class="col-xs-8 col-sm-4 col-md-4">
            <?= $form->field($model, 'kanji') ?>
        </div>
    </div>

    <!-- = $form->field($model, 'meaning')

    = $form->field($model, 'jp_pron')

    = $form->field($model, 'cn_pron')

    = $form->field($model, 'line_num')

    = $form->field($model, 'ex_vocab')

    = $form->field($model, 'how_to') -->

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
