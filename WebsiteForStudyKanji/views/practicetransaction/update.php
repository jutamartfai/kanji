<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Practicetransaction */

$this->title = 'Update Practicetransaction: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Practicetransactions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="practicetransaction-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
