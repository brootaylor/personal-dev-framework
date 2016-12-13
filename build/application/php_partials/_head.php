<?php
    // Set the cookie... 
    setcookie($cookie_cssupdate, $cssupdate_value, time() + (86400 * 30), "/"); // 86400 = 1 day
?>
<!doctype html>
<html lang="en-gb" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title><?php echo $page_title . " | " . $page_title_context; ?></title>
        <meta name="description" content="<?php echo $page_description; ?>">
        <!-- Define a viewport for mobile devices to use - telling the browser to assume that the page is as wide as the device (width=device-width) and setting the initial page zoom level to be 1 (initial-scale=1.0) -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- For Mobile Internet Explorer. Smoothes fonts for easy reading -->
        <meta http-equiv="cleartype" content="on">
        <!-- Disable link highlighting upon tap in IE10 -->
        <meta name="msapplication-tap-highlight" content="no">
        <?php
            if (isset($page_noindex) && $page_noindex !== false) {
                // If the specific page needs 'noindex' meta
                echo '<meta name="robots" content="noindex">' . "\n";
            }
        ?>

        <!-- Place favicon.ico and apple-touch-icon(s) in the root directory -->
        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <!-- Link to copyright information on seperate page or anchored to a section -->
        <link rel="copyright" href="//<?php echo $_SERVER['SERVER_NAME']; ?>/privacy">
        <!-- Link to Author's / Developers credentials -->
        <link rel="author" href="//<?php echo $_SERVER['SERVER_NAME']; ?>/humans.txt">
        <?php
            if (isset($page_canonical) && $page_canonical !== false) {
                // Pahe-specific canonical URI
                echo '<link rel="canonical" href="//' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'] . '">' . "\n";
            }
        ?>

        <?php
            // Add the JS inline and minified output version for the build
            echo "<script>\n" . $jsInline_JS . "\n\t\t</script>\n";
        ?>

        <?php
            // If cookie exists/matches then load the normal external stylesheet...
            if(isset($_COOKIE[$cookie_cssupdate]) && $_COOKIE[$cookie_cssupdate] == $cssupdate_value) {
                echo '<link rel="stylesheet" href="//' . $_SERVER['SERVER_NAME'] . '/static/css/styles.' . $cssupdate_value . '.css">' . "\n";
            } else {
                // If it's not set/matches then get the critical CSS and inline it...
                echo "<style>\n\t" . $css_critical . "\n\t</style>\n";
                // Then load the non-critical CSS asynchronously...
                echo "\n\t<script>\t" . $loadCSS_JS . "\n\t</script>\n";
                // Create a fallback CSS call incase JavaScript isn't enabled...
                echo "\n\t<noscript>" . '<link rel="stylesheet" href="//' . $_SERVER['SERVER_NAME'] . '/static/css/styles.' . $cssupdate_value . '.css">' . "</noscript>\n";
            }
        ?>

        <!-- Use the html5shiv for Internet Explorer browsers 8 and below -->
        <!--[if lt IE 9]>
            <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
            <script>window.html5 || document.write('<script src="//<?php echo $_SERVER['SERVER_NAME']; ?>/static/js/vendor/html5shiv.js"><\/script>')</script>
        <![endif]-->
    </head>
    <body>

        <!-- JavaScript disabled message -->
        <noscript>
            <div class="tech-missing">
                <h2>Looks like JavaScript is disabled</h2>
                <p><?php echo $_SERVER['SERVER_NAME']; ?> requires JavaScript enabled to work properly, unfortunately it is disabled on your computer. <a href="http://enable-javascript.com/">Need help enabling JavaScript?</a></p>
            </div>
        </noscript>

        <!-- Browser outdated message -->
        <!--[if lt IE 9]>
            <div class="tech-missing">
                <h2>You are using an outdated browser</h2>
                <p>Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience of <?php echo $_SERVER['SERVER_NAME']; ?>.</p>
            </div>
        <![endif]-->

        <!-- "Skip-to" links. Helps assistive technologies -->
        <a class="visuallyhidden" href="#nav">Skip to the site navigation</a>
        <a class="visuallyhidden" href="#main">Skip to the main content</a>
        
