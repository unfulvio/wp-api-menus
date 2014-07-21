<?php

if ( ! class_exists( 'WP_JSON_Menus' ) ) :

	/**
	 * WP JSON Menus class
	 *
	 * @package WP API Menus
	 * @since 1.0.0
	 */
	class WP_JSON_Menus {

		/**
		 * Register menu routes for WP API
		 *
		 * @since 1.0.0
		 *
		 * @param  array $routes Existing routes
		 * @return array Modified routes
		 */
		public function register_routes( $routes ) {

			// all registered menus
			$routes['/menus'] = array(
				array( array( $this, 'get_menus' ), WP_JSON_Server::READABLE ),
			);
			// a specific menu
			$routes['/menus/(?P<id>\d+)'] = array(
				array( array( $this, 'get_menu' ), WP_JSON_Server::READABLE ),
			);
			// all registered menu locations
			$routes['/menu-locations'] = array(
				array( array( $this, 'get_menu_locations' ), WP_JSON_Server::READABLE ),
			);
			// menu for given location 
			$routes['/menu-locations/(?P<location>\w+)'] = array(
				array( array( $this, 'get_menu_location' ), WP_JSON_Server::READABLE ),
			);

			return $routes;
		}

		/**
		 * Get menus
		 *
		 * @since 1.0.0
		 *
		 * @return array All registered menus
		 */
		public static function get_menus() {

			$json_url = get_json_url() . '/menus/';
			$wp_menus = wp_get_nav_menus();

			$i = 0;
			$json_menus = array();
			foreach ( $wp_menus as $wp_menu ) :

				$menu = (array) $wp_menu;
				$json_menus[$i]                 = $menu;
				$json_menus[$i]['ID']           = $menu['term_id'];
				$json_menus[$i]['name']         = $menu['name'];
				$json_menus[$i]['slug']         = $menu['slug'];
				$json_menus[$i]['description']  = $menu['description'];
				$json_menus[$i]['parent']       = $menu['parent'];
				$json_menus[$i]['count']        = $menu['count'];
				$json_menus[$i]['meta']['self'] = $json_url . $menu['term_id'];
				$i ++;

			endforeach;

			return $json_menus;
		}

		/**
		 * Get menu
		 *
		 * @since	1.0.0
		 *
		 * @param  int   $id ID of the menu
		 * @return array Menu data
		 */
		public static function get_menu( $id ) {

			$json_url = get_json_url() . '/menus/';
			$wp_menu_object = $id ? wp_get_nav_menu_object( $id ) : array();
			$wp_menu_items = $id ? wp_get_nav_menu_items( $id ) : array();

			$json_menu = array();
			if ( $wp_menu_object ) :

				$menu = (array) $wp_menu_object;
				$json_menu['ID']            = $menu['term_id'];
				$json_menu['name']          = $menu['name'];
				$json_menu['slug']          = $menu['slug'];
				$json_menu['description']   = $menu['description'];
				$json_menu['parent']        = $menu['parent'];
				$json_menu['count']         = $menu['count'];

				$i = 0;
				$json_menu_items = array();
				foreach( $wp_menu_items as $item_object ) :

					$item = (array) $item_object;
					$json_menu_items[$i]['ID'] = $item['ID'];
					$json_menu_items[$i]['order'] = $item['menu_order'];
					$json_menu_items[$i]['parent'] = $item['menu_item_parent'];
					$json_menu_items[$i]['title'] = $item['title'];
					$json_menu_items[$i]['url'] = $item['url'];
					$json_menu_items[$i]['attr'] = $item['attr_title'];
					$json_menu_items[$i]['target'] = $item['target'];
					$json_menu_items[$i]['classes'] = $item['classes'];
					$json_menu_items[$i]['xfn'] = $item['xfn'];
					$json_menu_items[$i]['object_id'] = $item['object_id'];
					$json_menu_items[$i]['object'] = $item['object'];
					$json_menu_items[$i]['type'] = $item['type'];
					$json_menu_items[$i]['type_label'] = $item['type_label'];
					$i++;
				
				endforeach;
				$json_menu['items'] = $json_menu_items;
				$json_menu['meta']['parent'] = $json_url;
				$json_menu['meta']['self'] = $json_url . 'menu/' . $id;

			endif;

			return $json_menu;
		}

		/**
		 * Get menu locations
		 *
		 * @since 1.0.0
		 *
		 * @return array All registered menus locations
		 */
		public static function get_menu_locations() {

			$json_url = get_json_url() . '/menus/';

			$locations = get_nav_menu_locations();
			$registered_menus = get_registered_nav_menus();

			$json_menus = array();
			if ( $locations && $registered_menus ) :

				foreach( $registered_menus as $slug => $label ) :

					$json_menus[$slug]['ID'] = $locations[$slug];
					$json_menus[$slug]['label'] = $label;
					$json_menus[$slug]['meta']['self'] = $json_url . $locations[$slug];

				endforeach;

			endif;

			return $json_menus;
		}

		/**
		 * Get menu for location
		 *
		 * @since 1.0.0
		 *
		 * @param  string $location The location name
		 * @return array The menu for the corresponding location
		 */
		public function get_menu_location( $location ) {

			$locations = get_nav_menu_locations();
			$json_menu = isset( $locations[$location] ) ? $this->get_menu( $locations[$location] ) : '';
			
			return $json_menu;
		}

	}

endif;