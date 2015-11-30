<?php

    // Generates the content for the page title, meta title & description
    $page_title = "This is the page title";
    $page_title_extra = "| The title's context eg. | Bruce Taylor's Personal Website";
    $page_description = "This will render in the meta description tag";
    $page_canonical = "/Page URL goes here for canonical purposes. Not needed on index page. eg. /about-us";

    ob_start();
?>

        <!-- The <main> element is used to enclose the main content, i.e. that which contains the central topic of a document -->
        <!-- ARIA: the landmark role "main" is added here as it contains the main content of the document, and it is recommended to add it to the
        <main> element until user agents implement the required role mapping. -->
        <main role="main" id="main">

            <h1><?php echo $page_title; ?></h1>

            <p>Enim turpis enim vel! Parturient mus lectus parturient nec sagittis parturient! Enim in auctor in. In platea urna, turpis in. Porttitor dictumst. Massa elementum habitasse eros cursus, nunc, natoque porta mus pellentesque, proin tortor, integer lundium ac mauris integer risus, a non elit nunc lundium, quis dapibus risus et! Porta, mus etiam, lorem nascetur nec urna penatibus placerat. Adipiscing aenean es.</p>
            
        </main>
        <!-- / Main content -->

        <!-- An <aside> is used to enclose content that is additional to the main content but not essential. If it were removed, the meaning of the main content should not be lost, but the content of the <aside> also retains its meaning.
        NOTE: the aside is placed outside of the <main> element as while its content is related to the content that is within the <main>
        element, it is not part of it -->
        <!-- ARIA: the landmark role "complementary" is added here as it contains supporting information for the main content that remains meaningful even when separated from it -->
        <aside role="complementary">
        
            <!-- A <header> element is not required here as the heading only contains a single <h3> element --> 
            <h3>Did you know?</h3>
            
            <!-- Content -->
            <p>The article and section elements cause a lot of confusion when people are trying to decide how and when to use them. The article: <a href="http://www.iandevlin.com/blog/2011/04/html5/html5-section-or-article">section or article?</a> might help you choose.</p>
            
        </aside>

<?php
    // Renders this page's content in the variable below
    $page_content = ob_get_clean();

    // Includes the template
    require($_SERVER["DOCUMENT_ROOT"]. "/application/". "php_partials/_config.php");
?>