<?php

global $wpdb;
$prefix = $wpdb->prefix;

$backordered = translate( 'Backordered', 'woocommerce' );

$backorder_query =  $wpdb->get_results("
		SELECT  `{$wpdb->prefix}woocommerce_order_itemmeta`.`order_item_id` ,  `{$wpdb->prefix}woocommerce_order_items`.`order_id`,  `{$wpdb->prefix}woocommerce_order_items`.`order_item_name` , `{$wpdb->prefix}posts`.`post_date`, `{$wpdb->prefix}woocommerce_order_itemmeta`.`meta_value`
		FROM {$wpdb->prefix}woocommerce_order_itemmeta
		LEFT JOIN {$wpdb->prefix}woocommerce_order_items ON (  `{$wpdb->prefix}woocommerce_order_items`.`order_item_id` =  `{$wpdb->prefix}woocommerce_order_itemmeta`.`order_item_id` ) 
		LEFT JOIN {$wpdb->prefix}posts ON (`{$wpdb->prefix}woocommerce_order_items`.`order_id` = `{$wpdb->prefix}posts`.`ID`)
		WHERE (`{$wpdb->prefix}woocommerce_order_itemmeta`.`meta_key` LIKE '$backordered') 
		AND (`{$wpdb->prefix}posts`.`post_status` IN ('wc-processing', 'wc-pending', 'wc-on-hold'))
		AND (`{$wpdb->prefix}woocommerce_order_itemmeta`.`meta_value` != '0')
		ORDER BY `{$wpdb->prefix}posts`.`post_date` DESC"
	);

?>

<div class="wrap"><h2><?php echo translate('Items', 'woocommerce'). ' ' . $backordered; ?></h2>

<?php if(count($backorder_query)>0): ?>
<p>Click the order id to view the order | Click the Item Description to view the Item - To update backorder quantity, edit the order and then the item meta.</p></div>
<table class="wp-list-table widefat fixed posts" style="width:98%">
<thead>
	<tr>
		<th>Order ID</th>
        <th>Item Description</th>
        <th>Customer Name</th>
		<th>Order Date</th>
		<th>Quantity</th>
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
		// Loop through the Row
		?>
			<tr class="type-shop_order status-publish post-password-required hentry alternate iedit author-self level-0">
				<td><a href="/wp-admin/post.php?post=<?php echo $orderid;?>&action=edit"><?php echo $orderid;?></a></td>		
                <td><a href="/wp-admin/post.php?post=<?php echo $productID;?>&action=edit"><?php echo $itemname; ?></a></td>
				<td><?php echo $ship_to_fname .' '.$ship_to_lname; ?></td>
				<td><?php echo $theOrderDate; ?></td>
				<td><?php echo $quantity; ?></td>		
			</tr>
			
		<?php }  // End Foreach ?>
	</tbody>
</table>
<?php else :?>
<div style="margin-top: 20px;">
   <h3>There are no backorders at this time</h3>
</div>
<?php endif; ?>		

