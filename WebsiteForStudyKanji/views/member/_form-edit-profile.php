<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Member */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="member-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

<!--     <?= $form->field($model, 'password')->passwordInput(['maxlength' => true,'readonly'=>true]) ?> -->

    <?= $form->field($model, 'first_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?>

<!--     <?= $form->field($model, 'active_date')->textInput(['maxlength' => true]) ?> -->

    <center>
	    <div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'เพิ่ม' : 'แก้ไข', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    	<?= Html::a('ยกเลิก', ['profile', 'id' => $model->email], ['class' => 'btn btn-warning']) ?>
	    </div>
    </center>

    <?php ActiveForm::end(); ?>

</div>
