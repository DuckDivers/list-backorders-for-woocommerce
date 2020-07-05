<?php

global $wpdb;

$backordered = __( 'Backordered', 'woocommerce' );

$sql = "SELECT
            `{$wpdb->prefix}woocommerce_order_itemmeta`.`order_item_id`,
            `{$wpdb->prefix}woocommerce_order_items`.`order_id`,
            `{$wpdb->prefix}woocommerce_order_items`.`order_item_name`,
            `{$wpdb->prefix}posts`.`post_date`,
            `{$wpdb->prefix}woocommerce_order_itemmeta`.`meta_value`
        FROM
            {$wpdb->prefix}woocommerce_order_itemmeta
        LEFT JOIN {$wpdb->prefix}woocommerce_order_items ON(
                `{$wpdb->prefix}woocommerce_order_items`.`order_item_id` = `{$wpdb->prefix}woocommerce_order_itemmeta`.`order_item_id`
            )
        LEFT JOIN {$wpdb->prefix}posts ON(
                `{$wpdb->prefix}woocommerce_order_items`.`order_id` = `{$wpdb->prefix}posts`.`ID`
            )
        WHERE
            (
                `{$wpdb->prefix}woocommerce_order_itemmeta`.`meta_key` LIKE 'Backordered'
            ) AND(
                `{$wpdb->prefix}posts`.`post_status` IN(
                    'wc-processing',
                    'wc-pending',
                    'wc-on-hold'
                )
            ) AND(
                `{$wpdb->prefix}woocommerce_order_itemmeta`.`meta_value` != '0'
            )
        ORDER BY
            `{$wpdb->prefix}posts`.`post_date`
        DESC";

$backorder_query =  $wpdb->get_results($sql);
d($sql);
?>
<div class="wrap"><h2><?php echo __('Items Backordered', 'dd_plugins'); ?></h2>
    <p><?php _e('Click the <strong>order id</strong> to view the order | Click the <strong>Item Description</strong> to view the Item - To update backorder quantity, edit the order and then the item meta. You may sort by column headers, and group by available options.', 'dd_plugins');?></p>
    <div id="grouping-options">
                <h4><?php _e('Data Grouping Options', 'dd_plugins');?></h4>
                <ul class="nav nav-pills">
                    <li class="nav-item" id="order">
                        <a class="group-by nav-link" data-column="0" href="#"><?php _e('Group by Order ID', 'dd_plugins');?></a>
                    </li>
                    <li class="nav-item" id="item">
                        <a class="group-by nav-link" data-column="1" href="#"><?php _e('Group by Item', 'dd_plugins');?></a>
                    </li>
                    <li class="nav-item" id="customer">
                        <a class="group-by nav-link" data-column="2" href="#"><?php _e('Group by Customer', 'dd_plugins');?></a>
                    </li>
                </ul>
            </div>
<?php if(count($backorder_query)>0): ?>
<table class="wp-list-table widefat fixed posts" id="report">
	<thead>
		<tr>
			<th><?php _e('Order ID', 'dd_plugins');?></th>
	        <th><?php _e('Item Description', 'dd_plugins');?></th>
            <th><?php _e('SKU', 'woocommerce');?></th>
	        <th><?php _e('Customer Name', 'dd_plugins');?></th>
			<th><?php _e('Order Date', 'dd_plugins');?></th>
			<th><?php _e('Quantity', 'dd_plugins');?></th>
		</tr>
	</thead>
	<tbody>

<?php foreach( $backorder_query as $theQuery){

		// Construct the Variables
		$orderid = $theQuery->order_id;
		$itemid = $theQuery->order_item_id;
		$itemname = $theQuery->order_item_name;
		$ship_to_fname = get_post_meta( $orderid, '_billing_first_name', true);
		$ship_to_lname = get_post_meta( $orderid, '_billing_last_name', true);
		$orderdate = date_create($theQuery->post_date);
		$theOrderDate = date_format($orderdate, 'M d, Y');
		$productID = wc_get_order_item_meta( $itemid, '_product_id', $single = true );
		$quantity = $theQuery->meta_value;
        $sku = get_post_meta($productID, '_sku', true);
		// Loop through the Row
		?>
			<tr class="type-shop_order status-publish post-password-required hentry alternate iedit author-self level-0">
				<td><a href="/wp-admin/post.php?post=<?php echo $orderid;?>&action=edit"><?php echo $orderid;?></a></td>
                <td><a href="/wp-admin/post.php?post=<?php echo $productID;?>&action=edit"><?php echo $itemname; ?></a></td>
                <td><?php echo $sku;?></td>
				<td><?php echo $ship_to_fname .' '.$ship_to_lname; ?></td>
				<td><?php echo $theOrderDate; ?></td>
				<td><?php echo $quantity; ?></td>
			</tr>

		<?php }  // End Foreach ?>
	</tbody>
</table>
<?php else :?>
<div style="margin-top: 20px;">
   <h3><?php _e('There are no backorders at this time', 'dd_plugins');?></h3>
</div>
<?php endif; ?>
</div>
