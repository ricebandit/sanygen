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
		'link_after'		=> '</div><div class="parent-arrow"></div>'
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


	<div class="gallery-items container d-grid justify-content-start">
		<?php
		// Get this category's items (include sub-category items)
		$category = get_category( get_query_var( 'cat' ) );
		$cat_id = $category->cat_ID;

		if($cat_id === 13){
			$cat_id = 0;
		}

		global $paged_n;

		$postsPerPage = 24;

		$cat_args = array(
			'posts_per_page'	=> $postsPerPage,
			'category'			=> $cat_id,
			'paged'				=> $paged_n,
		);

		$catPost = new WP_Query( $cat_args );

		foreach( $catPost->posts as $cpost){
			
		?>

		<a href="<?php echo get_permalink($cpost->ID); ?>" class="product-item card d-flex flex-columns">
			
			<div class="img-container d-flex justify-content-center align-items-center" style="background:url(<?php echo get_field('product_gallery',$cpost->ID)[0]; ?>)no-repeat center; background-size:contain;">
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

	<section class="container-fluid pagination">
		<div class="container d-flex justify-content-left">
			<?php 

				category_pagination($catPost, $paged_n); 
			?>
		</div>
	</section>

	</main><!-- #main -->

<?php
get_footer();
