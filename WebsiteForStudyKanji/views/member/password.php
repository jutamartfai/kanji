<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

$this->title = 'แก้ไขรหัสผ่าน: ' . $model->email;
?>

  <center><h1><?= Html::encode($this->title) ?></h1></center>
	<br>

<div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4">

		<?php $form = ActiveForm::begin(); ?>

		<?= $form->field($model, 'email')->textInput(['maxlength' => true,'readonly'=>true]) ?>

		<?= $form->field($model, 'first_name')->textInput(['maxlength' => true,'readonly'=>true]) ?>

		<?= $form->field($model, 'last_name')->textInput(['maxlength' => true,'readonly'=>true]) ?>

		<?= $form->field($current, 'password')->passwordInput(['value'=>false, 'autofocus' => true])->label('รหัสผ่านปัจจุบัน'); ?>

        <?= $form->field($model, 'password')->passwordInput(['value'=>false])->label('รหัสผ่านใหม่'); ?>

		<center><p>
            <?= Html::submitButton('บันทึก', ['class' => 'btn btn-primary']) ?>
            <?= Html::a('ยกเลิก', ['profile', 'id' => $model->email], ['class' => 'btn btn-warning']) ?>
		</p></center>

		<?php ActiveForm::end(); ?>
	</div>
    <div class="col-md-4"></div>
</div>