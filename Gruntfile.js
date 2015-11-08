
//////////////////////////////////////////////////////////////////
// Build process Grunt file
//////////////////////////////////////////////////////////////////

module.exports = function (grunt) {

    // NPM TASK LOADER
    require('load-grunt-tasks')(grunt);

    // // TIME BARS
    require('time-grunt')(grunt);

    grunt.initConfig({

        //
        // GLOBAL CONFIGURATION
        //
        dirs: {
            styles: 'scss',
            distStyles: 'static/css',
        },

        //
        // SASS
        //
        sass: {
            styles: {
                options: {
                    style: 'compressed'
                },
                files: {
                    '<%= dirs.distStyles %>/styles.css': '<%= dirs.styles %>/styles.scss'
                }
            }
        },

        // JS Concatenation...
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

		// JS Minification...
		uglify: {
		    dist: {
		    	// Specifying multiple dest/src pairs...
		        files: {
		            'build/static/js/plugins.js': 'static/js/plugins.js',
		            'build/static/js/main.js': 'static/js/main.js'
		        }
		    }
		},

		// Image compression copying to 'build' directory...
		imagemin: {
		    dynamic: {
		        files: [{
		            expand: true,
		            cwd: 'static/img/',
		            src: ['**/*.{png,jpg,gif}'],
		            dest: 'build/static/img/'
		        }]
		    }
		},

		// A responsive image workflow for optimizing and resizing your images...
		// ======================================================================
		// Check this out for how to use effectively => https://www.npmjs.com/package/grunt-respimg?utm_source=Responsive+Design+Weekly
		// ======================================================================
		// respimg: {
		// 	options: {
		// 		// Task-specific options go here.
		// 	},
		// 	your_target: {
		// 		// Target-specific file lists go here.
		// 	},
		// },

        //
        //  NOTIFICATIONS
        //
        notify: {
            sass: {
                options: {
                    title: 'SASS Task Complete',  // optional
                    message: 'SASS compiled successfully', //required
                }
            }
        },

        // Copy various files to the 'build' directory...
		copy: {
		    dist: {
		    	// Specifying multiple dest/src pairs...
		        files: {
		        	// CSS files...
		        	'build/static/css/styles.css': 'static/css/styles.css',

		        	// Javascript library files...
		        	'build/static/js/vendor/jquery-1.11.3.min.js': 'static/js/vendor/jquery-1.11.3.min.js',
		        	'build/static/js/vendor/modernizr.custom.72511.js': 'static/js/vendor/modernizr.custom.72511.js',

		        	// PHP partial files...
		        	'build/application/php_partials/_variables.php': 'application/php_partials/_variables.php',
		        	'build/application/php_partials/_config.php': 'application/php_partials/_config.php',
		        	'build/application/php_partials/_head.php': 'application/php_partials/_head.php',
		        	'build/application/php_partials/_footer.php': 'application/php_partials/_footer.php',

		        	// PHP template files...
		        	'build/application/php_templates/template.php': 'application/php_templates/template.php'
		        }
		    }
		},

		// Append a 'cachebreaker' timestamp to 'scripts.js' & 'screen.css' which are both located in the 'build' directory...
		cachebreaker: {
		    dev: {
		        options: {
		            match: ['plugins.js', 'main.js', 'styles.css'],
		            position: 'filename'
		        },
		        files: {
		            src: ['build/application/php_partials/_head.php', 'build/application/php_partials/_footer.php']
		        }

		    },
		},

		//
        // WATCH
        //
        watch: {
		  sass: {
		    files: ['<%= dirs.styles %>/**/*.scss'],
		    tasks: ['sass:styles', 'notify:sass'],
		  },
		},

    });

    // FULL BUILD TASK
    //
    grunt.registerTask('default', ['sass', 'notify', 'uglify', 'imagemin', 'copy', 'cachebreaker']);
};


////////////////////////////////////////////////////////////////

