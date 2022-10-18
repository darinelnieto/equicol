   
<?php
/**
 * 
 * Template Name: blog
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
get_header();
if ( get_query_var( 'paged' ) ) {
    $paged = get_query_var( 'paged' );
 } else if ( get_query_var( 'page' ) ) {
    // This will occur if on front page.
    $paged = get_query_var( 'page' );
 } else {
     $paged = 1;
 }
$blog = new WP_Query( array('post_type' => 'post', 'posts_per_page' => 12, 'paged' => $paged, 'order' => 'DESC') );
?>
<main id="blog-template-9e24e0">
    <section class="banner">
        <div class="container">
            <div class="row">
                <div class="col-12 mb-5" style="background-image:url(<?= get_field('banner')['url']; ?>)">
                    <h1>Novedades</h1>
                </div>
            </div>
        </div>
    </section>
    <section class="content-blog">
        <div class="container">
            <div class="row">
                <?php if($blog->have_posts()): while($blog->have_posts()): $blog->the_post(); $description = get_field('descripcion_corta', $blog->ID); ?>
                    <div class="col-12 col-md-4 col-lg-3 mb-3">
                        <a href="<?= get_permalink(); ?>">
                            <div class="content-image">
                                <?= get_the_post_thumbnail($blog->ID) ?>
                                <p><?= get_the_date('F d, Y', $blog->ID); ?></p>
                            </div>
                            <div class="conent-text">
                                <h4><?= get_the_title($blog->ID); ?></h4>
                                <p><?= $description; ?></p>
                            </div>
                        </a>
                    </div>
                <?php endwhile; wp_reset_postdata(); endif; ?>
                <div class="col-12 text-center content-paginate">
                    <?php 
                        printf( '<div>%s</div>', get_previous_posts_link( '<i class="fa fa-angle-left"></i> Anterior', $blog->max_num_pages ) );
                        printf( '<div>%s</div>', get_next_posts_link( 'Siguiente <i class="fa fa-angle-right"></i>', $blog->max_num_pages ) );
                    ?>
                </div>
            </div>
        </div>
    </section>
</main>
<?php get_footer(); ?>
                    