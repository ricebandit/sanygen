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
			<h1 class="header text-dakrblue">Search Results</h1>
		</section>

		<section class="breadcrumbs container flexible-content">
			<div class="row d-flex flex-row justify-content-start align-items-center">


			<a href="/" class="crumb">Home</a>

			<div class="breadcrumb-connector">
				<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
				<path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
				</svg>
			</div>

			<a href="/search" class="crumb">Search</a>

			<div class="breadcrumb-connector">
				<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
				<path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
				</svg>
			</div>

			<a href="#" class="crumb">Results for "<?php echo str_replace('+', ' ', $_GET['s']); ?>"</a>
			</div>
		</section>

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title">
					<?php
					/* translators: %s: search query. */
					printf( esc_html__( 'Search Results for: %s', 'sanytize' ), '<span>' . get_search_query() . '</span>' );
					?>
				</h1>
			</header><!-- .page-header -->

			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'search' );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

	</main><!-- #main -->

<?php
get_footer();
