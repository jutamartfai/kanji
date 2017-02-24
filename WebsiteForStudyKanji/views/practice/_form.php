<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use app\models\UploadForm;
use yii\web\UploadedFile;


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
            //$model_upload->newname = $string_ch.$new_number;
        }
    }
?>

<div class="practice-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'practice_ch')->textInput(['maxlength' => true,'readonly'=>true]) ?>

    <?= $form->field($model, 'practice_no')->textInput(['maxlength' => true,'readonly'=>true]) ?>

    <!-- input file -> question image -->

    <div class="row">
        <!-- <div class="col-md-2">
            <div class="well text-center">
                <?= Html::img($model->getPhotoViewer(),['style'=>'width:100px;','class'=>'img-rounded']); ?>
            </div>
        </div> -->
        <div class="col-md-10">
            <?= $form->field($model, 'question')->fileInput(['onchange' => 'loadFile(event)']); ?>
        </div>
    </div>

       <!--  <?php
        $myImage = $model->question;
        $image = '@web/uploads/'.$myImage;
    ?>

    <?= Html::img($image, $option=['id'=>'output', 'width'=>300]); ?> -->

    <!-- input file -> meaning image -->

    <div class="row">
        <!-- <div class="col-md-2">
            <div class="well text-center">
                <?= Html::img($model->getPhotoViewer2(),['style'=>'width:100px;','class'=>'img-rounded']); ?>
            </div>
        </div> -->
        <div class="col-md-10">
            <?= $form->field($model, 'meaning')->fileInput(['onchange' => 'loadFile(event)']); ?>
        </div>
    </div>

       <!--  <?php
        $myImage2 = $model->meaning;
        $image2 = '@web/uploads/'.$myImage2;
    ?>

    <?= Html::img($image2, $option=['id'=>'output', 'width'=>300]); ?> -->

    <!-- input file -> pron image -->

    <div class="row">
        <!-- <div class="col-md-2">
            <div class="well text-center">
                <?= Html::img($model->getPhotoViewer3(),['style'=>'width:100px;','class'=>'img-rounded']); ?>
            </div>
        </div> -->
        <div class="col-md-10">
            <?= $form->field($model, 'pron')->fileInput(['onchange' => 'loadFile(event)']); ?>
        </div>
    </div>

 <!--        <?php
        $myImage3 = $model->pron;
        $image3 = '@web/uploads/'.$myImage3;
    ?>

    <?= Html::img($image3, $option=['id'=>'output', 'width'=>300]); ?> -->

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<script>
    var loadFile = function(event){
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
    };
</script>