<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Kanji */
/* @var $form yii\widgets\ActiveForm */

$this->title = $ch_name;
$this->params['breadcrumbs'][] = ['label' => 'แบบทดสอบตัวอักษรคันจิ', 'url' => ['sel_practice']];
$this->params['breadcrumbs'][] = $this->title;
?>

<?php $i=0; ?>
<?php foreach ($model as $key => $value) : ?>
<?php $question[$i] = $value->getPhotoViewer(); ?>
<?php $meaning[$i] = $value->getPhotoViewer2(); ?>
<?php $pron[$i] = $value->getPhotoViewer3(); ?>
<?php $i++; ?>
<?php endforeach ; ?>

<?php
// echo $i."<br>";
// for ($j=0; $j < $i ; $j++) {
// echo $question[$j]."&nbsp;";
// echo $meaning[$j]."&nbsp;";
// echo $pron[$j]."<br>";
// }
 ?>

<style>
/* CSS question card */
<?php if (isset($question[0])): ?>
     #cardQ1 {
      background-image: url("<?= $question[0]; ?>") !important;
      background-size: 100px 40px !important;
      position: relative !important;
    }
<?php endif ?>
<?php if (isset($question[1])): ?>
     #cardQ2 {
      background-image: url("<?= $question[1]; ?>") !important;
      background-size: 100px 40px !important;
      position: relative !important;
    }
<?php endif ?>
<?php if (isset($question[2])): ?>
     #cardQ3 {
      background-image: url("<?= $question[2]; ?>") !important;
      background-size: 100px 40px !important;
      position: relative !important;
    }
<?php endif ?>
<?php if (isset($question[3])): ?>
     #cardQ4 {
      background-image: url("<?= $question[3]; ?>") !important;
      background-size: 100px 40px !important;
      position: relative !important;
    }
<?php endif ?>
<?php if (isset($question[4])): ?>
     #cardQ5 {
      background-image: url("<?= $question[4]; ?>") !important;
      background-size: 100px 40px !important;
      position: relative !important;
    }
<?php endif ?>
<?php if (isset($question[5])): ?>
     #cardQ6 {
      background-image: url("<?= $question[5]; ?>") !important;
      background-size: 100px 40px !important;
      position: relative !important;
    }
<?php endif ?>
<?php if (isset($question[6])): ?>
     #cardQ7 {
      background-image: url("<?= $question[6]; ?>") !important;
      background-size: 100px 40px !important;
      position: relative !important;
    }
<?php endif ?>
<?php if (isset($question[7])): ?>
     #cardQ8 {
      background-image: url("<?= $question[7]; ?>") !important;
      background-size: 100px 40px !important;
      position: relative !important;
    }
<?php endif ?>
<?php if (isset($question[8])): ?>
     #cardQ9 {
      background-image: url("<?= $question[8]; ?>") !important;
      background-size: 100px 40px !important;
      position: relative !important;
    }
<?php endif ?>
<?php if (isset($question[9])): ?>
     #cardQ10 {
      background-image: url("<?= $question[9]; ?>") !important;
      background-size: 100px 40px !important;
      position: relative !important;
    }
<?php endif ?>
<?php if (isset($question[10])): ?>
     #cardQ11 {
      background-image: url("<?= $question[10]; ?>") !important;
      background-size: 100px 40px !important;
      position: relative !important;
    }
<?php endif ?>
<?php if (isset($question[11])): ?>
     #cardQ12 {
      background-image: url("<?= $question[11]; ?>") !important;
      background-size: 100px 40px !important;
      position: relative !important;
    }
<?php endif ?>
<?php if (isset($question[12])): ?>
     #cardQ13 {
      background-image: url("<?= $question[12]; ?>") !important;
      background-size: 100px 40px !important;
      position: relative !important;
    }
<?php endif ?>
<?php if (isset($question[13])): ?>
     #cardQ14 {
      background-image: url("<?= $question[13]; ?>") !important;
      background-size: 100px 40px !important;
      position: relative !important;
    }
<?php endif ?>
<?php if (isset($question[14])): ?>
     #cardQ15 {
      background-image: url("<?= $question[14]; ?>") !important;
      background-size: 100px 40px !important;
      position: relative !important;
    }
<?php endif ?>
<?php if (isset($question[15])): ?>
     #cardQ16 {
      background-image: url("<?= $question[15]; ?>") !important;
      background-size: 100px 40px !important;
      position: relative !important;
    }
