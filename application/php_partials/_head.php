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
        <meta name="copyright" content="Bruce Taylor">

        <link rel="author" href="//<?php echo $_SERVER['SERVER_NAME']; ?>/humans.txt">
        <link rel="canonical" href="http://<?php echo $_SERVER['SERVER_NAME']; ?><?php echo $page_canonical; ?>">

        <!-- Place favicon.ico and apple-touch-icon(s) in the root directory -->
        <link rel="apple-touch-icon" href="apple-touch-icon.png">

        <script>
            // Check whether browser has JavaScript enabled
            // This script is in the <head> to ensure that users with modern browsers don’t see any weird style changes after the page loads.
            (function (win, doc) {

                'use strict';

                // Check for class function
                var hasClass = function (doc, className) {
                    return new RegExp(' ' + className + ' ').test(' ' + doc.documentElement.className + ' ');
                }

                // Remove class function
                var removeClass = function (doc, className) {
                    var newClass = ' ' + doc.documentElement.className.replace( /[\t\r\n]/g, ' ') + ' ';
                    if (hasClass(doc, className)) {
                        while (newClass.indexOf(' ' + className + ' ') >= 0 ) {
                            newClass = newClass.replace(' ' + className + ' ', ' ');
                        }
                        doc.documentElement.className = newClass.replace(/^\s+|\s+$/g, '');
                    }
                }

                // 'Cuts The Mustard' function
                var cutsTheMustard = function() {
                    if (doc.querySelector && win.addEventListener && win.localStorage) {
                        return true;
                    } else {
                        return false;
                    }
                }

                var enhanceclass = 'js', // Enhanced / js-enabled class
                    legacyclass = 'no-js'; // Legacy / js not enabled class


                if (cutsTheMustard() === true) {
                    // Browser has JavaScript enabled

                    // So first remove the 'no-js' class...
                    removeClass(doc, legacyclass);

                    // and then add the 'js' class...
                    doc.documentElement.className += '' + enhanceclass;
                }

            }(this, this.document));


            // An 'enhanced' cuts-the-mustard option from Scott Jehl - (Possibly use this instead)
            // Ref: =>> https://www.filamentgroup.com/lab/enhancing-optimistically.html
            // (function() {
            //     if( "querySelector" in window.document && "addEventListener" in window ){
            //       // This is a capable browser, let's improve the UI further!
            //       var docElem = window.document.documentElement;

            //       // the class we'll use to enhance the UI
            //       var enhancedClass = "enhanced";
            //       var enhancedScriptPath = "/path/to/enhancements.js";

            //       // add enhanced class
            //       function addClass(){
            //         docElem.className += " " + enhancedClass;
            //       }

            //       // remove enhanced class
            //       function removeClass(){
            //         docElem.className = docElem.className.replace( enhancedClass, " " );
            //       }

            //       // Let's enhance optimistically...
            //       addClass();

            //       // load enhanced JS file
            //       var script = loadJS( enhancedScriptPath );

            //       // if script hasn't loaded after 8 seconds, remove the enhanced class
            //       var fallback = setTimeout( removeClass, 8000 );

            //       // when the script loads, clear the timer out and add the class again just in case
            //       script.onload = function(){
            //         // clear the fallback timer
            //         clearTimeout( fallback ); 
            //         // add this class, just in case it was removed already (we can't cancel this request so it might arrive any time)
            //         addClass();
            //       };
            //     }
            // })();

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
        <a class="visuallyhidden" href="#main">Skip to the content</a>
        
