
        // OLD
        // ====
        // (function (win, doc) {
        //     'use strict';

        //     var originPart = window.location.origin,
        //         cssupdate_value = "28112016";

        //     function loadCSS(href) {
        //         var ss = doc.createElement('link'),
        //             ref = doc.getElementsByTagName('script')[0],
        //             sheets = doc.styleSheets;
        //         ss.rel = 'stylesheet';
        //         ss.href = href;
        //         ss.media = 'only x';
        //         ref.parentNode.insertBefore(ss, ref);
        //         function toggleMedia() {
        //             var defined,
        //                 i;
        //             for (i = 0; i < sheets.length; i = i + 1) {
        //                 if (sheets[i].href && sheets[i].href.indexOf(ss.href) > -1) {
        //                     defined = true;
        //                 }
        //             }
        //             if (defined) {
        //                 ss.media = 'all';
        //             } else {
        //                 win.setTimeout(toggleMedia);
        //             }
        //         }
        //         toggleMedia();
        //         return ss;
        //     }
        //     loadCSS(originPart + "/static/css/styles." + cssupdate_value + ".css");
        //     doc.cookie = 'cssupdate=' + cssupdate_value + ';expires="Wed, 19 Feb 2020 06:05:15 GMT";path=/';
        // }(this, this.document));






        // NEW
        // ====
        /*! loadCSS: load a CSS file asynchronously. [c]2016 @scottjehl, Filament Group, Inc. Licensed MIT */
        (function(w){
            "use strict";

            var originPart = window.location.origin,
                cssupdate_value = "28112016";

            /* exported loadCSS */
            var loadCSS = function( href, before, media ){
                // Arguments explained:
                // `href` [REQUIRED] is the URL for your CSS file.
                // `before` [OPTIONAL] is the element the script should use as a reference for injecting our stylesheet <link> before
                    // By default, loadCSS attempts to inject the link after the last stylesheet or script in the DOM. However, you might desire a more specific location in your document.
                // `media` [OPTIONAL] is the media type or query of the stylesheet. By default it will be 'all'
                var doc = w.document;
                var ss = doc.createElement( "link" );
                var ref;
                if( before ){
                    ref = before;
                }
                else {
                    var refs = ( doc.body || doc.getElementsByTagName( "head" )[ 0 ] ).childNodes;
                    ref = refs[ refs.length - 1];
                }

                var sheets = doc.styleSheets;
                ss.rel = "stylesheet";
                ss.href = href;
                // temporarily set media to something inapplicable to ensure it'll fetch without blocking render
                ss.media = "only x";

                // wait until body is defined before injecting link. This ensures a non-blocking load in IE11.
                function ready( cb ){
                    if( doc.body ){
                        return cb();
                    }
                    setTimeout(function(){
                        ready( cb );
                    });
                }
                // Inject link
                    // Note: the ternary preserves the existing behavior of "before" argument, but we could choose to change the argument to "after" in a later release and standardize on ref.nextSibling for all refs
                    // Note: `insertBefore` is used instead of `appendChild`, for safety re: http://www.paulirish.com/2011/surefire-dom-element-insertion/
                ready( function(){
                    ref.parentNode.insertBefore( ss, ( before ? ref : ref.nextSibling ) );
                });
                // A method (exposed on return object for external use) that mimics onload by polling document.styleSheets until it includes the new sheet.
                var onloadcssdefined = function( cb ){
                    var resolvedHref = ss.href;
                    var i = sheets.length;
                    while( i-- ){
                        if( sheets[ i ].href === resolvedHref ){
                            return cb();
                        }
                    }
                    setTimeout(function() {
                        onloadcssdefined( cb );
                    });
                };

                function loadCB(){
                    if( ss.addEventListener ){
                        ss.removeEventListener( "load", loadCB );
                    }
                    ss.media = media || "all";
                }

                // once loaded, set link's media back to `all` so that the stylesheet applies once it loads
                if( ss.addEventListener ){
                    ss.addEventListener( "load", loadCB);
                }
                ss.onloadcssdefined = onloadcssdefined;
                onloadcssdefined( loadCB );
                return ss;
            };
            // commonjs
            if( typeof exports !== "undefined" ){
                exports.loadCSS = loadCSS(originPart + "/static/css/styles." + cssupdate_value + ".css");
                document.cookie = 'cssupdate=' + cssupdate_value + ';expires="Wed, 28 Feb 2020 06:05:15 GMT";path=/';
            }
            else {
                w.loadCSS = loadCSS(originPart + "/static/css/styles." + cssupdate_value + ".css");
                document.cookie = 'cssupdate=' + cssupdate_value + ';expires="Wed, 28 Feb 2020 06:05:15 GMT";path=/';
            }
        }( typeof global !== "undefined" ? global : this ));
