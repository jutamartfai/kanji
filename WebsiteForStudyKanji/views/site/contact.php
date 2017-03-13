<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Contact';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php if (Yii::$app->session->hasFlash('contactFormSubmitted')): ?>

        <div class="alert alert-success">
            Thank you for contacting us. We will respond to you as soon as possible.
        </div>

        <p>
            Note that if you turn on the Yii debugger, you should be able
            to view the mail message on the mail panel of the debugger.
            <?php if (Yii::$app->mailer->useFileTransport): ?>
                Because the application is in development mode, the email is not sent but saved as
                a file under <code><?= Yii::getAlias(Yii::$app->mailer->fileTransportPath) ?></code>.
                Please configure the <code>useFileTransport</code> property of the <code>mail</code>
                application component to be false to enable email sending.
            <?php endif; ?>
        </p>

    <?php else: ?>

        <p>
            If you have business inquiries or other questions, please fill out the following form to contact us.
            Thank you.
        </p>

        <div class="row">
            <div class="col-lg-5">

                <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

                    <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>

                    <?= $form->field($model, 'email') ?>

                    <?= $form->field($model, 'subject') ?>

                    <?= $form->field($model, 'body')->textarea(['rows' => 6]) ?>

                    <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                        'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
                    ]) ?>

                    <div class="form-group">
                        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                    </div>

                <?php ActiveForm::end(); ?>

            </div>
        </div>

    <?php endif; ?>
</div>

<!-- tictactoe -->
<!-- ///////////////////////////////////////////////////////////////////////////////// -->

<!-- css -->
<head><style>
.hidden {
  visibility: hidden;
  position: absolute;
}

.piece {
  margin: 10px;
  padding: 0;
  width: 75px;
  height: 75px;
  position: relative;
}
h3#grid1_label {
   width: 366px;
   margin-left: 35px;
   text-align: center;
}
ul.draggables {
   font-size: 100% !important;
   margin: 10px 35px !important;
   padding 0 !important;
}
table {
  empty-cells: show;
}

input#startButton {
  margin-left: 180px;
  padding-left: .25em;
  padding-right: .25em;
  text-align: center;
  font-weight: bold;
}

div#out {
  margin-top: 10px;
  padding: 2px;
  border: 1px solid black;
  background-color: #eee;
  min-height: 1.2em;
  font-weight: bold;
}

.target {
  margin: 0;
  padding: 10px;
  width: 97px;
  height: 119px;
  position: relative;
}
.target-available {
  background-color: #FFFFCC;
}
.target-hover {
  padding: 8px;
  background-color: #FFCCCC;
  border: 2px solid black;
}

td.win {
  background-color: #88FF88;
}

.helper {
  filter: alpha(opacity=50);
  -moz-opacity: 0.5;
  -khtml-opacity: 0.5;
  opacity: 0.5;
  border: 2px solid blue;
  z-index: 300;
}

div.piece:focus,
div.piece:active {
  border: 1px solid #880000;
}
.grabbed {
  border: 2px solid red !important;
}
</style></head>

<!-- html -->
<div role="application">

<h3 id="grid1_label">Tic Tac Toe Game</h3>

<input id="startButton" value="START" type="button" />

<ul class="draggables">
<span class="x100">
<table border="1" tabindex="-1" role="grid" id="grid1" aria-labelledby="grid1_label">
<tr role="row">
   <td id="cell1x1" role="gridcell" class="target" aria-labelledby="cell1_label" aria-dropeffect="none" aria-selected="false" tabindex="0">
      <p class="hidden" id="cell1_label">Top Left Cell is empty</p>
   </td>
   <td id="cell2x1" role="gridcell" class="target" aria-labelledby="cell2_label" aria-dropeffect="none" aria-selected="false" tabindex="-1">
      <p class="hidden" id="cell2_label">Top Center Cell is empty</p>
   </td>
   <td id="cell3x1" role="gridcell" class="target" aria-labelledby="cell3_label" aria-dropeffect="none" aria-selected="false" tabindex="-1">
      <p class="hidden" id="cell3_label">Top Right Cell is empty</p>
   </td>
