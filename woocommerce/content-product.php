<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}

$terms = get_the_terms( $recent_products->ID, 'product_cat' );
$is_course = get_field('contenido_cursos');
?>
<div class="card products-cards">
	<a href="<?= get_permalink(); ?>">
		<div class="content-image">
			<?= do_shortcode('[yith_wcwl_add_to_wishlist]'); ?>
			<?php do_action( 'woocommerce_before_shop_loop_item_title' ); ?>
		</div>
		<div class="card-body">
			<div class="content-title">
				<?php do_action( 'woocommerce_shop_loop_item_title' ); ?>
			</div>
			<div class="content-features">
				<?php if(get_field('is_courses') === true): ?>
					<p><strong>Intensidad:</strong> <?= $is_course['intensidad']; ?> Horas</p>
					<p><strong>Sesiones:</strong> <?= $is_course['sesiones']; ?></p>
					<p><strong>Horario:</strong> <?= $is_course['horario']; ?></p>
				<?php endif; ?>
				<p><strong>Precio:</strong><?php do_action( 'woocommerce_after_shop_loop_item_title' ); ?></p>
				<?php if($terms[0]->slug !== 'cursos'): ?>
					<?php if($product->sku !== ''): ?>
						<p><strong>SKU:</strong> <?= $product->sku; ?></p>
					<?php endif; ?>
				<?php endif; ?>
			</div>
		</div>
	</a>
</div>