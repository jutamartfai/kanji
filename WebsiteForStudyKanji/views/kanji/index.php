<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\KanjiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Kanjis';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kanji-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Kanji', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'kanji_ch',
            'kanji_no',
            'kanji',
            'meaning',
            'jp_pron',
            // 'cn_pron',
            // 'line_num',
            // 'ex_vocab:ntext',
            // 'how_to',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
