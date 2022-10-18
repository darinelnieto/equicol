<?php
/**
 * 
 * Default single.
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();
?>

	<?php
		while ( have_posts() ) :
			the_post();

			if( $product){ ?>
				<main id="ditto-single">
				<?php get_template_part( 'woocommerce/content-single-product', 'page' ); ?>
				</main>
			<?php }else{
				get_template_part( 'templates/single-post-template', 'page' );
			}

		endwhile; // End of the loop.
	?>


<?php get_footer(); ?>