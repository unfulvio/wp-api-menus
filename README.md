## Menu routes for WordPress JSON REST API

[WordPress](http://www.wordpress.org/) plugin that extends the JSON REST [WP API](https://github.com/WP-API/WP-API) with new routes pointing to WordPress registered menus. Read the [WP API documentation](http://wp-api.org/).

[![Download from WordPress.org](https://github.com/nekojira/wp-api-menus/assets/wordpress-download-btn.png)](https://wordpress.org/plugins/wp-api-menus/)

#### New routes available:

- `/menus` list of every registered menu.
- `/menus/<id>` data for a specific menu.
- `/menu-locations` list of all registered theme locations.
- `/menu-locations/<location>` data for menu in specified menu in theme location. 

Currently, the `menu-locations/<location>` route for individual menus will return a tree with full menu hierarchy, with correct menu item order and listing children for each menu item. The `menus/<id>` route will output menu details and a flat array of menu items. Item order or if each item has a parent will be indicated in each item attributes, but this route won't output items as a tree. 


#### To do / Ideas

* Perhaps add hook to filter or change data, especially for `menu-locations` route and change tree output (could be useful as applying a different walker or with plugins that create megamenus etc.).  

#### Contributing

* Submit a pull request or open a ticket here on Github. 
 
