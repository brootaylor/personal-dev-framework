            
            /*! loadJS: load a JS file asynchronously. [c]2014 @scottjehl, Filament Group, Inc. (Based on http://goo.gl/REQGQ by Paul Irish). Licensed MIT */
            (function( w ){
                var loadJS = function( src, cb ){
                  "use strict";
                  var ref = w.document.getElementsByTagName( "script" )[ 0 ];
                  var script = w.document.createElement( "script" );
                  script.src = src;
                  script.async = true;
                  ref.parentNode.insertBefore( script, ref );
                  if (cb && typeof(cb) === "function") {
                    script.onload = cb;
                  }
                  return script;
                };
                // commonjs
                if( typeof module !== "undefined" ){
                  module.exports = loadJS;
                }
                else {
                  w.loadJS = loadJS;
                }
            }( typeof global !== "undefined" ? global : this ));
            
            /* An 'enhanced' cuts-the-mustard option from Scott Jehl
               Ref: =>> https://www.filamentgroup.com/lab/enhancing-optimistically.html */
            (function() {
                if( "querySelector" in window.document && "addEventListener" in window ){
                  // This is a capable browser, let's improve the UI further!
                  // We'll use a class to enhance the UI with the additional CSS class 'hook' and possibly an additional specific JS file
                  var docElem = window.document.documentElement,
                      enhancedClass = "enhanced",
                      enhancedScriptPath = "/static/js/enhancements.js";

                  // add enhanced class
                  var addEnhancedClass = function(){
                    docElem.className += " " + enhancedClass;
                  };

                  // remove enhanced class
                  var removeEnhancedClass = function(){
                    docElem.className = docElem.className.replace( enhancedClass, " " );
                  };

                  // Let's enhance optimistically...
                  addEnhancedClass();

                  // load enhanced JS file
                  var script = loadJS( enhancedScriptPath );

                  // if script hasn't loaded after 8 seconds, remove the enhanced class
                  var fallback = setTimeout( removeEnhancedClass, 8000 );

                  // when the script loads, clear the timer out and add the class again just in case
                  script.onload = function(){
                    // clear the fallback timer
                    clearTimeout( fallback ); 
                    // add this class, just in case it was removed already (we can't cancel this request so it might arrive any time)
                    addEnhancedClass();
                  };
                }
            })();

            // Web Font Loader and loading techniques
            // -------------------------------------------------
            // =>> See https://github.com/typekit/webfontloader
            // =>> See https://www.filamentgroup.com/lab/font-events.html
            // =>> See https://css-tricks.com/loading-web-fonts-with-the-web-font-loader/

            /*
             * Check to see if fonts already stored in session storage
             * If so then add 'wf-active' class
             */
            (function() {
              if (sessionStorage.fonts) {
                //console.log("Fonts installed.");
                document.documentElement.classList.add('wf-active');
              } else {
                //console.log("No fonts installed.");
              }
            })();
            
            WebFontConfig = {
              // // other options and settings
              active: function() {
                sessionStorage.fonts = true;
              },
              // Google fonts...
              google: {
                families: [
                  'Open+Sans:300,300i,400,400i,700,700i'
                ]
              },
              timeout: 2000 // In case the fonts can't be called then timeout. Don't want the call to go on and on
            };

            (function(d) {
              var wf = d.createElement('script'), s = d.scripts[0];
              wf.src = 'https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js';
              s.parentNode.insertBefore(wf, s);
            })(document);
            