<?php

    // Generates the content for the page title, meta title & description
    $page_title = "Cookies";
    $page_title_extra = "| The title's context eg. | Bruce Taylor's Personal Website";
    $page_description = "This will render in the meta description tag";
    $page_canonical = "/cookies";

    ob_start();
?>

        <!-- The <main> element is used to enclose the main content, i.e. that which contains the central topic of a document -->
        <!-- ARIA: the landmark role "main" is added here as it contains the main content of the document, and it is recommended to add it to the
        <main> element until user agents implement the required role mapping. -->
        <main role="main" id="main">

            <article>

                <h1><?php echo $page_title; ?></h1>

                <p>This website uses various electronic cookies for anonymous analytics purposes as well as to aid better technical performance decisions.</p>

                <h2>What is a cookie?</h2>
                <p>Tincidunt cras lectus arcu habitasse aliquam? Scelerisque in, et montes, lorem porttitor tincidunt parturient, ut etiam. Phasellus enim elementum, adipiscing adipiscing! Lundium tortor non et natoque integer massa lundium platea? Etiam platea, elementum, ultrices enim dis purus natoque dolor et? Quis cursus ac mus a elementum etiam urna. Mus adipiscing.</p>

                <h2>Opting Out</h2>
                <p>If you’d prefer to opt out of cookies on this website please click the button below.</p>
                <p>By clicking this button a single cookie named <code>ck-optout</code> will be added and all other cookies removed. This cookie is required to remember your preference.</p>

                <button>Opt out of cookies</button>

                <h2>Cookies used on this website</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Expiration</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <code>cssupdate</code>
                            </td>
                            <td>This cookie is used to help the website determine whether you're a first time visitor. If you are, it ensures the optimum code is delivered to the browser to ensure as speedy an experience as possible.</td>
                            <td>30 days from set/update</td>
                        </tr>
                    </tbody>
                </table>
                
            </article>
            
        </main>
        <!-- / Main content -->

<?php
    // Renders this page's content in the variable below
    $page_content = ob_get_clean();

    // Includes the template
    require($_SERVER["DOCUMENT_ROOT"]. "/application/". "php_partials/_config.php");
?>