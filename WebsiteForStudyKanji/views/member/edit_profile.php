<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Member */

$this->title = 'แก้ไขข้อมูลส่วนตัว: ' . $model->email;
?>
<div class="member-update">

    <center><h1><?= Html::encode($this->title) ?></h1></center>
	<br>
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">

		    <?= $this->render('_form-edit-profile', [
		        'model' => $model,
		    ]) ?>
		</div>
        <div class="col-md-4"></div>
    </div>

</div>
