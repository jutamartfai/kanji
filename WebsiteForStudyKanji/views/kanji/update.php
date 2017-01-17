<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Kanji */

$this->title = 'Update Kanji: ' . ' ch. '. $model->kanji_ch . ' no. '. $model->kanji_no;
$this->params['breadcrumbs'][] = ['label' => 'Kanjis', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' =>  ' ch. '. $model->kanji_ch . ' no. '. $model->kanji_no, 'url' => ['view', 'kanji_ch' => $model->kanji_ch, 'kanji_no' => $model->kanji_no]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="kanji-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'ch_kanji'=>$ch_kanji,
    ]) ?>

</div>