</tr>
<tr role="row">
   <td id="cell1x2" role="gridcell" class="target" aria-labelledby="cell4_label" aria-dropeffect="none" aria-selected="false" tabindex="-1">
      <p class="hidden" id="cell4_label">Middle Left Cell is empty</p>
   </td>
   <td id="cell2x2" role="gridcell" class="target" aria-labelledby="cell5_label" aria-dropeffect="none" aria-selected="false" tabindex="-1">
      <p class="hidden" id="cell5_label">Center Cell is empty</p>
   </td>
   <td id="cell3x2" role="gridcell" class="target" aria-labelledby="cell6_label" aria-dropeffect="none" aria-selected="false" tabindex="-1">
      <p class="hidden" id="cell6_label">Middle Right Cell is empty</p>
   </td>
</tr>
<tr role="row">
   <td id="cell1x3" role="gridcell" class="target" aria-labelledby="cell7_label" aria-dropeffect="none" aria-selected="false" tabindex="-1">
      <p class="hidden" id="cell7_label">Bottom Left Cell is empty</p>
   </td>
   <td id="cell2x3" role="gridcell" class="target" aria-labelledby="cell8_label" aria-dropeffect="none" aria-selected="false" tabindex="-1">
      <p class="hidden" id="cell8_label">Bottom Center Cell is empty</p>
   </td>
   <td id="cell3x3" role="gridcell" class="target" aria-labelledby="cell9_label" aria-dropeffect="none" aria-selected="false" tabindex="-1">
      <p class="hidden" id="cell9_label">Bottom Right Cell is empty</p>
   </td>
</tr>
</table>
</span>
<table border="0">
   <tr>
      <td id="p1" width="100" height=100>
         <div id="ex" class="ex piece" aria-grabbed="false" role="button" tabindex="0">
            <img src="http://www.oaa-accessibility.org/media/examples/images/game-piece-ex.png" alt="Grabable X for Tic Tac Toe">
         </div>
      </td>
      <td width="160" height=100 valign="top">
            <div id="out" role="alert"></div>
      </td>
      <td id="p2" width="100" height=100>
         <div id="oh" class="oh piece" aria-grabbed="false" role="button" tabindex="0">
            <img src="http://www.oaa-accessibility.org/media/examples/images/game-piece-oh.png" alt="Grabable O for Tic Tac Toe">
         </div>
      </td>
   </tr>
</table>
</ul>
</div>

<!-- javascript -->
<script>
$(document).ready(function() {

  var game = new tictactoe('grid1', 'startButton', 'out', 3, 3);
  
}); // end ready()

//
// Function tictactoe() defines a class to implement a tic-tac-toe game. The board is
// an ARIA grid widget. The game listens to the grab and drop events triggered by
// the draggables and the targetEnter and targetLeave events triggered by the droppables.
//
// @param (boardID string) boardID is the html id of the table to attach to.
//
// @param (startID string) startID is the html id of the start button to use.
//
// @param (msgID string) msgID is the html id of the message box to use.
//
// @param (numRows integer) numRows is the number of rows in the grid
//
// @param (numCols integer) numCols is the number of columns in the grid
//
// @return N/A
//
function tictactoe(boardID, startID, msgID, numRows, numCols) {

  // define widget properties
  this.$id = $('#' + boardID);
  this.$startButton = $('#' + startID);
  this.$msgBox = $('#' + msgID);
  this.keys = new keyCodes();
  this.$rows = this.$id.find('tr');
  this.$cells = this.$id.find('td');

  this.targets = []; // an array of droppable widgets

  var thisObj = this;
  // create droppable instances for each dropTarget found
  this.$cells.each(function(index) {
    thisObj.targets[index] = new droppable($(this).attr('id'), 1, 'copy', false);
  });

  this.numRows = numRows;
  this.numCols = numCols;

  this.player1 = new draggable('ex', this.$cells, false, 10, 10, false, false);
  this.player2 = new draggable('oh', this.$cells, false, 10, 10, false, false);

  this.curPlayer = null; // set to the current player piece widget

  this.activeDraggable = null; // set to the grabbed draggable upon receiving a drag event
  this.activeTarget = null; // set to the droppable under the draggable

  this.rowLabels = ['Top', 'Middle', 'Bottom'];
  this.colLabels = ['Left', 'Center', 'Right'];


  this.moveCount = 0;
  this.winner = '';

  // bind event handlers
  this.bindHandlers();

  this.updateUser('Press START to play.');

} // end tictactoe() constructor

