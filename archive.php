<?php
/**
 * 
 * Default archive.
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();
$posttype = get_queried_object();
?>
<?php
switch($posttype->taxonomy){
	case 'categoria':
		get_template_part('templates/archive-videos-template');
	break;
}
?>
<?php get_footer(); ?>