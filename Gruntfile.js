
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
            styles: {
                options: {
                	//style: 'compact'
                    style: 'compressed'
                },
                files: {
                	// Compile SCSS ino CSS...
                    '<%= dirs.css %>/styles.css': '<%= dirs.scss %>/styles.scss',
                }
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
        // concat: {
        //   	dist: {
		//         src: [
		//             'static/js/libs/*.js', // All JS in the libs folder
		//             'static/js/plugins.js',  // This specific file
		//             'static/js/foo.js',  // This specific file
		//             'static/js/scripts.js',  // This specific file
		//         ],
		//         dest: 'build/js/scripts.js',
		//     }
		// },

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
		            match: ['plugins.js', 'main.js', 'styles.css'],
		            position: 'filename'
		        },
		        files: {
		            src: ['<%= dirs.appBuild %>/php_partials/_head.php', '<%= dirs.appBuild %>/php_partials/_footer.php']
		        }

		    },
		},

		//
        // Check JS code
        //
        jshint: {
			all: ['Gruntfile.js', '<%= dirs.js %>/main.js', '<%= dirs.js %>/plugins.js']
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
        // WATCH
        //
        watch: {
        	// Compiling SCSS on watch...
			sass: {
				files: ['<%= dirs.scss %>/**/*.scss'],
				tasks: ['sass:styles', 'notify:sass'],
			},
			// Checking JS on watch...
			js: {
				files: ['Gruntfile.js', 'static/**/main.js', 'static/**/plugins.js'],
				tasks: ['jshint:all', 'notify:jshint'],
			}
		},
		
		//
        // Browser syncing...
        //
		browserSync: {
            dev: {
                bsFiles: {
                    src : [
                        'static/css/*.css',
                        'app/*.php'
                    ]
                },
                options: {
                    watchTask: true,
                    server: './app'
                }
            }
        }


    });

    // FULL BUILD TASK
    //
    grunt.registerTask('default', ['sass', 'browserSync', 'postcss', 'jshint', 'uglify', 'image', 'notify', 'copy', 'cachebreaker']);
};


////////////////////////////////////////////////////////////////

