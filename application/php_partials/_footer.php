        <!-- The main page footer can contain items such as copyright and contact information. -->
        <!-- ARIA: the landmark role "contentinfo" is added here as it contains metadata that applies to the parent document -->
        <footer role="contentinfo" id="footer">
            <!-- Visually hidden section title for benefit of assistive technologies -->
            <h2 class="visuallyhidden">Website tertiary content eg. Legal, privacy, cookie and accessibility information.</h2>
            <!-- Copyright information can be contained within the <small> element. The <time> element is used here to indicate that the current year '2016' is a date -->
            <small>
                <ul>
                    <li>
                        <a href="//<?php echo $_SERVER['SERVER_NAME']; ?>/accessibility">Accessibility</a>
                    </li>
                    <li>
                        <a href="//<?php echo $_SERVER['SERVER_NAME']; ?>/cookies">Cookies</a>
                    </li>
                    <li>
                        <a href="//<?php echo $_SERVER['SERVER_NAME']; ?>/privacy">Privacy policy</a>
                    </li>
                </ul>
                <em>Made by <a href="http://brootaylor.com" rel="external">Bruce Taylor</a> in Horley, England. </em>
                &copy; 1972&ndash;<time datetime="<?php echo date("Y") ?>"><?php echo date("Y") ?></time> Bruce Taylor. All rights reserved.
            </small>
        </footer>
        <!-- / Footer content -->

        <!-- Processhtml Grunt task changes jquery cdn call to the .min version on build -->
        <!-- build:js //ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js -->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.js"></script>
        <!-- /build -->
        <script>window.jQuery || document.write('<script src="//<?php echo $_SERVER['SERVER_NAME']; ?>/static/js/vendor/jquery-1.12.2.min.js"><\/script>')</script>

        <!-- All plugin scripts eg. jQuery plugins and other 3rd party scripts -->
        <script src="//<?php echo $_SERVER['SERVER_NAME']; ?>/static/js/plugins.js"></script>
        <!-- Site-specific JS -->
        <script src="//<?php echo $_SERVER['SERVER_NAME']; ?>/static/js/main.js"></script>

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='//www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X','auto');
            ga('send','pageview');
            ga('require', 'displayfeatures');


            // Some more Google Analytics options...
            ////////////////////////////////////////

            // Track JavaScript errors in Google Analytics:
            (function(window){
                var undefined,
                    link = function (href) {
                        var a = window.document.createElement('a');
                        a.href = href;
                        return a;
                    };
                window.onerror = function (message, file, line, column) {
                    var host = link(file).hostname;
                    ga('send', {
                      'hitType': 'event',
                      'eventCategory': (host == window.location.hostname || host == undefined || host == '' ? '' : 'external ') + 'error',
                      'eventAction': message,
                      'eventLabel': (file + ' LINE: ' + line + (column ? ' COLUMN: ' + column : '')).trim(),
                      'nonInteraction': 1
                    });
                };
            }(window));

            // Track page scroll:
            $(function(){
                var isDuplicateScrollEvent,
                    scrollTimeStart = new Date,
                    $window = $(window),
                    $document = $(document),
                    scrollPercent;

                $window.scroll(function() {
                    scrollPercent = Math.round(100 * ($window.height() + $window.scrollTop())/$document.height());
                    if (scrollPercent > 90 && !isDuplicateScrollEvent) { //page scrolled to 90%
                        isDuplicateScrollEvent = 1;
                        ga('send', 'event', 'scroll',
                            'Window: ' + $window.height() + 'px; Document: ' + $document.height() + 'px; Time: ' + Math.round((new Date - scrollTimeStart )/1000,1) + 's'
                        );
                    }
                });
            });
        </script>
        <!-- / JavaScript -->

    </body>
</html>
