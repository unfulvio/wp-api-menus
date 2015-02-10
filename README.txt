=== WP API Menus ===
Contributors: nekojira
Donate link: https://www.paypal.com/uk/cgi-bin/webscr?cmd=_flow&SESSION=SUJDJhsqyxThi-AbCT2HmIpMmBar3yAXDTYxlcNqruUIneC0_cxfT29SdIq&dispatch=5885d80a13c0db1f8e263663d3faee8d5402c249c5a2cfd4a145d37ec05e9a5e
Tags: wp-api, json, menus, rest
Requires at least: 3.6.0
Tested up to: 4.1
Stable tag: 1.1.2
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Extends the WordPress JSON REST API with new routes pointing to WordPress menus.

== Description ==

This plugin extends the [WordPress JSON REST API](https://wordpress.org/plugins/json-rest-api/) with new routes for WordPress registered menus

The new routes available will be:

* `/menus` list of every registered menu.
* `/menus/<id>` data for a specific menu.
* `/menu-locations` list of all registered theme locations.
* `/menu-locations/<location>` data for menu in specified menu in theme location.

Currently, the `menu-locations/<location>` route for individual menus will return a tree with full menu hierarchy, with correct menu item order and listing children for each menu item. The `menus/<id>` route will output menu details and a flat array of menu items. Item order or if each item has a parent will be indicated in each item attributes, but this route won't output items as a tree.

You can alter the data arrangement of each individual menu items and children using the filter hook `json_menus_format_menu_item`.

== Installation ==

This plugin requires having [WP API](https://wordpress.org/plugins/json-rest-api/) installed and activated or it won't be of any use.

Install the plugin as you would with any WordPress plugin in your `wp-content/plugins/` directory or equivalent.

Once installed, activate WP API Menus from WordPress plugins dashboard page and you're ready to go, WP API will respond to new routes and endpoints to your registered menus.


== Frequently Asked Questions ==

= Is this an official extension of WP API? =

There's no such thing.

= Will this plugin do 'X' ? =

You can submit a pull request to:
https://github.com/nekojira/wp-api-menus
However, menu data organization in json is a bit arbitrary, and that's why probably hasn't made it into WP API by the time of writing. You could also fork this plugin altogether and write your json output for a specific use case.

== Screenshots ==

Nothing to show really, this plugin has no settings or frontend.

== Changelog ==

= 1.1.2 =
* Introduced `json_menus_format_menu_item` filter hook - props @Noctine

= 1.1.1 =
* Submission to WordPress.org plugins repository.

= 1.1.0 =
* Fixed typo confusing `parent` with `collection` in meta
* Routes for menus in theme locations now include complete tree with item order and nested children
* `description` attribute for individual items is now included in results

= 1.0.0 =
First public release

