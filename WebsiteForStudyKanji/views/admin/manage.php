<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\web\Session;

$session = new Session();
$session->open();

/* @var $this yii\web\View */
/* @var $searchModel app\models\AdminSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'WELCOME ADMIN';
?>

<div class="admin-index">

	<?php if ($login_alert=='1'): ?>
	    <div class="alert alert-success alert-dismissible" role="alert">
	        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <strong>เข้าสู่ระบบสำเร็จ!</strong> ยินดีต้อนรับ <?= $session['admin_name']; ?>
	    </div>
	<?php endif ?>
	<?php if ($login_alert=='2'): ?>
	    <div class="alert alert-success alert-dismissible" role="alert">
	        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <strong>ออกจากระบบสำเร็จ!</strong>
	    </div>
	<?php endif ?>

	<div class="jumbotron">
		<center><h1><?= Html::encode($this->title) ?></h1></center>
	</div>

</div>