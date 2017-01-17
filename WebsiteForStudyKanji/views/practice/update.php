<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Practice */

$this->title = 'Update Practice: ' . ' ch. '. $model->practice_ch . ' no. '. $model->practice_no;
$this->params['breadcrumbs'][] = ['label' => 'Practices', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => ' ch. '. $model->practice_ch . ' no. '. $model->practice_no, 'url' => ['view', 'practice_ch' => $model->practice_ch, 'practice_no' => $model->practice_no]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="practice-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'ch_practice' => $ch_practice,
    ]) ?>

</div>
