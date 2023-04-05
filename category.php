<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#category
 *
 * @package Sanytize
 */

get_header();
?>

	<main id="primary" class="site-main">

	<section class="hero container-fluid d-flex justify-content-center align-items-start" style="background:url(/wp-content/uploads/2023/03/header-image-1.jpg)no-repeat center top; background-size:cover;">
		<div class="hero-bg" style="background:url(/wp-content/uploads/2023/03/header-decor.svg)no-repeat center top; background-size:cover;"></div>
		<h1 class="header text-darkblue auto-category"><?php echo single_cat_title(); ?></h1>
	</section>	
	<section class="category-subnav container-fluid">
		<div class="row">
	<?php 
	wp_nav_menu( [ 
		'theme_location'	=> 'productsubnav',
		'link_before'		=> '<div class="selected-icon"><img src="/wp-content/uploads/2023/03/product-subnav-selected-icon.svg" alt=""></div><div class="icon"></div><div class="label text-white">',
		'link_after'		=> '</div>'
	] ); 
	?>
		</div>
	</section>

	<div class="breadcrumbs container subnavPadding">
		<div class="row d-flex flex-row justify-content-start align-items-center">
	<?php
	if ( function_exists('yoast_breadcrumb') ) {
	yoast_breadcrumb( '<div id="breadcrumbs">','</div>' );
	}
	?>

	
		</div>
	</div>

	<script>
		const breadcrumbs = document.querySelectorAll('.breadcrumbs #breadcrumbs>span span ');

		for(let i = 0; i < breadcrumbs.length; i++){
			const bc = breadcrumbs[i];

			let newDiv = document.createElement('div')
			newDiv.classList.add('breadcrumb-connector');

			let newImg = document.createElement('img');
			newImg.src = '/wp-content/uploads/2023/03/breadcrump-connector.svg';

			newDiv.append(newImg);

			bc.parentNode.insertBefore(newDiv, bc);
		}
	</script>

<!--  NEEDS TO BE INJECTED INTO EVERY <a> tag in the :before position


		<div class="breadcrumb-connector">
			<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
			<path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
			</svg>
		</div>

		add .crumb to tag of link
-->


	<div class="gallery-items container d-grid justify-content-start">
		<?php
		// Get this category's items (include sub-category items)
		$category = get_category( get_query_var( 'cat' ) );
		$cat_id = $category->cat_ID;

		$cat_args = array(
			'posts_per_page'	=> -1,
			'category'			=> $cat_id
		);

		//$catPost = get_posts( $cat_id );
		$catPost = get_posts( $cat_args );


		foreach( $catPost as $cpost){
		?>

		<a href="<?php echo get_permalink($cpost->ID); ?>" class="product-item card d-flex flex-columns">
			<div class="img-container d-flex justify-content-center align-items-center">
				<img src="<?php echo get_field('product_gallery',$cpost->ID)[0]; ?>" alt="">
			</div>
			<div class="product-title justify-content-center">
				<div class="rounded">
				<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
					viewBox="0 0 370.4 29.7" style="enable-background:new 0 0 370.4 29.7;" xml:space="preserve">
				<style type="text/css">
					.arc{fill:#FF8729;}
				</style>
				<path id="Path_206_00000124131549489644477970000017807511852189101751_" class="arc" d="M0,29.7C0,29.7,111.7-0.5,185,0
					s185.4,29.7,185.4,29.7"/>
				</svg>
				</div>
				<h4 class="product-name text-darkblue"><?php echo $cpost->post_title; ?></h4>
			</div>
			<div class="card-footer justify-content-center d-flex background-orange">
				<p class="text-darkblue">View Product</p>
			</div>
		</a>
		<?php
		}
		?>
	</div>

	</main><!-- #main -->

<?php
get_footer();
