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
		    <?= $this->render('_form-register', [
		        'model' => $model,
		    ]) ?>
		</div>
    <div class="col-md-4"></div>
</div>
</div>
