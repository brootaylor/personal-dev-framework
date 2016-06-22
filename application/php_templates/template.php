<?php
	require($dir_path. "php_partials/_head.php"); // <head> section tags and calls
	require($dir_path. "php_partials/_masthead.php"); // Masthead, Logo and Navigation
?>

<?php echo $page_content; // Page content. Other content-specific partials will be called within index.php ?>

<?php 
	require($dir_path. "php_partials/_footer.php"); // Site footer content such as copyright and contact information
?>