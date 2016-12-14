
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
        // SASS
        //
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
				map: false, // inline sourcemaps

				// or
				// map: {
				// 	inline: false, // save all sourcemaps as separate files...
				// 	annotation: 'static/css/maps/' // ...to the specified directory
				// },

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
        // CRITICAL CSS
        //
        criticalcss: {
            custom: {
                options: {
                    url: "http://local.personal-dev-framework", // The URL criticalcss is running the process for
                    width: 1024, // Screen width
                    height: 800, // Screen height
                    outputfile: "<%= dirs.css %>/critical.css",
                    forceInclude: [], // An array of selectors that you want to guarantee will make it from the CSS file into your CriticalCSS output.
                    filename: "<%= dirs.css %>/styles.css", // Using path.resolve( path.join( ... ) ) is a good idea here
                    buffer: 800*1024, // Sets the maxBuffer for child_process.execFile in Node. Necessary for potential memory issues.
                    ignoreConsole: false
                }
            }
        },

        //
        // CSS MINIFICATION
        //
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
		            '<%= dirs.jsBuild %>/main.js': '<%= dirs.js %>/main.js',
                    '<%= dirs.jsBuild %>/loadCSS.js': '<%= dirs.js %>/loadCSS.js',
                    '<%= dirs.jsBuild %>/jsInlineHead.js': '<%= dirs.js %>/jsInlineHead.js',
                    '<%= dirs.jsBuild %>/enhancements.js': '<%= dirs.js %>/enhancements.js'
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
        // Copy all relevant files to the 'build' directory...
        //
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

        //
        // Process html files at build time to modify them depending on the release environment eg. jQuery file change to min version for production.
        //
        processhtml: {
            // dev: {
            //     options: {
            //         data: {
            //             message: 'This is development environment'
            //         }
            //     },
            //     files: {
            //         'build/application/php_partials/_footer.php': ['application/php_partials/_footer.php']
            //     }
            // },
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
            },
            // custom: {
            //     options: {
            //         templateSettings: {
            //             interpolate: /{{([\s\S]+?)}}/g // mustache 
            //         },
            //         data: {
            //             message: 'This has custom template delimiters'
            //         }
            //     },
            //     files: {
            //         'custom/custom.html': ['custom.html']
            //     }
            // }
        },

		// 
		// Append a 'cachebreaker' timestamp to JavaScript files which are all located in the 'build' directory...
		//
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
		                //'<%= dirs.appBuild %>/php_partials/_head.php', // Not needed at the moment.
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
			    '<%= dirs.js %>/plugins.js',
                '<%= dirs.js %>/jsInlineHead.js',
                '<%= dirs.js %>/loadCSS.js',
                '<%= dirs.js %>/enhancements.js'
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
                    server: 'http://local.personal-dev-framework/'
                    //proxy: "localhost"
                }
            }
        },

        //
        // INSERT TIMESTAMP
        //
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
                src: ['**/*.js', '!vendor/**/*.js'],
                // Output files
                dest: 'build/static/js',
                ext: '.js'
              }]
            }
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
                    'sass:dev:options',
                    'notify:sass'
                ]
            },
            // Checking JS on watch...
            js: {
                files: [
                    'Gruntfile.js',
                    'static/**/loadCSS.js',
                    'static/**/jsInlineHead.js',
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


    });

    // DEVELOP BUILD TASKS...
    // ==========================

    // Type 'grunt develop'
    grunt.registerTask('develop', [
        'sass:dev',
        'criticalcss',
        'postcss',
        'jshint',
        'notify',
        //'browserSync',
        'watch' // It's needed here to run 'browserSync' on watch.
    ]);


    // FULL BUILD TASKS...
    // ==========================

    // Type 'grunt'
    grunt.registerTask('default', [
        'sass:prod',
        'criticalcss',
        'postcss',
        'jshint',
        'cssmin',
        'uglify',
        'image',
        'notify',
        'copy',
        'insert_timestamp',
        'processhtml',
        'cachebreaker'
    ]);

};


////////////////////////////////////////////////////////////////

