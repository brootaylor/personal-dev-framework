/*! Personal framework JS - v0.1.0 - 2016-12-16 22:31:57 */
!function(a){var b=function(b,c){"use strict";var d=a.document.getElementsByTagName("script")[0],e=a.document.createElement("script");return e.src=b,e.async=!0,d.parentNode.insertBefore(e,d),c&&"function"==typeof c&&(e.onload=c),e};"undefined"!=typeof module?module.exports=b:a.loadJS=b}("undefined"!=typeof global?global:this),function(){if("querySelector"in window.document&&"addEventListener"in window){var a=window.document.documentElement,b="enhanced",c="/static/js/enhancements.js",d=function(){a.className+=" "+b},e=function(){a.className=a.className.replace(b," ")};d();var f=loadJS(c),g=setTimeout(e,8e3);f.onload=function(){clearTimeout(g),d()}}}(),function(){sessionStorage.fonts&&document.documentElement.classList.add("wf-active")}(),WebFontConfig={active:function(){sessionStorage.fonts=!0},google:{families:["Open+Sans:300,300i,400,400i,700,700i"]},timeout:2e3},function(a){var b=a.createElement("script"),c=a.scripts[0];b.async="true",b.src=("https:"==document.location.protocol?"https":"http")+"://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js",c.parentNode.insertBefore(b,c)}(document);