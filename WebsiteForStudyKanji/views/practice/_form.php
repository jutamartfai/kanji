<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Practice */
/* @var $form yii\widgets\ActiveForm */
?>

<?php
    foreach ($ch_practice as $key => $value) :
        $value->practice_ch;
    endforeach;

    // echo $ch_value->kanji_ch;
    // echo $ch_value->kanji_no;

    if($model->practice_ch == null && $model->practice_no == null) //create case
    {
        $string_ch = $value->practice_ch;
        $string_no = $value->practice_no;

        $number = intval($string_no); //convert to integer
        $number = $number + 1; // number++

        if($number <= 99){
            if($number < 10){
                $new_number = '0'.$number;
            }else{
                $new_number = $number;
            }
        }

        $model->practice_ch = $string_ch;
        $model->practice_no = $new_number;
    }
?>

<div class="practice-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'practice_ch')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'practice_no')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'question')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'meaning')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pron')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
