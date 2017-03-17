<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

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

</div>
