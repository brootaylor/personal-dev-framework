# A personal front-end template/framework

This is my attempt at coming up with a reusable front-end template/framework for any future web projects I work on. Just a starting block really.

This isn't meant to be massively original in terms of the technical resources & methods used here. A lot of the code here contains stuff I've carefully chosen (and sometimes modified) because of their benefit to my web development projects. However, I certainly won't take sole credit for it. Like most, my thinking has been hugely influenced by other superb developers over the years - for that I'm grateful. This is intended to be an ever changing template/framework of the elements I plan to use on an everyday basis.

You're welcome to use it.

## What's in it?

* Basic HTML5 elements.
* Various SCSS partials in a structure that works for me. It includes things like [Normalise.css](http://necolas.github.io/normalize.css/) as well as useful CSS helpers and default print CSS - thanks to [HTML5 Boilerplate](https://github.com/h5bp/html5-boilerplate).
* A basic [Gruntfile.js](http://gruntjs.com/) strawman for common tasks I use.
* The latest [jQuery](https://jquery.com/) via CDN, with a local fallback.
* The latest [Modernizr](http://modernizr.com/) build for feature detection. Worth noting that it doesn't have every feature enabled though.
* Protection against any stray `console` statements causing JavaScript errors
  in older browsers - thanks to [HTML5 Boilerplate](https://github.com/h5bp/html5-boilerplate).
* An optimized Google Analytics snippet - thanks to [HTML5 Boilerplate](https://github.com/h5bp/html5-boilerplate).
* Apache server caching, compression, and other configuration defaults for
  Grade-A performance - thanks to [HTML5 Boilerplate](https://github.com/h5bp/html5-boilerplate).
* A simple PHP based application framework.
* Build directory output example.

## Helpful resource links

### Web performance

* https://css-tricks.com/strategies-for-staying-on-top-of-web-performance/

### Grunt

* http://24ways.org/2013/grunt-is-not-weird-and-hard/
* https://medium.com/@verpixelt/get-started-with-grunt-76d29dc25b01

### SASS/SCSS/CSS

* https://adactio.com/journal/8504
* http://sassbreak.com/watch-your-sass/

### Typography

* http://madebymike.com.au/writing/precise-control-responsive-typography/

