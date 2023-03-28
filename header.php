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

<body id="sanygen" <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">

	<header class="site-header">
		<div class="container-fluid d-none d-md-block">
			<div class="row">
				<div class="logo"><a href="/"><img src="/wp-content/uploads/2023/03/sanygen-logo-fpo.png" alt=""></a></div>

				<nav class="main-navigation justify-content-end">
					<?php wp_nav_menu( array( 'theme_location' => 'secondary-nav' ) ); ?>
					
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'menu-1',
							'menu_id'        => 'primary-menu',
						)
					);
					?>
				</nav><!-- #site-navigation -->
			</div>
		</div>

		<div class="container-fluid d-block d-md-none">
			<div class="row justify-content-between align-items-center">
				<div class="logo"><a href="/"><img src="/wp-content/uploads/2023/03/sanygen-logo-fpo.png" alt=""></a></div>

				<div class="btn hamburger" data-bs-toggle="offcanvas" role="button" aria-controls="mobile-menu">
					<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
  						<path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
					</svg>
				</div>

				
				<!--
				OFFCANVAS
				-->
				<script>
					
					const hamburger = document.querySelector('.hamburger');
					

					hamburger.addEventListener( 'click', (evt)=>{
						const body = document.querySelector('body');
						const offCanvas = document.querySelector('#mobilemenu');

						offCanvas.classList.add('show');

						setTimeout( () => {
							body.classList.add('fixed');
						}, 100);
						
					});

				</script>

			</div>
		</div>
	</header><!-- #masthead -->


	
