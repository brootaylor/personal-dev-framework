<?php

    // Generates the content for the page title, meta title & description
    $page_title = "Accessibility";
    $page_title_context = "The title's context eg. | Bruce Taylor's Personal Website";
    $page_description = "This will render in the meta description tag";
    $page_canonical = true;
    $page_noindex = false;

    ob_start();
?>

        <!-- The <main> element is used to enclose the main content, i.e. that which contains the central topic of a document -->
        <!-- ARIA: the landmark role "main" is added here as it contains the main content of the document, and it is recommended to add it to the
        <main> element until user agents implement the required role mapping. -->
        <main role="main" id="main">

            <article>

                <h1><?php echo $page_title; ?></h1>

                <hr>

                <p>We've tried our very best to make [<a href="#">WEBSITE NAME</a>] as accessible and usable as possible for every user. No matter what type of user they may be.</p>

                <p>Things like:</p>

                <ul>
                    <li>Blind screen-reader users</li>
                    <li>Colour-blind users</li>
                    <li>Screen magnification users</li>
                    <li>Keyboard-only users</li>
                </ul>

                <p><a href="#">Contact us</a> if you have trouble using [<a href="#">WEBSITE NAME</a>] - this will help us to make improvements.</p>
                
            </article>
            
        </main>
        <!-- / Main content -->

<?php
    // Renders this page's content in the variable below
    $page_content = ob_get_clean();

    // Includes the template
    require($_SERVER["DOCUMENT_ROOT"]. "/application/". "php_partials/_config.php");
?>