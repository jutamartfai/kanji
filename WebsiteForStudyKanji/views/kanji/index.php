<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\KanjiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Kanjis';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kanji-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="panel-group">
        <div class="panel panel-default">
            <div class="panel-body">
            <br>
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                <!-- chapter -->
                <?php foreach ($model_ch as $key => $chapter) : ?>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingThree">
                      <h4 class="panel-title">
                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#<?= $chapter->no; ?>" aria-expanded="false" aria-controls="collapseThree">
                            <?= $chapter->name; ?>
                        </a>
                      </h4>
                    </div>
                    <div id="<?= $chapter->no; ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                        <div class="panel-body">
                        <p>
                            <?= Html::a('Create Kanji ch.'.$chapter->no, ['create', 'chapter' => $chapter->no ], ['class' => 'btn btn-success']) ?>
                        </p>
                            <table class="table table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th>ตัวอักษรคันจิ</th>
                                        <th>ความหมาย</th>
                                        <th>การจัดการ</th>
                                    </tr>
                                </thead>
                                <?php foreach ($model as $key => $value) : ?>
                                    <?php if ($value->kanji_ch==$chapter->no): ?>
                                        <tbody>
                                            <tr>
                                                <td><?= $value->kanji; ?></td>
                                                <td><?= $value->meaning; ?></td>
                                                <td>
                                                    <div class="btn-group btn-group-sm text-center" role="group">
                                                        <?= Html::a('<span class="glyphicon glyphicon-eye-open"></span>', ['view', 'kanji_ch' => $value->kanji_ch, 'kanji_no' => $value->kanji_no], ['class' => 'btn btn-default']) ?>
                                                        <?= Html::a('<span class="glyphicon glyphicon-pencil"></span>', ['update', 'kanji_ch' => $value->kanji_ch, 'kanji_no' => $value->kanji_no], ['class' => 'btn btn-info']) ?>
                                                        <?= Html::a('<span class="glyphicon glyphicon-trash"></span>', ['delete', 'kanji_ch' => $value->kanji_ch, 'kanji_no' => $value->kanji_no], [
                                                            'class' => 'btn btn-danger',
                                                            'data' => [
                                                                'confirm' => 'Are you sure you want to delete this item?',
                                                                'method' => 'post',
                                                            ],
                                                        ]) ?>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    <?php endif ?>
                                <?php endforeach ; ?>
                            </table>
                        </div>
                    </div>
                </div>
                <?php endforeach ; ?>
                <!-- end chapter -->
                </div>
            </div>
        </div>
    </div>
</div>
