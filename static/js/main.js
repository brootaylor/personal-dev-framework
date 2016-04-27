
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

})(jQuery);

