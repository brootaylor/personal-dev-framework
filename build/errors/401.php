<?php

    // Generates the content for the page title, meta title & description
    $page_title = "401 Unauthorised Access";
    $page_title_context = "The title's context eg. | Bruce Taylor's Personal Website";
    $page_description = "401 Unauthorised Access";
    $page_canonical = false;
    $page_noindex = false;

    ob_start();
?>

        <!-- The <main> element is used to enclose the main content, i.e. that which contains the central topic of a document -->
        <!-- ARIA: the landmark role "main" is added here as it contains the main content of the document, and it is recommended to add it to the
        <main> element until user agents implement the required role mapping. -->
        <main role="main" id="main">

            <article>

                <h1><?php echo $page_title; ?></h1>

                <p>You have attempted to access a page for which you are not authorised.</p>

                <p>You can always head <a href="/">back to the homepage</a>.</p>
                
            </article>
            
        </main>
        <!-- / Main content -->

<?php
    // Renders this page's content in the variable below
    $page_content = ob_get_clean();

    // Includes the template
    require($_SERVER["DOCUMENT_ROOT"]. "/application/". "php_partials/_config.php");
?>