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

	<section class="body-container container-fluid">
		
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

		<div id="product" class="container d-flex flex-column flex-md-row p-0">
			<div class="left col-12 col-md-6 d-flex flex-column p-3">
				
				<div class="product-gallery">
					<div class="img-container d-flex justify-content-center align-items-center">
						<div class="bg"></div>
						<div class="images">
							<?php 

								$i = 0;
								foreach( get_field('product_gallery') as $img ){
									$selectState = '';
									if( $i == 0){
										$selectState = 'selected';
									}
							?>

							<div id="g-img-<?php echo $i ?>" class="g-image <?php echo $selectState; ?>" style="background:url(<?php echo $img; ?>)no-repeat center; background-size:contain;"></div>
							<?php
									$i++;
								}
							?>
						</div>
					</div>

					<div class="thumbnails d-flex justify-content-center">
						<div class="arrow-container prev">
							<div class="glider-arrow glider-prev disabled" aria-disabled="true"></div>
						</div>

						<ul>
							<?php 

								$i = 0;
								foreach( get_field('product_gallery') as $imgth ){
									$selectState = '';
									if( $i == 0){
										$selectState = 'selected';
									}
							?>
							<li class="img-thumb  <?php echo $selectState; ?>" data-img="g-img-<?php echo $i ?>">
								<div class="thumb-img-container">
									<img src="<?php echo $imgth; ?>" alt="" class="src">
								</div>
								
							</li>
							<?php
									$i++;
								}
							?>
						</ul>

						<div class="arrow-container next">
							<div class="glider-arrow glider-next disabled" aria-disabled="true"></div>
						</div>
					</div>

				</div>
			</div>
			<div class="right col-12 col-md-6 d-flex flex-column p-3">
				<h1 class="text-darkblue"><?php echo get_field('product_name'); ?></h1>
				<h3 class="code text-darkblue body-font">Item #<?php echo get_field('product_code'); ?></h3>

				<div class="description text-darkblue"><?php echo get_field('product_description'); ?></div>
				
				<div class="links">
				<?php
				foreach( get_field('product_links') as $link ){
					
					if($link['link_type'] == 'file'){
						?>
							<a href="<?php echo $link['link_file']; ?>" target="_blank" class="link bold text-darkblue"><?php echo $link["link_text"]; ?></a>
						<?php
					}else{
						?>
							<a href="<?php echo $link['link_url']; ?>" target="_blank" class="link bold text-darkblue"><?php echo $link["link_text"]; ?></a>
						<?php
					}
				}
				?>
				</div>

				<h3 class="pricing text-darkblue bold">Pricing Information</h3>

				<div class="pricing_description text-darkblue"><?php echo get_field('pricing_description'); ?></div>

				<a href="<?php echo get_field('cta_url'); ?>" class="pill-cta orange"><?php echo get_field('cta_text'); ?></a>


			</div>
		</div>


	</section>

	<section id="related-section" class="container-fluid">
		<div class="bg d-flex">
			<div class="left col-6"></div>
			<div class="right col-6"></div>
		</div>
		<div class="content-items container d-flex flex-column align-items-start">
			<h2 class="related-title text-darkblue"><?php echo get_field('related_title'); ?></h2>

			<div class="related-items container d-grid justify-content-start">
				<?php
				$relatedproducts = get_field('related');



				foreach( $relatedproducts as $post){

				?>

				<a href="<?php echo get_permalink($post['product_item']->ID); ?>" class="product-item card d-flex flex-columns">
					<div class="bg"></div>
					<div class="img-container d-flex justify-content-center align-items-center">
						<img src="<?php echo get_field('product_gallery',$post['product_item']->ID)[0]; ?>" alt="">
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
						<h4 class="product-name text-darkblue"><?php echo $post['product_item']->post_title; ?></h4>
					</div>
					<div class="card-footer justify-content-center d-flex background-orange">
						<p class="text-darkblue">View Product</p>
					</div>
				</a>
				<?php
				}
				?>
			</div>
		</div>
	</section>


	</main><!-- #main -->

<?php
get_footer();
