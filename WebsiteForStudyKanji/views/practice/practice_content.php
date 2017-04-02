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

<head>
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.0/jquery.min.js"></script>
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.9/jquery-ui.min.js"></script>

  <style>

    <?php $i=0; ?>
    <?php foreach ($model as $key => $value) : ?>
    <?php $question[$i] = $value->getPhotoViewer(); ?>
    <?php $meaning[$i] = $value->getPhotoViewer2(); ?>
    <?php $pron[$i] = $value->getPhotoViewer3(); ?>
    <?php $i++; ?>
    <?php endforeach ; ?>

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


  </style>

</head>

<div class="panel-group">
    <div class="panel panel-default">
        <div class="panel-body">

        <div id="content">
          <div class="row">
            <div>
              <p><button class="btn btn-info" onclick="init()">เริ่มใหม่</button></p>
            </div>
          </div>

          <h1>จับคู่คำอ่าน</h1>
          <div class="row">
            <div id="cardPile2"> </div>
            <div id="cardSlots2"> </div><br><br>
          </div>
          <h1>จับคู่ความหมาย</h1>
          <div class="row">
            <div id="cardPile"> </div>
            <div id="cardSlots"> </div>
          </div>

          <br><br>
          <div class="row">
              <div id="scoreBtn"><!--class="col-xs-6 col-sm-3"-->
                  <p><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#getScore">ยืนยันคำตอบ</button></p>
              </div>
<!--               <div class="col-xs-6 col-sm-3">
                  <p><button class="btn btn-info" onclick="init()">เริ่มใหม่</button></p>
              </div> -->
          </div>
          <!-- <button class="btn btn-info" onclick="getScore()">ยืนยันคำตอบ</button> -->
          <div class="modal fade" id="getScore" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="exampleModalLabel">คะแนนที่ได้</h4>
                </div>
                <div class="modal-body">
                  <h1>จำนวนข้อที่ถูกต้อง : <div id="correctScore"></div>
                  จากจำนวนข้อทั้งหมด : <div id="totalScore"></div></h1>
                  <p>ต้องการเก็บผลคะแนนไว้หรือไม่?</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal" onclick="init()">ไม่เก็บ</button>
                  <button type="button" class="btn btn-primary" onclick="getScore()">เก็บ</button>
                </div>
              </div>
            </div>
          </div>

              correctScore: <div id="correctScore"></div>
              failScore: <div id="failScore"></div>


          <!-- <div id="successMessage">
            <h2>You did it!</h2>
            <button onclick="init()">Play Again</button>
          </div> -->

        </div>
        </div>
    </div>
</div>

<script>
  var correctCards = 0;
  var failCards = 0;
  var chapter = "<?= $chapter; ?>";
  $( init );


  function init()
  {
      // Hide the success message
      // $('#successMessage').hide();
      $('#scoreBtn').hide();
      // $('#successMessage').css( {
      //   left: '580px',
      //   top: '250px',
      //   width: 0,
      //   height: 0
      // } );

      // Reset the game
      correctCards = 0;
      failCards = 0;
      $('#cardPile').html( '' );
      $('#cardSlots').html( '' );
      $('#cardPile2').html( '' );
      $('#cardSlots2').html( '' );

      // Create the pile of shuffled cards
      var numbers = [  1, 2, 3/*, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20*/ ];
      numbers.sort( function() { return Math.random() - .5 } );

      for ( var i=0; i<3/*10*/; i++ )
      {
        $('<div>' + /**/numbers[i] + '</div>').data( 'number', numbers[i] ).attr( 'id', 'cardP'+numbers[i] ).appendTo( '#cardPile2' ).draggable( {
          containment: '#content',
          stack: '#cardPile2 div',
          cursor: 'move',
          revert: true
        } );
      }

      // Create the card slots
      var words = [ 'one', 'two', 'three'/*, 'four', 'five', 'six', 'seven', 'eight', 'nine', 'ten', 11, 12, 13, 14, 15, 16, 17, 18, 19, 20*/ ];
      for ( var i=1; i<=3/*10*/; i++ )
      {
        $('<div>' + /**/words[i-1] + '</div>').data( 'number', i ).attr( 'id', 'cardQ'+i ).appendTo( '#cardSlots2' ).droppable( {
          accept: '#cardPile2 div',
          hoverClass: 'hovered',
          drop: handleCardDrop
        } );
      }

      // Create the pile of shuffled cards
      var numbers = [ 1, 2, 3 ]; /*, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20*/
      numbers.sort( function() { return Math.random() - .5 } );

      for ( var i=0; i<3/*10*/; i++ )
      {
        $('<div>' + /**/เอาเลขออกnumbers[i] + '</div>').data( 'number', numbers[i] ).attr( 'id', 'cardM'+numbers[i] ).appendTo( '#cardPile' ).draggable( {
          containment: '#content',
          stack: '#cardPile div',
          cursor: 'move',
          revert: true
        } );
      }


      // Create the card slots
      var words = [ 'one', 'two', 'three'/*, 'four', 'five', 'six', 'seven', 'eight', 'nine', 'ten', 11, 12, 13, 14, 15, 16, 17, 18, 19, 20 */];
      for ( var i=1; i<=3/*10*/; i++ )
      {
        $('<div>' + /**/words[i-1] + '</div>').data( 'number', i ).attr( 'id', 'cardQ'+i ).appendTo( '#cardSlots' ).droppable( {
          accept: '#cardPile div',
          hoverClass: 'hovered',
          drop: handleCardDrop
        } );
      }
  }

  function handleCardDrop( event, ui )
  {
      var slotNumber = $(this).data( 'number' );
      var cardNumber = ui.draggable.data( 'number' );

      // If the card was dropped to the correct slot,
      // change the card colour, position it directly
      // on top of the slot, and prevent it being dragged
      // again

      ui.draggable.addClass( 'correct' );
      ui.draggable.draggable( 'disable' );
      $(this).droppable( 'disable' );
      ui.draggable.position( { of: $(this), my: 'left top', at: 'left top' } );
      ui.draggable.draggable( 'option', 'revert', false );

      if ( slotNumber == cardNumber )
      {
        correctCards++;
      }
      else
      {
        failCards++;
      }

      // If all the cards have been placed correctly then display a message
      // and reset the cards for another go

      if ( failCards+correctCards ==6/*10*/ )
      {
        // $('#successMessage').show();
        $('#scoreBtn').show();
        // $('#successMessage').animate( {
        //   left: '380px',
        //   top: '200px',
        //   width: '400px',
        //   height: '100px',
        //   opacity: 1
        // } );

        document.getElementById("correctScore").innerHTML = correctCards;
        document.getElementById("failScore").innerHTML = failCards;
        document.getElementById("totalScore").innerHTML = correctCards+failCards;
      }
  }

  function getScore()
  {
      document.location = 'index.php?r=practice/score&chapter='+chapter+'&correctScore='+correctCards+'&failScore='+failCards;
  }
</script>