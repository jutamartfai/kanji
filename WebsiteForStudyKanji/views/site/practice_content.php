<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Kanji */
/* @var $form yii\widgets\ActiveForm */

$this->title = $ch_name;
$this->params['breadcrumbs'][] = ['label' => 'Practice Chapter', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<!-- <head>
	<style>
	#div1, #div2, #div3, #div4 {
	    float: left;
	    width: 100px;
	    height: 35px;
	    margin: 10px;
	    padding: 10px;
	    border: 1px solid black;
	}
	#div5{
		float: left;
	    width: 100px;
	    height: 35px;
	    margin: 10px;
	    padding: 10px;
	}
	</style>
	<script>
		function allowDrop(ev) {
		    ev.preventDefault();
		}

		function drag(ev) {
		    ev.dataTransfer.setData("text", ev.target.id);
		}

		function drop(ev) {
		    ev.preventDefault();
		    var data = ev.dataTransfer.getData("text");
		    ev.target.appendChild(document.getElementById(data));
		}
	</script>
</head> -->

<!-- <h1><?= Html::encode($this->title) ?></h1>
<br>
<div class="panel-group">
    <div class="panel panel-default">
        <div class="panel-body">

			<body>

			<h2>Drag and Drop</h2>
			<p>Drag the image back and forth between the two div elements.</p>

			<?php foreach ($model as $key => $value) : ?>
			<div class="row">
				<div class="col-xs-6 col-md-6">
					<div id="div5">
						<?= Html::img($value->getPhotoViewer(),['style'=>'width:100px;','class'=>'img-rounded']); ?>
					</div>
					<div id="div2" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
					<div id="div4" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
				</div>
				<div class="col-xs-6 col-md-3">
					<div id="div1" ondrop="drop(event)" ondragover="allowDrop(event)">
				  		<img src="<?= $value->getPhotoViewer2(); ?>" draggable="true" ondragstart="drag(event)" id="<?= $value->meaning; ?>" width="88" height="31">
					</div>
				</div>
				<div class="col-xs-6 col-md-3">
					<div id="div3" ondrop="drop(event)" ondragover="allowDrop(event)">
				  		<img src="<?= $value->getPhotoViewer3(); ?>" draggable="true" ondragstart="drag(event)" id="<?= $value->pron; ?>" width="88" height="31">
					</div>
				</div>
			</div>
			<?php endforeach ; ?> -->

			<!-- <div id="div1" ondrop="drop(event)" ondragover="allowDrop(event)">
			  <img src="img_w3slogo.gif" draggable="true" ondragstart="drag(event)" id="drag1" width="88" height="31">
			</div>

			<div id="div2" ondrop="drop(event)" ondragover="allowDrop(event)"></div> -->

<!-- 			</body>

        </div>
    </div>
</div> -->

<!doctype html>
<html lang="en">
<head>
 
<title>A jQuery Drag-and-Drop Number Cards Game</title>
 
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.0/jquery.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.9/jquery-ui.min.js"></script>
 
<script type="text/javascript">
 
// JavaScript will go here
 
</script>
<style>
	/* Add some margin to the page and set a default font and colour */
 
body {
  margin: 30px;
  /*font-family: "Georgia", serif;*/
  line-height: 1.8em;
  color: #333;
}
 
/* Give headings their own font */
 
h1, h2, h3, h4 {
  font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
}
 
/* Main content area */
 
#content {
  margin: 80px 70px;
  text-align: center;
  -moz-user-select: none;
  -webkit-user-select: none;
  user-select: none;
}
 
/* Header/footer boxes */
 
.wideBox {
  clear: both;
  text-align: center;
  margin: 70px;
  padding: 10px;
  background: #ebedf2;
  border: 1px solid #333;
}
 
.wideBox h1 {
  font-weight: bold;
  margin: 20px;
  color: #666;
  font-size: 1.5em;
}
 
/* Slots for final card positions */
 
#cardSlots {
  margin: 50px auto 0 auto;
  background: #ddf;
}
 
/* The initial pile of unsorted cards */
 
#cardPile {
  margin: 0 auto;
  background: #ffd;
}
 
#cardSlots, #cardPile {
  width: 910px;
  height: 120px;
  padding: 20px;
  border: 2px solid #333;
  -moz-border-radius: 10px;
  -webkit-border-radius: 10px;
  border-radius: 10px;
  -moz-box-shadow: 0 0 .3em rgba(0, 0, 0, .8);
  -webkit-box-shadow: 0 0 .3em rgba(0, 0, 0, .8);
  box-shadow: 0 0 .3em rgba(0, 0, 0, .8);
}
 
/* Individual cards and slots */
 
#cardSlots div, #cardPile div {
  float: left;
  width: 58px;
  height: 78px;
  padding: 10px;
  padding-top: 40px;
  padding-bottom: 0;
  border: 2px solid #333;
  -moz-border-radius: 10px;
  -webkit-border-radius: 10px;
  border-radius: 10px;
  margin: 0 0 0 10px;
  background: #fff;
}
 
