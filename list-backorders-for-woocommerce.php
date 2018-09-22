<?php
/*
  	Plugin Name: List Backorders for WooCommerce
  	Plugin URI: http://www.duckdiverllc.com/
  	Version: 1.2.2
  	Contributors: thehowarde
	Author: Howard Ehrenberg
	Author URI: https://www.howardehrenberg.com
  	Description: Get a list of backordered items and orders with backorders from the Woocommerce Tab.
	License: GNU General Public License v3
	License URI: http://www.gnu.org/licenses/gpl-3.0.html
    Requires at least: 4.6
    Tested up to: 4.9
    Requires PHP: 5.4
    WC requires at least: 2.0
    WC tested up to: 3.2.5
 */
if ( ! defined( 'ABSPATH' ) )
exit; 

add_action('admin_menu', 'register_backorder_page');

function register_backorder_page() {
	$backorders = translate('Items', 'woocommerce') . ' ' . translate( 'Backordered', 'woocommerce' );
    add_submenu_page( 'woocommerce', 'View Backorders List | By Duck Diver', $backorders , 'manage_woocommerce', 'manage-backorder', 'manage_backorder_callback' ); 
}

function manage_backorder_callback() {
    include("backorder.php");
}