//
// Function updateUser() is a member function to output a status message to the message box
//
// @param (msg string) msg is the message to output
//
// @return N/A
//
tictactoe.prototype.updateUser = function(msg) {

  this.$msgBox.html(msg);

} // end updateUser

//
// Function clearBoard() is a member function to remove any pieces from the game board and to
// reset the labels for the grid cells.
//
// @return N/A
//
tictactoe.prototype.resetBoard = function() {

  var thisObj = this;

  // empty the cells
  this.$cells.find('*').not('p').remove();

  // Remove the cells from the tab order
  this.$cells.attr('tabindex', '-1');

  // Place the first cell in the tab order
  this.$cells.first().attr('tabindex', '0');

  // For each row, find the label for each cell and reset its contents
  this.$rows.each(function(rowIndex) {
    $(this).find('p').each(function(colIndex) {
      if (rowIndex == 1 && colIndex == 1) {
        // the center cell should only be labelled as 'center'
        $(this).text(thisObj.colLabels[colIndex] + ' Cell is empty');
      }
      else {
        $(this).text(thisObj.rowLabels[rowIndex] + ' ' + thisObj.colLabels[colIndex] + ' Cell is empty');
      }
    });
  });

  // remove win highlight from cells
  this.$cells.removeClass('win');

  // reset the moveCount and end game flags
  this.moveCount = 0;
  this.winner = '';

  // reset stored target and draggable
  this.activeTarget = null;
  this.activeDraggable = null;

} // end resetBoard()

//
// Function endGameCheck() is a member function to check for an end of game condition. A player may only win
// if his/her last move makes 3 in a row; therefor, this function checks possible wins from the last position
// played. The worst case scenario is if the last move is the center square.
//
// @return N/A
//
tictactoe.prototype.endGameCheck = function() {

  var $row = this.activeTarget.$id.parent(); // the row containing the square played in 
  var rowNdx = $row.index(); // the index of the row played in
  var colNdx = this.activeTarget.$id.index(); // the index of the column played in
  var lastPiece = ''; // the name of the piece that was played ('ex' or 'oh')
  var $squares = null; // contains a list of squares that contain matching pieces

  // Determine which piece was played last
  if (this.activeDraggable.$id.hasClass('ex') == true) {
    lastPiece = 'ex';
  }
  else {
    lastPiece = 'oh';
  }

  /////////////// check the row //////////////////////
  
  // Do a find for all matching pieces in the row
  // played in. If the count equals the number of columns,
  // we have a winner.
  if ($row.find('div.' + lastPiece).length == this.numCols) {
    // add the win styling to the row cells
    $row.find('td').addClass('win');

    // set winner
    this.winner = lastPiece;
  }

  ///////////// check the column ////////////////////

  // Iterate through the rows, building a list of
  // matching squares in the column last played in.
  this.$rows.each(function(index) {
    var $curSquare = $(this).find('td').eq(colNdx);
    var $div = $curSquare.find('div');

    // if there is a piece in the square, and that
    // piece matches the last one played, add the square
    // to the list of squares.
    if ($div) {

      if ($div.hasClass(lastPiece) == true) {
        if ($squares) {
          $squares = $squares.add($curSquare);
        }
        else {
          $squares = $curSquare;  
        }
      }
    }
  });

  // if the count equals the number of rows, we have a winner
  if ($squares.length == this.numRows) {

    // add the win styling to the squares
    $squares.addClass('win');

    // set winner
    this.winner = lastPiece;
  }

  // reset $squares
  $squares = null;

  /////////// check the diagonal (ul to lr) ////////////////////

  // check the three square where the row and column indices match.
  // If the square contains a matching piece, add it to the list.
  for (ndx = 0; ndx < this.numRows; ndx++) {
    var $curSquare = this.$rows.eq(ndx).find('td').eq(ndx);
    var $div = $curSquare.find('div');

    // if there is a piece in the square, and that
    // piece matches the last one played, add the square
    // to the list of squares.
    if ($div) {
      if ($div.hasClass(lastPiece) == true) {
        if ($squares) {
          $squares = $squares.add($curSquare);
        }
        else {
          $squares = $curSquare;  
        }
      }
    }
  }

  // if the count equals the number of rows, we have a winner
  if ($squares) {
    if ($squares.length == this.numRows) {

      // add the win styling to the squares
      $squares.addClass('win');

      // set winner
      this.winner = lastPiece;
    }

    // reset $squares
    $squares = null;
  }

  /////////// check the other diagonal (ur to ll) ////////////////////

  // check the three square where the row and column are opposites.
  // If the square contains a matching piece, add it to the list.
  for (ndx = 0; ndx < this.numRows; ndx++) {
    var $curSquare = this.$rows.eq(ndx).find('td').eq(2 - ndx);
    var $div = $curSquare.find('div');

    // if there is a piece in the square, and that
    // piece matches the last one played, add the square
    // to the list of squares.
    if ($div) {
      if ($div.hasClass(lastPiece) == true) {
        if ($squares) {
          $squares = $squares.add($curSquare);
        }
        else {
          $squares = $curSquare;  
        }
      }
    }
  }

  // if the count equals the number of rows, we have a winner
  if ($squares) {
    if ($squares.length == this.numRows) {

      // add the win styling to the squares
      $squares.addClass('win');

      // set winner
      this.winner = lastPiece;

      // the game is over
      return true;
    }
  }

  if (this.winner.length > 0) {
    return true;
  }

  // there is a draw if the piece count is equal to
  // the number of cells in the grid
  if (this.moveCount == this.$cells.length) {

    // the game is over
    return true;
  }

  // game is not over yet
  return false;

} // end endGameCheck()

