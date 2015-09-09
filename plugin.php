<?php
/**
 * @link              https://github.com/nekojira/wp-api-menus/
 * @package           WP_API_Menus
 * @author            Fulvio Notarstefano <fulvio.notarstefano@gmail.com>
 *
 * @wordpress-plugin
 * Plugin Name: WP REST API Menu routes
 * Description: Extends WP API with WordPress menu routes.
 * Author: Fulvio Notarstefano
 * Author URI: https://github.com/nekojira
 * Version: 1.1.5
 * Plugin URI: https://github.com/nekojira/wp-api-menus
 */

/**
 * Copyright (c) 2015
 * Fulvio Notarstefano (fulvio.notarstefano@gmail.com) and contributors.
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License, version 2 or, at
 * your discretion, any later version, as published by the Free
 * Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

// include main class
include_once dirname( __FILE__ ) . '/lib/wp-api-menus.php';

if ( ! function_exists ( 'wp_rest_menus_init' ) ) :

	/**
	 * Init REST API Menu routes
	 */
	function wp_rest_menus_init() {

		$class = new WP_REST_Menus();
		add_filter( 'rest_endpoints', array( $class, 'register_routes' ) );

	}
	add_action( 'rest_api_init', 'wp_rest_menus_init' );

endif;
