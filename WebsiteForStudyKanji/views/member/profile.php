<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Member */

$this->title = $model->email;
?>
<div class="member-view">

    <div class="panel-group">
        <div class="panel panel-default">
            <div class="panel-body">

                <?php if ($profile_alert=='1'): ?>
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <strong>บันทึกเรียบร้อย!</strong> ข้อมูลของคุณถูกบันทึกเรียบร้อยแล้ว
                    </div>
                <?php endif ?>
                <?php if ($profile_alert=='2'): ?>
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <strong>ลบเรียบร้อย!</strong> บันทึกผลคะแนนที่คุณเลือกถูกลบเรียบร้อยแล้ว
                    </div>
                <?php endif ?>
                <center><h1>โปรไฟล์ของ : <?= Html::encode($this->title) ?></h1></center>

                <br>
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <center><p>
                            <?= Html::a('แก้ไขชื่อ', ['edit_profile', 'id' => $model->email], ['class' => 'btn btn-primary']) ?>
                            <?= Html::a('แก้ไขรหัสผ่าน', ['password', 'id' => $model->email], ['class' => 'btn btn-primary']) ?>
                        </p></center><br>

                        <?= DetailView::widget([
                            'model' => $model,
                            'attributes' => [
                                'email',
                                // 'password',
                                'first_name',
                                'last_name',
                                // 'active_date',
                            ],
                        ]) ?>
                    </div>
                    <div class="col-md-2"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="panel-group">
        <div class="panel panel-default">
            <div class="panel-body">
                <!-- bookmark transaction -->
                <?php $form = ActiveForm::begin(); ?>
                <br><br><center><h1>ประวัติการเข้าชมบทเรียน</h1></center><br><br>
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>วันที่และเวลาเข้าชม</th>
                            <th>บทที่</th>
                            <th>ชื่อบทเรียน</th>
                        </tr>
                    </thead>
                    <?php foreach ($bookmarkTran as $key => $value) : ?>
                        <tbody>
                            <tr>
                                <?php
                                    $time = strtotime($value->view_date);
                                    $myFormatForView = date("m/d/y g:i A", $time);
                                ?>
                                <td><?= $myFormatForView; ?></td>
                                <td><?= $value->kanji_ch; ?></td>
                                <?php foreach ($model_ch as $key => $chapter) : ?>
                                <?php if ($value->kanji_ch==$chapter->no): ?>
                                <td><?= $chapter->name; ?></td>
                                <?php endif ?>
                                <?php endforeach ; ?>
                            </tr>
                        </tbody>
                    <?php endforeach ; ?>
                </table>
                <?php ActiveForm::end(); ?>
            <!-- end bookmark transaction -->
            </div>
        </div>
    </div>
    <div class="panel-group">
        <div class="panel panel-default">
            <div class="panel-body">
            <!-- practice transaction -->
                <br><br><center><h1>ผลคะแนนจากการทำแบบทดสอบ</h1></center><br><br>
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>วันที่และเวลาเข้าทำแบบทดสอบ</th>
                            <th>บทที่</th>
                            <th>ชื่อบทเรียน</th>
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
                                <?php foreach ($model_ch as $key => $chapter) : ?>
                                <?php if ($value->practice_ch==$chapter->no): ?>
                                <td><?= $chapter->name; ?></td>
                                <?php endif ?>
                                <?php endforeach ; ?>
                                <td><?= $value->score; ?></td>
                                <td>
                                    <div class="btn-group btn-group-sm text-center" role="group">
                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#<?= $value->id; ?>"><span class="glyphicon glyphicon-trash"></span></button>
                                        <div class="modal fade" id="<?= $value->id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                                            <div class="modal-dialog" role="document">
                                              <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title" id="exampleModalLabel">ต้องการลบผลคะแนนนี้หรือไม่?</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <center><p>บทที่ : <?= $value->practice_ch; ?>
                                                    <br>คะแนนที่ได้ : <?= $value->score; ?> </p></center>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
                                                    <?= Html::a('ลบ', ['deletes', 'id' => $model->email, 'no' => $value->id], ['class' => 'btn btn-danger']) ?>
                                                </div>
                                              </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    <?php endforeach ; ?>
                </table>
            <!-- end practice transaction -->
            </div>
        </div>
    </div>
</div>