<?php endif ?>
<?php if (isset($question[16])): ?>
     #cardQ17 {
      background-image: url("<?= $question[16]; ?>") !important;
      background-size: 100px 40px !important;
      position: relative !important;
    }
<?php endif ?>
<?php if (isset($question[17])): ?>
     #cardQ18 {
      background-image: url("<?= $question[17]; ?>") !important;
      background-size: 100px 40px !important;
      position: relative !important;
    }
<?php endif ?>
<?php if (isset($question[18])): ?>
     #cardQ19 {
      background-image: url("<?= $question[18]; ?>") !important;
      background-size: 100px 40px !important;
      position: relative !important;
    }
<?php endif ?>
<?php if (isset($question[19])): ?>
     #cardQ20 {
      background-image: url("<?= $question[19]; ?>") !important;
      background-size: 100px 40px !important;
      position: relative !important;
    }
<?php endif ?>

/* CSS pron card */
<?php if (isset($pron[0])): ?>
     #cardP1 {
      background-image: url("<?= $pron[0]; ?>") !important;
      background-size: 100px 40px !important;
      position: relative !important;
    }
<?php endif ?>
<?php if (isset($pron[1])): ?>
     #cardP2 {
      background-image: url("<?= $pron[1]; ?>") !important;
      background-size: 100px 40px !important;
      position: relative !important;
    }
<?php endif ?>
<?php if (isset($pron[2])): ?>
     #cardP3 {
      background-image: url("<?= $pron[2]; ?>") !important;
      background-size: 100px 40px !important;
      position: relative !important;
    }
<?php endif ?>
<?php if (isset($pron[3])): ?>
     #cardP4 {
      background-image: url("<?= $pron[3]; ?>") !important;
      background-size: 100px 40px !important;
      position: relative !important;
    }
<?php endif ?>
<?php if (isset($pron[4])): ?>
     #cardP5 {
      background-image: url("<?= $pron[4]; ?>") !important;
      background-size: 100px 40px !important;
      position: relative !important;
    }
<?php endif ?>
<?php if (isset($pron[5])): ?>
     #cardP6 {
      background-image: url("<?= $pron[5]; ?>") !important;
      background-size: 100px 40px !important;
      position: relative !important;
    }
<?php endif ?>
<?php if (isset($pron[6])): ?>
     #cardP7 {
      background-image: url("<?= $pron[6]; ?>") !important;
      background-size: 100px 40px !important;
      position: relative !important;
    }
<?php endif ?>
<?php if (isset($pron[7])): ?>
     #cardP8 {
      background-image: url("<?= $pron[7]; ?>") !important;
      background-size: 100px 40px !important;
      position: relative !important;
    }
<?php endif ?>
<?php if (isset($pron[8])): ?>
     #cardP9 {
      background-image: url("<?= $pron[8]; ?>") !important;
      background-size: 100px 40px !important;
      position: relative !important;
    }
<?php endif ?>
<?php if (isset($pron[9])): ?>
     #cardP10 {
      background-image: url("<?= $pron[9]; ?>") !important;
      background-size: 100px 40px !important;
      position: relative !important;
    }
<?php endif ?>
<?php if (isset($pron[10])): ?>
     #cardP11 {
      background-image: url("<?= $pron[10]; ?>") !important;
      background-size: 100px 40px !important;
      position: relative !important;
    }
<?php endif ?>
<?php if (isset($pron[11])): ?>
     #cardP12 {
      background-image: url("<?= $pron[11]; ?>") !important;
      background-size: 100px 40px !important;
      position: relative !important;
    }
<?php endif ?>
<?php if (isset($pron[12])): ?>
     #cardP13 {
      background-image: url("<?= $pron[12]; ?>") !important;
      background-size: 100px 40px !important;
      position: relative !important;
    }
<?php endif ?>
<?php if (isset($pron[13])): ?>
     #cardP14 {
      background-image: url("<?= $pron[13]; ?>") !important;
      background-size: 100px 40px !important;
      position: relative !important;
    }
<?php endif ?>
<?php if (isset($pron[14])): ?>
     #cardP15 {
      background-image: url("<?= $pron[14]; ?>") !important;
      background-size: 100px 40px !important;
      position: relative !important;
    }
<?php endif ?>
<?php if (isset($pron[15])): ?>
     #cardP16 {
      background-image: url("<?= $pron[15]; ?>") !important;
      background-size: 100px 40px !important;
      position: relative !important;
    }
<?php endif ?>
<?php if (isset($pron[16])): ?>
     #cardP17 {
      background-image: url("<?= $pron[16]; ?>") !important;
      background-size: 100px 40px !important;
      position: relative !important;
    }
