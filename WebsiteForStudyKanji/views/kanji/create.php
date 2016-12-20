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

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