//
// Function bindHandlers() is a member function to bind event handlers for the board.
//
// @return N/A
//
tictactoe.prototype.bindHandlers = function() {

  var thisObj = this;

  ////////////// bind event handlers for grid cells /////////////////////

  // bind a keydown handler
  this.$cells.keydown(function(e) {
    return thisObj.handleKeyDown(e, $(this));
  });

  // bind a keyup handler
  this.$cells.keyup(function(e) {
    return thisObj.handleKeyUp(e, $(this));
  });

  // bind a keypress handler
  this.$cells.keypress(function(e) {
    return thisObj.handleKeyPress(e, $(this));
  });

  // bind a focus handler
  this.$cells.focus(function(e) {
    return thisObj.handleFocus(e, $(this));
  });

  // bind a blur handler
  this.$cells.blur(function(e) {
    return thisObj.handleBlur(e, $(this));
  });

  ////////////// bind event handlers for draggable events /////////////////

  this.$id.bind('grab', function(e, draggable) {
    return thisObj.handleGrab(e, draggable);
  });

  this.$id.bind('drop', function(e, draggable) {
    return thisObj.handleDrop(e, draggable);
  });

  ////////////// bind event handlers for droppable events /////////////////

  this.$id.bind('targetEnter', function(e, droppable) {
    return thisObj.handleTargetEnter(e, droppable);
  });

  this.$id.bind('targetLeave', function(e, droppable) {
    return thisObj.handleTargetLeave(e, droppable);
  });

  // bind a click handler for the start button
  this.$startButton.click(function(e) {
    return thisObj.handleStartClick(e);
  });

} // end bindHandlers()

//
// Function handleKeyDown() is a member function to process keydown events for
// the gameboard
//
// @param (e object) e is the event object
//
// @param ($id object) $id is the jquery object of the cell triggering event
//
// @return (boolean) Returns false if consuming event; true if propagating
//
tictactoe.prototype.handleKeyDown = function(e, $id) {


  if (e.altKey || e.ctrlKey || e.shiftKey) {
    // do nothing
    return true;
  }

  switch (e.keyCode) {
    case this.keys.tab: {
      if (this.activeDraggable) {
        this.activeDraggable.abandonDrag();
      }
      // tab must propagate
      return true;
    }
    case this.keys.esc: {

      if (this.activeDraggable) {
        this.activeDraggable.abandonDrag();
      }
      e.stopPropagation();
      return false;
    }
    case this.keys.left: {

      if ($id.index() > 0) {
        var $prev = $id.prev();

        $prev.focus();

        if (this.activeDraggable) {
          this.activeDraggable.doDrag($prev.offset().left, $prev.offset().top);
        }
      }
      
      e.stopPropagation();
      return false;
    }
    case this.keys.up: {
      var $row = $id.parent();
      var cellNdx = $id.index();

      if ($row.index() > 0) {
        var $above = $row.prev().find('td').eq(cellNdx);

        $above.focus();

        if (this.activeDraggable) {
          this.activeDraggable.doDrag($above.offset().left, $above.offset().top);
        }
      }

      e.stopPropagation();
      return false;
    }
    case this.keys.right: {

      if ($id.index() < this.numCols - 1) {
        var $next = $id.next();

        $next.focus();

        if (this.activeDraggable) {
          this.activeDraggable.doDrag($next.offset().left, $next.offset().top);
        }
      }
      
      e.stopPropagation();
      return false;
    }
    case this.keys.down: {
      var $row = $id.parent();
      var cellNdx = $id.index();

      if ($row.index() < this.numRows - 1) {
        var $below = $row.next().find('td').eq(cellNdx);

        $below.focus();

        if (this.activeDraggable) {
          this.activeDraggable.doDrag($below.offset().left, $below.offset().top);
        }
      }

      e.stopPropagation();
      return false;
    }
  }
  return true;
} // end handleKeyDown()

