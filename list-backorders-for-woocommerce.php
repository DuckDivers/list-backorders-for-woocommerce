<?php
/*
  	Plugin Name: List Backorders for WooCommerce
  	Plugin URI: http://www.duckdiverllc.com/
  	Version: 1.0
  	Author: HowardE
  	Description: Get a list of backordered items and orders with backorders from the Woocommerce Tab.
	License:           GNU General Public License v3
	License URI:       http://www.gnu.org/licenses/gpl-3.0.html
 */
if ( ! defined( 'ABSPATH' ) )
exit; 

add_action('admin_menu', 'register_backorder_page');

function register_backorder_page() {
    add_submenu_page( 'woocommerce', 'View Backorders List | By Duck Diver', 'List Backorders', 'manage_options', 'manage-backorder', 'manage_backorder_callback' ); 
}

function manage_backorder_callback() {
    include("backorder.php");
}
