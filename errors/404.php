<?php

    // Generates the content for the page title, meta title & description
    $page_title = "Page Not Found";
    $page_title_context = "The title's context eg. | Bruce Taylor's Personal Website";
    $page_description = "Page Not Found";
    $page_canonical = false;
    $page_noindex = true;

    ob_start();
?>

        <!-- The <main> element is used to enclose the main content, i.e. that which contains the central topic of a document -->
        <!-- ARIA: the landmark role "main" is added here as it contains the main content of the document, and it is recommended to add it to the
        <main> element until user agents implement the required role mapping. -->
        <main role="main" id="main">

            <article>

                <h1><?php echo $page_title; ?></h1>

                <p>It looks like the page you were looking for doesn't exist, at least not at this location.</p>

                <hr>

                <p>Try the main menu navigation again or maybe one of the links below.</p>

                <ul>
                    <li><a href="/">Return to the homepage</a></li>
                    <li><a href="//<?php echo $_SERVER['SERVER_NAME']; ?>/contact-us.php">Contact us</a></li>
                </ul>
                
            </article>
            
        </main>
        <!-- / Main content -->

<?php
    // Renders this page's content in the variable below
    $page_content = ob_get_clean();

    // Includes the template
    require($_SERVER["DOCUMENT_ROOT"]. "/application/". "php_partials/_config.php");
?>