//
// Function handleKeyUp() is a member function to process keyup events for the game board.
// The function will only respond to keyup events from the enter or space bar and will process
// drops.
//
// @param (e object) e is the event object
//
// @param ($id object) $id is the jquery object of the cell triggering event
//
// @return (boolean) Returns false if consuming event; true if propagating
//
tictactoe.prototype.handleKeyUp = function(e, $id) {

  if (e.altKey || e.ctrlKey || e.shiftKey) {
    // do nothing
    return true;
  }

  switch (e.keyCode) {
    case this.keys.enter:
    case this.keys.space: {
      if (this.activeDraggable) {
            if (this.activeTarget == null) {
               // player attempted to drop a piece on
               // and occupied space
               this.updateUser('That space is occupied!');
            }
            else {
               this.activeDraggable.doDrop();
            }
         }

      e.stopPropagation();
      return false;
    }
  }
  return true;
} // end handleKeyUp()

//
// Function handleKeyPress() is a member function to consume keypress events for
// the gameboard. This handler is necessary to prevent unwanted window manipulation
// in browsers that process on keypress rather than keydown (such as Opera).
//
// @param (e object) e is the event object
//
// @param ($id object) $id is the jquery object of the cell triggering event
//
// @return (boolean) Returns false if consuming event; true if propagating
//
tictactoe.prototype.handleKeyPress = function(e, $id) {

  if (e.altKey || e.ctrlKey || e.shiftKey) {
    // do nothing
    return true;
  }

  switch (e.keyCode) {
    case this.keys.esc:
    case this.keys.enter:
    case this.keys.space:
    case this.keys.left:
    case this.keys.up:
    case this.keys.right:
    case this.keys.down: {
      e.stopPropagation();
      return false;
    }
  }
  return true;
} // end handleKeyPress()

//
// Function handleFocus() is a member function to process focus events for
// the gameboard
//
// @param (e object) e is the event object
//
// @param ($id object) $id is the jquery object of the cell triggering event
//
// @return (boolean) Returns true
//
tictactoe.prototype.handleFocus = function(e, $id) {

  // remove the other cells from the tab order and set their aria-selected state to false
  this.$cells.attr('tabindex', '-1').attr('aria-selected', 'false');

  // remove the other cells from the tab order
  this.$cells.attr('tabindex', '-1');

  // add the current cell to the tab order
  $id.attr('tabindex', '0');

  return true;
} // end handleFocus

//
// Function handleBlur() is a member function to process blur events for
// the gameboard
//
// @param (e object) e is the event object
//
// @param ($id object) $id is the jquery object of the cell triggering event
//
// @return (boolean) Returns true
//
tictactoe.prototype.handleBlur = function(e, $id) {

   // set the cell's aria-selected state to false
   $id.attr('aria-selected', 'false');

  return true;

} // end handleBlur()

//
// Function handleGrab() is a member function to process grab events triggered by
// a draggable. This function stores the active draggable so the grid may manipulate
// its position.
//
// @param (e object) e is the event object
//
// @param (draggable object) draggable is the draggable object triggering event
//
// @return (boolean) Returns true
//
tictactoe.prototype.handleGrab = function(e, draggable) {

  this.activeDraggable = draggable;
  return true;

} // end handleGrab()

