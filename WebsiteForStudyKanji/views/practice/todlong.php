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
 #cardQ1 {
  background-image: url("<?= $question[0]; ?>") !important;
  background-size: 100px 40px !important;
  position: relative !important;
}
 #cardQ2 {
  background-image: url("<?= $question[1]; ?>") !important;
  background-size: 100px 40px !important;
  position: relative !important;
}
 #cardQ3 {
  background-image: url("<?= $question[2]; ?>") !important;
  background-size: 100px 40px !important;
  position: relative !important;
}
 #cardQ4 {
  background-image: url("<?= $question[3]; ?>") !important;
  background-size: 100px 40px !important;
  position: relative !important;
}
 #cardQ5 {
  background-image: url("<?= $question[4]; ?>") !important;
  background-size: 100px 40px !important;
  position: relative !important;
}
 #cardQ6 {
  background-image: url("<?= $question[5]; ?>") !important;
  background-size: 100px 40px !important;
  position: relative !important;
}
 #cardQ7 {
  background-image: url("<?= $question[6]; ?>") !important;
  background-size: 100px 40px !important;
  position: relative !important;
}
 #cardQ8 {
  background-image: url("<?= $question[7]; ?>") !important;
  background-size: 100px 40px !important;
  position: relative !important;
}
 #cardQ9 {
  background-image: url("<?= $question[8]; ?>") !important;
  background-size: 100px 40px !important;
  position: relative !important;
}
 #cardQ10 {
  background-image: url("<?= $question[9]; ?>") !important;
  background-size: 100px 40px !important;
  position: relative !important;
}
 #cardQ11 {
  background-image: url("<?= $question[10]; ?>") !important;
  background-size: 100px 40px !important;
  position: relative !important;
}
 #cardQ12 {
  background-image: url("<?= $question[11]; ?>") !important;
  background-size: 100px 40px !important;
  position: relative !important;
}
 #cardQ13 {
  background-image: url("<?= $question[12]; ?>") !important;
  background-size: 100px 40px !important;
  position: relative !important;
}
 #cardQ14 {
  background-image: url("<?= $question[13]; ?>") !important;
  background-size: 100px 40px !important;
  position: relative !important;
}
 #cardQ15 {
  background-image: url("<?= $question[14]; ?>") !important;
  background-size: 100px 40px !important;
  position: relative !important;
}
 #cardQ16 {
  background-image: url("<?= $question[15]; ?>") !important;
  background-size: 100px 40px !important;
  position: relative !important;
}
 #cardQ17 {
  background-image: url("<?= $question[16]; ?>") !important;
  background-size: 100px 40px !important;
  position: relative !important;
}
 #cardQ18 {
  background-image: url("<?= $question[17]; ?>") !important;
  background-size: 100px 40px !important;
  position: relative !important;
}
 #cardQ19 {
  background-image: url("<?= $question[18]; ?>") !important;
  background-size: 100px 40px !important;
  position: relative !important;
}
 #cardQ20 {
  background-image: url("<?= $question[19]; ?>") !important;
  background-size: 100px 40px !important;
  position: relative !important;
}

/* CSS pron card */
 #cardP1 {
  background-image: url("<?= $pron[0]; ?>") !important;
  background-size: 100px 40px !important;
  position: relative !important;
}
 #cardP2 {
  background-image: url("<?= $pron[1]; ?>") !important;
  background-size: 100px 40px !important;
  position: relative !important;
}
 #cardP3 {
  background-image: url("<?= $pron[2]; ?>") !important;
  background-size: 100px 40px !important;
  position: relative !important;
}
 #cardP4 {
  background-image: url("<?= $pron[3]; ?>") !important;
  background-size: 100px 40px !important;
  position: relative !important;
}
 #cardP5 {
  background-image: url("<?= $pron[4]; ?>") !important;
  background-size: 100px 40px !important;
  position: relative !important;
}
 #cardP6 {
  background-image: url("<?= $pron[5]; ?>") !important;
  background-size: 100px 40px !important;
  position: relative !important;
}
 #cardP7 {
  background-image: url("<?= $pron[6]; ?>") !important;
  background-size: 100px 40px !important;
  position: relative !important;
}
 #cardP8 {
  background-image: url("<?= $pron[7]; ?>") !important;
  background-size: 100px 40px !important;
  position: relative !important;
}
 #cardP9 {
  background-image: url("<?= $pron[8]; ?>") !important;
  background-size: 100px 40px !important;
  position: relative !important;
}
 #cardP10 {
  background-image: url("<?= $pron[9]; ?>") !important;
  background-size: 100px 40px !important;
  position: relative !important;
}
 #cardP11 {
  background-image: url("<?= $pron[10]; ?>") !important;
  background-size: 100px 40px !important;
  position: relative !important;
}
 #cardP12 {
  background-image: url("<?= $pron[11]; ?>") !important;
  background-size: 100px 40px !important;
  position: relative !important;
}
 #cardP13 {
  background-image: url("<?= $pron[12]; ?>") !important;
  background-size: 100px 40px !important;
  position: relative !important;
}
 #cardP14 {
  background-image: url("<?= $pron[13]; ?>") !important;
  background-size: 100px 40px !important;
  position: relative !important;
}
 #cardP15 {
  background-image: url("<?= $pron[14]; ?>") !important;
  background-size: 100px 40px !important;
  position: relative !important;
}
 #cardP16 {
  background-image: url("<?= $pron[15]; ?>") !important;
  background-size: 100px 40px !important;
  position: relative !important;
}
 #cardP17 {
  background-image: url("<?= $pron[16]; ?>") !important;
  background-size: 100px 40px !important;
  position: relative !important;
}
 #cardP18 {
  background-image: url("<?= $pron[17]; ?>") !important;
  background-size: 100px 40px !important;
  position: relative !important;
}
 #cardP19 {
  background-image: url("<?= $pron[18]; ?>") !important;
  background-size: 100px 40px !important;
  position: relative !important;
}
 #cardP20 {
  background-image: url("<?= $pron[19]; ?>") !important;
  background-size: 100px 40px !important;
  position: relative !important;
}

