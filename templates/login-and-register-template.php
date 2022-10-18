   
<?php
/**
 * 
 * Template Name: login-and-register
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
get_header();
$banner =  get_field('banner');
?>
<main id="login-and-register-template-a000f9" style="background-image:url(<?= $banner ?>)">
    <section>
        <div class="container">
            <div class="row pt-5 pb-5">
                <div class="col-12 col-md-8 offset-md-2 col-lg-6 offset-lg-3 text-center">
                    <?= the_content(); ?>
                </div>
            </div>
        </div>
    </section>
</main>
<?php get_footer(); ?>
                    