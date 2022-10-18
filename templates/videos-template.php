   
<?php
/**
 * 
 * Template Name: videos
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
get_header();
$banner = get_field('banner_video');
?>
<main id="videos-template-7a8016">
    <section>
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-9 mb-4">
                    <div class="content-banner">
                        <img src="<?= $banner['url'] ?>" alt="Banner de <?= the_title(); ?>">
                    </div>
                    <?php get_template_part('partials/video-page-content'); ?>
                </div>
                <div class="col-12 col-md-3 mb-4">
                    <?php get_template_part('partials/videos-categories'); ?>
                </div>
            </div>
        </div>
    </section>
</main>
<?php get_footer(); ?>
                    