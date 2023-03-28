<?php
    /**
    * Template Name: Front Page
    */


get_header();
?>

	<main id="primary" class="site-main">

	<section class="hero container-fluid d-flex align-items-center" style="background:url(<?php echo get_field('hero_image'); ?>)no-repeat center; background-size:cover;">
		<div class="bg-decor" style="background:url(<?php echo get_field('hero_image_decoration');?>)no-repeat center top; background-size:cover;"></div>
		<div class="container">
			<div class="row">
				<div class="left col-md-6">
					<h1 class="header text-darkblue"><?php echo get_field('hero_title'); ?></h1>
					<p class="text-darkblue"><?php echo get_field('hero_description'); ?></p>
					<a class="pill-cta orange" href="<?php echo get_field('hero_cta_url'); ?>"><?php echo get_field('hero_cta_text'); ?></a>
				</div>
			</div>
		</div>
	</section>

	<section class="products container-fluid d-flex align-items-start flex-column" style="background:url(<?php echo get_field('product_background'); ?>)no-repeat center top;background-size:100% auto;">
		<div class="container">
			<div class="container col-6">
				<h2 class="header text-darkblue"><?php echo get_field('products_title'); ?></h2>
				<p><?php echo get_field('products_description'); ?></p>

				<a href="<?php echo get_field('products_cta_url'); ?>" class="pill-cta orange"><?php echo get_field('products_cta_text'); ?></a>
			</div>
		</div>

		<div class="categories container d-grid">
			<?php 
				if( count( get_field('product_category_items') ) > 0 ){
					foreach( get_field('product_category_items') as $item ){
			?>

				<a class="card col-6 col-sm-4 border-0" href="<?php echo $item['category_url']; ?>">
					<div class="card-body d-flex">
						<div class="card-head d-flex justify-content-center">
							<img class="icon" src="<?php echo $item['category_icon']; ?>" alt="">
						</div>

						<div class="card-text-container align-items-center d-flex">
							<h4 class="text-white header-font m-auto"><?php echo $item['category_title']; ?></h4>
						</div>
					</div>
				</a>

			<?php
					}
				}
			?>

		</div>
	</section>

	<section class="guarantee container-fluid d-flex justify-content-center" style="background:url(<?php echo get_field('guarantee_background'); ?>)no-repeat center;background-size:cover;">
		
		<div class="container d-flex">
			<div class="row col-12">
				<div class="left col-6 d-flex align-items-center">
					<div class="gallery-background" style="background:url(<?php echo get_field('guarantee_gallery_bg'); ?>)no-repeat center;background-size:contain;"></div>

					<div class="gallery-player container p-0">
						
					<?php
						if( count(get_field('guarantee_image_gallery') ) > 0 ){
							$imgCnt = 0;

							foreach( get_field('guarantee_image_gallery') as $gallery_item){
					?>
							<div  id="img-<?php echo $imgCnt ?>" class="gallery-img" style="background:url(<?php echo $gallery_item['gallery_image']; ?>)no-repeat center;background-size:cover;"></div>

					<?php
								$imgCnt++;
							}
					?>
						<script src="/wp-content/themes/sanytize/js/gallery-loop.js"></script>

						<script>
							const imgs = document.querySelectorAll('.gallery-img');
							const gallery = new GalleryLooper(imgs, 2000);
							gallery.start();
						</script>
					<?php
						}
					?>
					</div>
				</div>
				<div class="right col-6">
					<div class="container">
						<img src="<?php echo get_field('guarantee_stamp_image'); ?>" alt="" class="stamp">
						<h2 class="header text-darkblue"><?php echo get_field('guarantee_title'); ?></h2>
						<p class="text-darkblue"><?php echo get_field('guarantee_text'); ?></p>
						<a href="<?php echo get_field('guarantee_cta_url'); ?>" class="pill-cta background-orange text-darkblue"><?php echo get_field('guarantee_cta_text'); ?></a>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="related container-fluid d-flex justify-content-center">
		<div class="background-split">
			<div class="row">
				<div class="col-6 left p-0" style="background:url(<?php echo get_field('related_links')[0]['link_background'] ?>)no-repeat center right; background-size:cover;"></div>
				<div class="col-6 right p-0" style="background:url(<?php echo get_field('related_links')[1]['link_background'] ?>)no-repeat center left; background-size:cover;"></div>
			</div>

		</div>
		<div class="container max-limited align-items-center d-flex">
			<div class="row d-flex justify-content-center">
				<div class="left col-6">
					<div class="row d-flex">
						<div class="col-3">
							<img src="<?php echo get_field('related_links')[0]['link_icon'] ?>" alt="" class="icon">
						</div>
						<div class="col-9">
							<h3 class="home-category-header text-darkblue"><?php echo get_field('related_links')[0]['link_title']; ?></h3>
							<p class="text-darkblue"><?php echo get_field('related_links')[0]['link_description']; ?></p>
							<a href="<?php echo get_field('related_links')[0]['link_cta_url']; ?>" class="link text-darkblue"><?php echo get_field('related_links')[0]['link_cta_text']; ?></a>
						</div>
					</div>
				</div>
				<div class="right col-6">
					<div class="row d-flex">
						<div class="col-3">
							<img src="<?php echo get_field('related_links')[1]['link_icon'] ?>" alt="" class="icon">
						</div>
						<div class="col-9">
							<h3 class="home-category-header text-darkblue"><?php echo get_field('related_links')[1]['link_title']; ?></h3>
							<p class="text-darkblue"><?php echo get_field('related_links')[1]['link_description']; ?></p>
							<a href="<?php echo get_field('related_links')[1]['link_cta_url']; ?>" class="link text-darkblue"><?php echo get_field('related_links')[1]['link_cta_text']; ?></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	</main><!-- #main -->

<?php
get_footer();
