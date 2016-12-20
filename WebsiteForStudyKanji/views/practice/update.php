<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Practice */

$this->title = 'Update Practice: ' . $model->practice_ch;
$this->params['breadcrumbs'][] = ['label' => 'Practices', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->practice_ch, 'url' => ['view', 'practice_ch' => $model->practice_ch, 'practice_no' => $model->practice_no]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="practice-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
