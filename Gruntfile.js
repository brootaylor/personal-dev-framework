
//////////////////////////////////////////////////////////////////
// Build process Grunt file
//////////////////////////////////////////////////////////////////

module.exports = function (grunt) {

    // NPM TASK LOADER
    require('load-grunt-tasks')(grunt);

    // TIME BARS
    require('time-grunt')(grunt);

    grunt.initConfig({

        //
        // GLOBAL DIRECTORY CONFIGURATION
        //
        dirs: {
            scss: 'scss',
            css: 'static/css',
            cssBuild: 'build/static/css',
            js: 'static/js',
            jsBuild: 'build/static/js',
            app: 'application',
            appBuild: 'build/application',
        },

        //
        // WATCH
        //
        watch: {
        	// Compiling SCSS on watch...
			sass: {
				files: [
				    '<%= dirs.scss %>/**/*.scss'
				],
				tasks: [
				    'sass',
				    'notify:sass'
				],
			},
			// Checking JS on watch...
			js: {
				files: [
				    'Gruntfile.js',
				    'static/**/main.js',
				    'static/**/plugins.js'
				],
				tasks: [
				    'jshint',
				    'notify:jshint'
				],
			}
		},

        //
        // SASS
        //
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
        
        //
        // SCSS LINT
        //
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

        //
        // PostCSS
        //
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

        //
        // JS Concatenation...
        //
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

		//
		// JS Minification...
		//
		uglify: {
		    dist: {
		    	// Specifying multiple dest/src pairs...
		        files: {
		            '<%= dirs.jsBuild %>/plugins.js': '<%= dirs.js %>/plugins.js',
		            '<%= dirs.jsBuild %>/main.js': '<%= dirs.js %>/main.js'
		        }
		    }
		},

		//
		// Image compression...
		//
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

        //
        // Copy various files to the 'build' directory...
        //
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

		// 
		// Append a 'cachebreaker' timestamp to 'plugins.js', 'main.js' & 'styles.css' which are all located in the 'build' directory...
		//
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

		//
        // Check JS code
        //
        jshint: {
			all: [
			    'Gruntfile.js',
			    '<%= dirs.js %>/main.js',
			    '<%= dirs.js %>/plugins.js'
			]
		},

		//
        //  NOTIFICATIONS
        //
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
		
		//
        // Browser syncing...
        //
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
                    // server: 'localhost:80'
                    proxy: "localhost"
                }
            }
        }


    });

    // FULL BUILD TASK
    //
    grunt.registerTask('default', [
        'sass',
        'postcss',
        'jshint',
        'uglify',
        'image',
        'notify',
        'copy',
        'cachebreaker',
        'browserSync',

        // Remove 'watch' build task (below) if you don't want the "grunt" command to automatically start watch. Then use "grunt watch" to run the watch tasks specifically.
        // It's needed here to run 'browserSync' on watch. Otherwise 'browserSync' will only run on a manual "grunt" command.
        'watch'
    ]);
};


////////////////////////////////////////////////////////////////

