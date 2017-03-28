<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\KanjiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'บทเรียนตัวอักษรคันจิ';

?>

<center><h1><?= Html::encode($this->title) ?></h1></center>

<div class="panel-group">
    <div class="panel panel-default">
        <div class="panel-body">
        <br>
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                        <!-- chapter -->
                        <?php foreach ($model_ch as $key => $chapter) : ?>
                            <?php foreach ($bookmark as $key => $tran) : ?>
                                <?php if ($tran->kanji_ch==$chapter->no): ?>
                                    <?php
                                        $time = strtotime($tran->view_date);
                                        $myFormatForView = date("m/d/y g:i A", $time); /*<span class="badge">14</span>*/
                                    ?>
                                <?php endif ?>
                            <?php endforeach ; ?>
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingThree">
                                <h4 class="panel-title">
                                    <?= Html::a($chapter->name, ['kanji_content', 'chapter' => $chapter->no, 'ch_name' => $chapter->name ], ['class' => 'collapsed']) ?>
                                </h4>
                            </div>
                        </div>
                        <br>
                        <?php endforeach ; ?>
                        <!-- end chapter -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>