<?php endif ?>
<?php if (isset($pron[17])): ?>
     #cardP18 {
      background-image: url("<?= $pron[17]; ?>") !important;
      background-size: 100px 40px !important;
      position: relative !important;
    }
<?php endif ?>
<?php if (isset($pron[18])): ?>
     #cardP19 {
      background-image: url("<?= $pron[18]; ?>") !important;
      background-size: 100px 40px !important;
      position: relative !important;
    }
<?php endif ?>
<?php if (isset($pron[19])): ?>
     #cardP20 {
      background-image: url("<?= $pron[19]; ?>") !important;
      background-size: 100px 40px !important;
      position: relative !important;
    }
<?php endif ?>

/* CSS meaning card */
<?php if (isset($meaning[0])): ?>
     #cardM1 {
      background-image: url("<?= $meaning[0]; ?>") !important;
      background-size: 100px 40px !important;
      position: relative !important;
    }
<?php endif ?>
<?php if (isset($meaning[1])): ?>
     #cardM2 {
      background-image: url("<?= $meaning[1]; ?>") !important;
      background-size: 100px 40px !important;
      position: relative !important;
    }
<?php endif ?>
<?php if (isset($meaning[2])): ?>
     #cardM3 {
      background-image: url("<?= $meaning[2]; ?>") !important;
      background-size: 100px 40px !important;
      position: relative !important;
    }
<?php endif ?>
<?php if (isset($meaning[3])): ?>
     #cardM4 {
      background-image: url("<?= $meaning[3]; ?>") !important;
      background-size: 100px 40px !important;
      position: relative !important;
    }
<?php endif ?>
<?php if (isset($meaning[4])): ?>
     #cardM5 {
      background-image: url("<?= $meaning[4]; ?>") !important;
      background-size: 100px 40px !important;
      position: relative !important;
    }
<?php endif ?>
<?php if (isset($meaning[5])): ?>
     #cardM6 {
      background-image: url("<?= $meaning[5]; ?>") !important;
      background-size: 100px 40px !important;
      position: relative !important;
    }
<?php endif ?>
<?php if (isset($meaning[6])): ?>
     #cardM7 {
      background-image: url("<?= $meaning[6]; ?>") !important;
      background-size: 100px 40px !important;
      position: relative !important;
    }
<?php endif ?>
<?php if (isset($meaning[7])): ?>
     #cardM8 {
      background-image: url("<?= $meaning[7]; ?>") !important;
      background-size: 100px 40px !important;
      position: relative !important;
    }
<?php endif ?>
<?php if (isset($meaning[8])): ?>
     #cardM9 {
      background-image: url("<?= $meaning[8]; ?>") !important;
      background-size: 100px 40px !important;
      position: relative !important;
    }
<?php endif ?>
<?php if (isset($meaning[9])): ?>
     #cardM10 {
      background-image: url("<?= $meaning[9]; ?>") !important;
      background-size: 100px 40px !important;
      position: relative !important;
    }
<?php endif ?>
<?php if (isset($meaning[10])): ?>
     #cardM11 {
      background-image: url("<?= $meaning[10]; ?>") !important;
      background-size: 100px 40px !important;
      position: relative !important;
    }
<?php endif ?>
<?php if (isset($meaning[11])): ?>
     #cardM12 {
      background-image: url("<?= $meaning[11]; ?>") !important;
      background-size: 100px 40px !important;
      position: relative !important;
    }
<?php endif ?>
<?php if (isset($meaning[12])): ?>
     #cardM13 {
      background-image: url("<?= $meaning[12]; ?>") !important;
      background-size: 100px 40px !important;
      position: relative !important;
    }
<?php endif ?>
<?php if (isset($meaning[13])): ?>
     #cardM14 {
      background-image: url("<?= $meaning[13]; ?>") !important;
      background-size: 100px 40px !important;
      position: relative !important;
    }
<?php endif ?>
<?php if (isset($meaning[14])): ?>
     #cardM15 {
      background-image: url("<?= $meaning[14]; ?>") !important;
      background-size: 100px 40px !important;
      position: relative !important;
    }
<?php endif ?>
<?php if (isset($meaning[15])): ?>
     #cardM16 {
      background-image: url("<?= $meaning[15]; ?>") !important;
      background-size: 100px 40px !important;
      position: relative !important;
    }
<?php endif ?>
<?php if (isset($meaning[16])): ?>
     #cardM17 {
      background-image: url("<?= $meaning[16]; ?>") !important;
      background-size: 100px 40px !important;
      position: relative !important;
    }
