<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Practice */

$this->title = 'เพิ่มแบบทดสอบ';
// $this->params['breadcrumbs'][] = ['label' => 'Practices', 'url' => ['index']];
// $this->params['breadcrumbs'][] = $this->title;
?>
<div class="practice-create">

   <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'ch_practice' => $ch_practice,
        'chapter'=>$chapter,
        //'model_upload' => $model_upload,
    ]) ?>

</div>

