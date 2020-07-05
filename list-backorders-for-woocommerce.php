<?php
/*
	Plugin Name: List Backorders for WooCommerce
	Plugin URI: http://www.duckdiverllc.com/
	Version: 2.2
	Contributors: thehowarde
	Author URI: https://www.howardehrenberg.com
	Description: Get a list of backordered items and orders with backorders from the Woocommerce Tab.
	Author: Howard Ehrenberg
	License URI: http://www.gnu.org/licenses/gpl-3.0.html
	License: GNU General Public License v3
	Requires at least: 4.6
	Tested up to: 5.4
	Requires PHP: 5.6
	WC requires at least: 3.0
	WC tested up to: 4.2
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

define('DD_LIST_BACKORDERS_WC_VERSION', '2.2');

require plugin_dir_path( __FILE__ ) . 'includes/class-list-backorders.php';

class dd_check_wc {
    function __construct(){
       add_action('admin_notices', array($this, 'on_admin_notices' ) );
    }
    function on_admin_notices(){
        if ( !is_plugin_active( 'woocommerce/woocommerce.php' ) )  {
            echo '<div class="error"><p>' . __('This plugin requires WooCommerce for it to work.', 'cf7-woo-products') . '</p></div>';
        }
    }
}
new dd_check_wc;
new DD_List_WC_Backorders;
