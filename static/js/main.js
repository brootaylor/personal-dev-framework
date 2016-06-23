
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

	//////////////////////////////////////////////////////////////
	// Check whether browser has JavaScript enabled
    //////////////////////////////////////////////////////////////
    // (function (win, doc) {

    //     'use strict';

    //     // Check for class function
    //     var hasClass = function (doc, className) {
    //         return new RegExp(' ' + className + ' ').test(' ' + doc.documentElement.className + ' ');
    //     }

    //     // Remove class function
    //     var removeClass = function (doc, className) {
    //         var newClass = ' ' + doc.documentElement.className.replace( /[\t\r\n]/g, ' ') + ' ';
    //         if (hasClass(doc, className)) {
    //             while (newClass.indexOf(' ' + className + ' ') >= 0 ) {
    //                 newClass = newClass.replace(' ' + className + ' ', ' ');
    //             }
    //             doc.documentElement.className = newClass.replace(/^\s+|\s+$/g, '');
    //         }
    //     }

    //     // 'Cuts The Mustard' function
    //     var cutsTheMustard = function() {
    //         if (doc.querySelector && win.addEventListener && win.localStorage) {
    //             return true;
    //         } else {
    //             return false;
    //         }
    //     }

    //     var enhanceclass = 'js', // Enhanced / js-enabled class
    //         legacyclass = 'no-js'; // Legacy / js not enabled class


    //     if (cutsTheMustard() === true) {
    //         // Browser has JavaScript enabled

    //         // So first remove the 'no-js' class...
    //         removeClass(doc, legacyclass);

    //         // and then add the 'js' class...
    //         doc.documentElement.className += '' + enhanceclass;
    //     }

    // }(this, this.document));
    ///////////////////////////////////////////////////////////////


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

