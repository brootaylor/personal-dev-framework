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
	// Critical CSS & non-critical CSS decision making...
	$css_critical = file_get_contents("static/css/critical.css");
	$loadCSS_JS = file_get_contents("static/js/loadCSS.js");

	$cookie_cssupdate = "cssupdate";
	$cssupdate_value = "11022016"; // Manually change this every time new version of CSS created
	/////////////////////////////////////////////////////////////////////////////////////////////

?>