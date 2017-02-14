<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $model app\models\Kanji */

$title = $model->kanji_ch;
$title2 = $model->kanji_no;
$this->params['breadcrumbs'][] = ['label' => 'Kanjis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $title;
$this->params['breadcrumbs'][] = $title2;
?>
<div class="kanji-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'kanji_ch' => $model->kanji_ch, 'kanji_no' => $model->kanji_no], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'kanji_ch' => $model->kanji_ch, 'kanji_no' => $model->kanji_no], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'kanji_ch',
            'kanji_no',
            'kanji',
            'meaning',
            'jp_pron',
            'cn_pron',
            'line_num',
            'ex_vocab:ntext',
            'how_to',
        ],
    ]) ?>

</div>
