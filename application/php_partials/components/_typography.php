            
            <section id="typography">

                <h1>Typography</h1>

                <hr class="hr__big">

                <!-- Titles / Headings -->
                <article>
                    <h1>H1 title</h1>
                    <h2>H2 title</h2>
                    <h3>H3 title</h3>
                    <h4>H4 title</h4>
                    <h5>H5 title</h5>
                    <h6>H6 title</h6>
                </article>

                <!-- Paragraph with some <a>, <strong>, <em> and <abbr> elements in it -->
                <p>Enim turpis enim vel! Parturient mus lectus <a href="">parturient nec sagittis</a> parturient! Enim in auctor in. In platea urna, turpis in. Porttitor dictumst. <strong>Massa elementum habitasse</strong> eros cursus, nunc, natoque porta mus pellentesque, proin tortor, integer lundium ac mauris integer risus, a non elit <em>nunc lundium</em>, quis dapibus risus et! Porta, mus etiam, lorem nascetur <abbr title="HyperText Markup Language">HTML</abbr> nec urna penatibus placerat. Adipiscing aenean es.</p>

                <!-- Blockquote -->
                <blockquote>
                    <p>Musical School has given my staff the confidence and the resources to deliver exciting music lessons. The sessions are quick and easy to organise and can successfully be taught by non-music specialists. The children clearly enjoy the dynamic, fun and stimulating sessions and our teachers are learning valuable new skills.</p>
                    <footer>
                        <cite>&ndash; Julie Brown, Headteacher</cite>
                    </footer>
                </blockquote>

                <hr>

                <!--
                    An article with the following:
                    ==============================

                    => <header> element (incl. meta data)
                    => Intro paragraph
                    => Standard paragraph
                    => Blockquote
                    => Internal / article-related <aside> content
                    => <footer> element with 'signoff' info.
                -->
                <article class="post">
                    <header class="post__header">
                        <!-- Standard article / post title -->
                        <h1 class="post__title">An article header title</h1>
                        <h2 class="post__title-sub">Sub heading</h2>
                        <!-- Post meta data -->
                        <small class="post__meta">
                            <time datetime="2016-05-12">
                                <!-- Date -->
                                <span class="post__date">Tuesday, 19<sup>th</sup>January, 2016</span>
                            </time>
                            <!-- Author -->
                            <span class="post__author">by <a href="" title="Articles by Ronni Bassdrum" rel="author">Ronni Bassdrum</a></span>
                        </small>
                    </header><!-- /header -->

                    <!-- Intro copy -->
                    <p class="post__lead">Massa elementum habitasse eros cursus, nunc, natoque porta mus pellentesque, proin tortor, integer lundium ac mauris integer risus, a non elit nunc lundium, quis dapibus risus et! Porta, mus etiam, lorem nascetur nec urna penatibus placerat.</p>

                    <!-- Blockquote -->
                    <blockquote>
                        <p>New Charanga – it’s fabulous!! The kids have really enjoyed the units and the staff are delighted.</p>
                        <footer>
                            <cite>&ndash; Julie Dorr, Primary Music Curriculum Support Consultant</cite>
                        </footer>
                    </blockquote>

                    <p>Enim turpis enim vel! Parturient mus lectus <a href="">parturient nec sagittis</a> parturient! Enim in auctor in. In platea urna, turpis in. Porttitor dictumst. Massa elementum habitasse eros cursus, nunc, natoque porta mus pellentesque, proin tortor, integer <a href="" rel="external">lundium ac mauris integer</a> risus, a non elit nunc lundium, quis dapibus risus et! Porta, mus etiam, lorem nascetur nec urna penatibus placerat. Adipiscing aenean es.</p>

                    <!-- Article / post related content -->
                    <aside class="post__related">
                        <!-- Since this aside is contained within an article, a parser should understand that the content of this aside is directly related to the article itself. -->
                        <h1 class="post__related-title">Article-related content</h1>
                        <p>Just wanted to give you a heads up on some of the musical terms we're using.</p>
                    </aside>

                    <!-- Article / post footer content -->
                    <footer class="post__footer">
                        <p>These are some signoff comments about the article and a bit more about <a href="" rel="author">Ronni Bassdrum</a>.
                    </footer>
                </article>

                <!-- External / page-related <aside> content -->
                <aside>
                    <!-- This aside is outside of the article (above). Its content is related to the page, but not as closely related to the above article eg. a Blogroll would be relevant here. -->
                    <h1>Page-related content [A]</h1>
                    <nav>
                        <!-- Visually hidden section title for benefit of assistive technologies -->
                        <h2 class="visuallyhidden">Related content navigation</h2>
                        <ul class="link__list">
                            <li><a href="/example">Example Blog</a>
                            <li><a href="/last-post">My last post</a>
                            <li><a href="/first-post">My first post</a>
                        </ul>
                        </nav>
                    </nav>
                </aside>

                <!-- 2nd external / page-related <aside> content -->
                <aside>
                    <!-- this aside is tangentially related to the page also, it
                    contains twitter messages from this blog's author -->
                    <h1>Page-related content [B]</h1>
                    <ul>
                        <li><a href="">@MoreMusic1</a> Fantastic time jamming with the fine folk at Charanga last night</li>
                        <li>RT <a href="">@MoreMusic1</a> Ditto here from <a href="">@RockStarDave</a>. How about next week we jam again?</li>
                    </ul>
                </aside>

                <hr>

                <article class="post-sum">
                    <header class="post-sum__header">
                        <!-- Article title as a link. Typically link through to full article / news post -->
                        <h1 class="post-sum__title">
                            <a href="">An article header title link</a>
                        </h1>
                        <h2 class="post-sum__title-sub">Sub heading</h2>
                        <!-- Post meta data -->
                        <small class="post-sum__meta">
                            <time datetime="2016-05-12T10:00">
                                <!-- Date -->
                                <span class="post-sum__date">21<sup>st</sup> May 2016</span>
                                <!-- Time -->
                                <span class="post-sum__time">10am - 4pm</span>
                            </time>
                            <!-- Extra info -->
                            <span class="post-sum__extra">Free</span>
                            <!-- Location -->
                            <span class="post-sum__location">Woodlands Conference Centre</span>
                        </small>
                    </header><!-- /header -->

                    <!-- Article summary copy -->
                    <p>Massa elementum habitasse eros cursus, nunc, natoque porta mus pellentesque, proin tortor, integer lundium ac mauris integer risus, a non elit nunc lundium, quis dapibus risus et! Porta, mus etiam, lorem nascetur nec urna penatibus placerat.</p>

                    <!-- Some other links. Demonstrating text links next to each other -->
                    <p>
                        <a href="" class="link__secondary">Check this out</a> | <a href="" class="link__secondary">Something else to view</a>
                    </p>

                    <!-- Primary link to this article / post -->
                    <p>
                        <a href="" class="link__standalone">Read this article</a>
                    </p>
                </article>

            </section>
