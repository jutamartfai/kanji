/*
* @Author: DELL
* @Date:   2017-04-03 01:29:15
* @Last Modified by:   DELL
* @Last Modified time: 2017-04-03 04:16:53
*/

// 'use strict';

var correctCards = 0;
var failCards = 0;
$( init );

function init() {

  	// Hide the success message
    $('#scoreBtn').hide();

	// Reset the game
    correctCards = 0;
    failCards = 0;
    $('#cardPile').html( '' );
    $('#cardSlots').html( '' );
    $('#cardPile2').html( '' );
    $('#cardSlots2').html( '' );

	// pron card area
	// Create the pile of shuffled cards
	var numbers = [ 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20 ];
	numbers.sort( function() { return Math.random() - .5 } );

	for ( var i=0; i<20; i++ ) {
		$('<div>' + numbers[i] + '</div>').data( 'number', numbers[i] ).attr( 'id', 'cardP'+numbers[i] ).appendTo( '#cardPile' ).draggable( {
		  		containment: '#content',
		  		stack: '#cardPile div',
		  		cursor: 'move',
		  		revert: true
			} );
	}

	// Create the card slots
	var words = [ 'one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine', 'ten', 'eleven', 'twelve', 'thirteen', 'fourteen', 'fifteen', 'sixteen', 'seventeen', 'eighteen', 'nineteen', 'twenty' ];
	for ( var i=1; i<=20; i++ ) {
		$('<div>' + words[i-1] + '</div>').data( 'number', i ).attr( 'id', 'cardQ'+i ).appendTo( '#cardSlots' ).droppable( {
		  	accept: '#cardPile div',
		  	hoverClass: 'hovered',
		  	drop: handleCardDrop
		} );
	}
	// end pron card area


	// meaning card area
	// Create the pile of shuffled cards
	var numbers = [ 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20 ];
	numbers.sort( function() { return Math.random() - .5 } );

	for ( var i=0; i<20; i++ ) {
	    $('<div>' + numbers[i] + '</div>').data( 'number', numbers[i] ).attr( 'id', 'cardM'+numbers[i] ).appendTo( '#cardPile2' ).draggable( {
		      	containment: '#content2',
		      	stack: '#cardPile2 div',
		      	cursor: 'move',
		      	revert: true
		    } );
	  }

	// Create the card slots
	var words = [ 'one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine', 'ten', 'eleven', 'twelve', 'thirteen', 'fourteen', 'fifteen', 'sixteen', 'seventeen', 'eighteen', 'nineteen', 'twenty' ];
	for ( var i=1; i<=20; i++ ) {
	    $('<div>' + words[i-1] + '</div>').data( 'number', i ).attr( 'id', 'cardQ'+i ).appendTo( '#cardSlots2' ).droppable( {
	      	accept: '#cardPile2 div',
	      	hoverClass: 'hovered',
	      	drop: handleCardDrop
	    } );
	}
	// end meaning card area

}

function handleCardDrop( event, ui ) {
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

  	if ( failCards+correctCards == 40 ) {
        $('#scoreBtn').show();

        document.getElementById("correctScore").innerHTML = correctCards;
        document.getElementById("failScore").innerHTML = failCards;
        document.getElementById("totalScore").innerHTML = correctCards+failCards;
  	}

}

