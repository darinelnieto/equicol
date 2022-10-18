   
<?php
/**
 * 
 * Template Name: archive-videos
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
get_header();
$banners = get_field('banners_videos', 'option');
?>
<main id="archive-videos-template-0c4b02">
    <section>
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-9 mb-4">
                    <div class="content-banner mb-3">
                        <?php
                            if($banners):
                            foreach($banners as $image):
                            if(get_queried_object()->name === $image['select_categoria']->name):
                                
                        ?>
                        <img src="<?= $image['banner']['url']; ?>" alt="<?= $image['banner']['title']; ?>" title="<?= $image['banner']['title']; ?>">
                        <?php
                            endif;
                            endforeach;
                            endif;
                        ?>
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
                    