#cardSlots div:first-child, #cardPile div:first-child {
  margin-left: 0;
}
 
#cardSlots div.hovered {
  background: #aaa;
}
 
#cardSlots div {
  border-style: dashed;
}
 
#cardPile div {
  background: #666;
  color: #fff;
  font-size: 50px;
  text-shadow: 0 0 3px #000;
}
 
#cardPile div.ui-draggable-dragging {
  -moz-box-shadow: 0 0 .5em rgba(0, 0, 0, .8);
  -webkit-box-shadow: 0 0 .5em rgba(0, 0, 0, .8);
  box-shadow: 0 0 .5em rgba(0, 0, 0, .8);
}


#cardSlots {
  margin: 50px auto 0 auto;
  background: #ddf;
}
 
/* The initial pile of unsorted cards */
 
#cardPile {
  margin: 0 auto;
  background: #ffd;
}
 
#cardSlots, #cardPile {
  width: 910px;
  height: 120px;
  padding: 20px;
  border: 2px solid #333;
  -moz-border-radius: 10px;
  -webkit-border-radius: 10px;
  border-radius: 10px;
  -moz-box-shadow: 0 0 .3em rgba(0, 0, 0, .8);
  -webkit-box-shadow: 0 0 .3em rgba(0, 0, 0, .8);
  box-shadow: 0 0 .3em rgba(0, 0, 0, .8);
}
 
/* Individual cards and slots */
 
#cardSlots div, #cardPile div {
  float: left;
  width: 58px;
  height: 78px;
  padding: 10px;
  padding-top: 40px;
  padding-bottom: 0;
  border: 2px solid #333;
  -moz-border-radius: 10px;
  -webkit-border-radius: 10px;
  border-radius: 10px;
  margin: 0 0 0 10px;
  background: #fff;
}
 
#cardSlots div:first-child, #cardPile div:first-child {
  margin-left: 0;
}
 
#cardSlots div.hovered {
  background: #aaa;
}
 
#cardSlots div {
  border-style: dashed;
}
 
#cardPile div {
  background: #666;
  color: #fff;
  font-size: 50px;
  text-shadow: 0 0 3px #000;
}
 
#cardPile div.ui-draggable-dragging {
  -moz-box-shadow: 0 0 .5em rgba(0, 0, 0, .8);
  -webkit-box-shadow: 0 0 .5em rgba(0, 0, 0, .8);
  box-shadow: 0 0 .5em rgba(0, 0, 0, .8);
}

/*klkkk*/
#cardSlots2 {
  margin: 50px auto 0 auto;
  background: #ddf;
}
 
/* The initial pile of unsorted cards */
 
#cardPile2 {
  margin: 0 auto;
  background: #ffd;
}
 
#cardSlots2, #cardPile2 {
  width: 910px;
  height: 120px;
  padding: 20px;
  border: 2px solid #333;
  -moz-border-radius: 10px;
  -webkit-border-radius: 10px;
  border-radius: 10px;
  -moz-box-shadow: 0 0 .3em rgba(0, 0, 0, .8);
  -webkit-box-shadow: 0 0 .3em rgba(0, 0, 0, .8);
  box-shadow: 0 0 .3em rgba(0, 0, 0, .8);
}
 
/* Individual cards and slots */
 
#cardSlots2 div, #cardPile2 div {
  float: left;
  width: 58px;
  height: 78px;
  padding: 10px;
  padding-top: 40px;
  padding-bottom: 0;
  border: 2px solid #333;
  -moz-border-radius: 10px;
  -webkit-border-radius: 10px;
  border-radius: 10px;
  margin: 0 0 0 10px;
  background: #fff;
}
 
#cardSlots2 div:first-child, #cardPile2 div:first-child {
  margin-left: 0;
}
 
#cardSlots2 div.hovered {
  background: #aaa;
}
 
#cardSlots2 div {
  border-style: dashed;
}
 
#cardPile2 div {
  background: #666;
  color: #fff;
  font-size: 50px;
  text-shadow: 0 0 3px #000;
}
 
#cardPile2 div.ui-draggable-dragging {
  -moz-box-shadow: 0 0 .5em rgba(0, 0, 0, .8);
  -webkit-box-shadow: 0 0 .5em rgba(0, 0, 0, .8);
  box-shadow: 0 0 .5em rgba(0, 0, 0, .8);
}
/*kkoooo*/
 
/* Individually coloured cards */
 
