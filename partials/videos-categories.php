   
<?php
/**
 * 
 * Partial Name: videos-categories
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
?>
<div class="videos-categories-partial-bd00c4">
    <div class="content-categories">
        <h2>Categorías de videos</h2>
        <?php 
            wp_nav_menu([
                'menu'            => 'Categorias videos',
                'theme_location'  => 'Categorias videos',
                'container'       => 'div',
                'menu_class'      => 'main-menu-list',
            ]);
        ?>
    </div>
    <div class="contentt-showt-curses">
        <h2><?= get_field('title_message', 'option'); ?></h2>
        <p><?= get_field('message', 'option'); ?></p>
        <a href="<?= home_url(); ?>/product-category/<?= get_field('page_link', 'option')->slug ?>">
            Ver cursos
        </a>
    </div>
</div>
                    