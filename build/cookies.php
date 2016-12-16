<?php

    // Generates the content for the page title, meta title & description
    $page_title = "Cookies";
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

                <h2>What is a cookie?</h2>

                <p>A cookie is a small piece of text sent to your browser by a website you visit. It helps the website to remember information about your visit, like your preferred language and other settings. That can make your next visit easier and the site more useful to you. Cookies play an important role. Without them, using the web would be a much more frustrating experience.</p>

                <h2>How cookies are used on this website</h2>

                <p>This website uses various electronic cookies to aid better technical performance decisions as well as to better the users experience while visiting the website.</p>

                <p>This website also uses tracking software to anonymously monitor its visitors to better understand how they use it. This software is provided by Google Analytics which uses cookies to track visitor usage. The software will save a cookie to your computers hard drive in order to track and monitor your engagement and usage of the website but will not store, save or collect personal information. For further information, you can read <a href="https://www.google.com/policies/technologies/cookies/" rel="external">how Google uses cookies</a>.</p>

                <p>You can decide what cookies are allowed and delete cookies at any time by adjusting settings on your web browser. Please be aware that restricting cookies may have an impact upon the functionality of our website.</p>

                <hr>

                <h2>Cookies used on this website</h2>

                <table class="table-cookies" summary="List of cookies used on this website">
                    <caption class="visuallyhidden">List of cookies used on this website</caption>
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
                                <code>fullcss</code>
                            </td>
                            <td>This cookie is used to help the website determine whether you're a first time visitor. If you are, it ensures the optimum code is delivered to the browser to ensure as speedy an experience as possible. This isn't a tracking cookie.</td>
                            <td>1 month</td>
                        </tr>
                        <tr>
                            <td>
                                <code>_ga</code>
                            </td>
                            <td>Google Analytics cookie. Helps us count how many people visit this website by tracking if you’ve visited before.</td>
                            <td>2 years</td>
                        </tr>
                        <tr>
                            <td>
                                <code>_gat</code>
                            </td>
                            <td>Google Analytics cookie. Used to manage the rate at which page view requests are made.</td>
                            <td>10 minutes</td>
                        </tr>
                    </tbody>
                </table>

                <h3>Opt out of Google Analytics tracking</h3>

                <p>You can <a href="https://tools.google.com/dlpage/gaoptout" rel="external">opt out of Google Analytics tracking by downloading their browser add-on</a>.</p>

                <hr>

                <h2>Third party site disclaimer</h2>

                <p>Please note that external sites linked to from our website may also use cookies. You need to check with these external sites what information is being collected using cookies.</p>
                
            </article>
            
        </main>
        <!-- / Main content -->

<?php
    // Renders this page's content in the variable below
    $page_content = ob_get_clean();

    // Includes the template
    require($_SERVER["DOCUMENT_ROOT"]. "/application/". "php_partials/_config.php");
?>