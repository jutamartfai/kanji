<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Bookmarktransaction */

$this->title = 'Create Bookmarktransaction';
$this->params['breadcrumbs'][] = ['label' => 'Bookmarktransactions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bookmarktransaction-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
