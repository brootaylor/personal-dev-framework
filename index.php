<?php

    // Generates the content for the page title, meta title & description
    $page_title = "Personal front end framework";
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

                <p>This is my attempt at coming up with a reusable, extensible, responsive and accessible front-end framework / boilerplate for any future web projects I work on. It's intended to be an ever-changing / improving framework of the components I use on an everyday basis.</p>

                <p>This isn't meant to be massively original in terms of the technical resources &amp; methods used here. A lot of the code contains stuff I've carefully chosen (and sometimes modified) because of their benefit to my web development projects. However, I certainly won't take sole credit for it. Like most, my thinking has been hugely influenced by other superb developers over the years - for that I'm grateful.</p>

                <p>You're welcome to use it.</p>

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
