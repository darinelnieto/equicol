   
<?php
/**
 * 
 * Partial Name: video-page-content
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
$posttype = get_queried_object();
if(!$posttype->taxonomy){
    $videos = new WP_Query(array('post_type' => 'videos', 'post_status' => 'publish', 'posts_per_page' => -1, 'orderby' => 'title', 'order' => 'ASC'));
}else{
    $category = get_queried_object()->slug;
    $videos = new WP_Query(array('post_type' => 'videos', 'post_status' => 'publish', 'tax_query' => array(array( 'taxonomy' => 'categoria','field' => 'slug', 'terms' => $category )), 'posts_per_page' => 12, 'orderby' => 'title', 'order' => 'ASC'));
}
?>
<div class="video-page-content-partial-bdb9b2">
    <div class="content-videos">
        <div class="row">
            <?php
                if($videos->have_posts()):
                while($videos->have_posts()):
                $videos->the_post();
                $feature_image = get_field('imagen_destacada_del_video', $videos->ID);
                $video = get_field('video', $videos->ID);
            ?>
                <div class="col-6 col-md-4 col-lg-3 mb-4">
                    <div class="content-feature">
                        <img src="<?= $feature_image['url']; ?>" alt="<?= $feature_image['title']; ?>" class="image-feature">
                        <img src="<?= home_url(); ?>/wp-content/uploads/2022/09/youtube-icono.png" alt="Icono play" class="play">
                        <p><?= the_title($videos->ID); ?></p>
                    </div>
                    <div class="content-video">
                        <div class="video">
                            <div class="close"><i class="fa fa-xmark"></i></div>
                            <div class="ifrem">
                                <?= $video; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <script>
                    $('.close').on('click', function(){
                        $(this).parent().children('.ifrem').html('<?= $video; ?>');
                        $(this).parent().parent().removeClass('active');
                    })
                </script>
            <?php 
                endwhile;
                wp_reset_postdata();
            endif;
            ?>
        </div>
    </div>
</div>
                    