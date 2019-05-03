<?php
/**
 * Plugin Name: HT Mega - Absolute Addons for Elementor Page Builder
 * Description: The HTMega is a elementor addons package for Elementor page builder plugin for WordPress.
 * Plugin URI: 	http://demo.wphash.com/htmega/
 * Author: 		HT Plugins
 * Author URI: 	https://htplugins.com/
 * Version: 	1.1.0
 * License:     GPL2
 * License URI:  https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: htmega-addons
 * Domain Path: /languages
*/

if( ! defined( 'ABSPATH' ) ) exit(); // Exit if accessed directly
define( 'HTMEGA_VERSION', '1.1.0' );
define( 'HTMEGA_ADDONS_PL_URL', plugins_url( '/', __FILE__ ) );
define( 'HTMEGA_ADDONS_PL_PATH', plugin_dir_path( __FILE__ ) );

// Required File
require_once HTMEGA_ADDONS_PL_PATH.'includes/helper-function.php';
require_once HTMEGA_ADDONS_PL_PATH.'admin/admin-init.php';
require_once HTMEGA_ADDONS_PL_PATH.'init.php';

// Check Plugins is Installed or not
if( !function_exists( 'htmega_is_plugins_active' ) ){
    function htmega_is_plugins_active( $pl_file_path = NULL ){
        $installed_plugins_list = get_plugins();
        return isset( $installed_plugins_list[$pl_file_path] );
    }
}

// Load Plugins
function htmega_load_plugin() {
    load_plugin_textdomain( 'htmega-addons' );
    if ( ! did_action( 'elementor/loaded' ) ) {
        add_action( 'admin_notices', 'htmega_check_elementor_status' );
        return;
    }
}
add_action( 'plugins_loaded', 'htmega_load_plugin' );

// Check Elementor install or not.
function htmega_check_elementor_status(){
    $elementor = 'elementor/elementor.php';
    if( htmega_is_plugins_active( $elementor ) ) {
        if( ! current_user_can( 'activate_plugins' ) ) {
            return;
        }
        $activation_url = wp_nonce_url( 'plugins.php?action=activate&amp;plugin=' . $elementor . '&amp;plugin_status=all&amp;paged=1&amp;s', 'activate-plugin_' . $elementor );

        $message = '<p>' . __( 'HTMEGA Addons not working because you need to activate the Elementor plugin.', 'htmega-addons' ) . '</p>';
        $message .= '<p>' . sprintf( '<a href="%s" class="button-primary">%s</a>', $activation_url, __( 'Activate Elementor Now', 'htmega-addons' ) ) . '</p>';
    } else {
        if ( ! current_user_can( 'install_plugins' ) ) {
            return;
        }
        $install_url = wp_nonce_url( self_admin_url( 'update.php?action=install-plugin&plugin=elementor' ), 'install-plugin_elementor' );
        $message = '<p>' . __( 'HTMEGA Addons not working because you need to install the Elementor plugin', 'htmega-addons' ) . '</p>';
        $message .= '<p>' . sprintf( '<a href="%s" class="button-primary">%s</a>', $install_url, __( 'Install Elementor Now', 'htmega-addons' ) ) . '</p>';
    }
    echo '<div class="error"><p>' . $message . '</p></div>';
}

// Add settings link on plugin page.
function htmega_pl_setting_links( $links ) {
    $htmega_settings_link = '<a href="admin.php?page=htmega_addons_options">'.esc_html__( 'Settings', 'htmega-addons' ).'</a>'; 
    array_unshift( $links, $htmega_settings_link );   
    return $links; 
} 
$htmega_plugin_name = plugin_basename(__FILE__); 
add_filter("plugin_action_links_$htmega_plugin_name", 'htmega_pl_setting_links' );