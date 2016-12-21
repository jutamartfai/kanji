<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Kanji */

$this->title = 'Create Kanji';
$this->params['breadcrumbs'][] = ['label' => 'Kanjis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kanji-create">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Kanji', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
