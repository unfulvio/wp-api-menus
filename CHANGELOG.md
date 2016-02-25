#### 1.3.0 (25 Feb 2016)
 * Fix (V2): Nodes duplication in sublevel menu items, see https://github.com/unfulvio/wp-api-menus/pull/22 - props @bpongvh
 * Fix (V2): The items array was empty because it was looking for "ID" key instead of "id" - props @Dobbler
 * Fix (V1): Check for JSON_API_VERSION constant, as in a mu-plugin installation of WP API 1.0 it will not show up under active_plugins - props @pdufour

#### 1.2.1 (10 Jan 2016)
 * Tweak (V2 only): Use lowercase `id` instead of uppercase `ID` in API responses, to match the standard lowercase `id` used across WP REST API - props @puredazzle
 * Fix: Fixed WP API v1 version detection for WordPress 4.4 - props	Thomas Chille

#### 1.2.0 (18 oct 2015)
 * Enhancement: Added WP REST API v2 support - props @foxpaul
 * Misc: Supports WordPress 4.3

#### 1.1.5 (19 jun 2015)
 * Misc: Minor edits to headers and phpdocs
 * Misc: Improved security

#### 1.1.4 (30 apr 2015)
 * Misc: Supports WordPress 4.2, add composer.json for wp-packagist

#### 1.1.3 (13 Mar 2015)
 * Fix: Fixes bug where duplicate items where created in nested menus - props @josh-taylor

#### 1.1.2 (10 Feb 2015)
 * Tweak: Introduced `json_menus_format_menu_item` filter hook - props @Noctine

#### 1.1.1 (15 Jan 2015)
 * Misc: Submission to WordPress.org plugins directory.

#### 1.1.0 (24 Nov 2014)
 * Enhancement: Routes for menus in theme locations now include complete tree with item order and nested children
 * Tweak: `description` attribute for individual items is now included in results
 * Fix: Fixed typo confusing `parent` with `collection` in meta   

#### 1.0.0 (21 Jul 2014)
 * First public release
