<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AdminSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'การจัดการผู้ดูแลระบบ';
// $this->params['breadcrumbs'][] = $this->title;
?>
<div class="admin-index">

    <?php if ($admin_alert=='1'): ?>
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>ลบเรียบร้อย!</strong> รายการที่คุณเลือกถูกลบเรียบร้อยแล้ว
        </div>
    <?php endif ?>
    <?php if ($admin_alert=='2'): ?>
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>เพิ่มเรียบร้อย!</strong> ข้อมูลถูกเพิ่มเรียบร้อยแล้ว
        </div>
    <?php endif ?>

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


    <div class="panel-group">
        <div class="panel panel-default">
            <div class="panel-body">
            <br>
                <p>
                    <?= Html::a('<span class="glyphicon glyphicon-plus"></span>&nbsp;เพิ่มผู้ดูแลระบบ', ['create'], ['class' => 'btn btn-success']) ?>
                </p>
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>ชื่อผู้ใช้</th>
                            <th>รหัสผ่าน</th>
                            <th>การจัดการ</th>
                        </tr>
                    </thead>
                    <?php foreach ($model as $key => $value) : ?>
                        <tbody>
                            <tr>
                                <td><?= $value->username; ?></td>
                                <td><?= $value->password; ?></td>
                                <td>
                                    <div class="btn-group btn-group-sm text-center" role="group">
                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#<?= $value->username; ?>"><span class="glyphicon glyphicon-trash"></span></button>
                                        <div class="modal fade" id="<?= $value->username; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                                            <div class="modal-dialog" role="document">
                                              <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title" id="exampleModalLabel">ต้องการลบรายการนี้หรือไม่?</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <h1><?= $value->username; ?></h1>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
                                                    <?= Html::a('ลบ', ['deletes', 'id' => $value->username], ['class' => 'btn btn-danger']) ?>
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
            </div>
        </div>
    </div>
</div>
