<?php
/* Plugin Name: Browser-sync Filter
 * Description: Adds the Browser-sync JavaScript snippet to `wp_footer` when `DEVENV` is `true`; Adds filters when the requested URL does not match the `siteurl` stored in WordPress
 * Author: Andrew Taylor
 * Author URL: http:// www.ataylor.me/
 * Version: 2.2
 *
 * LICENSE
 * Copyright 2014  Andrew Taylor  ( email : andrew@ataylor.me )
 *
 *  This program is free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License, version 2, as 
 *  published by the Free Software Foundation.
 *
 *  This program is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  You should have received a copy of the GNU General Public License
 *  along with this program; if not, write to the Free Software
 *  Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 */

class Browser_Sync_Filter {

    private static $url = '';
    private static $dir = '';
    private static $port = 3000;
    private static $transient = 'Browser_sync_version';

    // define variables and call setup method from init
    public static function init( ) {
		// if DEVENV isn't defined or it is anything except true, bail
		if( !defined( 'DEVENV' ) || DEVENV !== true ){
			return;
		}

		// if BROWSERSYNCPORT is defined, use it
		if( defined( 'BROWSERSYNCPORT' ) ){
			self::$port = BROWSERSYNCPORT;
		}

		// these are filtered so that plugins can optionally be moved into themes
        self::$url = apply_filters( __CLASS__.'_url', plugins_url( '/', __FILE__ ), __FILE__ );
        self::$dir = apply_filters( __CLASS__.'_dir', plugin_dir_path( __FILE__ ), __FILE__ );

		// run plugin setup after plugins/themes are loaded
        add_action( 'after_setup_theme', array( __CLASS__, 'setup') );

    } // end init method

    // actions/hooks in setup
    public static function setup( ) {

		add_action( 'wp_footer', array( __CLASS__, 'browser_sync_js' ), 9999 );

		if( self::different_host( ) ){
			add_filter( 'option_home', array( __CLASS__, 'url_filter' ), 99, 1 ); 
			add_filter( 'option_siteurl', array( __CLASS__, 'url_filter' ), 99, 1 ); 
			add_filter( 'stylesheet_directory_uri', array( __CLASS__, 'url_filter' ), 99, 1 ); 
			add_filter( 'template_directory_uri', array( __CLASS__, 'url_filter' ), 99, 1 );
		}

    } // end setup method

    /**
    * Get WordPress host from site url
    */
    private static function wordpress_host( ){
		$host_matches = array( );

		global $wpdb;

		// get WordPress url from database
		$wordpress_url = $wpdb->get_var( "SELECT `option_value` FROM $wpdb->options WHERE `option_name` = 'siteurl';" );

		// remove www.
		$wordpress_url = str_replace( 'www.', '', $wordpress_url );

		// strip http, www, etc from wordpress url
		preg_match( '|https?://([^\/]+)|',$wordpress_url, $host_matches );
		
		if( !empty( $host_matches ) AND isset( $host_matches[1] ) ){
			// if successful return wordpress host
			return $host_matches[1];
		} else{
			// otherwise return false
			return false;
		}
    } // end wordpress_host method

    /**
    * get localhost if defined
    */
   private function get_localhost( ){
		$local_host = $_SERVER['HTTP_HOST'];

		// if localhost is empty, bail
		if( !isset( $_SERVER['HTTP_HOST'] ) || empty( $local_host ) ){
			return false;
		}

		// strip www and return
		return str_replace( 'www.', '', $local_host );

    } // end get_localhost method

    /**
    * Does WordPress host differ from localhost?
    */
    private function different_host( ){

		// get localhost
		$local_host = self::get_localhost( );
		// if no localhost, bail
		if( $local_host === false ){
			return false;
		}

		// get WordPress host
		$wordpress_host = self::wordpress_host( );
		
		// if no WordPress host, bail
		if( $wordpress_host === false ){
			return false;
		}

		// if wordpress host doesn't match the localhost return true, otherwise return false
		return ( $wordpress_host != $current_host ? true : false );
    } // end different_host method

    /**
    * Add browser sync JS to footer
    */
    public static function browser_sync_js(  ) {
		$v  = self::browser_sync_version();

		if( $v == false ){
			return;
		}

		$port = self::$port;

		echo "<script type='text/javascript'>//<![CDATA[\n";
			echo "document.write( \"<script async src='//HOST:$port/browser-sync/browser-sync-client." . $v . ".js'><\/script>\".replace(/HOST/g, location.hostname));\n";
		echo "//]]></script>";
    } // end browser_sync_js method

    /**
    * Filter URL, replacing localhost w/ IP
    */
    public static function url_filter( $url ){
		// get WordPress host
		$wordpress_host = self::wordpress_host( );

		// get localhost
		$local_host = self::get_localhost( );

		// if current host is not the same as what's in WordPress filter the WordPress value
		if( self::different_host( ) ){
			$url = str_replace( $wordpress_host, $local_host, $url );
		}

        return $url;
    } // end url_filter

	/**
    * Detect Browser-sync client version
    */
    private static function browser_sync_version(  ){
		// check for a transient
		if ( ( $v = get_transient( self::$transient ) ) !== false ) {
			return $v;
		}

		// get tags from GitHub as an array
		// currently there aren't any releases defined
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, 'https://api.github.com/repos/shakyShane/browser-sync/tags');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');

		$tags = json_decode( curl_exec($ch), true );

		curl_close($ch); 

		// if no tags, bail
		if( $tags == false || empty( $tags ) ){
			return false;
		}

		foreach( $tags as $tag ){
			if( !isset( $tag['name'] ) ){
				continue;
			}

			// stash "version"
			$v = $tag['name'];

			// if we have a valid version number
			if( self::is_valid_version( $v ) ){
				// check if the file exists for this version
				$localhost = str_replace( $_SERVER['HTTP_HOST'], $_SERVER['HTTP_HOST'] . ':' . self::$port, get_bloginfo('url') );
				$js_file = "$localhost/browser-sync-client.$v.js";
				$js_file_headers = @get_headers($js_file);
				if( stripos( $js_file_headers[0], '404' ) !== false ) {
					// if it does, set a transient and return the version
					set_transient( self::$transient, $v, 7 * (12 * HOUR_IN_SECONDS) );
					return $v;
				}
			}

		}

		// if we've gotten this far there aren't and valid files
		return false;
    } // end browser_sync_version

	/**
    * Checks if something is a valid version number
    */
    private static function is_valid_version( $v ){
		// if version is empty, bail
		if( empty( $v ) ){
			return false;
		}

		// versions numbers look like 1.2.3
		$valid_version = '/^[0-9]+\.[0-9]+\.[0-9]+$/';

		// do we have a match?
		return preg_match( $valid_version, $v );

    } // is_valid_version

    /**
    * Activation Hook
    */
    public static function activation_hook( ) {

    } // end activation_hook method

    /**
    * Deactivation Hook
    */
    public static function deactivation_hook( ) {

    } // end deactivation_hook method

    /**
    * Uninstallation Hook
    */
    public static function uninstallation_hook( ) {

    } // end uninstallation_hook method

} // end Browser_Sync_Filter

// register activation hook
register_activation_hook( __FILE__, array( 'Browser_Sync_Filter', 'activation_hook' ) );

// register deactivation hook
register_deactivation_hook( __FILE__, array( 'Browser_Sync_Filter', 'deactivation_hook' ) );

// register uninstallation hook
register_uninstall_hook( __FILE__, array( 'Browser_Sync_Filter', 'uninstallation_hook' ) );

// run init
Browser_Sync_Filter::init( );