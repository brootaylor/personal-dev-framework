
//////////////////////////////////////////////////////////
// Main JS for the website
//////////////////////////////////////////////////////////

// This file can be used to contain or reference your site/app JavaScript code.
// For larger projects, you can make use of a JavaScript module loader, like Require.js, to load any other scripts you need to run.


(function($) {

	'use strict';

	// Hamburger icon toggling & menu show / hide
	//////////////////////////////////////////////
	(function() {
	    var menuButton = document.querySelector('#menuButton'),
	    	nav = document.querySelector("#nav ul");

	    if (menuButton) {
	    	menuButton.addEventListener('click', function (e) {
		        menuButton.classList.toggle('is-active'); // May need to use something other than 'classList' because of sketchy browser support

		        if (nav.className === "open") {
		        	nav.className = "";
		        } else {
		        	nav.className = "open";
		        }

		        e.preventDefault();
		    }, false);
	    }
	})();

	///////////////////////////////////////////////////////////////
	// Pattern / component library navigation function
	///////////////////////////////////////////////////
	var componentNav = function() {

		$('#componentNav a[href^="#"]').on('click', function(event) {

			event.preventDefault();

		    var target = $( $(this).attr('href') );

		    if( target.length ) {
		        
		        $('html, body').animate({
		            scrollTop: target.offset().top - 50
		        }, 1000);
		    }

		});
	}();
	///////////////////////////////////////////////////////////////

	// Equal heights (Polyfill) function as fallback for browsers not supporting flexbox
	/////////////////////////////////////////////////////////////////////////////////////
	// var equalHeights = function( window, document, undefined ) {
 
	//     var s = document.body || document.documentElement, s = s.style;

	//     // First detects if the browser does not support Flexbox
	//     if( s.webkitFlexWrap === '' || s.msFlexWrap === '' || s.flexWrap === '' ) return true;
	 
	//     var $list       = $( '.col__equal-wrap' ),
	//         $items      = $list.find( '.col__equal-item' ),
	//         setHeights  = function() {
	//             $items.css( 'height', 'auto' );
	 
	//             var perRow = Math.floor( $list.width() / $items.width() );
	//             if( perRow === null || perRow < 2 ) return true;
	 
	//             for( var i = 0, j = $items.length; i < j; i += perRow ) {
	//                 var maxHeight   = 0,
	//                     $row        = $items.slice( i, i + perRow );
	 
	//                 $row.each( function() {
	//                     var itemHeight = parseInt( $( this ).outerHeight() );
	//                     if ( itemHeight > maxHeight ) maxHeight = itemHeight;
	//                 });
	//                 $row.css( 'height', maxHeight );
	//             }
	//         };
	 
	//     setHeights();

	//     // Relevant if the exact dimensions of images are unknown (ie. normal responsive image implementation)...
	//     $( window ).on( 'resize', setHeights );
	//     $list.find( 'img' ).on( 'load', setHeights );
	 
	// }( window, document );
	///////////////////////////////////////////////////////////////

})(jQuery);

