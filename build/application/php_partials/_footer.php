        <!-- The main page footer can contain items such as copyright and contact information. -->
        <!-- ARIA: the landmark role "contentinfo" is added here as it contains metadata that applies to the parent document -->
        <footer role="contentinfo" id="footer">
            <!-- Copyright information can be contained within the <small> element. The <time> element is used here to indicate that the current year '2016' is a date -->
            <small>
                <ul>
                    <li>
                        <a href="//<?php echo $_SERVER['SERVER_NAME']; ?>/accessibility">Accessibility</a>
                    </li>
                    <li>
                        <a href="//<?php echo $_SERVER['SERVER_NAME']; ?>/cookies">Cookies</a>
                    </li>
                </ul>
                <em>Made by <a href="http://brootaylor.com" rel="external">Bruce Taylor</a> in Horley, England. </em>
                &copy; 2003&ndash;<time datetime="<?php echo date("Y") ?>"><?php echo date("Y") ?></time> Bruce Taylor. All rights reserved.
            </small>
        </footer>
        <!-- / Footer content -->

        <!--

            ...and ends here

        -->

        <!-- /// JavaScript \\\ -->

        <!--
            Vendor JS calls
            ===============
            These are calls to the development (uncompressed) version. Change to compressed versions for production.
        -->
        <!-- Processhtml Grunt task changes jquery cdn call to the .min version on build -->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="//<?php echo $_SERVER['SERVER_NAME']; ?>/static/js/vendor/jquery-1.12.2.min.js"><\/script>')</script>

        <!-- All plugin scripts eg. jQuery plugins and other 3rd party scripts -->
        <script src="//<?php echo $_SERVER['SERVER_NAME']; ?>/static/js/plugins.1461788153807.js"></script>
        <!-- Site-specific JS -->
        <script src="//<?php echo $_SERVER['SERVER_NAME']; ?>/static/js/main.1461788153807.js"></script>

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
        </script>
        <!-- / JavaScript -->

    </body>
</html>
