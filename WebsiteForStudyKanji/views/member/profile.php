<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Member */

$this->title = $model->email;
?>
<div class="member-view">

    <h1>My Profile : <?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Edit Profile', ['edit_profile', 'id' => $model->email], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Edit Password', ['password', 'id' => $model->email], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'email:email',
            'password',
            'first_name',
            'last_name',
            // 'active_date',
        ],
    ]) ?>

</div>
