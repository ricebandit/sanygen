<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Sanytize
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body id="sanygen" <?php body_class(); ?> onload="windowLoaded()">
<?php wp_body_open(); ?>
<div id="page" class="site">

	<header class="site-header">
		<div class="desktop container-fluid d-none d-md-block">
			<div class="row">
				<div class="logo"><a href="/"><img src="/wp-content/uploads/2023/03/sanygen-logo.svg" alt=""></a></div>

				<nav class="main-navigation justify-content-end">
					<?php wp_nav_menu( array('theme_location' => 'secondary-nav' ) ); ?>
					
					<div class="navbar navbar-expand-md">
					<?php
					wp_nav_menu(
						array(
							'container_class' => 'menu-main-nav-container collapse navbar-collapse justify-content-end',
							'theme_location' => 'menu-1',
							'menu_id'        => 'primary-menu',
							'menu_class'				=> 'navbar-nav'
						)
					);
					?>
					</div>
				</nav><!-- #site-navigation -->
			</div>
		</div>

		<div class="mobile container-fluid d-block d-md-none">
			<div class="row justify-content-between align-items-center">
				<div class="logo"><a href="/"><img src="/wp-content/uploads/2023/03/sanygen-logo.svg" alt=""></a></div>

				<div class="btn hamburger" data-bs-toggle="offcanvas" role="button" aria-controls="mobile-menu">
					<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
  						<path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
					</svg>
				</div>

			

			</div>
		</div>
	</header><!-- #masthead -->



	
