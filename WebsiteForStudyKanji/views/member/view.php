<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Member */

$this->title = $model->email;
// $this->params['breadcrumbs'][] = ['label' => 'Members', 'url' => ['index']];
// $this->params['breadcrumbs'][] = $this->title;
?>
<div class="member-view">

    <p>
<!--         <?= Html::a('<span class="glyphicon glyphicon-pencil"></span>&nbsp;แก้ไข', ['update', 'id' => $model->email], ['class' => 'btn btn-primary']) ?> -->
        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete"><span class="glyphicon glyphicon-trash"></span>&nbsp;ลบ</button>
        <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="exampleModalLabel">ต้องการลบหรือไม่?</h4>
                </div>
                <div class="modal-body">
                    <center><p><?= $model->email; ?></p></center>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
                    <?= Html::a('ลบ', ['deletebyadmin', 'id' => "$model->email"], ['class' => 'btn btn-danger']) ?>
                </div>
              </div>
            </div>
        </div>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'email:email',
            // 'password',
            'first_name',
            'last_name',
            'active_date:dateTime',
        ],
    ]) ?>

</div>