/* CSS meaning card */
 #cardM1 {
  background-image: url("<?= $meaning[0]; ?>") !important;
  background-size: 100px 40px !important;
  position: relative !important;
}
 #cardM2 {
  background-image: url("<?= $meaning[1]; ?>") !important;
  background-size: 100px 40px !important;
  position: relative !important;
}
 #cardM3 {
  background-image: url("<?= $meaning[2]; ?>") !important;
  background-size: 100px 40px !important;
  position: relative !important;
}
 #cardM4 {
  background-image: url("<?= $meaning[3]; ?>") !important;
  background-size: 100px 40px !important;
  position: relative !important;
}
 #cardM5 {
  background-image: url("<?= $meaning[4]; ?>") !important;
  background-size: 100px 40px !important;
  position: relative !important;
}
 #cardM6 {
  background-image: url("<?= $meaning[5]; ?>") !important;
  background-size: 100px 40px !important;
  position: relative !important;
}
 #cardM7 {
  background-image: url("<?= $meaning[6]; ?>") !important;
  background-size: 100px 40px !important;
  position: relative !important;
}
 #cardM8 {
  background-image: url("<?= $meaning[7]; ?>") !important;
  background-size: 100px 40px !important;
  position: relative !important;
}
 #cardM9 {
  background-image: url("<?= $meaning[8]; ?>") !important;
  background-size: 100px 40px !important;
  position: relative !important;
}
 #cardM10 {
  background-image: url("<?= $meaning[9]; ?>") !important;
  background-size: 100px 40px !important;
  position: relative !important;
}
 #cardM11 {
  background-image: url("<?= $meaning[10]; ?>") !important;
  background-size: 100px 40px !important;
  position: relative !important;
}
 #cardM12 {
  background-image: url("<?= $meaning[11]; ?>") !important;
  background-size: 100px 40px !important;
  position: relative !important;
}
 #cardM13 {
  background-image: url("<?= $meaning[12]; ?>") !important;
  background-size: 100px 40px !important;
  position: relative !important;
}
 #cardM14 {
  background-image: url("<?= $meaning[13]; ?>") !important;
  background-size: 100px 40px !important;
  position: relative !important;
}
 #cardM15 {
  background-image: url("<?= $meaning[14]; ?>") !important;
  background-size: 100px 40px !important;
  position: relative !important;
}
 #cardM16 {
  background-image: url("<?= $meaning[15]; ?>") !important;
  background-size: 100px 40px !important;
  position: relative !important;
}
 #cardM17 {
  background-image: url("<?= $meaning[16]; ?>") !important;
  background-size: 100px 40px !important;
  position: relative !important;
}
 #cardM18 {
  background-image: url("<?= $meaning[17]; ?>") !important;
  background-size: 100px 40px !important;
  position: relative !important;
}
 #cardM19 {
  background-image: url("<?= $meaning[18]; ?>") !important;
  background-size: 100px 40px !important;
  position: relative !important;
}
 #cardM20 {
  background-image: url("<?= $meaning[19]; ?>") !important;
  background-size: 100px 40px !important;
  position: relative !important;
}
</style>
<div class="panel-group">
    <div class="panel panel-default">
        <div class="panel-body">

			<br><br>
			<div class="row">
            <div>
              <center><p><button class="btn btn-info" onclick="init()">เริ่มใหม่</button></p></center>
            </div>
          	</div>

			<div id="content">
				<center><h1>จับคู่คำอ่าน</h1></center>
			  	<div id="cardPile"></div>
			  	<div id="cardSlots"></div>
			</div>

			<div id="content2">
				<center><h1>จับคู่ความหมาย</h1></center>
  				<div id="cardPile2"></div>
  				<div id="cardSlots2"></div>
			</div>

			<br><br>
          	<div class="row">
              	<div id="scoreBtn">
                  	<center><p><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#getScore">ยืนยันคำตอบ</button></p></center>
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
		                  	<h1>จำนวนข้อทั้งหมด : <div id="totalScore"></div>
		                  	จำนวนข้อที่ถูกต้อง : <div id="correctScore"></div>
		                  	จำนวนข้อที่ผิด : <div id="failScore"></div></h1>
		                  	<p>ต้องการเก็บผลคะแนนไว้หรือไม่?</p>
		                </div>
		                <div class="modal-footer">
		                  	<button type="button" class="btn btn-default" data-dismiss="modal" onclick="init()">ไม่เก็บ</button>
		                  	<button type="button" class="btn btn-primary" onclick="getScore()">เก็บ</button>
		                </div>
	              	</div>
	            </div>
	          </div>
        </div>
    </div>
</div>

<script>

</script>

