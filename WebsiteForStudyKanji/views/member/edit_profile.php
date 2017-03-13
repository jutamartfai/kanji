<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Member */

$this->title = 'Update Member: ' . $model->email;
?>
<div class="member-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form-edit-profile', [
        'model' => $model,
    ]) ?>

</div>
