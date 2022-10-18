   
<?php
/**
 * 
 * Template Name: work-with-us
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
get_header();
?>
<main id="work-with-us-template-39b3c6">
    <section>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- falta miga de pan -->
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-lg-7 content-left">
                    <img src="<?= get_field('imagen_trabaja_con_nosotros')['url']; ?>" alt="Imagen trabaja con nosotros">
                </div>
                <div class="col-12 col-lg-5 content-right pt-lg-3">
                    <h1><?= get_field('titulo_formulario'); ?></h1>
                    <p class="intro"><?= get_field('introduccion_formulario'); ?></p>
                    <div class="content-form">
                        <?= do_shortcode(get_field('shortcode_formulario')); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<?php get_footer(); ?>