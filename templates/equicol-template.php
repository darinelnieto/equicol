   
<?php
/**
 * 
 * Template Name: equicol
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
get_header();
$banner = get_field('carousel');
$categories =  get_field('add_categories');
$background_parallax =  get_field('background_parallax');
$main_image_parallax = get_field('main_image_parallax');
$content_right_parallax = get_field('content_right_parallax');
$our_clients = get_field('our_clients');
?>
<main id="equicol-template-09006d">
    <!-- Content banner -->
    <section class="banner">
        <div class="owl-carousel slide-banner owl-theme">
            <?php if($banner): foreach($banner as $content): ?>
                <?php if($content['add_link'] === true): ?>
                    <a href="<?= $content['link_banner']['url']; ?>">
                <?php endif; ?>
                <div class="item">
                    <img src="<?= $content['image']['url']; ?>" alt="<?= $content['image']['title']; ?>" class="desktop">
                    <img src="<?= $content['image_movil']['url']; ?>" alt="<?= $content['image_movil']['title']; ?>" class="movil">
                </div>
                <?php if($content['add_link'] === true): ?>
                    </a>
                <?php endif; ?>
            <?php endforeach; endif; ?>
        </div>
    </section>
    <!-- End content banner -->
    <!-- Categories content -->
    <section class="content-categories">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2>Esto te puede interesar</h2>
                    <div class="owl-carousel slide-category-home">
                        <?php if($categories): foreach($categories as $category): ?>
                            <div class="item text-center">
                                <a href="<?= home_url(); ?>/product-category/<?= $category['category']->slug; ?>">
                                    <div class="content-image">
                                        <img src="<?= $category['image']['url']; ?>" alt="<?= $category['image']['title']; ?>">
                                    </div>
                                    <h4><?= $category['category']->name; ?></h4>
                                </a>
                            </div>
                        <?php endforeach; endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End categories content -->
    <!-- Courses content -->
    <?php
        $courses =  new WP_Query( array('post_type' => 'product', 'product_cat' => 'cursos', 'posts_per_page' => 8, 'order' => 'DESC') );
    ?>
    <section class="courses-content">
        <div class="container">
            <div class="row">
                <div class="col-12 mb-4 content-top">
                    <h2>Cursos</h2>
                    <a href="<?= home_url(); ?>/product-category/cursos">Ver más <i class="fa fa-chevron-right"></i></a>
                </div>
                <div class="col-12">
                    <div class="owl-carousel courses-slide">
                        <?php
                            if($courses->have_posts()):
                                while($courses->have_posts()) {
                                    $courses->the_post();
                        ?>
                        <div class="item">
                            <?php woocommerce_get_template_part( 'content', 'product' ); ?>
                        </div>
                        <?php
                                }
                                wp_reset_postdata();
                            endif;
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End courses content -->
    <!-- Content parallax -->
    <section class="content-paralax" style="background-image:url(<?= $background_parallax; ?>)">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-md-6 content-left-image">
                    <img src="<?= $main_image_parallax['url'] ?>" alt="<?= $main_image_parallax['title'] ?>">
                </div>
                <div class="col-12 col-md-6 content-right">
                    <h2><?= $content_right_parallax['title']; ?></h2>
                    <p><?= $content_right_parallax['description']; ?></p>
                    <?php if($content_right_parallax['add_link'] === true): ?>
                        <a href="<?= $content_right_parallax['link']['url'] ;?>">
                            <p><?= $content_right_parallax['link']['title'] ;?></p>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
    <!-- End content parallax -->
    <!-- Recent products -->
    <?php $recent_products =  new WP_Query( array('post_type' => 'product', 'posts_per_page' => 10, 'order' => 'DESC') ); ?>
    <section class="content-recente-products">
        <div class="container">
            <div class="row">
                <div class="col-12 content-top mb-5">
                    <h2>Productos recientes</h2>
                    <a href="<?= home_url() ?>/shop">Ver más <i class="fa fa-chevron-right"></i></a>
                </div>
                <div class="col-12">
                    <div class="owl-carousel recent-products">
                        <?php 
                            if($recent_products->have_posts()):
                                while($recent_products->have_posts()):
                                    $recent_products->the_post();
                                    $terms = get_the_terms( $recent_products->ID, 'product_cat' );
                                    if($terms[0]->slug !== 'cursos'):
                        ?>
                        <div class="item">
                            <?php woocommerce_get_template_part( 'content', 'product' ); ?>
                        </div>
                        <?php
                                endif;
                                endwhile;
                                wp_reset_postdata();
                            endif;
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End recent products -->
    <!-- Our clients -->
    <section class="our-clients-content">
        <div class="container">
            <div class="row">
                <div class="col-12 content-top mb-5">
                    <h2>Algunos de nuestros clientes</h2>
                </div>
                <div class="col-12">
                    <div class="owl-carousel our-clients">
                        <?php if($our_clients): foreach($our_clients as $client): ?>
                            <div class="item">
                                <div class="content-image">
                                    <img src="<?= $client['select_image']['url']; ?>" alt="<?= $client['select_image']['title']; ?>" title="<?= $client['select_image']['title']; ?>">
                                </div>
                            </div>
                        <?php endforeach; endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End our clients -->
</main>
<?php get_footer(); ?>
