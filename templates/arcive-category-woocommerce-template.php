   
<?php
/**
 * 
 * Template Name: arcive-category-woocommerce
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
get_header();
$banner = get_field('add_banners_categories', 'option');
?>
<main id="arcive-category-woocommerce-template-e8a908">
    <section>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <?php do_action( 'woocommerce_before_main_content' ); ?>
                </div>
            </div>
            <div class="row align-items-star">
                <div class="col-12 col-md-3 content-left">
                    <?php get_sidebar('Filtro de precios'); ?>
                    <div class="categories">
                        <h2>Categorías</h2>
                        <?php
                            wp_nav_menu([
                                'menu'  		  => 'Categories',
                                'container'       => '',
                            ]);
                        ?>
                    </div>
                </div>
                <div class="col-12 col-md-9">
                    <div class="content-banner mb-4">
                        <?php
                            if($banner):
                            foreach($banner as $image):
                            if(get_queried_object()->name === $image['category']->name):
                                
                        ?>
                        <img src="<?= $image['banner']['url']; ?>" alt="<?= $image['banner']['title']; ?>" title="<?= $image['banner']['title']; ?>">
                        <?php
                            endif;
                            endforeach;
                            endif;
                        ?>
                    </div>
                    <div class="content-product-cat">
                        <?php
                            the_content();
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<?php get_footer(); ?>
                    