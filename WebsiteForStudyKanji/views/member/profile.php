<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Member */

$this->title = $model->email;
?>
<div class="member-view">

    <center><h1>My Profile : <?= Html::encode($this->title) ?></h1></center>
    <br>
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <center><p>
                <?= Html::a('Edit Profile', ['edit_profile', 'id' => $model->email], ['class' => 'btn btn-primary']) ?>
                <?= Html::a('Edit Password', ['password', 'id' => $model->email], ['class' => 'btn btn-primary']) ?>
            </p></center><br>

            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'email:email',
                    // 'password',
                    'first_name',
                    'last_name',
                    // 'active_date',
                ],
            ]) ?>
        </div>
        <div class="col-md-2"></div>
    </div>
    <!-- bookmark transaction -->
    <br><br><center><h1>ประวัติการเข้าชมบทเรียน</h1></center><br><br>
    <table class="table table-hover table-bordered">
        <thead>
            <tr>
                <th>บทที่</th>
                <th>วันที่และเวลาเข้าชม</th>
            </tr>
        </thead>
        <?php foreach ($bookmarkTran as $key => $value) : ?>
            <tbody>
                <tr>
                    <td><?= $value->kanji_ch; ?></td>
                    <?php
                        $time = strtotime($value->view_date);
                        $myFormatForView = date("m/d/y g:i A", $time);
                    ?>
                    <td><?= $myFormatForView; ?></td>
                </tr>
            </tbody>
        <?php endforeach ; ?>
    </table>
<!-- end bookmark transaction -->

<!-- practice transaction -->
    <br><br><center><h1>ผลคะแนนจากการทำแบบทดสอบ</h1></center><br><br>
    <table class="table table-hover table-bordered">
        <thead>
            <tr>
                <th>วันที่และเวลาเข้าทำแบบทดสอบ</th>
                <th>บทที่</th>
                <th>คะแนนที่ได้</th>
                <th></th>
            </tr>
        </thead>
        <?php foreach ($pracTran as $key => $value) : ?>
            <tbody>
                <tr>
                    <?php
                        $time = strtotime($value->do_date);
                        $myFormatForView = date("m/d/y g:i A", $time);
                    ?>
                    <td><?= $myFormatForView; ?></td>
                    <td><?= $value->practice_ch; ?></td>
                    <td><?= $value->score; ?></td>
                    <td>
                        <div class="btn-group btn-group-sm text-center" role="group">
                            <p><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deletePracTran"><span class="glyphicon glyphicon-trash"></span></button></p>
                            <div class="modal fade" id="deletePracTran" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                                <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                      <h4 class="modal-title" id="exampleModalLabel">ลบรายการ</h4>
                                    </div>
                                    <div class="modal-body">
                                      <p>ต้องการลบผลคะแนนนี้หรือไม่?</p>
                                    </div>
                                    <div class="modal-footer">
                                      <?= Html::a('ลบ', ['DeletePT', 'id' => $model->email, 'no' => $value->id], ['class' => 'btn btn-danger']) ?>
                                      <button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
                                    </div>
                                  </div>
                                </div>
                            </div>
<!--                             <?= Html::a('<span class="glyphicon glyphicon-trash"></span>', ['DeletePT', 'id' => $model->email, 'no' => $value->id], [
                                'class' => 'btn btn-danger',
                                'data' => [
                                    'confirm' => 'Are you sure you want to delete this item?',
                                    'method' => 'post',
                                ],
                            ]) ?> -->
                        </div>
                    </td>
                </tr>
            </tbody>
        <?php endforeach ; ?>
    </table>
<!-- end practice transaction -->
</div>
