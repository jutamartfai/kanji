<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\KanjiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'PRACTICE CHAPTER';

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
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingThree">
                              <h4 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#" aria-expanded="false" aria-controls="collapseThree">
                                    <?= $chapter->name; ?>
                                </a>
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