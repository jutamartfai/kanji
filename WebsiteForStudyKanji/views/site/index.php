<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\Session;

$session = new Session();
$session->open();

/* @var $this yii\web\View */
/* @var $searchModel app\models\KanjiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'บทเรียนตัวอักษรคันจิ';

?>

<?php if ($login_alert=='1'): ?>
    <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>เข้าสู่ระบบสำเร็จ!</strong> ยินดีต้อนรับ <?= $session['member_name']; ?>
    </div>
<?php endif ?>
<?php if ($login_alert=='2'): ?>
    <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>ออกจากระบบสำเร็จ!</strong>
    </div>
<?php endif ?>

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