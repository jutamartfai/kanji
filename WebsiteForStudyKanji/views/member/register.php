<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Member */

$this->title = 'สมัครสมาชิกใหม่';
?>
<div class="member-create">

    <center><h1><?= Html::encode($this->title) ?></h1></center>

	<div class="row">
	    <div class="col-md-4"></div>
	    <div class="col-md-4">
	    <?php if ($email_check=='1'): ?>
	    	<div class="alert alert-danger alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<strong>คำเตือน!</strong> อีเมล์ของคุณมีผู้ใช้แล้ว กรุณาเปลี่ยนอีเมล์ที่ใช้สมัครใหม่
			</div>
	    <?php endif ?>
		    <?= $this->render('_form-register', [
		        'model' => $model,
		    ]) ?>
		</div>
    <div class="col-md-4"></div>
</div>
</div>


