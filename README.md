# List Orders with Backorders for WooCommerce

Available from the WordPress Plugin Repository at https://wordpress.org/plugins/list-backorders-for-woocommerce/

A Wordpress Plugin to List Orders with Backordered items on them. This helps the store manager with a list of orders that need items to complete fulfillment.  This is not a stock list report, but only a report of order that are not shipped because of backorders. 

This plugin will add an admin menu item to the WooCommerce Admin Item to "List Backorders" for easy viewing of orders with backorders, and the ordered-items that are backordered.

== Description ==

This plugin will automatically detect backordered items for orders that are placed though WooCommerce.

You can also modify the order meta (by editing the order) to update the Backordered quantity, or manually add "Backordered" as a Meta Key and the quantity as the Meta Value.  This plugin will only detect orders whose status is pending, processing, or on-hold.  Completed orders will automatically remove themselves from the list.

== Requirements ==

This plugin requires the use of WooCommerce.

== Installation ==

1. Upload the plugin files to the `/wp-content/plugins/woocommerce-list-backorders` directory, or install the plugin through the WordPress plugins screen directly.
2. Activate the plugin through the 'Plugins' screen in WordPress

== Screenshots ==

1. This is the main list view when clicking on the WooCommerce > List Backorders admin menu item.
2. This is the edit order on WooCommerce > Orders > Edit Order.  You can modify the order item meta by clicking on this pencil.
3. Once you've accessed the order item meta, use the "META KEY" = "Backordered" and the "META VALUE" = Number of items backordered.

== Changelog ==
= 1.1 =
Added some localization for "Backordered"
= 1.0.3 =
*Update the description 
= 1.0.2 =
* File Location error fixed
= 1.0.1 =
* Minor Change for naming convention
= 1.0 =
* Initial Release Version
