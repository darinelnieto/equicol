<?php
/**
 * 
 * Footer template.
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
$logo = get_field('logo_footer', 'option');
$social_networks = get_field('social_networks', 'option');
?>

<footer id="footer-wrapper">
    <!-- suscribe -->
    <section class="suscribe">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h4><?= get_field('intro_form', 'option') ?></h4>
                </div>
                <div class="col-12 col-md-10 offset-md-1">
                    <?= do_shortcode(get_field('shortcode_form', 'option')) ?>
                </div>
            </div>
        </div>
    </section>
    <!-- End suscribe -->
    <!-- Content footer -->
    <section class="content-footer">
        <div class="container">
            <div class="row pt-5 pb-4">
                <div class="col-12 col-md-6 col-lg-4 content-left">
                    <img src="<?= $logo['url'] ?>" alt="Logo Equicol" title="Logo Equicol" class="logo">
                    <p><?= get_field('description_footer', 'option') ?></p>
                </div>
                <div class="col-12 col-md-6 col-lg-4 content-center">
                    <h2>Contáctenos</h2>
                    <p><?= get_field('contact', 'option') ?></p>
                </div>
                <div class="col-12 col-md-6 col-lg-2 redes">
                    <h2>Síguenos</h2>
                    <?php if($social_networks): foreach($social_networks as $social): ?>
                        <a href="<?= $social['link']; ?>" target="_blank">
                            <img src="<?= $social['icono']['url']; ?>" alt="<?= $social['icono']['title']; ?>" class="icono">
                        </a>
                    <?php endforeach; endif; ?>
                </div>
                <div class="col-12 col-md-6 col-lg-2 novedades">
                    <h2>Novedades</h2>
                    <?php
                        wp_nav_menu([
                            'menu'  		  => 'Menu footer',
                            'container'       => '',
                        ]);
                    ?>
                </div>
            </div>
            <div class="row copy-right">
                <div class="col-12 text-center">
                    <p><?= get_field('copy', 'option'); ?></p>
                </div>
            </div>
        </div>
    </section>
    <!-- End content footer -->
</footer>

</div> <!-- -Page container -->

<?php wp_footer(); ?>
</body>
</html>