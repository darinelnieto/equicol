<?php
/**
 * 
 * Default page.
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();
$posttype = get_queried_object();
?>

<?php 
switch($posttype->taxonomy){
	case 'product_cat':
		get_template_part('templates/arcive-category-woocommerce-template');
	break;
	case 'category':
		get_template_part('templates/archive-category-template');
	break;
	case 'categoria':
		get_template_part('templates/archive-videos-template');
	break;
}
if(!$posttype->taxonomy){ ?>
	<main id="dito-page">
		<section>
			<div class="container">
				<div class="row">
					<div class="col-12 mb-4">
						<?php do_action( 'woocommerce_before_main_content' ); ?>
					</div>
					<div class="col-12 mt-3">
						<?= the_content(); ?>
					</div>
				</div>
			</div>
		</section>
	</main>
<?php } ?>

<?php get_footer(); ?>