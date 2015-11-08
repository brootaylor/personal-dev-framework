<?php

    // Generates the content for the meta title & description
    $meta_title = "This will render in the title tag"; 
    $meta_description = "This will render in the meta description tag";
    $meta_canonical = "/Page URL goes here for canonical purposes. Not needed on index page.";

    ob_start();
?>

        <!-- Main content -->
        <main role="main" id="main">

            <h1>This is my template</h1>

            <p>Enim turpis enim vel! Parturient mus lectus parturient nec sagittis parturient! Enim in auctor in. In platea urna, turpis in. Porttitor dictumst. Massa elementum habitasse eros cursus, nunc, natoque porta mus pellentesque, proin tortor, integer lundium ac mauris integer risus, a non elit nunc lundium, quis dapibus risus et! Porta, mus etiam, lorem nascetur nec urna penatibus placerat. Adipiscing aenean.</p>
            
        </main>
        <!-- / Main content -->

<?php
    // Renders this page's content in the variable below
    $page_content = ob_get_clean();

    // Includes the template
    require($_SERVER["DOCUMENT_ROOT"]. "/application/". "php_partials/_config.php");
?>