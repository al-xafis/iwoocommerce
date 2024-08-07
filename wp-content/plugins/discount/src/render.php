<?php

$product_ids_on_sale = wc_get_product_ids_on_sale();
	$products = wc_get_products([
		'include' => array_values($product_ids_on_sale),
	]);
?>
<div <?php echo get_block_wrapper_attributes(); ?>>
  <h2>Discount products</h2>
  <div class="discount_cards">
    <?php foreach($products as $product) : ?>
      <div class="discount_card">
        <div class="card__img"><?php echo $product->get_image(); ?></div>
        <div class="card__content">
          <h4 class="product_title"><?php echo esc_html($product->get_title()); ?></h4>
          <p class="product_price">$<?php echo esc_html($product->get_price()); ?></p>
          <p class="product_sale_price">$<?php echo esc_html($product->get_regular_price()); ?></p>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>