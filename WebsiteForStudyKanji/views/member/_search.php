<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MemberSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="member-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <div class="row">
        <div class="col-xs-8 col-sm-4 col-md-4">
           <?= $form->field($model, 'email') ?>
        </div>
        <div class="col-xs-8 col-sm-4 col-md-4">
           <?= $form->field($model, 'first_name') ?>
        </div>
        <div class="col-xs-8 col-sm-4 col-md-4">
            <?= $form->field($model, 'last_name') ?>
        </div>
    </div>

    <!-- = $form->field($model, 'password')

    = $form->field($model, 'active_date') -->

    <div class="form-group">
        <?= Html::submitButton('ค้นหา', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('รีเซ็ต', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
