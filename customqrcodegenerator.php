<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              #
 * @since             1.0.0
 * @package           Customqrcodegenerator
 *
 * @wordpress-plugin
 * Plugin Name:       Custom QR code Generator
 * Plugin URI:        #
 * Description:       This plugin helps to generate the QR code after successfully placed order. The QR contains customer's order informations.
 * Version:           1.0.0
 * Author:            Bhavin Gediya
 * Author URI:        #
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       customqrcodegenerator
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
define( 'CUSTOMQRCODEGENERATOR_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-customqrcodegenerator-activator.php
 */
function activate_customqrcodegenerator() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-customqrcodegenerator-activator.php';
	Customqrcodegenerator_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-customqrcodegenerator-deactivator.php
 */
function deactivate_customqrcodegenerator() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-customqrcodegenerator-deactivator.php';
	Customqrcodegenerator_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_customqrcodegenerator' );
register_deactivation_hook( __FILE__, 'deactivate_customqrcodegenerator' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-customqrcodegenerator.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_customqrcodegenerator() {

	$plugin = new Customqrcodegenerator();
	$plugin->run();

}
run_customqrcodegenerator();
