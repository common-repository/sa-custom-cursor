<?php
/*
 * Plugin Name: SA Сustom Cursor
 * Description: Плагин для изменения курсора на сайте
 * Plugin URI:  https://wordpress.org/plugins/sa-custom-cursor
 * Author URI:  https://profiles.wordpress.org/sastudio/
 * Author:      SA-Studio
 * Version:     1.1
 * 
 * Requires at least: 2.5
 * Requires PHP: 5.4
 * 
 * License:     GPL2
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 *
 * Network:     true
 * 
 */

if ( ! defined( 'ABSPATH' ) ) exit;

class sacursor {
	function sacursor() {
		require_once('sacursor-addfield-function.php');
		require_once('sacursor-function.php');
		require_once('sacursor-front-function.php');
		add_filter('plugin_action_links_'.plugin_basename(__FILE__), 'sacursor_page_settings_link');
	}
}
$sacursor = new sacursor();