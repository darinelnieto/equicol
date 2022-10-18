<?php
/**
 * 
 * Header.
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>
<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title><?php wp_title('|', true, 'right'); ?> <?php bloginfo('name'); ?></title>
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="viewport" content="width=device-width">
  <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
  <?php wp_head(); ?>
  <script>
    const _dittoURI_ = "<?= get_template_directory_uri() ?>",
          _dittoURL_ = "<?= get_site_url() ?>";
  </script>
</head>

<body <?php body_class(); ?>>
<div id="page"> <!-- +Page container -->

  <header id="header-wrapper">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-6 col-md-3">
          <?= get_custom_logo(); ?>
        </div>
        <div class="col-6 col-md-6 col-lg-4 offset-md-3 offset-lg-5 text-right content-right-header">
          <?php aws_get_search_form( true ); ?>
          <div class="bar-menu">
            <span class="top"></span>
            <span class="center"></span>
            <span class="bottom"></span>
          </div>
          <a href="<?= home_url(); ?>/cart" class="car-btn"><i class="fa-solid fa-cart-shopping"></i></a>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <div class="search-movil">
            <?php aws_get_search_form( true ); ?>
          </div>
          <?php 
              wp_nav_menu([
                  'menu'            => 'Menu header',
                  'theme_location'  => 'Menu header',
                  'container'       => 'div',
                  'menu_class'      => 'main-menu-list',
              ]);
          ?>
        </div>
      </div>
    </div>
  </header>