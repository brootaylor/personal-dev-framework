<?php

    // Generates the content for the page title, meta title & description
    $page_title = "Personal front end framework";
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

                <!-- Pattern / component page navigation -->
                <ul class="link__list" id="componentNav">
                    <li>
                        <a href="#typography">Typography</a>
                    </li>
                    <li>
                        <a href="#lists">Lists</a>
                    </li>
                    <li>
                        <a href="#links">Links</a>
                    </li>
                    <li>
                        <a href="#buttons">Buttons</a>
                    </li>
                    <li>
                        <a href="#forms">Forms</a>
                    </li>
                    <li>
                        <a href="#images">Images</a>
                    </li>
                    <li>
                        <a href="#media">Media</a>
                    </li>
                    <li>
                        <a href="#videos">Videos</a>
                    </li>
                    <li>
                        <a href="#twitter">Twitter</a>
                    </li>
                    <li>
                        <a href="#lightbox">Lightbox</a>
                    </li>
                    <li>
                        <a href="#grids">Grids</a>
                    </li>
                </ul>

                <hr class="hr__big">

                <!-- Typography components -->
                <?php require($_SERVER["DOCUMENT_ROOT"]. "/application/". "php_partials/components/_typography.php"); ?>

                <hr class="hr__big">

                <!-- List components -->
                <?php require($_SERVER["DOCUMENT_ROOT"]. "/application/". "php_partials/components/_lists.php"); ?>

                <hr class="hr__big">
                
                <!-- Link components -->
                <?php require($_SERVER["DOCUMENT_ROOT"]. "/application/". "php_partials/components/_links.php"); ?>

                <hr class="hr__big">

                <!-- Button components -->
                <?php require($_SERVER["DOCUMENT_ROOT"]. "/application/". "php_partials/components/_buttons.php"); ?>

                <hr class="hr__big">

                <!-- Form components -->
                <?php require($_SERVER["DOCUMENT_ROOT"]. "/application/". "php_partials/components/_forms.php"); ?>

                <hr class="hr__big">

                <!-- Image components -->
                <?php require($_SERVER["DOCUMENT_ROOT"]. "/application/". "php_partials/components/_images.php"); ?>

                <hr class="hr__big">

                <!-- Media components -->
                <?php require($_SERVER["DOCUMENT_ROOT"]. "/application/". "php_partials/components/_media.php"); ?>

                <hr class="hr__big">

                <!-- Video components -->
                <?php require($_SERVER["DOCUMENT_ROOT"]. "/application/". "php_partials/components/_videos.php"); ?>

                <hr class="hr__big">

                <!-- Twitter feed component -->
                <?php require($_SERVER["DOCUMENT_ROOT"]. "/application/". "php_partials/components/_twitter.php"); ?>

                <hr class="hr__big">

                <!-- lightbox component -->
                <?php require($_SERVER["DOCUMENT_ROOT"]. "/application/". "php_partials/components/_lightbox.php"); ?>

                <hr class="hr__big">

                <!-- Grid components -->
                <?php require($_SERVER["DOCUMENT_ROOT"]. "/application/". "php_partials/components/_grids.php"); ?>

            </article>
            
        </main>
        <!-- / Main content -->

<?php
    // Renders this page's content in the variable below
    $page_content = ob_get_clean();

    // Includes the template
    require($_SERVER["DOCUMENT_ROOT"]. "/application/". "php_partials/_config.php");
?>