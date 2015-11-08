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
        <meta name="viewport" content="width=device-width, initial-scale=1, minimal-ui">

        <!-- For Mobile Internet Explorer. Smoothes fonts for easy reading -->
        <meta http-equiv="cleartype" content="on">
        <!-- Disable link highlighting upon tap in IE10 -->
        <meta name="msapplication-tap-highlight" content="no">
        <meta name="copyright" content="Somebody">

        <link rel="author" href="//<?php echo $_SERVER['SERVER_NAME']; ?>/humans.txt">
        <link rel="canonical" href="http://<?php echo $_SERVER['SERVER_NAME']; ?><?php echo $page_canonical; ?>">

        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <!-- Place favicon.ico and apple-touch-icon(s) in the root directory -->

        <link rel="stylesheet" href="//<?php echo $_SERVER['SERVER_NAME']; ?>/static/css/styles.1446997013260.css">

        <!-- Pick up the latest version or generate a custom Modernizr build -->
        <script src="//<?php echo $_SERVER['SERVER_NAME']; ?>static/js/vendor/modernizr.custom.72511.js"></script>

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

        <!-- Masthead & Nav -->
        <header role="banner" id="masthead">
            
            <!-- 'Burger' icon for menu (navigation) -->
            <a href="#" class="menu-button" id="menuButton">
                <span class="burger-icon"></span>
            </a>
            
        </header>
        <!-- / Masthead & Nav -->
        