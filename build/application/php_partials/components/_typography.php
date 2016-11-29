            
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
                <p>Enim turpis enim vel! Parturient mus lectus <a href="">this is a link</a> parturient! Enim in auctor in. In platea urna, turpis in. Porttitor dictumst. <strong>this text is bold</strong> eros cursus, nunc, natoque porta mus pellentesque, proin tortor, integer lundium ac mauris integer risus, a non elit <em>this text is emphasised</em>, quis dapibus risus et! Porta, mus etiam, lorem nascetur <abbr title="HyperText Markup Language">HTML</abbr> nec urna penatibus placerat. Adipiscing aenean es.</p>

                <p>Eu, dignissim sit in amet tortor, quis habitasse augue lacus purus 28<sup>th</sup> November ultricies porttitor H<sub>2</sub>O porttitor augue cras ultrices nec, vel amet! Magna sociis. Et, dis, massa integer, porta! Porta, nec placerat.</p>

                <!-- Blockquote -->
                <blockquote>
                    <p>The human ego prefers anything, just about anything, to falling, or changing, or dying. The ego is that part of you that loves the status quo – even when it's not working. It attaches to past and present and fears the future.</p>
                    <footer>
                        <cite>&ndash; Richard Rohr, Falling Upward: A Spirituality for the Two Halves of Life</cite>
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
                        <p>The key to a happy life is to accept you are never actually in control.</p>
                        <footer>
                            <cite>&ndash; Masrani, Jurassic World</cite>
                        </footer>
                    </blockquote>

                    <p>Enim turpis enim vel! Parturient mus lectus <a href="">parturient nec sagittis</a> parturient! Enim in auctor in. In platea urna, turpis in. Porttitor dictumst. Massa elementum habitasse eros cursus, nunc, natoque porta mus pellentesque, proin tortor, integer <a href="" rel="external">lundium ac mauris integer</a> risus, a non elit nunc lundium, quis dapibus risus et! Porta, mus etiam, lorem nascetur nec urna penatibus placerat. Adipiscing aenean es.</p>

                    <!-- Article / post related content -->
                    <aside role="complementary" class="post__related">
                        <!-- Since this aside is contained within an article, a parser should understand that the content of this aside is directly related to the article itself. -->
                        <h1 class="post__related-title">Article-related content</h1>
                        <p>This is some content directly related to this article itself.</p>
                    </aside>

                    <!-- Article / post footer content -->
                    <footer class="post__footer">
                        <p>These are some signoff comments about the article and a bit more about <a href="" rel="author">Ronni Bassdrum</a>.
                    </footer>
                </article>

                <!-- External / page-related <aside> content -->
                <aside role="complementary">
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
                <aside role="complementary">
                    <!-- this aside is tangentially related to the page also, it
                    contains twitter messages from this blog's author -->
                    <h1>Page-related content [B]</h1>
                    <ul>
                        <li><a href="">@zildjianuk</a> These Zildjian cymbals are just the biz!</li>
                        <li>RT <a href="">@zildjianuk</a> I agree <a href="">@RonniBassDrum</a>. Why not buy another one.</li>
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
                            <span class="post-sum__location">Crazy Drummer Centre</span>
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
