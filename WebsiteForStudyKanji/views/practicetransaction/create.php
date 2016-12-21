<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Practicetransaction */

$this->title = 'Create Practicetransaction';
$this->params['breadcrumbs'][] = ['label' => 'Practicetransactions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="practicetransaction-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
