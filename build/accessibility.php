<?php

    // Generates the content for the page title, meta title & description
    $page_title = "Accessibility";
    $page_title_extra = "| The title's context eg. | Bruce Taylor's Personal Website";
    $page_description = "This will render in the meta description tag";
    $page_canonical = "/accessibility";

    ob_start();
?>

        <!-- The <main> element is used to enclose the main content, i.e. that which contains the central topic of a document -->
        <!-- ARIA: the landmark role "main" is added here as it contains the main content of the document, and it is recommended to add it to the
        <main> element until user agents implement the required role mapping. -->
        <main role="main" id="main">

            <article>

                <h1><?php echo $page_title; ?></h1>

                <h2>Standards compliance</h2>
                <p>Tincidunt cras lectus arcu habitasse aliquam? Scelerisque in, et montes, lorem porttitor tincidunt parturient, ut etiam. Phasellus enim elementum, adipiscing adipiscing! Lundium tortor non et natoque integer massa lundium platea? Etiam platea, elementum, ultrices enim dis purus natoque dolor et? Quis cursus ac mus a elementum etiam urna. Mus adipiscing.</p>

                <h2>Links</h2>
                <p>Tincidunt cras lectus arcu habitasse aliquam? Scelerisque in, et montes, lorem porttitor tincidunt parturient, ut etiam. Phasellus enim elementum, adipiscing adipiscing! Lundium tortor non et natoque integer massa lundium platea? Etiam platea, elementum, ultrices enim dis purus natoque dolor et? Quis cursus ac mus a elementum etiam urna. Mus adipiscing.</p>

                <h2>Visual design</h2>
                <p>This site uses cascading style sheets for visual layout. If your browser or browsing device does not support stylesheets at all, the content of each page is still readable.</p>
                <p>The layout is liquid, simply filling its window. It happily accommodates resizing text and, as relative units have been used, text can even be re-sized in Internet Explorer for Windows.</p>
                
            </article>
            
        </main>
        <!-- / Main content -->

<?php
    // Renders this page's content in the variable below
    $page_content = ob_get_clean();

    // Includes the template
    require($_SERVER["DOCUMENT_ROOT"]. "/application/". "php_partials/_config.php");
?>