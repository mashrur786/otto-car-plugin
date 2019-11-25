<?php
/**

 *
 * @link              http://mashrur.co.uk
 * @since             1.0.0
 * @package           Plugin_Name
 *
 * @wordpress-plugin
 * Plugin Name:       Otto-Car Discount Calculator
 * Plugin URI:        http://example.com/plugin-name-uri/
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Mashrur Arafat Chwodhury
 * Author URI:        http://example.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       ocdc
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

define( 'OCDC__PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'OCDC__PLUGIN_URL', plugin_dir_url(__FILE__ ) );

register_activation_hook( __FILE__, array('OCDC','activate_ocdc') );
register_deactivation_hook( __FILE__, array('OCDC','deactivate_ocdc') );


/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class.ocdc.php';

new OCDC();

if ( is_admin() || ( defined( 'WP_CLI' ) && WP_CLI ) ) {
	require plugin_dir_path( __FILE__ ) . 'includes/class.ocdc-admin.php';
	new OCDC_Admin();
}
