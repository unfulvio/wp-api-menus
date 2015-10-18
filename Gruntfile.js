module.exports = function( grunt ) {

	var pkg = grunt.file.readJSON( 'package.json' );

	console.log( pkg.title + ' - ' + pkg.version );

	// Files to include in a release.
	var distFiles =  [
		'lib/**',
		'LICENSE.txt',
		'plugin.php',
		'README.txt'
	];

	grunt.initConfig( {

		pkg: pkg,

		checktextdomain: {
			options: {
				text_domain   : 'wp-api-menus',
				correct_domain: false,
				keywords      : [
					'__:1,2d',
					'_e:1,2d',
					'_x:1,2c,3d',
					'esc_html__:1,2d',
					'esc_html_e:1,2d',
					'esc_html_x:1,2c,3d',
					'esc_attr__:1,2d',
					'esc_attr_e:1,2d',
					'esc_attr_x:1,2c,3d',
					'_ex:1,2c,3d',
					'_n:1,2,4d',
					'_nx:1,2,4c,5d',
					'_n_noop:1,2,3d',
					'_nx_noop:1,2,3c,4d',
					' __ngettext:1,2,3d',
					'__ngettext_noop:1,2,3d',
					'_c:1,2d',
					'_nc:1,2,4c,5d'
				]
			},
			files  : {
				src   : [
					'lib/**/*.php',
					'plugin.php'
				],
				expand: true
			}
		},

		makepot: {
			target: {
				options: {
					cwd            : '',
					domainPath     : '/languages',
					potFilename    : 'wp-api-menus.pot',
					mainFile       : 'plugin.php',
					include        : [],
					exclude        : [
						'assets/',
						'build/',
						'languages/',
						'svn',
						'tests',
						'tmp',
						'vendor'
					],
					potComments    : '',
					potHeaders     : {
						poedit                 : true,
						'x-poedit-keywordslist': true,
						'language'             : 'en_US',
						'report-msgid-bugs-to' : 'https://github.com/nekojira/wp-api-menus/issues',
						'last-translator'      : 'Fulvio Notarstefano <fulvio.notarstefano@gmail.com>',
						'language-Team'        : 'Fulvio Notarstefano <fulvio.notarstefano@gmail.com>'
					},
					type           : 'wp-plugin',
					updateTimestamp: true,
					updatePoFiles  : true,
					processPot     : null
				}
			}
		},

		po2mo: {
			options: {
				deleteSrc: true
			},
			files  : {
				src   : 'languages/*.po',
				expand: true
			}
		},

		clean: {
			build: [ 'build' ]
		},

		copy: {
			main: {
				expand: true,
				src   : distFiles,
				dest  : 'build/wp-api-menus'
			}
		},

		compress: {
			main: {
				options: {
					mode   : 'zip',
					archive: './build/wp-api-menus-<%= pkg.version %>.zip'
				},
				expand : true,
				src    : distFiles,
				dest   : '/wp-api-menus'
			}
		},

		wp_deploy: {
			deploy: {
				options: {
					plugin_slug     : 'wp-api-menus',
					plugin_main_file: 'plugin.php',
					build_dir       : 'build/wp-api-menus',
					max_buffer      : 400 * 1024
				}
			}
		},

		phpunit: {
			classes: {
				dir: 'tests/phpunit/unit-tests'
			},
			options: {
				bin          : 'vendor/bin/phpunit',
				configuration: 'phpunit.xml',
				testSuffix   : '.php'
			}
		},

	} );

	require( 'load-grunt-tasks' )(grunt);

	grunt.registerTask( 'build',    ['clean:build', 'copy', 'compress'] );
	grunt.registerTask( 'deploy',   ['build', 'wp_deploy'] );

	grunt.util.linefeed = '\n';
};
