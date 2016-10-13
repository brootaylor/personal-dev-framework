<?php

    // Generates the content for the page title, meta title & description
    $page_title = "A post title";
    $page_title_extra = "| Webby Ramblings | Bruce Taylor's Personal Website";
    $page_description = "This will render in the meta description tag";
    $page_canonical = "/post-title";

    ob_start();
?>

        <!-- The <main> element is used to enclose the main content, i.e. that which contains the central topic of a document -->
        <!-- ARIA: the landmark role "main" is added here as it contains the main content of the document, and it is recommended to add it to the
        <main> element until user agents implement the required role mapping. -->
        <main role="main" id="main">

            <!-- This is an example of a post type page using a structured data schema -->
            <article role="article" itemscope itemtype="http://schema.org/Article">

                <!-- Optional field -->
                <meta itemscope itemprop="mainEntityOfPage" itemType="https://schema.org/WebPage" itemid="//<?php echo $_SERVER['SERVER_NAME']; ?>/post.php">

                <header>
                    <!-- The primary title / headline -->
                    <h1 itemprop="headline"><?php echo $page_title; ?></h1>
                    <!-- Date / time published -->
                    <time itemprop="datePublished" content="2016-10-13T16:45:14+00:00" datetime="2016-10-13T16:45:14+00:00">10<sup>th</sup> October 2016</time>
                    <!-- 
                        Possibly show modified date here...
                    -->
                    <!-- The post's author -->
                    <span>By <span itemprop="author">Bruce Taylor</span></span>
                </header>

                <!-- The post's image -->
                <div itemprop="image" itemscope itemtype="https://schema.org/ImageObject">
                    <img src="https://placeimg.com/640/480/any">
                    <meta itemprop="url" content="https://placeimg.com/640/480/any">
                    <meta itemprop="width" content="640">
                    <meta itemprop="height" content="480">
                </div>

                <!-- The main content -->
                <div itemprop="articleBody">

                    <h2>Standards compliance</h2>
                    <p>Tincidunt cras lectus arcu habitasse aliquam? Scelerisque in, et montes, lorem porttitor tincidunt parturient, ut etiam. Phasellus enim elementum, adipiscing adipiscing! Lundium tortor non et natoque integer massa lundium platea? Etiam platea, elementum, ultrices enim dis purus natoque dolor et? Quis cursus ac mus a elementum etiam urna. Mus adipiscing.</p>

                    <h2>Links</h2>
                    <p>Tincidunt cras lectus arcu habitasse aliquam? Scelerisque in, et montes, lorem porttitor tincidunt parturient, ut etiam. Phasellus enim elementum, adipiscing adipiscing! Lundium tortor non et natoque integer massa lundium platea? Etiam platea, elementum, ultrices enim dis purus natoque dolor et? Quis cursus ac mus a elementum etiam urna. Mus adipiscing.</p>

                    <h2>Visual design</h2>
                    <p>This site uses cascading style sheets for visual layout. If your browser or browsing device does not support stylesheets at all, the content of each page is still readable.</p>
                    <p>The layout is liquid, simply filling its window. It happily accommodates resizing text and, as relative units have been used, text can even be re-sized in Internet Explorer for Windows.</p>

                </div>

                <!-- The publisher of this article ie. the organisation -->
                <div itemprop="publisher" itemscope itemtype="https://schema.org/Organization">
                    <div itemprop="logo" itemscope itemtype="https://schema.org/ImageObject">
                        <meta itemprop="url" content="//<?php echo $_SERVER['SERVER_NAME']; ?>/static/img/common/logo.png">
                        <meta itemprop="width" content="40">
                        <meta itemprop="height" content="40">
                    </div>
                    <meta itemprop="name" content="brootaylor.com">
                </div>
                
            </article>
            
        </main>
        <!-- / Main content -->

<?php
    // Renders this page's content in the variable below
    $page_content = ob_get_clean();

    // Includes the template
    require($_SERVER["DOCUMENT_ROOT"]. "/application/". "php_partials/_config.php");
?>
