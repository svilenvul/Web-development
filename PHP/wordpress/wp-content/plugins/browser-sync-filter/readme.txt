=== Browser-sync Filter ===
Authors: andrewtaylor-1
Contributors: andrewtaylor-1
Tags: Browser-sync, Development
Requires at least: 3.0.1
Tested up to: 4.0.0
Stable tag: trunk
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

== Description ==

##Adds the Browser-sync JavaScript snippet to `wp_footer` when `DEVENV` is `true`
##Adds filters when the requested URL does not match the `siteurl` stored in WordPress

###For Development Use Only - Enable By Adding `define('DEVENV', true);` to wp-config.php

Note: This plugin only adds the Browser-sync JavaScript snippet - it does _not_ implement a Browser-sync server or proxy.

The default port is 3000.
This can be overwritted by defining `BROWSERSYNCPORT` in wp-config.php

See http://browsersync.io/ for more information.

== Installation ==

1. Upload the `Browser-Sync-Filter` directory to `/wp-content/plugins/` directory
1. Place `define('DEVENV', true);` in your local `wp-config.php`
1. Activate the plugin through the 'Plugins' menu in WordPress

== Changelog ==

= 2.2 =
* Code formatting
* HOST match fix

= 2.1 =
* Added transient `Browser_sync_version` for caching Browser-sync version

= 2.0 =
* Reverted `DEVENV` constant to be `true`
* Added detection for Browser-sync version
* Removed timezone declaration

= 1.1 =
* Updated `DEVENV` constant to be the Browser-sync version instead of `true`

= 1.0 =
* Initial Release