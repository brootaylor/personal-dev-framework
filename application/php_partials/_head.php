<?php
    // Set the cookie... 
    setcookie($cookie_cssupdate, $cssupdate_value, time() + (86400 * 30), "/"); // 86400 = 1 day
?>
<!doctype html>
<html lang="en" dir="ltr">
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

        <link rel="author" href="//<?php echo $_SERVER['SERVER_NAME']; ?>/humans.txt">
        <link rel="canonical" href="http://<?php echo $_SERVER['SERVER_NAME']; ?><?php echo $page_canonical; ?>">

        <!-- Place favicon.ico and apple-touch-icon(s) in the root directory -->
        <link rel="apple-touch-icon" href="apple-touch-icon.png">

        <script>
            // Check whether browser 'cuts the mustard'
            (function (win, doc) {

                var cutsTheMustard = function() {
                    if (doc.querySelector && win.addEventListener && win.localStorage) {
                        return true;
                    } else {
                        return false;
                    }
                };

                var enhanceclass = 'enhanced';

                if (cutsTheMustard() === true) {
                    // Browser cuts the mustard...
                    doc.documentElement.className += '' + enhanceclass;
                }

            }(this, this.document));

            // Google font call
            WebFontConfig = {
                google: { families: [ 'Open+Sans:400,700,300,600:latin' ] }
            };
            (function() {
                var wf = document.createElement('script');
                wf.src = ('https:' == document.location.protocol ? 'https' : 'http') +
                '://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
                wf.type = 'text/javascript';
                wf.async = 'true';
                var s = document.getElementsByTagName('script')[0];
                s.parentNode.insertBefore(wf, s);
            })();
        </script>

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

        <!-- Or use the html5shiv instead of modernizr for Internet Explorer browsers 8 and below -->
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

        <!-- Helps assistive technologies -->
        <a class="visuallyhidden" href="#nav">Skip to the site navigation</a>
        <a class="visuallyhidden" href="#main">Skip to the content</a>

        <!--
        
            Website content starts here...
            
        -->

        <!-- The page header typically contains items such as your site heading, logo and possibly the main site navigation -->
        <!-- ARIA: the landmark role "banner" is set as it is the prime heading or internal title of the page -->
        <header role="banner" id="masthead">

            <!-- Logo -->
            <a href="//<?php echo $_SERVER['SERVER_NAME']; ?>" class="logo">
                <h1 class="visuallyhidden">Personal Dev Framework</h1>
                <img src="//<?php echo $_SERVER['SERVER_NAME']; ?>/static/img/common/logo.png" alt="Logo">
            </a>

            <!--
                ARIA: the landmark role "navigation" is added here as the element contains site navigation
            --> 
            <nav role="navigation" class="nav" id="nav">
                <h1 class="visuallyhidden">Main navigation</h1>

                <!-- 'Burger' icon for smaller screen menu (navigation) -->
                <a href="#menu" class="menu-button" id="menuButton" aria-controls="menu">
                    <span class="burger-icon"></span>
                    <span class="burger-text">Menu</span>
                </a>

                <!-- This can contain your site navigation in something like an unordered list -->
                <ul id="menu">
                    <li>
                        <a href="//<?php echo $_SERVER['SERVER_NAME']; ?>">Home</a>
                    </li>
                    <li>
                        <a href="//<?php echo $_SERVER['SERVER_NAME']; ?>/about-us">About Us</a>
                    </li>
                    <li>
                        <a href="//<?php echo $_SERVER['SERVER_NAME']; ?>/contact-us">Contact Us</a>
                    </li>
                    <li>
                        <a href="//<?php echo $_SERVER['SERVER_NAME']; ?>/accessibility">Accessibility</a>
                    </li>
                    <li>
                        <a href="//<?php echo $_SERVER['SERVER_NAME']; ?>/cookies">Cookies</a>
                    </li>
                </ul>
            </nav>
            
        </header>
        <!-- / Masthead & Nav -->
        
