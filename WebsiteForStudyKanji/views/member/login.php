<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'เข้าสู่ระบบ';
// $this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <center><h1><?= Html::encode($this->title) ?></h1>

    <p>โปรดกรอกข้อมูลต่อไปนี้เพื่อเข้าสู่ระบบ:</p></center>

    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'layout' => 'horizontal',
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-4\">{input}</div>\n<div class=\"col-lg-4\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-4 control-label'],
        ],
    ]); ?>

        <?= $form->field($model, 'username')->input('email', ['autofocus' => true]) ?>

        <?= $form->field($model, 'password')->passwordInput() ?>

        <div class="row">
            <div class="col-xs-6 col-sm-5"></div>
            <div class="col-xs-6 col-sm-1">
                <?= Html::submitButton('เข้าสู่ระบบ', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
            </div>
            <div class="col-xs-6 col-sm-1">
                <?= Html::a('สมัครสมาชิก', ['register'], ['class' => 'btn btn-info']) ?>
            </div>
            <!-- <div class="col-xs-6 col-sm-1">
                <?= Html::a('for admin', ['admin/wellcome'], ['class' => 'btn btn-info']) ?>
            </div> -->
        </div>

    <?php ActiveForm::end(); ?>

<!--     <div class="col-lg-offset-1" style="color:#999;">
        You may login with <strong>admin/admin</strong> or <strong>demo/demo</strong>.<br>
        To modify the username/password, please check out the code <code>app\models\User::$users</code>.
    </div> -->
</div>
