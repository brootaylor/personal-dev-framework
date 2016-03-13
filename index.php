<?php

    // Generates the content for the page title, meta title & description
    $page_title = "This is the page title";
    $page_title_extra = "| The title's context eg. | Bruce Taylor's Personal Website";
    $page_description = "This will render in the meta description tag";
    $page_canonical = "/";

    ob_start();
?>

        <!-- The <main> element is used to enclose the main content, i.e. that which contains the central topic of a document -->
        <!-- ARIA: the landmark role "main" is added here as it contains the main content of the document, and it is recommended to add it to the
        <main> element until user agents implement the required role mapping. -->
        <main role="main" id="main">

            <article>

                <h1><?php echo $page_title; ?></h1>

                <p>Enim turpis enim vel! Parturient mus lectus parturient nec sagittis parturient! Enim in auctor in. In platea urna, turpis in. Porttitor dictumst. Massa elementum habitasse eros cursus, nunc, natoque porta mus pellentesque, proin tortor, integer lundium ac mauris integer risus, a non elit nunc lundium, quis dapibus risus et! Porta, mus etiam, lorem nascetur nec urna penatibus placerat. Adipiscing aenean es.</p>

                <hr>

                <h2>Grid example</h2>

                <div class="grid">
                    <div class="col">
                        <p>In platea urna, turpis in. Porttitor dictumst. Massa elementum habitasse eros cursus, nunc, natoque porta mus pellentesque, proin tortor, integer lundium ac mauris integer risus, a non elit nunc lundium, quis dapibus risus et! Porta, mus etiam, lorem nascetur nec urna penatibus placerat.</p>
                    </div>
                    <div class="col">
                        <p>In platea urna, turpis in. Porttitor dictumst. Massa elementum habitasse eros cursus, nunc, natoque porta mus pellentesque, proin tortor, integer lundium ac mauris integer risus, a non elit nunc lundium, quis dapibus risus et! Porta, mus etiam, lorem nascetur nec urna penatibus placerat.</p>
                    </div>
                    <div class="col">
                        <p>In platea urna, turpis in. Porttitor dictumst. Massa elementum habitasse eros cursus, nunc, natoque porta mus pellentesque, proin tortor, integer lundium ac mauris integer risus, a non elit nunc lundium, quis dapibus risus et! Porta, mus etiam, lorem nascetur nec urna penatibus placerat.</p>
                    </div>
                    <div class="col">
                        <p>In platea urna, turpis in. Porttitor dictumst. Massa elementum habitasse eros cursus, nunc, natoque porta mus pellentesque, proin tortor, integer lundium ac mauris integer risus, a non elit nunc lundium, quis dapibus risus et! Porta, mus etiam, lorem nascetur nec urna penatibus placerat.</p>
                    </div>
                </div>

                <hr>

            </article>
            
        </main>
        <!-- / Main content -->

<?php
    // Renders this page's content in the variable below
    $page_content = ob_get_clean();

    // Includes the template
    require($_SERVER["DOCUMENT_ROOT"]. "/application/". "php_partials/_config.php");
?>