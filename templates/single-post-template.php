   
<?php
/**
 * 
 * Template Name: single-post
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
get_header();
$feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
?>
<main id="single-post-template-51c44f">
    <section class="content-blog">
        <div class="container">
            <div class="row">
                <div class="col-12 mb-3">
                    <div class="content-banner" style="background-image:url(<?= $feat_image; ?>)">
                        <h1><?= the_title(); ?></h1>
                    </div>
                </div>
                <div class="col-12">
                    <?= the_content(); ?>
                </div>
            </div>
        </div>
    </section>
</main>
<?php get_footer(); ?>
                    