<?php endif ?>
<?php if (isset($meaning[17])): ?>
     #cardM18 {
      background-image: url("<?= $meaning[17]; ?>") !important;
      background-size: 100px 40px !important;
      position: relative !important;
    }
<?php endif ?>
<?php if (isset($meaning[18])): ?>
     #cardM19 {
      background-image: url("<?= $meaning[18]; ?>") !important;
      background-size: 100px 40px !important;
      position: relative !important;
    }
<?php endif ?>
<?php if (isset($meaning[19])): ?>
     #cardM20 {
      background-image: url("<?= $meaning[19]; ?>") !important;
      background-size: 100px 40px !important;
      position: relative !important;
    }
<?php endif ?>
</style>
<div class="panel-group">
    <div class="panel panel-default">
        <div class="panel-body">

      <br><br>
      <div class="row">
            <div>
              <center>*แบบทดสอบจะแบ่งเป็น 2 ส่วน คือ จับคู่คำอ่านและจับคู่ความหมาย <br>
              ผู้เล่นจะต้องทำทั้ง 2 ส่วนให้ครบทุกข้อ โดยลากคำอ่านหรือความหมายของคำไปจับคู่วางบนตัวอักษรคันจิ <br>
              ปุ่มยืนยันคำตอบเพื่อแสดงผลคะแนนจึงจะปรากฏขึ้นอยู่ในส่วนด้านล่างของหน้าแบบทดสอบนี้ <br>
              หากต้องการเริ่มทำแบบทดสอบใหม่ให้กดที่ปุ่มเริ่มใหม่ที่ปรากฏอยู่ในส่วนด้านบนก่อนเริ่มทำแบบทดสอบนี้*</center>
            </div>
      </div>
      <br><br>
      <br><br>
      <div class="row">
            <div>
              <center><p><button class="btn btn-info btn-lg" onclick="init()"><span class="glyphicon glyphicon-repeat" aria-hidden="true"></span>&nbsp;&nbsp;เริ่มใหม่</button></p></center>
            </div>
      </div>

      <div id="pronContent">
        <center><h3>จับคู่คำอ่าน</h3></center>
          <div id="pronAnswer"></div>
          <div id="pronQuestion"></div>
      </div>

      <div id="meaningContent">
        <center><h3>จับคู่ความหมาย</h3></center>
          <div id="meaningAnswer"></div>
          <div id="meaningQuestion"></div>
      </div>

      <br><br>
            <div class="row">
                <div>
                    <center><p><button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#getScore"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>&nbsp;&nbsp;ยืนยันคำตอบ</button></p></center>
                </div>
            </div>
          <div class="modal fade" id="getScore" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
              <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="exampleModalLabel">คะแนนที่ได้</h4>
                    </div>
                    <div class="modal-body">
                        <center><h1>จำนวนข้อทั้งหมด : <div id="totalScore"></div>
                        จำนวนข้อที่ถูกต้อง : <div id="correctScore"></div>
                        จำนวนข้อที่ผิด : <div id="failScore"></div></h1>
                        <p>ต้องการเก็บผลคะแนนไว้หรือไม่?</p></center>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal" onclick="init()">ยกเลิก</button>
                        <button type="button" class="btn btn-primary" onclick="getScore()">บันทึก</button>
                    </div>
                  </div>
              </div>
            </div>
            <div class="row">
                <div>
                    <center><p><button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#cancel" onclick="cancelBtn()"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>&nbsp;&nbsp;ยกเลิก</button></p></center>
                </div>
            </div>
          <div class="modal fade" id="cancel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
              <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="exampleModalLabel">คะแนนที่ได้</h4>
                    </div>
                    <div class="modal-body">
                        <center><h1>จำนวนข้อที่ได้ทำ : <div id="totalScore2"></div>
                        จำนวนข้อที่ถูกต้อง : <div id="correctScore2"></div>
                        จำนวนข้อที่ผิด : <div id="failScore2"></div></h1>
                        <p>ต้องการเก็บผลคะแนนไว้หรือไม่?</p></center>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal" onclick="init()">ยกเลิก</button>
                        <button type="button" class="btn btn-primary" onclick="getScore()">บันทึก</button>
                    </div>
                  </div>
              </div>
            </div>
            <br><br><br><br>
        </div>
    </div>
</div>

<script>
var chapter = "<?= $chapter; ?>";
function getScore()
{
    document.location = 'index.php?r=practice/score&chapter='+chapter+'&correctScore='+correctCards+'&failScore='+failCards;
}
</script>