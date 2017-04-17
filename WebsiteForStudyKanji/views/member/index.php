<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MemberSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'จัดการข้อมูลสมาชิก';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="member-index">

    <?php if ($mem_alert=='1'): ?>
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
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>ชื่อ</th>
                            <th>นามสกุล</th>
                            <th>อีเมล์</th>
                            <th>วันที่เข้าใช้งานล่าสุด</th>
                            <th>การจัดการ</th>
                        </tr>
                    </thead>
                    <?php $i=1; ?>
                    <?php foreach ($model as $key => $value) : ?>
                        <tbody>
                            <tr>
                                <td><?= $value->first_name; ?></td>
                                <td><?= $value->last_name; ?></td>
                                <td><?= $value->email; ?></td>
                                <?php
                                    $time = strtotime($value->active_date);
                                    $myFormatForView = date("m/d/y g:i A", $time);
                                ?>
                                <td><?= $myFormatForView; ?></td>
                                <td>
                                    <div class="btn-group btn-group-sm text-center" role="group">
                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#<?= $i; ?>"><span class="glyphicon glyphicon-trash"></span></button>
                                        <div class="modal fade" id="<?= $i; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                                            <div class="modal-dialog" role="document">
                                              <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title" id="exampleModalLabel">ต้องการลบรายการนี้หรือไม่?</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <h1><?= $value->email; ?></h1>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
                                                    <?= Html::a('ลบ', ['deletebyadmin', 'id' => "$value->email"], ['class' => 'btn btn-danger']) ?>
                                                </div>
                                              </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                        <?php $i++; ?>
                    <?php endforeach ; ?>
                </table>
            </div>
        </div>
    </div>
</div>
