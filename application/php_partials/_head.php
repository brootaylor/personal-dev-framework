<?php
    // Set the cookie... 
    setcookie($cookie_cssupdate, $cssupdate_value, time() + (86400 * 30), "/"); // 86400 = 1 day
?>
<!doctype html>
<html lang="en-gb" dir="ltr">
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
        <!-- Link to copyright information on seperate page or anchored to a section -->
        <link rel="copyright" href="//<?php echo $_SERVER['SERVER_NAME']; ?>/privacy">
        <link rel="author" href="//<?php echo $_SERVER['SERVER_NAME']; ?>/humans.txt">
        <link rel="canonical" href="http://<?php echo $_SERVER['SERVER_NAME']; ?><?php echo $page_canonical; ?>">
        <!-- Place favicon.ico and apple-touch-icon(s) in the root directory -->
        <link rel="apple-touch-icon" href="apple-touch-icon.png">

        <script>
            
            // An 'enhanced' cuts-the-mustard option from Scott Jehl
            // Ref: =>> https://www.filamentgroup.com/lab/enhancing-optimistically.html
            (function() {
                if( "querySelector" in window.document && "addEventListener" in window ){
                  // This is a capable browser, let's improve the UI further!
                  var docElem = window.document.documentElement;

                  // the class we'll use to enhance the UI
                  var enhancedClass = "enhanced",
                      enhancedScriptPath = "/static/js/enhancements.js";

                  // add enhanced class
                  function addClass(){
                    docElem.className += " " + enhancedClass;
                  }

                  // remove enhanced class
                  // function removeClass(){
                  //   docElem.className = docElem.className.replace( enhancedClass, " " );
                  // }

                  // Let's enhance optimistically...
                  addClass();

                  // load enhanced JS file
                  // var script = loadJS( enhancedScriptPath );

                  // if script hasn't loaded after 8 seconds, remove the enhanced class
                  // var fallback = setTimeout( removeClass, 8000 );

                  // when the script loads, clear the timer out and add the class again just in case
                  // script.onload = function(){
                  //   // clear the fallback timer
                  //   clearTimeout( fallback ); 
                  //   // add this class, just in case it was removed already (we can't cancel this request so it might arrive any time)
                  //   addClass();
                  // };
                }
            })();

            // Web Font Loader
            // -------------------------------------------------
            // =>> See https://github.com/typekit/webfontloader

            // Asynchronous font loading method...
            // ====================================
            // NOTE: The rest of the page might render before the Web Font Loader is loaded and executed, which can cause a Flash of Unstyled Text (FOUT).
            
            WebFontConfig = {
              google: { families: [ 'Open+Sans:300,300i,400,400i,700,700i' ] }
            };
            (function(d) {
              var wf = d.createElement('script'), s = d.scripts[0];
              wf.src = 'https://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
              s.parentNode.insertBefore(wf, s);
            })(document);
        </script>

        <!--
          Synchronous font loading method:
          ================================
          NOTE: This method will block the rest of your page loading while this JS is loading
        -->
        <!-- <script src="https://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js"></script> -->
        <!-- <script>
          // Synchronous method...
          WebFont.load({
            google: {
              families: ['Open+Sans:300,300i,400,400i,700,700i']
            }
          });
        </script> -->

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
        
