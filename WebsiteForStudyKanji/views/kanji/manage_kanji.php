<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\KanjiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'การจัดการตัวอักษรคันจิ';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kanji-index">

    <?php if ($kanji_alert=='1'): ?>
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>ลบเรียบร้อย!</strong> รายการที่คุณเลือกถูกลบเรียบร้อยแล้ว
        </div>
    <?php endif ?>

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
                            <?= Html::a('<span class="glyphicon glyphicon-plus"></span>&nbsp;เพิ่มตัวอักษรคันจิ บทที่ '.$chapter->no, ['create', 'chapter' => $chapter->no ], ['class' => 'btn btn-success']) ?>
                        </p>
                            <table class="table table-hover table-bordered">
                                <thead>
                                    <tr class="info">
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
                                                        <?= Html::a('<span class="glyphicon glyphicon-eye-open"></span>', ['view', 'kanji_ch' => $value->kanji_ch, 'kanji_no' => $value->kanji_no, 'kanji_alert'=>'1'], ['class' => 'btn btn-default']) ?>
                                                        <?= Html::a('<span class="glyphicon glyphicon-pencil"></span>', ['update', 'kanji_ch' => $value->kanji_ch, 'kanji_no' => $value->kanji_no], ['class' => 'btn btn-info']) ?>
                                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#<?= $value->kanji_ch.$value->kanji_no; ?>"><span class="glyphicon glyphicon-trash"></span></button>
                                                        <div class="modal fade" id="<?= $value->kanji_ch.$value->kanji_no; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                                                            <div class="modal-dialog" role="document">
                                                              <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                    <h4 class="modal-title" id="exampleModalLabel">ต้องการลบรายการนี้หรือไม่?</h4>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <h1><?= $value->kanji; ?></h1>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
                                                                    <?= Html::a('ลบ', ['deletes', 'kanji_ch' => $value->kanji_ch, 'kanji_no' => $value->kanji_no], ['class' => 'btn btn-danger']) ?>
                                                                </div>
                                                              </div>
                                                            </div>
                                                        </div>
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
