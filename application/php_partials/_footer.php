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
        <!-- build:js //ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js -->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.js"></script>
        <!-- /build -->
        <script>window.jQuery || document.write('<script src="//<?php echo $_SERVER['SERVER_NAME']; ?>/static/js/vendor/jquery-3.1.1.min.js"><\/script>')</script>

        <!-- All plugin scripts eg. jQuery plugins and other 3rd party scripts -->
        <script src="//<?php echo $_SERVER['SERVER_NAME']; ?>/static/js/plugins.js"></script>
        <!-- Site-specific JS -->
        <script src="//<?php echo $_SERVER['SERVER_NAME']; ?>/static/js/main.js"></script>

        <script>
            /* Google Analytics: change UA-XXXXX-X to be your site's ID. */
            (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
            })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

            ga('create', 'UA-XXXXX-Y', 'auto');
            ga('send', 'pageview');
            ga('require', 'displayfeatures');
        </script>

    </body>
</html>
