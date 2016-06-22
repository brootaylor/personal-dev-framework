
        <!-- The page header contains items such as the site heading, logo and the main site navigation -->
        <!-- ARIA: the landmark role "banner" is set as it is the prime heading or internal title of the page -->
        <header role="banner" id="masthead">

            <!-- Logo -->
            <a href="//<?php echo $_SERVER['SERVER_NAME']; ?>" class="logo">
                <!-- Visually hidden primary Website <h1> title for benefit of SEO and assistive technologies  -->
                <h1 class="visuallyhidden">Personal Dev Framework</h1>
                <img src="//<?php echo $_SERVER['SERVER_NAME']; ?>/static/img/common/logo.png" alt="Logo">
            </a>

            <!--

                =======================
                MAIN WEBSITE NAVIGATION
                =======================


                ARIA: the landmark role "navigation" is added here as the element contains site navigation

                Other ARIA attributes to use to enhance accessibility:
                ======================================================

                aria-controls="menu" (To associate the menu button / link to the actual menu list content)
                aria-label="" (Will use values like "navigation menu" and "submenu" to label sections and sub-sections of the nav appropriately)
                aria-expanded="true / false" (Boolean value)
                aria-hidden="true / false" (Boolean value)
                aria-haspopup="true / false" (Boolean value)

                >>> The above ARIA attributes are added using JavaScript (ONLY) if this is behaving like a normal dropdown / reveal type navigation.
                    If browser not JS enabled then these aren't needed. <<<


            --> 
            <nav role="navigation" id="nav" class="nav">
                <h1 class="screenreader">Main navigation</h1>

                <!--
                    'Burger' icon for smaller screen menu (navigation)
                    ==================================================
                    => Before JS loads, or if browser not JS enabled, the "burger" icon is just a link to the menu below (ie. skip-to type link)
                    => If JS is loaded, we supply the "burger" with button semantics (role="button") and aria-expanded info...
                        |
                        |
                         ==>> .ie Add aria-controls="menu" and aria-expanded="false" to the menu 'button'. This ensures that when focussed, a screenreader (like NVDA or Firefox) 
                         reads "button collapsed navigation menu". When you press the button, "expand" is announced as aria-expanded is switched to "true".
                -->
                <a href="#menu" class="menu-button" id="menuButton" aria-controls="menu">
                    <span class="burger-icon"></span>
                    <span class="burger-text">
                        <!-- Swap out "Open" and "Close" text depending on state. Benefits assistive technologies - especially screenreaders -->
                        <span class="screen-reader-text">Open </span>Menu
                    </span>
                </a>

                <!-- This can contain your site navigation in something like an unordered list -->
                <ul id="menu" class="menu">
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
