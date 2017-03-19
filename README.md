# WooCommerce List Backorders in Admin
A Wordpress Plugin to List Backorders and keep track of them in WooCommerce

This plugin will add an admin menu item to the WooCommerce Admin Item to "List Backorders" for easy viewing.

== Description ==

This plugin will automatically detect backordered items for orders that are placed though WooCommerce.

You can also modify the order meta (by editing the order) to update the Backordered quantity, or manually add "Backordered" as a Meta Key and the quantity as the Meta Value.  This plugin will only detect orders whose status is pending, processing, or on-hold.  Completed orders will automatically remove themselves from the list.

== Requirements ==

This plugin requires the use of WooCommerce.

== Installation ==

1. Upload the plugin files to the `/wp-content/plugins/plugin-name` directory, or install the plugin through the WordPress plugins screen directly.
2. Activate the plugin through the 'Plugins' screen in WordPress

== Screenshots ==

1. This is the main list view when clicking on the WooCommerce > List Backorders admin menu item.
2. This is the edit order on WooCommerce > Orders > Edit Order.  You can modify the order item meta by clicking on this pencil.
3. Once you've accessed the order item meta, use the "META KEY" = "Backordered" and the "META VALUE" = Number of items backordered.

== Changelog ==

= 1.0 =
* Initial Release Version
