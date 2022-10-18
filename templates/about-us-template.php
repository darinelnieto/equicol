   
<?php
/**
 * 
 * Template Name: about-us
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
get_header();
$desktop_banner = get_field('banner_desktop');
$banner_movil = get_field('banner_movil');
$gallery = get_field('gallery');
?>
<main id="about-us-template-49ee58">
    <!-- Banner content -->
    <section class="content-banner">
        <img src="<?= $desktop_banner['url'] ?>" alt="<?= $desktop_banner['title'] ?>" class="desktop">
        <img src="<?= $banner_movil['url'] ?>" alt="<?= $banner_movil['title'] ?>" class="movil">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6 content-description">
                    <p>Somos</p>
                    <h1>Inversiones equicol</h1>
                    <p><?= get_field('descipcion_corta'); ?></p>
                </div>
            </div>
        </div>
    </section>
    <!-- Content about -->
    <section class="about-content">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-md-6 col-lg-7 content-left">
                    <h2>Acerca de nosotros</h2>
                    <p><?= get_field('descripcion_sobre_nosotros'); ?></p>
                </div>
                <div class="col-12 col-md-6 col-lg-5 content-gallery">
                    <div class="owl-carousel gallery-about-us">
                        <?php if($gallery): foreach($gallery as $image): ?>
                            <div class="gallery">
                                <img src="<?= $image['url']; ?>" alt="<?= $image['title']; ?>" title="<?= $image['title']; ?>">
                            </div>
                        <?php endforeach; endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Services -->
    <?php
    $services =  get_field('contenido_de_servicios');
    $whatsapp = get_field('numero_de_whatsapp');
    $message = get_field('mensaje_whatsapp');
    ?>
    <?php if($services): ?>
    <section class="services">
        <div class="container">
            <div class="row">
                <div class="col-12 mb-4">
                    <h2>Nuestros servicios</h2>
                </div>
                <div class="col-12">
                    <div class="owl-carousel services-slide">
                        <?php foreach($services as $service): ?>
                            <div class="service">
                                <img src="<?= $service['imagen_servicio']['url']; ?>" alt="<?= $service['imagen_servicio']['title']; ?>" title="<?= $service['imagen_servicio']['title']; ?>">
                                <div class="content-description">
                                    <h4><?= $service['nombre_de_servicio'] ?></h4>
                                    <p><?= $service['descripcion_corta'] ?></p>
                                    <a href="https://api.whatsapp.com/send?phone=57<?= $whatsapp; ?>&text=<?= $message; ?> <?= $service['nombre_de_servicio'] ?>" target="blank">
                                        Solicitar más información
                                    </a>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php endif; ?>
    <!-- Map location -->
    <?php
        $informacion = get_field('agregar_informacion');
    ?>
    <section class="location-map">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-md-6 col-lg-7 content-map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15864.693206382788!2d-75.571749!3d6.2408769!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x2657673393448550!2sEQUIMASTER!5e0!3m2!1ses!2sco!4v1662924738337!5m2!1ses!2sco" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <div class="col-12 col-md-6 col-lg-5 content-sight">
                    <?php if($informacion): foreach($informacion as $content): ?>
                    <p><?= $content['icono_de_fontawesome']; ?> <span> <strong><?= $content['nombre']; ?>:</strong> <?= $content['informacion']; ?></span></p>
                    <?php endforeach; endif; ?>
                </div>
            </div>
        </div>
    </section>
    <!-- comments -->
    <?php $comments = get_field('agregar_comentario'); if($comments): ?>
    <section class="comments">
        <div class="container">
            <div class="row">
                <div class="col-12 mb-4">
                    <h2>Lo que dicen de nosotros</h2>
                </div>
                <div class="col-12">
                    <div class="owl-carousel comments-slide">
                        <?php foreach($comments as $comment): ?>
                            <div class="comment">
                                <h4><i class="fa-solid fa-user"></i> <span><?= $comment['nombre_usuario']; ?></span></h4>
                                <p><?= $comment['comentario']; ?></p>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <style>
        .owl-stage .owl-item:nth-child(2n+1) .comment{
            background-image: url(<?= get_field('fondo_izquierda'); ?>);
        }
        .owl-stage .owl-item:nth-child(2n) .comment{
            background-image: url(<?= get_field('fondo_derecha'); ?>);
        }
    </style>
    <?php endif; ?>
    <!-- Novedades -->
    <?php 
        $novedades =  new WP_Query( array('post_type' => 'post', 'posts_per_page' => 2, 'order' => 'DESC') );
    ?>
    <section class="novedades">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2>Novedades</h2>
                </div>
                <?php if($novedades->have_posts()): while($novedades->have_posts()): $novedades->the_post(); ?>
                    <div class="col-12 col-md-6 content-post">
                        <div class="content-feature">
                            <?= get_the_post_thumbnail($novedades->ID) ?>
                        </div>
                        <div class="content-description">
                            <h3><?= get_the_title($novedades->ID); ?></h3>
                            <p><?= get_field('descripcion_corta', $novedades->ID) ?></p>
                            <a href="<?= get_permalink(); ?>">Leer más</a>
                        </div>
                    </div>
                <?php endwhile; endif; ?>
            </div>
        </div>
    </section>
</main>
<?php get_footer(); ?>
                    