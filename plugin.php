<?php
/**
 * Plugin Name: JSON REST API Menu routes
 * Description: Extends WP API with WordPress menu routes
 * Author: nekojira<fulvio@nekojira.com>
 * Author URI: https://github.com/nekojira
 * Version: 1.1.1
 * Plugin URI: https://github.com/nekojira/wp-api-menus
 */

// include main class
include_once dirname( __FILE__ ) . '/lib/wp-api-menus.php';

if ( ! function_exists ( 'wp_json_menus_init' ) ) :

	/**
	 * Init JSON REST API Menu routes
	 */
	function wp_json_menus_init() {

		$class = new WP_JSON_Menus();
		add_filter( 'json_endpoints', array( $class, 'register_routes' ) );

	}
	add_action( 'wp_json_server_before_serve', 'wp_json_menus_init' );

endif;