<?php

	// Various variables...
	/////////////////////////////////////////////////////////////////////////////////////////////

	// Set document root for Production
	// ================================
	$dir_path = $_SERVER["DOCUMENT_ROOT"]. "/application/";

	// Set document root for BETA testing
	// ===================================
	//$dir_path = $_SERVER["DOCUMENT_ROOT"]. "/beta/application/";

	/////////////////////////////////////////////////////////////////////////////////////////////
	// Critical CSS, non-critical CSS and inline JS file paths...
	$css_critical = file_get_contents($_SERVER["DOCUMENT_ROOT"] . "/static/css/critical.css");
	$loadCSS_JS = file_get_contents($_SERVER["DOCUMENT_ROOT"] . "/static/js/loadCSS.js");
	$jsInlineHead_JS = file_get_contents($_SERVER["DOCUMENT_ROOT"] . "/static/js/jsInlineHead.js");

	$cookie_fullcss = "fullcss";
	$fullcss_value = "16339900"; // Use https://www.random.org/
	/////////////////////////////////////////////////////////////////////////////////////////////

?>