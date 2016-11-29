# A personal front-end template / framework

This is my attempt at coming up with a reusable, extensible, responsive and accessible front-end framework / boilerplate for any future web projects I work on. It's intended to be an ever-changing / improving framework of the components I use on an everyday basis while developing.

This isn't meant to be massively original in terms of the technical resources & methods used here. A lot of the code contains stuff I've carefully chosen (and sometimes modified) because of their benefit to my web development projects. However, I certainly won't take sole credit for it. Like most, my thinking has been hugely influenced by other superb developers over the years - for that I'm grateful.

You're welcome to use it.

## What's in it?

* A pattern type library of components such as typography, lists, links, buttons, form fields, images, video, grid etc.
* [WCAG](https://www.w3.org/WAI/intro/wcag.php) Accessibility considerations added in eg. decent semantics, can use TAB, SHIFT+TAB & ENTER keys to navigate site, can zoom in without compromising the layout, ARIA roles & attributes and progressive enhancement techniques.
* Some [Progessive enhancement](https://www.filamentgroup.com/lab/enhancing-optimistically.html) measures in place to hopefully optimise the user's experience - regardless of the device they're on - thanks to *(Scott Jehl, Filament Group)*
* [Critical CSS generation](https://github.com/filamentgroup/grunt-criticalcss) and [non-critical CSS loading](https://adactio.com/journal/8504) - thanks to *(Scott Jehl & Jeremy Keith)*
* Various SCSS partials in a structure that works for me. It includes things like [Normalise.css](http://necolas.github.io/normalize.css/) as well as useful CSS helpers, mixins and default print CSS
* A [Grunt build config](#grunt-config-tasks) for common build tasks I use.
* The latest [jQuery](https://jquery.com/) via CDN, with a local fallback.
* Protection against any stray `console` statements causing JavaScript errors in older browsers
* An optimized Google Analytics snippet - thanks to [HTML5 Boilerplate](https://github.com/h5bp/html5-boilerplate).
* Apache server caching, compression, and other configuration defaults for Grade-A performance - thanks to [HTML5 Boilerplate](https://github.com/h5bp/html5-boilerplate).
* A basic PHP based application framework.
* Simple, zero-configuration command-line [http server](#http-server).
* Build directory output examples.
* It's built using a [Mobile First](http://www.lukew.com/resources/mobile_first.asp) approach which can then be progressively enhanced as screen space and device features allow. I think it's always worth remembering that [websites do not need to look the same in every browser](http://dowebsitesneedtolookexactlythesameineverybrowser.com/) - so I haven't attempted to make legacy browsers (eg. IE 8 and less) behave like more modern browsers.

## Future enhancements

Here are some of the things I'm currently exploring and will (hopefully) add to this repository in due course.

* Print CSS styles.
* Load Web Fonts progressively.
* [Fluid typography](https://codepen.io/brootaylor/pen/KgkWvA) option to typography partial.
* Flexbox components (eg. equal height & ordering examples).
* New [CSS Grid](http://gridbyexample.com/) layout examples.
* Set up [SVG Icons](https://icomoon.io/).
* JS unit testing task.
* Gulp build alternative.
* Move `.htaccess` directives into [httpd main server config file](https://httpd.apache.org/docs/current/howto/htaccess.html). Better performance on Apache.
* A more robust MV* of sorts. May stick with PHP for now.

Suggestions welcome.

## Installation
*Requirements: Node, NPM, Grunt and SASS installed globally, then...*

To install as a new project, checkout the repo and run the following commands

```
npm install
```

Should you run in to errors when using the **'npm install'** command, the best solution is to cancel the command using **CTRL+C** and then typing the following command:

```
npm cache clean
```

Once this has been done, you can once again attempt to run **'npm install'**. This may take a few attempts if you are running an older version of Node (specifically 0.10.29 or older). It's worth upgrading your version of Node if you can.

**NOTE:** Make sure **'autoprefixer'** has been installed locally as well...

```
npm install autoprefixer
```

Now you should be ready to start playing!

### Watching Files
Automatic watching of files can be used. To run, simply use the command...

```
grunt develop
```

Any edits of SCSS files or JS files will result in the correct bundle being recreated.

### Full Build
To produce a full build, run the following command which will output the necessary CSS, JS, Imagery & PHP partials markup into the 'build' directory. This is what can then be deployed to your server.

```
grunt
```

## Need a simple local server?

[http-server](https://www.npmjs.com/package/http-server) is a simple, zero-configuration command-line http server. It is powerful enough for production usage, but it's simple and hackable enough to be used for testing, local development, and learning.

* Install `http-server` globally...
```shell
npm install http-server -g
```
* Command line to required directory path and run...
```shell
http-server
```

This launches a local server at ```localhost:8080```. The default Grunt build uses **'browserSync'** and watches for any changes to ```.html``` and ```.php``` files or anything in the ```/application``` and ```/static``` directories. The browser automatically renders any changes.

## Grunt config tasks

This is a breakdown of the Grunt tasks in the Grunt file.

### "sass"

Compiles SASS or SCSS into CSS.
```js
sass: {
    // Development output...
    dev: {
        options: {
            lineNumbers: true,
            style: 'compact', // Use for development output
        },
        files: {
            // Compile SCSS ino CSS...
            '<%= dirs.css %>/styles.css': '<%= dirs.scss %>/styles.scss',
        }
    },
    // Production output...
    prod: {
        options: {
            lineNumbers: false,
            style: 'compressed', // Use for production ready output
        },
        files: {
            // Compile SCSS ino CSS...
            '<%= dirs.css %>/styles.css': '<%= dirs.scss %>/styles.scss',
        }
    }
},
```

### "scsslint"

Checks SCSS rules.

```js
scsslint: {
    styles: [
      '<%= dirs.scss %>/**/*.scss'
    ],
    options: {
        colorizeOutput: true,
        // Don't lint these SCSS files...
        exclude: [
          '<%= dirs.scss %>/vendors/_normalize.scss',
          '<%= dirs.scss %>/vendors/_foo.scss'
        ]
    }
},
```

### "postcss"

Adds vendor prefixes to CSS.

```js
postcss: {
    options: {
        // map: false, // inline sourcemaps

        // or
        map: {
            inline: false, // save all sourcemaps as separate files...
            annotation: 'static/css/maps/' // ...to the specified directory
        },

        processors: [
            //require('pixrem')(), // add fallbacks for rem units
            require('autoprefixer')({browsers: 'last 10 versions'}), // add vendor prefixes
            //require('cssnano')() // minify the result
        ]
    },
        dist: {
            src: '<%= dirs.css %>/*.css'
        }
},
```

### "criticalcss"

Creates a critical CSS output that can then be added inline to the ```<head>```.

```js
criticalcss: {
    custom: {
        options: {
            url: "http://localhost", // State the URL the script needs to run against
            width: 1024, // Screen width
            height: 768, // Screen height
            outputfile: "<%= dirs.css %>/critical.css",
            forceInclude: [], // An array of selectors that you want to guarantee will make it from the CSS file into your CriticalCSS output.
            filename: "<%= dirs.css %>/styles.css", // The file where the critical CSS is to be picked up from
            buffer: 800*1024, // Sets the maxBuffer for child_process.execFile in Node. Necessary for potential memory issues.
            ignoreConsole: false
        }
    }
},
```

### "cssmin"

In this instance it's used to minify the 'critical css' output before inserting into the ```<head>```.

```js
cssmin: {
    target: {
        files: [{
            expand: true,
            cwd: '<%= dirs.css %>',
            src: ['critical.css'], // Primarily for the critical inline CSS
            dest: '<%= dirs.css %>'
        }]
    }
},
```

### "concat"

Concatenation of files. In this instance it's just JavaScript.

```js
concat: {
    dist: {
        src: [
            '<%= dirs.js %>/vendor/*.js', // All JS in the vendor folder
            '<%= dirs.js %>/plugins.js',  // This specific file
            '<%= dirs.js %>/foo.js',  // This specific file
            '<%= dirs.js %>/main.js',  // This specific file
        ],
        dest: '<%= dirs.jsBuild %>/scripts.js',
    }
},
```

### "uglify"

Minifies the JavaScript and copies to the `build` directory.

```js
uglify: {
    dist: {
        // Specifying multiple dest/src pairs...
        files: {
            '<%= dirs.jsBuild %>/plugins.js': '<%= dirs.js %>/plugins.js',
            '<%= dirs.jsBuild %>/main.js': '<%= dirs.js %>/main.js',
            '<%= dirs.jsBuild %>/loadCSS.js': '<%= dirs.js %>/loadCSS.js',
            '<%= dirs.jsBuild %>/jsInline.js': '<%= dirs.js %>/jsInline.js',
        }
    }
},
```

### "image"

Compresses imagery and copies to the `build` directory.

```js
image: {
  dynamic: {
    options: {
      pngquant: true,
      optipng: false,
      zopflipng: true,
      advpng: true,
      jpegRecompress: false,
      jpegoptim: true,
      mozjpeg: true,
      gifsicle: true,
      svgo: true
    },
    files: [{
      expand: true,
      cwd: 'static/img/',
      src: ['**/*.{png,jpg,gif,svg}'],
      dest: 'build/static/img/'
    }]
  }
},
```

### "copy"

Copies relevant (specified) files to the `build` directory.

```js
copy: {
    main: {
        // Includes files within path and its sub-directories
        files: [
            // CSS
            {expand: true, src: ['static/css/**'], dest: 'build/', filter: 'isFile'},
            // JS libraries
            {expand: true, src: ['static/js/vendor/**', '!static/js/vendor/jquery-3.1.1.js'], dest: 'build/', filter: 'isFile'},
            // PHP partials, templates & application directory .htaccess (permissions) file
            {expand: true, src: ['application/**'], dest: 'build/', filter: 'isFile'},
            {expand: true, src: ['application/.htaccess'], dest: 'build/', filter: 'isFile'},
            // Root files
            {expand: true, src: ['*', '!Gruntfile.js', '!package.json', '!README.md'], dest: 'build/', filter: 'isFile'},
            {expand: true, src: ['.htaccess'], dest: 'build/', filter: 'isFile'},
        ]
    }
},
```

### "processhtml"

Process html files at build time to modify them depending on the release environment eg. jQuery file call change to min version for production.

```js
processhtml: {
    dist: {
        options: {
            process: true,
            data: {
                title: 'My app',
                message: 'This is production distribution'
            }
        },
        files: {
            'build/application/php_partials/_footer.php': ['application/php_partials/_footer.php']
        }
    }
},
```

### "cachebreaker"

Appends a `cachebreaker` timestamp to `plugins.js`, `main.js` & `styles.css` which are all located in the `build` directory. Ensures the browser gets the latest CSS and JS.

```js
cachebreaker: {
    dev: {
        options: {
            match: [
                'plugins.js',
                'main.js',
                //'styles.css' // Leaving CSS off for now as using manual PHP variable to determine this.
            ],
            position: 'filename'
        },
        files: {
            src: [
                '<%= dirs.appBuild %>/php_partials/_head.php',
                '<%= dirs.appBuild %>/php_partials/_footer.php'
            ]
        }

    },
},
```

### "jshint"

Checks JavaScript for any errors.

```js
jshint: {
    all: [
        'Gruntfile.js',
        '<%= dirs.js %>/main.js',
        '<%= dirs.js %>/plugins.js',
        '<%= dirs.js %>/jsInline.js',
        '<%= dirs.js %>/loadCSS.js',
        '<%= dirs.js %>/enhancements.js'
    ]
},
```

### "notify"

Various notification messages for tasks you wish to be notified about when they've completed successfully.

```js
notify: {
    sass: {
        options: {
            title: 'SASS Task Complete',  // optional
            message: 'SASS compiled successfully', //required
        }
    },
    postcss: {
        options: {
            title: 'PostCSS Task Complete',  // optional
            message: 'PostCSS completed successfully', //required
        }
    },
    jshint: {
        options: {
            title: 'JS Linting Task Complete',  // optional
            message: 'JS Linting completed successfully', //required
        }
    }
},
```

### "browserSync"

For synchronised browser testing. eg. live reloads etc.

```js
browserSync: {
    dev: {
        bsFiles: {
            src : [
                '<%= dirs.css %>/*.css',
                '<%= dirs.js %>/**/*.js',
                '<%= dirs.app %>/**/*.php'
            ]
        },
        options: {
            watchTask: true,
            server: 'http://localhost/'
            // proxy: "localhost"
        }
    }
},
```

### "insert_timestamp"

Insert a timestamp into a file. CSS and JS files in this instance.

```js
insert_timestamp: {
    // Default options
    options: {
        prepend: true,
        append: false,
        format: 'yyyy-mm-dd HH:MM:ss',
        template: '/* {timestamp} */',
        datetime: new Date(),
        insertNewlines: true
    },

    // CSS files
    css: {
        options: {
            template: '/*! Personal framework CSS - v0.1.0 - {timestamp}\n * http://brootaylor.com/\n * Copyright (c) 2016 Bruce Taylor */'
        },
        files: [{
            // Use dynamic extend name
            expand: true,
            // Source dir
            cwd: 'build/static/css',
            // Match files
            src: ['**/*.css'],
            // Output files
            dest: 'build/static/css',
            ext: '.css'
        }]
    },

    // JS files
    js: {
        options: {
            template: '/*! Personal framework JS - v0.1.0 - {timestamp} */'
        },
        files: [{
            // Use dynamic extend name
            expand: true,
            // Source dir
            cwd: 'build/static/js',
            // Match files
            src: ['**/*.js', '!vendor/**/*.js'], // All JS files except vendor JS files
            // Output files
            dest: 'build/static/js',
            ext: '.js'
        }]
    }
},
```

### "watch"

Watches specified files while you're developing.

```js
watch: {
    // Compiling SCSS on watch...
    sass: {
        files: [
            '<%= dirs.scss %>/**/*.scss'
        ],
        tasks: [
            'sass:dev:options',
            'notify:sass'
        ]
    },
    // Checking JS on watch...
    js: {
        files: [
            'Gruntfile.js',
            'static/**/loadCSS.js',
            'static/**/jsInline.js',
            'static/**/main.js',
            'static/**/plugins.js',
            'static/**/enhancements.js'
        ],
        tasks: [
            'jshint',
            'notify:jshint'
        ]
    }
}
```

## Helpful resource links & worthwhile reads

### Web Performance & Testing

* [Web Page Test](http://www.webpagetest.org/)
* [BrowserStack](https://www.browserstack.com/)
* [What Does My Site Cost?](https://whatdoesmysitecost.com/)
* [Delivering Responsibly](https://www.filamentgroup.com/lab/delivering-responsibly.html) - *(Scott Jehl)*
* [Strategies for Staying on Top of Web Performance](https://css-tricks.com/strategies-for-staying-on-top-of-web-performance/) - *(Chris Coyier)*

### Browser Compatability

* [Can I use...?](http://caniuse.com/)

### Accessibility

* [WebAIM](http://webaim.org/)
* [WCAG](https://www.w3.org/WAI/intro/wcag.php)
* [The A11Y Project](http://a11yproject.com/)
* [Colour Contrast Checker](http://webaim.org/resources/contrastchecker/)
* [The web accessibility basics](https://www.marcozehe.de/2015/12/14/the-web-accessibility-basics/) - *(Marco)*

### Git

* [Git - the simple guide](http://rogerdudler.github.io/git-guide/)
* [Git Reference](http://gitref.org/)
* [A successful Git branching model](http://nvie.com/posts/a-successful-git-branching-model/)

### Grunt & Gulp

* [Getting started with Grunt](https://medium.com/@verpixelt/get-started-with-grunt-76d29dc25b01)
* [Getting Started with Gulp](http://alistapart.com/blog/post/getting-started-with-gulp)

### SASS/SCSS/CSS

* [A to Z CSS](http://www.atozcss.com/)
* [CSS Values](http://cssvalues.com/)
* [CSS3 Click Chart](http://css3clickchart.com/)
* [Things To Avoid When Writing CSS](https://medium.com/@Heydon/things-to-avoid-when-writing-css-1a222c43c28f#.jwzjbpoz0) - *(Part 1)*
* [Things To Avoid When Writing CSS](https://medium.com/@Heydon/things-to-avoid-when-writing-css-part-2-7639f0f6880d#.45ptuw2eg) - *(Part 2)*
* [Axiomatic CSS and Lobotomized Owls](http://alistapart.com/article/axiomatic-css-and-lobotomized-owls) - *(Heydon Pickering)*
* [Inlining critical CSS for first-time visits](https://adactio.com/journal/8504) - *(Jeremy Keith)*

### JavaScript/jQuery

* [JS Hint](http://jshint.com/)
* [Superhero.js](http://superherojs.com/)
* [30 Days to Learn jQuery](http://code.tutsplus.com/courses/30-days-to-learn-jquery) - *(Jeffrey Way)*

### Typography

* [Precise control over responsive typography](http://madebymike.com.au/writing/precise-control-responsive-typography/)

### Iconography

* [SVG Icons](https://icomoon.io/)
* [An Overview of SVG Sprite Creation Techniques](https://24ways.org/2014/an-overview-of-svg-sprite-creation-techniques/) - *(Sara Soueidan)*
* [Inline SVG vs Icon Fonts](https://css-tricks.com/icon-fonts-vs-svg/) - *(Chris Coyier)*


### Front-end Dev Tools & Helps

* [Front-end Developer Handbook](http://www.frontendhandbook.com/index.html) - *(Cody Lindley)*
* [Totally Tooling Tips](https://developers.google.com/web/shows/ttt/?hl=en) - *(Google)*
* [Front-end Job Interview Questions](http://h5bp.github.io/Front-end-Developer-Interview-Questions/)

