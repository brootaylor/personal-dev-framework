<?php

    // Generates the content for the page title, meta title & description
    $page_title = "This is the page title";
    $page_title_extra = "| The title's context eg. | Bruce Taylor's Personal Website";
    $page_description = "This will render in the meta description tag";
    $page_canonical = "/Page URL goes here for canonical purposes. Not needed on index page. eg. /about-us";

    ob_start();
?>

        <!-- Main content -->
        <main role="main" id="main">

            <h1><?php echo $page_title; ?></h1>

            <p>Enim turpis enim vel! Parturient mus lectus parturient nec sagittis parturient! Enim in auctor in. In platea urna, turpis in. Porttitor dictumst. Massa elementum habitasse eros cursus, nunc, natoque porta mus pellentesque, proin tortor, integer lundium ac mauris integer risus, a non elit nunc lundium, quis dapibus risus et! Porta, mus etiam, lorem nascetur nec urna penatibus placerat. Adipiscing aenean es.</p>
            
        </main>
        <!-- / Main content -->

<?php
    // Renders this page's content in the variable below
    $page_content = ob_get_clean();

    // Includes the template
    require($_SERVER["DOCUMENT_ROOT"]. "/application/". "php_partials/_config.php");
?>