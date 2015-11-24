# A personal front-end template/framework

This is my attempt at coming up with a reusable front-end template/framework for any future web projects I work on. Just a starting block really.

This isn't meant to be massively original in terms of the technical resources & methods used here. A lot of the code here contains stuff I've carefully chosen (and sometimes modified) because of their benefit to my web development projects. However, I certainly won't take sole credit for it. Like most, my thinking has been hugely influenced by other superb developers over the years - for that I'm grateful. This is intended to be an ever-changing template/framework of the components I use on an everyday basis.

You're welcome to use it.

## What's in it?

* Top level HTML5 elements.
* Various SCSS partials in a structure that works for me. It includes things like [Normalise.css](http://necolas.github.io/normalize.css/) as well as useful CSS helpers and default print CSS - thanks to [HTML5 Boilerplate](https://github.com/h5bp/html5-boilerplate).
* A [Grunt strawman](#grunt-config-tasks) for common build tasks I use.
* The latest [jQuery](https://jquery.com/) via CDN, with a local fallback.
* The latest [Modernizr](http://modernizr.com/) build for feature detection. Worth noting that it doesn't have every feature enabled though.
* Protection against any stray `console` statements causing JavaScript errors
  in older browsers - thanks to [HTML5 Boilerplate](https://github.com/h5bp/html5-boilerplate).
* An optimized Google Analytics snippet - thanks to [HTML5 Boilerplate](https://github.com/h5bp/html5-boilerplate).
* Apache server caching, compression, and other configuration defaults for
  Grade-A performance - thanks to [HTML5 Boilerplate](https://github.com/h5bp/html5-boilerplate).
* A basic PHP based application framework.
* Simple, zero-configuration command-line [http server](#http-server).
* Build directory output example.

## Installation
*Requirements: Node, NPM and Grunt installed globally*

To install as a new project, checkout the repo and run the following commands

```
npm install
```

Should you run in to errors when using the **'npm install'** command, the best solution is to cancel the command using **CTRL+C** and then typing the following command:

```
npm cache clean
```

Once this has been done, you can once again attempt to run **'npm install'**. This may take a few attempts if you are running an older version of Node (specifically 0.10.29 or older). It's worth upgrading your version of Node if you can.

### Watching Files
Automatic watching of files can be used. To run, simply use the command

```
grunt
```

Any edits of SCSS files or JS files will result in the correct bundle being recreated.

### Full Build
To produce a full build, run the following command which will output the CSS, JS, Imagery & PHP partials markup into the 'build' directory.

```
grunt build
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

This launches a local server at ```localhost:8080``` with **'browserSync'** for changes to ```.html``` and ```.php``` files or anything in the ```/application``` and ```/static``` directories. This runs using the default Grunt build and watches for any changes.

## Grunt config tasks

This is a breakdown of the Grunt tasks in the Grunt file.

### "sass"

Compiles SASS or SCSS into CSS.
```js
sass: {
    styles: {
        options: {
            lineNumbers: true, // Boolean. Change to false if required
            style: 'compact', // Use for development output
            //style: 'compressed', // Use for production ready output
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

### "jshint"

Checks JavaScript for any errors.

```js
jshint: {
    all: [
        'Gruntfile.js',
        '<%= dirs.js %>/main.js',
        '<%= dirs.js %>/plugins.js'
    ]
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
            '<%= dirs.jsBuild %>/main.js': '<%= dirs.js %>/main.js'
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

Copies specified files to the `build` directory.

```js
copy: {
    dist: {
        // Specifying multiple dest/src pairs...
        files: {
            // CSS files...
            '<%= dirs.cssBuild %>/styles.css': '<%= dirs.css %>/styles.css',

            // Javascript library files...
            '<%= dirs.jsBuild %>/vendor/jquery-1.11.3.min.js': '<%= dirs.js %>/vendor/jquery-1.11.3.min.js',
            '<%= dirs.jsBuild %>/vendor/modernizr.custom.72511.js': '<%= dirs.js %>/vendor/modernizr.custom.72511.js',

            // PHP partial files...
            '<%= dirs.appBuild %>/php_partials/_variables.php': '<%= dirs.app %>/php_partials/_variables.php',
            '<%= dirs.appBuild %>/php_partials/_config.php': '<%= dirs.app %>/php_partials/_config.php',
            '<%= dirs.appBuild %>/php_partials/_head.php': '<%= dirs.app %>/php_partials/_head.php',
            '<%= dirs.appBuild %>/php_partials/_footer.php': '<%= dirs.app %>/php_partials/_footer.php',

            // PHP template files...
            '<%= dirs.appBuild %>/php_templates/template.php': '<%= dirs.app %>/php_templates/template.php'
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
                'styles.css'
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
            proxy: "localhost"
        }
    }
},
```

## Future enhancements

Here are some of the things I'm currently exploring and will (hopefully) add to this repository in due course.

* Inlining critical CSS.
* Loading CSS asynchronously with `<noscript>...</noscript>` fallback.
* Cache-busting CSS & JS in the browser using a rewrite rule in `.htaccess`.
* Add Gulp build alternative.
* A decent grid eg. [Foundation Grid](http://foundation.zurb.com/grid.html)
* A more robust MVC.
* Accessibility considerations and examples.

Suggestions welcome.

## Helpful resource links

### Web Performance & Testing

* http://www.webpagetest.org/
* https://www.browserstack.com/
* https://whatdoesmysitecost.com/
* https://www.filamentgroup.com/lab/delivering-responsibly.html
* https://css-tricks.com/strategies-for-staying-on-top-of-web-performance/

### Compatability

* http://caniuse.com/
* https://developers.google.com/web/updates/2015/09/automating-resource-selection-with-client-hints

### Git

* http://nvie.com/posts/a-successful-git-branching-model/
* https://www.atlassian.com/git/tutorials/
* http://rogerdudler.github.io/git-guide/
* http://gitref.org/

### Grunt

* http://24ways.org/2013/grunt-is-not-weird-and-hard/
* https://medium.com/@verpixelt/get-started-with-grunt-76d29dc25b01

### SASS/SCSS/CSS

* http://www.atozcss.com/
* https://adactio.com/journal/8504

### JavaScript

* http://jshint.com/
* http://superherojs.com/

### Typography

* http://madebymike.com.au/writing/precise-control-responsive-typography/