#card1.correct { background: red; }
#card2.correct { background: brown; }
#card3.correct { background: orange; }
#card4.correct { background: yellow; }
#card5.correct { background: green; }
#card6.correct { background: cyan; }
#card7.correct { background: blue; }
#card8.correct { background: indigo; }
#card9.correct { background: purple; }
#card10.correct { background: violet; }
 
 
/* "You did it!" message */
#successMessage {
  position: absolute;
  left: 580px;
  top: 250px;
  width: 0;
  height: 0;
  z-index: 100;
  background: #dfd;
  border: 2px solid #333;
  -moz-border-radius: 10px;
  -webkit-border-radius: 10px;
  border-radius: 10px;
  -moz-box-shadow: .3em .3em .5em rgba(0, 0, 0, .8);
  -webkit-box-shadow: .3em .3em .5em rgba(0, 0, 0, .8);
  box-shadow: .3em .3em .5em rgba(0, 0, 0, .8);
  padding: 20px;
}
<?php foreach ($model as $key => $value) : ?>
 #card1 {
  background-image: url("<?= $value->getPhotoViewer3(); ?>") !important;
  background-size: 78px 118px !important;
  position: relative !important;
}
<?php endforeach ; ?>
 #card2 {
  background-image: url("http://www.bytemining.com/wp-content/uploads/2012/01/200px-Playing_card_diamond_2.svg_.png") !important;
  background-size: 78px 118px !important;
  position: relative !important;
}

</style>
</head>
<body>
 
<div id="content">
 
  <div id="cardPile"> </div>
  <div id="cardPile2"> </div>
  <div id="cardSlots"> </div>
  <div id="cardSlots2"> </div>
 
  <div id="successMessage">
    <h2>You did it!</h2>
    <button onclick="init()">Play Again</button>
  </div>
 
</div>
 
</body>
</html>
<script>
	var correctCards = 0;
$( init );
 
function init() {
 
  // Hide the success message
  $('#successMessage').hide();
  $('#successMessage').css( {
    left: '580px',
    top: '250px',
    width: 0,
    height: 0
  } );
 
  // Reset the game
  correctCards = 0;
  $('#cardPile').html( '' );
  $('#cardSlots').html( '' );
 $('#cardPile2').html( '' );
  $('#cardSlots2').html( '' );
  // Create the pile of shuffled cards
  var numbers = [ 1, 2, 3, 4, 5, 6, 7, 8, 9, 10 ];
  numbers.sort( function() { return Math.random() - .5 } );
 
  for ( var i=0; i<10; i++ ) {
    $('<div>' + numbers[i] + '</div>').data( 'number', numbers[i] ).attr( 'id', 'card'+numbers[i] ).appendTo( '#cardPile' ).draggable( {
      containment: '#content',
      stack: '#cardPile div',
      cursor: 'move',
      revert: true
    } );
  }
 
  // Create the card slots
  var words = [ 'one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine', 'ten' ];
  for ( var i=1; i<=10; i++ ) {
    $('<div>' + words[i-1] + '</div>').data( 'number', i ).appendTo( '#cardSlots' ).droppable( {
      accept: '#cardPile div',
      hoverClass: 'hovered',
      drop: handleCardDrop
    } );
  }
 

// Create the pile of shuffled cards
  var numbers = [ 1, 2, 3, 4, 5, 6, 7, 8, 9, 10 ];
  numbers.sort( function() { return Math.random() - .5 } );
 
  for ( var i=0; i<10; i++ ) {
    $('<div>' + numbers[i] + '</div>').data( 'number', numbers[i] ).attr( 'id', 'card'+numbers[i] ).appendTo( '#cardPile2' ).draggable( {
      containment: '#content',
      stack: '#cardPile2 div',
      cursor: 'move',
      revert: true
    } );
  }
 
  // Create the card slots
  var words = [ 'one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine', 'ten' ];
  for ( var i=1; i<=10; i++ ) {
    $('<div>' + words[i-1] + '</div>').data( 'number', i ).appendTo( '#cardSlots2' ).droppable( {
      accept: '#cardPile2 div',
      hoverClass: 'hovered',
      drop: handleCardDrop
    } );
  }


}

function handleCardDrop( event, ui ) {
  var slotNumber = $(this).data( 'number' );
  var cardNumber = ui.draggable.data( 'number' );
 
  // If the card was dropped to the correct slot,
  // change the card colour, position it directly
  // on top of the slot, and prevent it being dragged
  // again
 
  if ( slotNumber == cardNumber ) {
    ui.draggable.addClass( 'correct' );
    ui.draggable.draggable( 'disable' );
    $(this).droppable( 'disable' );
    ui.draggable.position( { of: $(this), my: 'left top', at: 'left top' } );
    ui.draggable.draggable( 'option', 'revert', false );
    correctCards++;
  } 
   
  // If all the cards have been placed correctly then display a message
  // and reset the cards for another go
 
  if ( correctCards == 10 ) {
    $('#successMessage').show();
    $('#successMessage').animate( {
      left: '380px',
      top: '200px',
      width: '400px',
      height: '100px',
      opacity: 1
    } );
  }
 
}
</script>