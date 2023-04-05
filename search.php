<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Sanytize
 */

get_header();
?>

	<main id="primary" class="site-main search-results">

		<section class="hero container-fluid d-flex justify-content-center align-items-start" style="background:url(/wp-content/uploads/2023/03/header-image-1.jpg)no-repeat center top; background-size:cover;">
			<div class="hero-bg" style="background:url(/wp-content/uploads/2023/03/header-decor.svg)no-repeat center top; background-size:cover;"></div>
			<h1 class="header text-darkblue">Search Results</h1>
		</section>

		<div class="content-container container-fluid">
			<div class="bg">
				<div class="left"></div>
				<div class="right"></div>
			</div>

			<section class="breadcrumbs container flexible-content">
				<div class="row d-flex flex-row justify-content-start align-items-center">
					<div id="breadcrumbs">
						<span>
							<div class="breadcrumb-connector">
								<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
								<path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
								</svg>
							</div>
							<span><a href="/" class="crumb">Home</a></span>

							<div class="breadcrumb-connector">
								<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
								<path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
								</svg>
							</div>	

							<span><a href="/search" class="crumb">Search</a></span>

							<div class="breadcrumb-connector">
								<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
								<path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
								</svg>
							</div>

							<span class="crumb breadcrumb_last">Results for "<?php echo str_replace('+', ' ', $_GET['s']); ?>"</span>
						</span>
					</div>
				</div>
			</section>

		<?php if ( have_posts() ) : ?>
		<section class="container-fluid product-content">
			<div class="container d-grid">
			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				//$post_id = get_the_ID();
			?>
			<a href="<?php echo get_the_permalink(); ?>" class="item col-4 d-flex">
				<h4 class="text-darkblue"><?php echo get_field('product_name', $post_id); ?></h4>

				<p class="text-darkblue description"><?php echo get_the_excerpt(); ?></p>
			</a>


			<?php

			endwhile;
			

			else :

				get_template_part( 'template-parts/content', 'none' );

			endif;
			?>

			</div>
		</section>

		<section class="container-fluid pagination">
			<div class="container d-flex justify-content-left">
				<?php search_pagination(); ?>
			</div>
		</section>
		</div>
		

	</main><!-- #main -->

<?php
get_footer();
