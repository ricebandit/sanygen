<?php
/**
 * The template for displaying all single posts
 *
 * Template Name: Product Post
 * Template Post Type: post
 *
 * @package Sanytize
 */

get_header();
?>

	<main id="primary" class="site-main">

	<?php
	if ( function_exists('yoast_breadcrumb') ) {
	yoast_breadcrumb( '<div id="breadcrumbs">','</div>' );
	}
	?>


	</main><!-- #main -->

<?php
get_footer();
