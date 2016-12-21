<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BookmarktransactionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Bookmarktransactions';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bookmarktransaction-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Bookmarktransaction', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'email:email',
            'kanji_ch',
            'view_date',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
