<?php

	$products = wc_get_products([]);
	?>

	<div <?php echo get_block_wrapper_attributes(); ?> class="container_custom_selector">
		<div class="custom_selector">Choose product <span class="arrow"></span></div>
		<div class="selector_content d-none">
				<?php foreach ($products as $product): ?>
					<a href="<?php echo get_home_url() . '/product/' . $product->get_slug(); ?>">
						<div class="content_item">
							<?php $image = wp_get_attachment_image( $product->get_image_id() ); ?>
							<?php echo $image; ?>
							<p class="content_title"><?php echo $product->get_title(); ?></p>
						</div>
					</a>
				<?php endforeach; ?>

		</div>
	</div>

