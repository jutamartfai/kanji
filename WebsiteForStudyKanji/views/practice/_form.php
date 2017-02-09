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
        if (!isset($value->practice_ch)) {
            $model->practice_ch=$chapter;
            $model->practice_no='01';
        }
        else
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
    }
?>

<div class="practice-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'practice_ch')->textInput(['maxlength' => true,'readonly'=>true]) ?>

    <?= $form->field($model, 'practice_no')->textInput(['maxlength' => true,'readonly'=>true]) ?>

    <?= $form->field($model_upload, 'file')->fileInput() ?>

    <?= $form->field($model_upload, 'file2')->fileInput() ?>

    <?= $form->field($model_upload, 'file3')->fileInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