//
// Function handleDrop() is a member function to process Drop events triggered by
// a draggable. This function sets the stored draggable to null.
//
// @param (e object) e is the event object
//
// @param (draggable object) draggable is the draggable object triggering event
//
// @return (boolean) Returns true
//
tictactoe.prototype.handleDrop = function(e, draggable) {

  if (draggable.validDrop == true) {
    // drop was valid, modify the cell label

    var piece = this.activeDraggable.$id.attr('id');
    var row = this.activeTarget.$id.parent().index();
    var col = this.activeTarget.$id.index();

    // remove other cells from the tab order
    this.$cells.attr('tabindex', '-1');

    // Place this cell in the tab order
    this.activeTarget.$id.attr('tabindex', '0');

    // modify the label
    if (row == 1 && col == 1) {
      this.activeTarget.$id.find('p').text(this.colLabels[col]
         + ' Cell contains an ' + piece);
    }
    else {
      this.activeTarget.$id.find('p').text(this.rowLabels[row] + ' '
        + this.colLabels[col] + ' Cell contains an ' + piece);
    }

    // Remove the id attribute of the piece, as it is now non-unique (i.e. invalid markup)
    // and is not necessary. Also remove the piece copy from the tab order. Use jQuery
    // chaining for speed.
    this.activeTarget.$id.find('div.piece').removeAttr('id').attr('tabindex', '-1');

    //increment the moveCount
    this.moveCount++;
    
    // check for end of game
    if (this.endGameCheck() == false) {

      // swap players
      if (this.curPlayer == this.player1) {

        this.curPlayer = this.player2;
        this.player2.enable();
        this.player1.disable();

      }
      else {
        this.curPlayer = this.player1;
        this.player1.enable();
        this.player2.disable();
      }

      this.updateUser(this.curPlayer.$id.attr('id') + '\'s turn to play');
      this.curPlayer.$id.focus();

      this.activeDraggable = null;
      this.activeTarget = null;
    }
    else {
      // disable the pieces
      this.player1.disable();
      this.player2.disable();

      if (this.winner.length > 0) {
        this.updateUser(this.winner + ' has won!');
      }
      else {
        this.updateUser('Tie game.');
      }

      this.activeDraggable = null;
      this.activeTarget = null;

      // set focus on start button
      this.$startButton.focus();
    }
  }
  else {
    this.updateUser('You must place an \'' + this.curPlayer.$id.attr('id') + '\' in an empty space.');
  }

  return true;

} // end handleDrop()

//
// Function handleTargetEnter() is a member function to process a targetEnter event triggered
// by a droppable. This function stores the active droppable so the grid may manipulate
// it.
//
// @param (e object) e is the event object
//
// @param (droppable object) droppable is the droppable object triggering event
//
// @return (boolean) Returns true
//
tictactoe.prototype.handleTargetEnter = function(e, droppable) {

  this.activeTarget = droppable;
  return true;

} // end handleTargetEnter()

//
// Function handleTargetLeave() is a member function to process a targetLeave event triggered
// by a droppable. This function resets the stored activeTarget.
//
// @param (e object) e is the event object
//
// @param (droppable object) droppable is the droppable object triggering event
//
// @return (boolean) Returns true
//
tictactoe.prototype.handleTargetLeave = function(e, droppable) {

  this.activeTarget = null;
  return true;

} // end handleTargetLeave()

//
// Function handleStartClick() is a member function to process click events for the start
// button. This function resets the board and sets focus on the first player's piece.
//
// @param (e object) e is the event object
//
// @return (boolean) Returns false
//
tictactoe.prototype.handleStartClick = function(e) {

  var thisObj = this;

  // clear the game board
  this.resetBoard();

  // make the drop targets available
  for (var ndx = 0; ndx < this.targets.length; ndx++) {
    thisObj.targets[ndx].reset();
  }

  // set the current player to be player 1
  this.curPlayer = this.player1;

  // enable the player1 piece and disable player2
  this.player1.enable();
  this.player2.disable();

  // notify user that player one should take a turn
  this.updateUser(this.curPlayer.$id.attr('id') + '\'s turn to play');

  // set focus on the current player piece
  this.player1.$id.focus();

  e.stopPropagation();
  return false;

} // end handleStartClick()
</script>
