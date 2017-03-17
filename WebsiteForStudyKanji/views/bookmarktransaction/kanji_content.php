<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Kanji */
/* @var $form yii\widgets\ActiveForm */

$this->title = $ch_name;
$this->params['breadcrumbs'][] = ['label' => 'Kanji Chapter', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<h1><?= Html::encode($this->title) ?></h1>
<br>
folder
<div class="panel-group">
    <div class="panel panel-default">
        <div class="panel-body">
        <br>
        <h1><div class="btn-group" role="group">
            <?php foreach ($model as $key => $value) : ?>
            <a href="#<?= $value->kanji_no; ?>" class="btn btn-default"><?= $value->kanji; ?></a>
            <?php endforeach ; ?>
        </div></h1>
        <br>
            <table class="table table-hover table-bordered">
                <?php foreach ($model as $key => $value) : ?>
                    <!-- <div id="<?= $value->kanji_no; ?>"> -->
                    <thead id="<?= $value->kanji_no; ?>">
                        <tr>
                            <th>ตัวอักษรคันจิ</th>
                            <th>ความหมาย</th>
                            <th>คำอ่านแบบญี่ปุ่น</th>
                            <th>คำอ่านแบบจีน</th>
                            <th>จำนวนขีด</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?= $value->kanji; ?></td>
                            <td><?= $value->meaning; ?></td>
                            <td><?= $value->jp_pron; ?></td>
                            <td><?= $value->cn_pron; ?></td>
                            <td><?= $value->line_num; ?></td>
                        </tr>
                        <tr>
                            <td colspan="5">
                                <h5>ตัวอย่างคำศัพท์</h5>
                                <?= $value->ex_vocab; ?>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="5">
                                <h5>วิดีโอวิธีการเขียน</h5>
                                <center>
                                    <!-- <embed width="420" height="315" src="https://www.youtube.com/embed/eeYU0qcxUS8"> -->
                                    <iframe width="560" height="315" src="<?= $value->how_to; ?>" frameborder="0" allowfullscreen></iframe>
                                </center>
                            </td>
                        </tr>
                    </tbody>
                    <!-- </div> -->
                <?php endforeach ; ?>
            </table>
        </div>
    </div>
</div>
