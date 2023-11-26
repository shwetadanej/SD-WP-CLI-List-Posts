<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://shwetadanej.com
 * @since             1.0.0
 * @package           Sd_Wpcli_List_Posts
 *
 * @wordpress-plugin
 * Plugin Name:       SD WP-CLI List Posts
 * Plugin URI:        https://shwetadanej.com
 * Description:       This plugin provides a command to display the number of published posts by a specific author or post type. The command name is "author-posts-count", it accepts an optional parameter "--author" or "-a" to specify the author's username. The command also accepts the optional parameter "--post_type" to specify the post type name. The command should output the author's username and the corresponding number of published posts. If no author is specified, the command will display the number of published posts for all authors.
 * Version:           1.0.0
 * Author:            Shweta Danej
 * Author URI:        https://shwetadanej.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       sd-wpcli-list-posts
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'SD_WPCLI_LIST_POSTS_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-sd-wpcli-list-posts-activator.php
 */
function activate_sd_wpcli_list_posts() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-sd-wpcli-list-posts-activator.php';
	Sd_Wpcli_List_Posts_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-sd-wpcli-list-posts-deactivator.php
 */
function deactivate_sd_wpcli_list_posts() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-sd-wpcli-list-posts-deactivator.php';
	Sd_Wpcli_List_Posts_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_sd_wpcli_list_posts' );
register_deactivation_hook( __FILE__, 'deactivate_sd_wpcli_list_posts' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-sd-wpcli-list-posts.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_sd_wpcli_list_posts() {

	$plugin = new Sd_Wpcli_List_Posts();
	$plugin->run();

}
run_sd_wpcli_list_posts();
