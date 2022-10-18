<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
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

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}
$add_payment_method = get_field('add_payment_method', 'option');
$preguntas_frecuentes = get_field('preguntas_frecuentes', 'option');
$is_course = get_field('contenido_cursos');
$caracteristicas = get_field('caracteristicas');
?>
<div class="content-single-product" id="product-<?php the_ID(); ?>" <?php wc_product_class( '', $product ); ?>>
	<div class="container">
		<div class="row">
			<div class="col-12 mb-4">
				<?php do_action( 'woocommerce_before_main_content' ); ?>
			</div>
		</div>
		<div class="row">
			<div class="col-12 col-md-7 content-gallery">
				<?php do_action( 'woocommerce_before_single_product_summary' ); ?>
			</div>
			<div class="col-12 col-md-5 content-right-single-product">
				<h2 class="title-single-product"><?= get_the_title(); ?></h2>
				<div class="content-price-and-wishlist">
					<h3><?php do_action( 'woocommerce_after_shop_loop_item_title' ); ?></h3>
					<?= do_shortcode('[yith_wcwl_add_to_wishlist]'); ?>
				</div>
				<div class="content-stock-and-sku">
					<?php if($product->get_sku() !== ""): ?>
						<p class="stock-and-sku"><strong>SKU:</strong> <?= $product->get_sku(); ?></p>
					<?php endif; ?>
					<?php if($product->get_stock_quantity() === 0): ?>
						<p class="stock-and-sku"><strong>Disponibles:</strong> <span>Agotado</span></p>
					<?php elseif($product->get_stock_quantity() !== NULL && $product->get_stock_quantity() !== 0): ?>
						<p class="stock-and-sku"><strong>Disponibles:</strong> <?= $product->get_stock_quantity(); ?> Unidades</p>
					<?php endif; ?>
				</div>
				<div class="content-add-to-cart-single-product">
					<?php do_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 40 ); ?>
				</div>
				<div class="payment-method">
					<h3>Métodos de pago</h3>
					<div class="content-gallery">
						<?php if($add_payment_method): foreach($add_payment_method as $payment): ?>
							<img src="<?= $payment['image']['url']; ?>" alt="<?= $payment['image']['title']; ?>" title="<?= $payment['image']['title']; ?>">
						<?php endforeach; endif; ?>
					</div>
				</div>
				<a href="https://api.whatsapp.com/send?phone=57<?= get_field('numero_whatsapp_asesoria', 'option'); ?>&text=<?= get_field('mensaje', 'option'); ?> <?= get_the_title(); ?> <?= get_permalink() ?>" target="_blank" class="request-advice">
					<div>Solicitar asesoría</div>
				</a>
			</div>
		</div>
		<div class="row mt-5">
			<div class="col-12 col-md-7 mb-5 conten-description-single-product">
				<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
					<li class="nav-item" role="presentation">
						<a class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">
							Descripción
						</a>
					</li>
					<li class="nav-item" role="presentation">
						<a class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">
							<?php if(get_field('is_courses') === true): ?>
								Especificaciones
							<?php elseif($caracteristicas): ?>
								Características
							<?php endif; ?>
						</a>
					</li>
					<li class="nav-item" role="presentation">
						<a class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">
							FQA
						</a>
					</li>
				</ul>
				<div class="tab-content" id="pills-tabContent">
					<div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
						<?= $product->get_description(); ?>
					</div>
					<div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
						<?php if(get_field('is_courses') === true): ?>
							<p class="especificaciones"><strong>Intensidad:</strong> <?= $is_course['intensidad']; ?> Horas</p>
							<p class="especificaciones"><strong>Sesiones:</strong> <?= $is_course['sesiones']; ?></p>
							<p class="especificaciones"><strong>Horario:</strong> <?= $is_course['horario']; ?></p>
						<?php elseif($caracteristicas): ?> 
							<ul class="caracteristicas">
								<?php foreach($caracteristicas as $caracteristica): ?>
									<li>
										<strong><?= $caracteristica['nombre_de_caracteristica']; ?>:</strong>
										<?= $caracteristica['caracteristica']; ?>
									</li>
								<?php endforeach; ?>
							</ul> 
						<?php endif; ?>
					</div>
					<div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
						<?php if($preguntas_frecuentes): foreach($preguntas_frecuentes as $fqa): ?>
							<div class="questions">
								<h4><?= $fqa['pregunta']; ?></h4>
								<p><?= $fqa['respuesta']; ?></p>
							</div>
						<?php endforeach; endif; ?>
					</div>
				</div>
			</div>
			<div class="col-12 col-md-5 mb-5">
				<h4 class="title-related-product-single">Productos relacionados</h4>
				<?php 
					$categories = get_the_terms( $product->get_id(), 'product_cat' )[0]->slug;
					$producto = array('post_type' => 'product','product_cat' => $categories, "posts_per_page" => 2, "orderby" => "rand");
					$my_posts = get_posts($producto);
					foreach($my_posts as $item_product):
					if(get_the_title() !== $item_product->post_title){
				?>
					<div class="related-product">
						<?= do_shortcode('[product id='.$item_product->ID.']');?>
					</div>
				<?php } endforeach; ?>
			</div>
		</div>
	</div>
</div>
