<?php
    // Set the cookie... 
    setcookie($cookie_cssupdate, $cssupdate_value, time() + (86400 * 30), "/"); // 86400 = 1 day
?>
<!doctype html>
<html class="no-js" lang="en" dir="ltr">

<!--
    AppCache manifest file referencing:
    ===================================

    If you want to enable your website visitors to browse your website when they are offline...

    <html class="no-js" lang="en" dir="ltr" manifest="manifest.appcache">
-->

    <head>
        <meta charset="utf-8">
        <title><?php echo $page_title; ?> <?php echo $page_title_extra; ?></title>
        <meta name="description" content="<?php echo $page_description; ?>">

        <!-- Define a viewport for mobile devices to use - telling the browser to assume that the page is as wide as the device (width=device-width) and setting the initial page zoom level to be 1 (initial-scale=1.0) -->
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- For Mobile Internet Explorer. Smoothes fonts for easy reading -->
        <meta http-equiv="cleartype" content="on">

        <!-- Disable link highlighting upon tap in IE10 -->
        <meta name="msapplication-tap-highlight" content="no">
        <meta name="copyright" content="Somebody">

        <link rel="author" href="//<?php echo $server; ?>/humans.txt">
        <link rel="canonical" href="http://<?php echo $server; ?><?php echo $page_canonical; ?>">

        <!-- Place favicon.ico and apple-touch-icon(s) in the root directory -->
        <link rel="apple-touch-icon" href="apple-touch-icon.png">

        <?php
            // If cookie exists/matches then load the normal external stylesheet...
            if(isset($_COOKIE[$cookie_cssupdate]) && $_COOKIE[$cookie_cssupdate] == $cssupdate_value) {
                echo '<link rel="stylesheet" href="//' . $server . '/static/css/styles.' . $cssupdate_value . '.css">' . "\n";
            } else {
                // If it's not set/matches then get the critical CSS and inline it...
                echo "<style>\n\t" . $css_critical . "\n\t</style>\n";
                // Then load the non-critical CSS asynchronously...
                echo "\n\t<script>\t" . $loadCSS_JS . "\n\t</script>\n";
                // Create a fallback CSS call incase JavaScript isn't enabled...
                echo "\n\t<noscript>" . '<link rel="stylesheet" href="//' . $server . '/static/css/styles.' . $cssupdate_value . '.css">' . "</noscript>\n";
            }
        ?>

        <!-- Pick up the latest version or generate a custom Modernizr build -->
        <script src="//<?php echo $server; ?>/static/js/vendor/modernizr.custom.72511.js"></script>

        <!-- Or use the html5shiv instead of modernizr for Internet Explorer browsers 8 and below -->
        <!--[if lt IE 9]>
            <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
            <script>window.html5 || document.write('<script src="//<?php echo $server; ?>/static/js/vendor/html5shiv.js"><\/script>')</script>
        <![endif]-->
    </head>
    <body>

        <!-- JavaScript disabled message -->
        <noscript>
            <div class="tech-missing">
                <h2>Looks like JavaScript is disabled</h2>
                <p>brootaylor.com requires JavaScript enabled to work properly, unfortunately it is disabled on your computer. <a href="http://enable-javascript.com/">Need help enabling JavaScript?</a></p>
            </div>
        </noscript>

        <!-- Browser outdated message -->
        <!--[if lt IE 9]>
            <div class="tech-missing">
                <h2>You are using an outdated browser</h2>
                <p>Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience of brootaylor.com.</p>
            </div>
        <![endif]-->

        <!--
        
            Website content starts here...
            
        -->

        <!-- The page header typically contains items such as your site heading, logo and possibly the main site navigation -->
        <!-- ARIA: the landmark role "banner" is set as it is the prime heading or internal title of the page -->
        <header role="banner" id="masthead">

            <!-- Logo -->
            <a href="//<?php echo $server; ?>" class="logo">
                <img src="//<?php echo $server; ?>/static/img/common/logo.png" alt="Logo">
            </a>
            
            <!-- 'Burger' icon for menu (navigation) -->
            <a href="#" class="menu-button" id="menuButton">
                <span class="burger-icon"></span>
            </a>

            <!--
                ARIA: the landmark role "navigation" is added here as the element contains site navigation
                NOTE: The <nav> element does not have to be contained within a <header> element, even though the two examples on this page are.
            -->
            <nav role="navigation">
                <!-- This can contain your site navigation in something like an unordered list -->
            </nav>
            
        </header>
        <!-- / Masthead & Nav -->
        
