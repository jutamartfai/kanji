<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Kanji */
/* @var $form yii\widgets\ActiveForm */
?>

<?php
    foreach ($ch_kanji as $key => $value) :
        $value->kanji_ch;
    endforeach;

    // echo $ch_value->kanji_ch;
    // echo $ch_value->kanji_no;

    if($model->kanji_ch == null && $model->kanji_no == null) //create case
    {
        if (!isset($value->kanji_ch)) {
            $model->kanji_ch=$chapter;
            $model->kanji_no='01';
        }
        else
        {
            $string_ch = $value->kanji_ch;
            $string_no = $value->kanji_no;

            $number = intval($string_no); //convert to integer
            $number = $number + 1; // number++

            if($number <= 99){
                if($number < 10){
                    $new_number = '0'.$number;
                }else{
                    $new_number = $number;
                }
            }

            $model->kanji_ch = $string_ch;
            $model->kanji_no = $new_number;
        }
    }
?>

<div class="kanji-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'kanji_ch')->textInput(['maxlength' => true,'readonly'=>true]) ?><!--  ,'readonly'=>true -->

    <?= $form->field($model, 'kanji_no')->textInput(['maxlength' => true,'readonly'=>true]) ?><!--  , 'readonly'=>true -->

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
