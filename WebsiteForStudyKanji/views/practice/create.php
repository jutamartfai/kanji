<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Practice */

$this->title = 'Create Practice';
$this->params['breadcrumbs'][] = ['label' => 'Practices', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="practice-create">

   <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Practice', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= $this->render('_form', [
        'model' => $model,
        'ch_practice' => $ch_practice,
    ]) ?>

</div>
