<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $model app\models\Kanji */

$this->title = $model->kanji;
// $title = $model->kanji_ch;
// $title2 = $model->kanji_no;
// $this->params['breadcrumbs'][] = ['label' => 'Kanjis', 'url' => ['index']];
// $this->params['breadcrumbs'][] = $title;
// $this->params['breadcrumbs'][] = $title2;
?>
<div class="kanji-view">

<!--     <h1><?= Html::encode($this->title) ?></h1> -->

    <br><br><p>
        <?= Html::a('<span class="glyphicon glyphicon-pencil"></span>&nbsp;แก้ไข', ['update', 'kanji_ch' => $model->kanji_ch, 'kanji_no' => $model->kanji_no], ['class' => 'btn btn-primary']) ?>
        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete"><span class="glyphicon glyphicon-trash"></span>&nbsp;ลบ</button>
        <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="exampleModalLabel">ต้องการลบหรือไม่?</h4>
                </div>
                <div class="modal-body">
                    <center><p><h1><?= $model->kanji; ?></h1></p></center>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
                    <?= Html::a('ลบ', ['deletes', 'kanji_ch' => $model->kanji_ch, 'kanji_no' => $model->kanji_no], ['class' => 'btn btn-danger']) ?>
                </div>
              </div>
            </div>
        </div>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'kanji_ch',
            // 'kanji_no',
            'kanji',
            'meaning',
            'jp_pron',
            'cn_pron',
            'line_num',
            'ex_vocab:ntext',
            'how_to:url',
            [
                'format' => 'raw',
                'attribute'=>'how_to',
                'value' => !empty($model->how_to) ? '<iframe class="embed-responsive-item" src="'.$model->how_to.'" frameborder="0" allowfullscreen></iframe>' : null,
            ],
        ],
    ]) ?>

</div>
