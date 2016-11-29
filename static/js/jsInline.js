            
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
                  var docElem = window.document.documentElement;

                  // the class we'll use to enhance the UI with the additional CSS class and possibly an additional specific JS file
                  var enhancedClass = "enhanced",
                      enhancedScriptPath = "/static/js/enhancements.js";

                  // add enhanced class
                  function addEnhancedClass(){
                    docElem.className += " " + enhancedClass;
                  }

                  // remove enhanced class
                  function removeEnhancedClass(){
                    docElem.className = docElem.className.replace( enhancedClass, " " );
                  }

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

            // Web Font Loader
            // -------------------------------------------------
            // =>> See https://github.com/typekit/webfontloader

            // Asynchronous font loading method...
            // ====================================
            // NOTE: The rest of the page might render before the Web Font Loader is loaded and executed, which can cause a Flash of Unstyled Text (FOUT).
            
            WebFontConfig = {
              google: { families: [ 'Open+Sans:300,300i,400,400i,700,700i' ] }
            };
            (function(d) {
              var wf = d.createElement('script'), s = d.scripts[0];
              wf.src = 'https://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
              s.parentNode.insertBefore(wf, s);
            })(document);
            