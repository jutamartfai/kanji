<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

$this->title = 'kanji website';
?>

<h3>change password</h3>
<div class="col-md-1"></div>
<div class="col-md-10">
	<div class="col-md-3"></div>
	<div class="well col-md-6">
		<?php $form = ActiveForm::begin(); ?>

		<?= $form->field($model, 'email')->textInput(['maxlength' => true,'readonly'=>true]) ?>

		<?= $form->field($model, 'first_name')->textInput(['maxlength' => true,'readonly'=>true]) ?>

		<?= $form->field($model, 'last_name')->textInput(['maxlength' => true,'readonly'=>true]) ?>

		<?= $form->field($current, 'password')->passwordInput(['value'=>false, 'autofocus' => true])->label('current password'); ?>

        <?= $form->field($model, 'password')->passwordInput(['value'=>false])->label('new password'); ?>

        <div class="form-group">
            <div class="col-lg-offset-1 col-lg-11">
                <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
            </div>
        </div>

		<?php ActiveForm::end(); ?>
	</div>
	<div class="col-md-3"></div>
</div>
<div class="col-md-1"></div>