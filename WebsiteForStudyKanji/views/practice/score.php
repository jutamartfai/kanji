<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Kanji */
/* @var $form yii\widgets\ActiveForm */

$this->title = 'score'/*$ch_name*/;
?>

	<h1><?= Html::encode($this->title) ?></h1>
<br>
<div class="panel-group">
    <div class="panel panel-default">
        <div class="panel-body">

		<?php echo $correctScore."  ".$failScore; ?>
        </div>
    </div>
</div>