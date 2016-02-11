
        <!--
        (function (win, doc) {
            'use strict';

            var originPart = window.location.origin,
                cssupdate_value = "11022016";

            function loadCSS(href) {
                var ss = doc.createElement('link'),
                    ref = doc.getElementsByTagName('script')[0],
                    sheets = doc.styleSheets;
                ss.rel = 'stylesheet';
                ss.href = href;
                ss.media = 'only x';
                ref.parentNode.insertBefore(ss, ref);
                function toggleMedia() {
                    var defined,
                        i;
                    for (i = 0; i < sheets.length; i = i + 1) {
                        if (sheets[i].href && sheets[i].href.indexOf(ss.href) > -1) {
                            defined = true;
                        }
                    }
                    if (defined) {
                        ss.media = 'all';
                    } else {
                        win.setTimeout(toggleMedia);
                    }
                }
                toggleMedia();
                return ss;
            }
            loadCSS(originPart + "/static/css/styles." + cssupdate_value + ".css");
            doc.cookie = 'cssupdate=' + cssupdate_value + ';expires="Wed, 19 Feb 2020 06:05:15 GMT";path=/';
        }(this, this.document));
        //-->