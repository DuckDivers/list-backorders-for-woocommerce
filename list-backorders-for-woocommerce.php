<?php
/*
  	Plugin Name: List Backorders for WooCommerce
  	Plugin URI: http://www.duckdiverllc.com/
  	Version: 1.1.1
  	Author: thehowarde
  	Description: Get a list of backordered items and orders with backorders from the Woocommerce Tab.
	License: GNU General Public License v3
	License URI: http://www.gnu.org/licenses/gpl-3.0.html
 */
if ( ! defined( 'ABSPATH' ) )
exit; 

include_once('localize.php');

add_action('admin_menu', 'register_backorder_page');

function register_backorder_page() {
    add_submenu_page( 'woocommerce', 'View Backorders List | By Duck Diver', 'List Backorders', 'manage_woocommerce', 'manage-backorder', 'manage_backorder_callback' ); 
}

function manage_backorder_callback() {
    include("backorder.php");
}
