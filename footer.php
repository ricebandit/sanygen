<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Sanytize
 */

?>

	<footer id="colophon" class="site-footer container-fluid background-blue p-md-5 p-2">
		<div class="container">

			<div class="row pb-5 pt-5">
				<div class="col-6 mb-4 order-2 col-md-3 col-xl-2 order-xl-1 col-xxl-2">
					<p class="p-lg">PRODUCTS</p>
					<?php wp_nav_menu( array( 'theme_location' => 'products' ) ); ?>
				</div>
				<div class="col-6 mb-4 order-3 col-md-3 col-xl-2 order-xl-2 col-xxl-2">
					<p class="p-lg">ABOUT US</p>
					<?php wp_nav_menu( array( 'theme_location' => 'aboutus' ) ); ?>
				</div>
				<div class="col-6 mb-4 order-4 col-md-3 col-xl-2 order-xl-3 col-xxl-2">
					<p class="p-lg">RESOURCES</p>
					<?php wp_nav_menu( array( 'theme_location' => 'resources' ) ); ?>
				</div>
				<div class="col-6 mb-4 order-5 col-md-3 col-xl-2 order-xl-4 col-xxl-2">
					<p class="p-lg">CONTACT US</p>
					<?php wp_nav_menu( array( 'theme_location' => 'contact' ) ); ?>
				</div>
				<div class="phone-numbers container mb-3 mt-3 order-1 col-xl-4 order-xl-5 mt-xl-0">
					<?php wp_nav_menu( array( 'theme_location' => 'phone' ) ); ?>
				</div>
			</div>

		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

<div class="offcanvas offcanvas-end" tab-index="-1" id="mobilemenu" aria-labelledby="mobilemenu-label">
	<div class="container-fluid mt-0 p-0">
		<div class="row justify-content-end">
			<div class="btn close">
			<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
				<path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z"/>
			</svg>
			</div>
		</div>
	<?php wp_nav_menu( array( 'theme_location' => 'menu-1' ) ); ?>
	</div>
</div>


<script>
	const close = document.querySelector('#mobilemenu .close');

	close.addEventListener('click', () => {
		const body = document.querySelector('body');
		const offCanvas = document.querySelector('#mobilemenu');

		offCanvas.classList.remove('show');

		body.classList.remove('fixed');
	});
	
</script>

</body>
</html>
