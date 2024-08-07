<?php
/**
 * Plugin Name:       Discount
 * Description:       Example block scaffolded with Create Block tool.
 * Requires at least: 6.1
 * Requires PHP:      7.0
 * Version:           0.1.0
 * Author:            The WordPress Contributors
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       discount
 *
 * @package CreateBlock
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}


/**
 * Registers the block using the metadata loaded from the `block.json` file.
 * Behind the scenes, it registers also all assets so they can be enqueued
 * through the block editor in the corresponding context.
 *
 * @see https://developer.wordpress.org/reference/functions/register_block_type/
 */
function create_block_discount_block_init() {
	register_block_type( __DIR__ . '/build' );
}
add_action( 'init', 'create_block_discount_block_init' );


// echo ;

function enqueue_me() {
	$product_ids_on_sale = wc_get_product_ids_on_sale();
	$products_on_sale = wc_get_products([
		'include' => array_values($product_ids_on_sale),
	]);


	$products = [];
	foreach ($products_on_sale as $product) {
		$details = [];
		$details["title"] = $product->get_title();
		$details["regular_price"] = $product->get_regular_price();
		$details["sale_price"] = $product->get_sale_price();
		$details["image"] = $product->get_image();
		$products[] = $details;
		$details = [];
	}

	$products = json_encode($products);


	wp_enqueue_script(
		'create-block-discount',
		plugins_url() . '/discount/src/edit.js'
	);

	wp_localize_script( 'create-block-discount', 'data', array(
		'products' => $products
));
}

add_action('enqueue_block_assets', 'enqueue_me');











// $products_on_sale = [];
// add_action('wp_head', function() use ($products_on_sale) {
// 	$product_ids_on_sale = wc_get_product_ids_on_sale();
// 	$products_on_sale = wc_get_products([
// 		'include' => array_values($product_ids_on_sale),
// 	]);
// 	echo '<pre>';
// 	print_r($products_on_sale);
// 	echo '</pre>';


// });




// var_dump($GLOBALS['woocommerce']);


// $product_ids_on_sale = wc_get_product_ids_on_sale();