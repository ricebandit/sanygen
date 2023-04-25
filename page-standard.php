<?php
    /**
    * Template Name: Standard Page
    */


get_header();
?>

	<main id="primary" class="site-main">

		<section class="hero container-fluid d-flex justify-content-center align-items-start" style="background:url(<?php echo get_field('header_background'); ?>)no-repeat center top; background-size:cover;">
			<div class="hero-bg" style="background:url(<?php echo get_field('header_decorative_image'); ?>)no-repeat center top; background-size:cover;"></div>
			<h1 class="header text-darkblue standard"><?php echo get_field('header_text'); ?></h1>
		</section>

		<?php
			/*
			SHOW PRODUCT CATEGORY SUB NAV IF TOGGLED ON
			*/

			$showNav = false;
			if(get_field('display_category_nav') === true){
			
				$showNav = true;
		?>
		<section class="category-subnav container">
			<div class="row">
				<div class="subnav col-md-10 offset-md-1 col-lg-8 offset-lg-2 background-blue">
					<ul class="d-flex">
						<li class="<?php if(get_field('category_nav_selected') === 'all') echo 'selected'; ?>">
							<a href="#all" class="d-flex flex-column justify-content-center align-items-center;">
								<div class="selected-icon"><img src="/wp-content/uploads/2023/03/fpo-product-subnav-icon-selected.jpg" alt=""></div>
								<div class="icon"><img src="/wp-content/uploads/2023/03/fpo-product-subnav-icon.jpg" alt=""></div>
								<div class="label text-white">VIEW ALL</div>
							</a>
						</li>
						<li class="<?php if(get_field('category_nav_selected') === 'chemicals') echo 'selected'; ?>">
							<a href="#chemicals" class="d-flex flex-column justify-content-center align-items-center;">
								<div class="selected-icon"><img src="/wp-content/uploads/2023/03/fpo-product-subnav-icon-selected.jpg" alt=""></div>
								<div class="icon"><img src="/wp-content/uploads/2023/03/fpo-product-subnav-icon.jpg" alt=""></div>
								<div class="label text-white">CHEMICALS</div>
							</a>
						</li>
						<li class="<?php if(get_field('category_nav_selected') === 'equipment') echo 'selected'; ?>">
							<a href="#equipment" class="d-flex flex-column justify-content-center align-items-center;">
								<div class="selected-icon"><img src="/wp-content/uploads/2023/03/fpo-product-subnav-icon-selected.jpg" alt=""></div>
								<div class="icon"><img src="/wp-content/uploads/2023/03/fpo-product-subnav-icon.jpg" alt=""></div>
								<div class="label text-white">EQUIPMENT</div>
							</a>
						</li>
						<li class="<?php if(get_field('category_nav_selected') === 'pumps') echo 'selected'; ?>">
							<a href="#pumps" class="d-flex flex-column justify-content-center align-items-center;">
								<div class="selected-icon"><img src="/wp-content/uploads/2023/03/fpo-product-subnav-icon-selected.jpg" alt=""></div>
								<div class="icon"><img src="/wp-content/uploads/2023/03/fpo-product-subnav-icon.jpg" alt=""></div>
								<div class="label text-white">PUMPS, FILTERS AND HEATING</div>
							</a>
						</li>
						<li class="<?php if(get_field('category_nav_selected') === 'paint') echo 'selected'; ?>">
							<a href="#paint" class="d-flex flex-column justify-content-center align-items-center;">
								<div class="selected-icon"><img src="/wp-content/uploads/2023/03/fpo-product-subnav-icon-selected.jpg" alt=""></div>
								<div class="icon"><img src="/wp-content/uploads/2023/03/fpo-product-subnav-icon.jpg" alt=""></div>
								<div class="label text-white">PAINT AND REPAIR</div>
							</a>
						</li>
						<li class="<?php if(get_field('category_nav_selected') === 'winterizing') echo 'selected'; ?>">
							<a href="#winterizing" class="d-flex flex-column justify-content-center align-items-center;">
								<div class="selected-icon"><img src="/wp-content/uploads/2023/03/fpo-product-subnav-icon-selected.jpg" alt=""></div>
								<div class="icon"><img src="/wp-content/uploads/2023/03/fpo-product-subnav-icon.jpg" alt=""></div>
								<div class="label text-white">WINTERIZING</div>
							</a>
						</li>
						<li class="<?php if(get_field('category_nav_selected') === 'parts') echo 'selected'; ?>">
							<a href="#parts" class="d-flex flex-column justify-content-center align-items-center;">
								<div class="selected-icon"><img src="/wp-content/uploads/2023/03/fpo-product-subnav-icon-selected.jpg" alt=""></div>
								<div class="icon"><img src="/wp-content/uploads/2023/03/fpo-product-subnav-icon.jpg" alt=""></div>
								<div class="label text-white">PARTS</div>
							</a>
						</li>
					</ul>
				</div>
			</div>
		</section>
			<?php
			}
			?>
			<div class="flexible-content-container container-fluid">
			<?php
			$firstRun = true;
			if( have_rows('content') ){

				while( have_rows('content') ): the_row();
					$addMarginTop = '';
					if($showNav == true && $firstRun == true){
						$addMarginTop = 'subnavPadding';
					}

					/* ==================================
					BREADCRUMBS
					================================== */
					if(get_row_layout() == 'breadcrumbs'):
			?>

		
		<section class="breadcrumbs container flexible-content <?php echo $addMarginTop; ?>">
			<div class="row d-flex flex-row justify-content-start align-items-center">
				<div id="breadcrumbs">
					<span>
						<?php
						$crumbs = get_sub_field('crumbs');

						$crumbsMax = count($crumbs);

						$crumbsIndex = 0;

						foreach($crumbs as $crumb){
						?>
							<div class="breadcrumb-connector">
								<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
								<path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
								</svg>
							</div>
							<?php if($crumbsIndex == $crumbsMax - 1){ ?>
								<span class="breadcrumb_last"><?php echo $crumb['crumb_text'] ?></span>
							<?php }else{?>
								<span><a href="<?php echo $crumb['crumb_url'] ?>"><?php echo $crumb['crumb_text'] ?></a></span>
							<?php } ?>
				
				

				<?php
						$crumbsIndex++;
						
						
					}
				?>
					</span>
				</div>
			</div>
		</section>

		<?php				
					endif;
					/* ==================================
					BREADCRUMBS END
					================================== */



					/* ==================================
					PRODUCT GALLERY
					================================== */
					if(get_row_layout() == 'products_gallery'):
						?>
			
					<section class="products_gallery container flexible-content <?php echo $addMarginTop; ?>">
						<div class="gallery-items row d-grid justify-content-start">
							<?php
							$items = get_sub_field('items');
	
							foreach($items as $item){
							?>
							<a href="<?php echo $item['product_cta_url'] ?>" class="product-item card d-flex flex-columns">
								<div class="img-container d-flex justify-content-center allign-items-center">
									<img src="<?php echo $item['product_image']; ?>" alt="">
								</div>
								<div class="product-title justify-content-center">
									<img src="/wp-content/uploads/2023/03/fpo-product-card-rounded.jpg" alt="" class="rounded">
									<h4 class="product-name text-darkblue"><?php echo $item['product_name']; ?></h4>
								</div>
								<div class="card-footer justify-content-center d-flex background-orange">
									<p class="text-darkblue"><?php echo $item['product_cta_text']; ?></p>
								</div>
							</a>
							<?php }?>
						</div>
					</section>
			
					<?php				
					endif;
					/* ==================================
					PRODUCT GALLERY END
					================================== */



					/* ==================================
					JOURNEY
					================================== */
					if(get_row_layout() == 'journey'):
						?>
					<?php 
					if(get_sub_field('journey_background')){
						$styleString = ' style="background:url(' . get_sub_field('journey_background') . ')no-repeat center;background-size:cover;"';
					}else{
						$styleString = '';
					}; 
					?>
					<section class="journey container-fluid flexible-content <?php echo $addMarginTop; ?>"<?php echo $styleString; ?>>
						<div class="container">
							<div class="row d-flex justify-content-start">

								<div class="left col-12 col-md-7">
									<h2 class="header text-darkblue"><?php echo get_sub_field('journey_title'); ?></h2>
									<div class="text-darkblue"><?php echo get_sub_field('journey_description'); ?></div>

									<div class="gallery-container">


									<div class="gallery-player container p-0">
						
									<?php
										if( count(get_sub_field('journey_gallery') ) > 0 ){
											$imgCnt = 0;
				
											foreach( get_sub_field('journey_gallery') as $gallery_item){
									?>
											<div  id="img-<?php echo $imgCnt ?>" class="gallery-img" style="background:url(<?php echo $gallery_item['journey_gallery_image']; ?>)no-repeat center;background-size:cover;"></div>
				
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
								</div>

								<div class="right col-12 col-md-5 d-flex flex-columns align-items-center">
									<div class="timeline-content centering">
										<div class="timeline-bottom">
											<?php
											$items = get_sub_field('journey_events');
					
											foreach($items as $item){
											?>
												<div class="timeline-item d-flex flex-rows">
													<div class="item-dot col-4">
														<div class="line-top"></div>
														<div class="line-bottom"></div>
														<div class="dot-large"></div>
														<div class="dot"></div>
													</div>
													<div class="item-panel col-8">
														<p class="text-darkblue m-0 p-0"><?php echo $item['journey_event_date']; ?></p>
														<h4 class="product-name m-0 p-0 text-darkblue"><?php echo $item['journey_event_title']; ?></h4>
													</div>
												</div>
											<?php }?>
										</div>

										<div class="timeline-top">
											<?php
											$items = get_sub_field('journey_events');
					
											foreach($items as $item){
											?>
												<div class="timeline-item d-flex flex-rows">
													<div class="item-dot col-4">
														<div class="line-top"></div>
														<div class="line-bottom"></div>
														<div class="dot-large"></div>
														<div class="dot"></div>
													</div>
													<div class="item-panel col-8">
														<p class="text-darkblue m-0 p-0"><?php echo $item['journey_event_date']; ?></p>
														<h4 class="product-name m-0 p-0 text-darkblue"><?php echo $item['journey_event_title']; ?></h4>
													</div>
												</div>
											<?php }?>
										</div>

									</div>
								</div>
							</div>
						</div>
					</section>
			
					<?php				
					endif;
					/* ==================================
					JOURNEY END
					================================== */

					/* ==================================
					RELATED ARTICLES
					================================== */
					if(get_row_layout() == 'related_articles'):
						
						if(get_sub_field('related_link_background')){
							$styleString = ' style="background:url(' . get_sub_field('related_link_background') . ')no-repeat center;background-size:cover;"';
						}else{
							$styleString = '';
						}; 
						
					?>
			
					<section class="related-articles container-fluid flexible-content <?php echo $addMarginTop; ?>"<?php echo $styleString ?>>
						<div class="container-fluid container-xl">
							<div class="header-container col-8 offset-2 col-lg-8 offset-lg-2 d-flex flex-column align-items-center">
								<h2 class="header home-category-header text-darkblue"><?php echo get_sub_field('related_title'); ?></h2>
								<div class="home-category-header text-darkblue description"><?php echo get_sub_field('related_description'); ?></div>

								<?php if( get_sub_field('related_show_cta') === true ){ ?>
								<a href="<?php echo get_sub_field('cta_url'); ?>" class="bold link text-darkblue"><?php echo get_sub_field('related_cta_text'); ?></a>
								<?php } ?>
							</div>

							<div class="items d-flex flex-row  container-md">
								<?php
									$items = get_sub_field('related_links');

									foreach($items as $item){
								?>
									<a href="<?php echo $item['related_link_url'] ?>" class="img-link col-3"><img src="<?php echo $item['related_link_icon']; ?>" alt=""></a>
								<?php
									}
								?>
							</div>
						</div>
					</section>
			
					<?php				
					endif;
					/* ==================================
					RELATED ARTICLES END
					================================== */

					/* ==================================
					RELATED CARDS DESCRIPTIONS
					================================== */
					if(get_row_layout() == 'related_cards_descriptions'):
						
						
					?>
			
					<section class="related-cards-descriptions container-fluid flexible-content <?php echo $addMarginTop; ?>">
						<div class="container">

							<div class="items row">
								<?php
									$items = get_sub_field('links');

									foreach($items as $item){
								?>
									<a href="<?php echo $item['related_link_url'] ?>" class="img-link col-md-4 d-flex flex-column justify-content-start">
										<h4 class="header text-darkblue"><?php echo $item['title'] ?></h4>
										<div class="header text-darkblue"><?php echo $item['description'] ?></div>
									</a>
								<?php
									}
								?>
							</div>
						</div>
					</section>
			
					<?php				
					endif;
					/* ==================================
					RELATED CARDS DESCRIPTIONS END
					================================== */

					/* ==================================
					SPOTLIGHT
					================================== */
					if(get_row_layout() == 'spotlight'):
						
						if(get_sub_field('spotlight_background')){
							$styleString = ' style="background:url(' . get_sub_field('spotlight_background') . ')no-repeat center;background-size:cover;"';
						}else{
							$styleString = '';
						};
					?>
			
					<section class="spotlight container-fluid flexible-content <?php echo $addMarginTop; ?>"<?php echo $styleString ?>>
						<div class="container-fluid container-md">
							<div class="header-container col-12 col-md-6">
								<h1 class="home-category-header text-darkblue"><?php echo get_sub_field('spotlight_title'); ?></h1>
								<div class="description home-category-header text-darkblue"><?php echo get_sub_field('spotlight_description'); ?></div>
							</div>

							<div class="items row d-flex flex-column flex-sm-row justify-content-center">
								<?php
									$items = get_sub_field('spotlight_items');

									foreach($items as $item){
								?>
									<div class="spotlight-card col-6 background-white">
										<h4 class="product-name text-darkblue"><?php echo $item['spotlight_item_title']; ?></h4>
										<div class="item-description text-darkblue"><?php echo $item['spotlight_item_description']; ?></div>
										<a href="<?php echo $item['spotlight_item_cta_url']; ?>" class="pill-cta orange background-orange text-darkblue"><?php echo $item['spotlight_item_cta_text']; ?></a>
									</div>
								<?php
									}
								?>
							</div>
						</div>
					</section>
					
					<?php
					endif;
					/* ==================================
					SPOTLIGHT END
					================================== */

					/* ==================================
					CONTACT
					================================== */
					if(get_row_layout() == 'contact_form'):
						
						if(get_sub_field('contact_background')){
							$styleString = ' style="background:url(' . get_sub_field('contact_background') . ')no-repeat center;background-size:cover;"';
						}else{
							$styleString = '';
						};
					?>
			
					<section class="contact container-fluid flexible-content <?php echo $addMarginTop; ?>"<?php echo $styleString ?>>
						<div class="container-fluid container-md">
							<div class="row d-flex flex-rows">
								<div class="container col-md-6 left">
									<h2 class="header text-darkblue"><?php echo get_sub_field('contact_title'); ?></h2>
									<div class="description text-darkblue"><?php echo get_sub_field('contact_description'); ?></div>
									<h3 class="home-category-header text-darkblue"><?php echo get_sub_field('contact_listing_text'); ?></h3>
									<h4 class="product-name text-darkblue"><?php echo get_sub_field('contact_name'); ?></h4>

									<div class="contact-items container d-grid m-0 p-0">
										<?php
											
											if( get_sub_field('contact_methods')){
												$items = get_sub_field('contact_methods');
												foreach($items as $item){
										?>
											<div class="container col-6 m-0 p-0">
												<p class="text-darkblue mt-1 mb-1"><?php echo $item['contact_method']; ?></p>
												<a class="contact-link header text-darkblue mt-1 mb-1" href="<?php echo $item['contact_url']; ?>"><?php echo $item['contact_info']; ?></a>
											</div>
										<?php
												}
											}
										?>
									</div>
								</div>
								<div class="container col-md-6 right">
									<?php echo do_shortcode( '[contact-form-7 id="6" title="Sanygen Email Form"]' ); ?>
								</div>
							</div>
						</div>
					</section>

					<?php
					endif;

					/* ==================================
					CONTACT END
					================================== */

					/* ==================================
					SEARCH
					================================== */
					if(get_row_layout() == 'search'):
					?>

					<section class="search container-fluid flexible-content <?php echo $addMarginTop; ?>">
						<div class="container">
							<div class="row d-flex flex-rows">
								<div class="container col-sm-8 offset-sm-2 d-flex flex-column">
									<p class="text-darkblue mt-0 mb-2"><?php echo get_sub_field('prompt_text'); ?></p>
								<?php get_search_form(); ?>
								</div>
							
							</div>
						</div>
					</section>

					<?php
					endif;

					/* ==================================
					SEARCH
					================================== */

					/* ==================================
					ACCORDIAN GROUP
					================================== */
					if(get_row_layout() == 'accordian_group'):
						
						if(get_sub_field('accordian_background')){
							$styleString = ' style="background:url(' . get_sub_field('accordian_background') . ')no-repeat center;background-size:cover;"';
						}else{
							$styleString = '';
						};
						?>
	
						<section class="accordian_group container-fluid flexible-content <?php echo $addMarginTop; ?>"<?php echo $styleString; ?>>
							<div class="container-fluid container-md">
								<div class="row d-flex">
									<div class="header-container container col-md-6 d-flex flex-column">
										<h2 class="header text-darkblue"><?php echo get_sub_field('accordian_title'); ?></h2>
										<div class="description text-darkblue"><?php echo get_sub_field('accordian_description'); ?></div>
									</div>

									<div class="container">
										<div class="accordion-row row d-flex flex-rows">
											<?php
												$all_items = get_sub_field('accordian_items');
												$chunks = array_chunk($all_items, round( count(get_sub_field('accordian_items')) / 2) );
												
												$index = 0;

												$show = 'show';
												$selected = 'selected';
											?>
											
											<div class="accordion container col-md-6" id="accordion-left">
												<?php 
													foreach($chunks[0] as $chunkL){ 
													if($index > 0){ $show = ''; $selected = '';}
												?>
												<div class="accordion-item <?php echo $selected; ?>" id="accordion-item-<?php echo $index; ?>">
													<h2 class="accordion-header" id="heading-<?php echo $index; ?>">
														<button class="accordion-button" type="button" data-bs-toggle="collapse" data-accordion-item="#accordion-item-<?php echo $index; ?>" data-bs-target="#collapse-<?php echo $index; ?>" aria-expanded="true" aria-controls="collapse-<?php echo $index; ?>"><?php echo $chunkL['accordian_item_title']; ?></button>
													</h2>
													<div id="collapse-<?php echo $index; ?>" class="accordion-collapse collapse <?php echo $show; ?>" aria-labelledby="heading-<?php echo $index; ?>" data-bs-parent="#accordion-left">
														<div class="accordion-body text-darkblue"><?php echo $chunkL['accordian_text']; ?></div>
													</div>
												</div>
												<?php 
														$index++;
													} 
												?>

											</div>
											
											<div class="accordion container col-md-6" id="accordion-right">
												<?php 
													foreach($chunks[1] as $chunkL){ 
													if($index > 0){ $show = '';}
												?>
												<div class="accordion-item" id="accordion-item-<?php echo $index; ?>">
													<h2 class="accordion-header" id="heading-<?php echo $index; ?>">
														<button class="accordion-button" type="button" data-bs-toggle="collapse" data-accordion-item="#accordion-item-<?php echo $index; ?>" data-bs-target="#collapse-<?php echo $index; ?>" aria-expanded="true" aria-controls="collapse-<?php echo $index; ?>"><?php echo $chunkL['accordian_item_title']; ?></button>
													</h2>
													<div id="collapse-<?php echo $index; ?>" class="accordion-collapse collapse <?php echo $show; ?>" aria-labelledby="heading-<?php echo $index; ?>" data-bs-parent="#accordion-right">
														<div class="accordion-body"><?php echo $chunkL['accordian_text']; ?></div>
													</div>
												</div>
												<?php 
														$index++;
													} 
												?>

											</div>


<script>

// ALL clickable header items (to trigger show/collapse) from ALL GROUPS
const accordionItems = document.querySelectorAll('.accordian_group .accordion .accordion-header');
const accordionCollapseItems = document.querySelectorAll('.accordian_group .accordion .accordion-collapse');

// activate all headers
for(let i = 0; i < accordionItems.length; i++){
	const header = accordionItems[i];
	const collapse = accordionCollapseItems[i];

	collapse.style.height = 0;
	
	header.addEventListener('click', (evt) => {

		// Close current
		const prev = document.querySelector('.accordian_group .accordion .accordion-collapse.show');
		
		if(prev){
			prev.style.height = 0;

			// .selected item
			const prevSelected = document.querySelector('.accordian_group .accordion  .selected');

			if(prev){
				prev.classList.remove('show');

				prevSelected.classList.remove('selected');
			}
			
		}

		// Open Current
		const parent = evt.currentTarget.parentNode;
		const openTargetID = document.querySelector('.accordian_group .accordion #' + parent.id + ' .accordion-button ').dataset.bsTarget;
		
		const openTarget = document.querySelector('.accordian_group .accordion #' + parent.id + ' ' + openTargetID);
		openTarget.classList.add('show');

		const openContent = document.querySelector('.accordian_group .accordion #' + parent.id + ' .accordion-body');
		
		let contentHeight = 25;
		
		contentHeight += 15;
		
		for(let i = 0; i < openContent.childNodes.length; i++){
			const child = openContent.childNodes[i];
			if( child.clientHeight ){
				
				child.style.marginBottom = '15px';
				contentHeight += 15;
				
				contentHeight += child.clientHeight;
			}
		}
		

		openTarget.style.height = (contentHeight) + 'px' ;

		// assign .selected
		const openItem = document.querySelector('.accordian_group .accordion #' + parent.id);
		openItem.classList.add('selected');



		
	});
}
	
	setTimeout( ()=>{
		accordionItems[0].click();
	}, 2000);

</script>


										</div>
									</div>
								
								</div>
							</div>
						</section>
	
					<?php
					endif;

					/* ==================================
					ACCORDIAN GROUP END
					================================== */

					/* ==================================
					HALFHALF
					================================== */
					if(get_row_layout() == 'halfhalf'):
						
					?>
					<section class="halfhalf container-fluid d-flex justify-content-center">
			
						<div class="container d-flex">

						<?php
							// FLIP Sides if image_side = "right"
							$flip = '';
							$flipmd = 'flex-md-row';
							if(get_sub_field('image_side') === 'Right'){
								$flip = 'flex-row-reverse';
								$flipmd = 'flex-md-row-reverse';
							}
						?>
							<div class="row col-12 <?php echo $flip; ?> flex-column <?php echo $flipmd; ?>">
								<div class="left col-md-6 d-flex align-items-center">
									<div class="halfhalf-background" style="background:url(<?php echo get_sub_field('background_shape'); ?>)no-repeat center;background-size:contain;"></div>

									<div class="halfhalf-player container p-0">
										
											<div  id="img" class="halfhalf-img" style="background:url(<?php echo get_sub_field('featured_image'); ?>)no-repeat center;background-size:cover;"></div>

									</div>
								</div>
								<div class="right col-md-5 offset-md-1">
									<div class="container">
										<img src="<?php echo get_sub_field('icon'); ?>" alt="" class="stamp">
										<h2 class="header text-darkblue"><?php echo get_sub_field('title'); ?></h2>
										<div class="description text-darkblue"><?php echo get_sub_field('description'); ?></div>

										<?php if(get_sub_field('display_cta') === true){
										?>
										<a href="<?php echo get_sub_field('cta_url'); ?>" class="pill-cta background-orange text-darkblue"><?php echo get_sub_field('cta_text'); ?></a>
										<?php
										} ?>
										
									</div>
								</div>
							</div>
						</div>
					</section>
					<?php
					endif;

					/* ==================================
					HALFHALF END
					================================== */

					/* ==================================
					TEXT CARD CAROUSEL
					================================== */
					if(get_row_layout() == 'text_card_carousel'):
						
						?>
						<section class="text_card_carousel container-fluid d-flex justify-content-center">
				
							<div class="container d-flex p-0">
								<div class="carousel-container row col-12 ">
									<div class="arrow-container col-1 d-flex justify-content-center align-items-center p-0">
										<div class="glider-arrow glider-prev"></div>
									</div>
									<div class="cards col-10 p-0">
										<?php 

										foreach( get_sub_field('text_cards') as $item ){
										?>
										<div class="card">
											<h4 class="header text-darkblue"><?php echo $item['title']; ?></h4>
											<div class="description text-darkblue"><?php echo $item['description']; ?></div>
										</div>

										<?php
										}
										?>
									</div>
									<div class="arrow-container col-1 d-flex justify-content-center align-items-center p-0">
										<div class="glider-arrow glider-next"></div>
									</div>

								</div>
							</div>
						</section>
						<?php
						endif;
	
						/* ==================================
						TEXT CARD CAROUSEL END
						================================== */

						/* ==================================
						CAROUSEL CONTENT SELECTION
						================================== */
						if(get_row_layout() == 'carousel_content_selection'):
						?>
						<section id="<?php echo get_sub_field('id'); ?>" style="opacity:0;" class="carousel_content_selection container-fluid d-flex flex-column align-items-center">
							
			
							<div class="container-fluid container-lg d-flex">

							<?php
								// FLIP Sides if image_side = "right"
								$flip = '';
								$flipmd = 'flex-md-row';
								if(get_sub_field('image_side') === 'Right'){
									$flip = 'flex-row-reverse';
									$flipmd = 'flex-md-row-reverse';
								}

								$lessthan = '';
								if( count(get_sub_field('items')) < 3 ){
									$lessthan = 'less';
								}
							?>
								<div class="halfhalf-container row col-12 <?php echo $flip; ?> flex-column <?php echo $flipmd; ?>">
									<div class="left col-md-6 d-flex align-items-center">
										<div class="halfhalf-background" style="background:url(<?php echo get_sub_field('background_shape'); ?>)no-repeat center;background-size:contain;"></div>

										<div class="halfhalf-player container p-0">
											
												<?php 
												if( get_sub_field('items') ){
													$siIndex = 0;
													$headerItems = get_sub_field('items');

													foreach($headerItems as $hItem){
														// FLIP Sides if image_side = "right"
														$flip = '';
														$flipmd = 'flex-md-row';
														if( $hItem['image_side'] === 'Right'){
															$flip = 'flex-row-reverse';
															$flipmd = 'flex-md-row-reverse';
														}
												?>
												<div  id="img" class="halfhalf-img" style="background:url(<?php echo $hItem['featured_image']; ?>)no-repeat center;background-size:cover;"></div>

												<?php
													}
												}
												?>
										</div>
									</div>
									<div class="right col-md-6 d-flex flex-column justify-content-center">
										<div class="container">
											<img src="<?php echo get_sub_field('icon'); ?>" alt="" class="stamp">
											<h2 class="header text-darkblue"><?php echo get_sub_field('illustrated_title'); ?></h2>
											<div class="description text-darkblue"><?php echo get_sub_field('illustrated_description'); ?></div>

											<?php if(get_sub_field('display_cta') === true){
											?>
											<a href="<?php echo get_sub_field('cta_url'); ?>" class="pill-cta background-orange text-darkblue"><?php echo get_sub_field('cta_text'); ?></a>
											<?php
											} ?>
											
										</div>
									</div>
								</div>
							</div>
			
							<div class="text-carousel container-fluid container-lg d-flex p-0">
								<div class="carousel-container <?php echo $lessthan; ?> row col-12 ">
									<div class="arrow-container col-1 d-flex justify-content-center align-items-center p-0">
										<div class="glider-arrow glider-prev"></div>
									</div>
									<div class="cards col-10 p-0">
										<?php 
										$itemIndex = 0;
										foreach( get_sub_field('items') as $item ){
										?>
										<div class="card" data-index="<?php echo $itemIndex; ?>">
											<h4 class="header text-darkblue"><?php echo $item['title']; ?></h4>
											<div class="description text-darkblue"><?php echo $item['description']; ?></div>
										</div>

										<?php
											$itemIndex++;
										}
										?>
									</div>
									<div class="arrow-container col-1 d-flex justify-content-center align-items-center p-0">
										<div class="glider-arrow glider-next"></div>
									</div>

								</div>
							</div>
						</section>
						<?php
						endif;
	
						/* ==================================
						CAROUSEL CONTENT SELECTION END
						================================== */

						/* ==================================
						ACCORDIAN GROUP FULL WIDTH
						================================== */
						if(get_row_layout() == 'accordian_group_full_width'):
							
							if(get_sub_field('accordian_background')){
								$styleString = ' style="background:url(' . get_sub_field('accordian_background') . ')no-repeat center;background-size:cover;"';
							}else{
								$styleString = '';
							};
							?>
		
							<section class="accordian_group_full_width container-fluid flexible-content pt-5 pb-5 <?php echo $addMarginTop; ?>"<?php echo $styleString; ?>>
								<div class="container-fluid container-md">
									<div class="row d-flex flex-rows">
										<div class="container col-sm-6 d-flex flex-column">
											<h2 class="header text-darkblue"><?php echo get_sub_field('accordian_title'); ?></h2>
											<p class="text-darkblue"><?php echo get_sub_field('accordian_description'); ?></p>
										</div>

										<div class="container">
											<div class="accordion-row row d-flex flex-rows">
												<?php
													$all_items = get_sub_field('accordian_items');
													
													$index = 0;

													$show = 'show';
													$selected = 'selected';
												?>
												
												<div class="accordion container" id="accordion-full">
													<?php 
														foreach($all_items as $item){ 
														if($index > 0){ $show = ''; $selected = '';}
													?>
													
													<div class="accordion-item <?php echo $selected; ?>" id="accordion-item-<?php echo $index; ?>">
														<h2 class="accordion-header" id="heading-<?php echo $index; ?>">
															<button class="accordion-button" type="button" data-bs-toggle="collapse" data-accordion-item="#accordion-item-<?php echo $index; ?>" data-bs-target="#collapse-<?php echo $index; ?>" aria-expanded="true" aria-controls="collapse-<?php echo $index; ?>"><div class="btn-text" data-accordion-item="#accordion-item-<?php echo $index; ?>" data-bs-target="#collapse-<?php echo $index; ?>"><?php echo $item['accordian_item_title']; ?></div></button>
														</h2>
														<div id="collapse-<?php echo $index; ?>" class="accordion-collapse collapse <?php echo $show; ?>" aria-labelledby="heading-<?php echo $index; ?>" data-bs-parent="#accordion-full">
															<div class="accordion-body text-darkblue"><?php echo $item['accordian_text']; ?></div>
														</div>
													</div>
													<?php 
															$index++;
														} 
													?>

												</div>

<script>

// ALL clickable header items (to trigger show/collapse) from ALL GROUPS
const accordionItems = document.querySelectorAll('.accordian_group_full_width .accordion .accordion-header');
const accordionCollapseItems = document.querySelectorAll('.accordian_group_full_width .accordion .accordion-collapse');

// activate all headers
for(let i = 0; i < accordionItems.length; i++){
	const header = accordionItems[i];
	const collapse = accordionCollapseItems[i];

	collapse.style.height = 0;

	if(i == 0){
		//const openInitialContent = document.querySelector('.accordian_group_full_width .accordion #collapse-0 .accordion-body p');
		//collapse.style.height = (openInitialContent.clientHeight + 70) + 'px';
	}
	
	header.addEventListener('click', (evt) => {
		console.log('click', evt.currentTarget);

		// Close current
		const prev = document.querySelector('.accordian_group_full_width .accordion .accordion-collapse.show');
		
		if(prev){
			prev.style.height = 0;

			// .selected item
			const prevSelected = document.querySelector('.accordian_group_full_width .accordion  .selected');

			if(prev){
				prev.classList.remove('show');

				prevSelected.classList.remove('selected');
			}
			
		}

		// Open Current
		const parent = evt.currentTarget.parentNode;
		const openTargetID = document.querySelector('.accordian_group_full_width .accordion #' + parent.id + ' .accordion-button ').dataset.bsTarget;
		
		const openTarget = document.querySelector('.accordian_group_full_width .accordion #' + parent.id + ' ' + openTargetID);
		openTarget.classList.add('show');

		const openContent = document.querySelector('.accordian_group_full_width .accordion #' + parent.id + ' .accordion-body');
		
		let contentHeight = 25;
		
		contentHeight += 15;
		
		for(let i = 0; i < openContent.childNodes.length; i++){
			const child = openContent.childNodes[i];
			if( child.clientHeight ){
				
				child.style.marginBottom = '15px';
				contentHeight += 15;
				
				contentHeight += child.clientHeight;
			}
		}
		

		openTarget.style.height = (contentHeight) + 'px' ;

		// assign .selected
		const openItem = document.querySelector('.accordian_group_full_width .accordion #' + parent.id);
		openItem.classList.add('selected');

		
	});
}
	
	setTimeout( ()=>{
		accordionItems[0].click();
	}, 2000);

</script>


											</div>
										</div>
									
									</div>
								</div>
							</section>
		
						<?php
						endif;

						/* ==================================
						ACCORDIAN GROUP FULL WIDTH END
						================================== */

						/* ==================================
						POSTER HALF TEXT
						================================== */
						if(get_row_layout() == 'full-width_poster_half_text'):
							
							?>
		
						<section class="full-width_poster_half_text container-fluid d-flex justify-content-center align-items-start <?php echo $addMarginTop; ?>">
							<div class="bg d-none d-md-block" style="background:url(<?php echo get_sub_field('image'); ?>)no-repeat center top; background-size:cover;"></div>
							<div class="hero-bg d-none d-md-block" style="background:url(<?php echo get_sub_field('decor'); ?>)no-repeat; background-size:cover;"></div>

							<div class="container">
								<div class="row">
									<div class="col-md-6">
										<h2 class="header text-darkblue"><?php echo get_sub_field('title'); ?></h2>
										<div class="description text-darkblue"><?php echo get_sub_field('description_text'); ?></div>

										<a href="<?php echo get_sub_field('cta_url'); ?>" class="pill-cta orange text-darkblue"><?php echo get_sub_field('cta_text'); ?></a>
									</div>
								</div>
							</div>
							
						</section>
		
						<?php
						endif;

						/* ==================================
						POSTER HALF TEXT END
						================================== */

						/* ==================================
						OUR TEAM
						================================== */
						if(get_row_layout() == 'team_cards'):
							$cards = get_sub_field('cards');

							?>
		
						<section class="team_cards container-fluid container-md d-grid justify-content-start" >
							<?php
								$index = 1;
								foreach($cards as $card){
							?>

									<div class="container" style="background:url(<?php echo get_sub_field('card_background'); ?>)no-repeat center;background-size:cover;">
										<h3 class="text-darkblue"><?php echo $index;  ?></h3>
										<h1 class="periodic text-darkblue"><?php echo $card['initials']; ?></h1>
										<h4 class="text-darkblue"><?php echo $card['name']; ?></h4>
										<h3 class="position text-darkblue"><?php echo $card['position']; ?></h3>
									</div>
							<?php
									$index++;
								}
							?>
							
						</section>
		
						<?php
						endif;

						/* ==================================
						OUR TEAM END
						================================== */

						/* ==================================
						HEADER STEPS
						================================== */
						if(get_row_layout() == 'header_steps'):
							
							?>
		
						<section class="header_steps container-fluid d-flex flex-column justify-content-center <?php echo $addMarginTop; ?>" style="background:url(<?php echo get_sub_field('background_image'); ?>)no-repeat center top; background-size:cover;">
							

							<div class="main-panel-container container-xl" style="background:url(<?php echo get_sub_field('main_image'); ?>)no-repeat center; background-size:cover;">
								<div class="main-panel row d-flex flex-column flex-xl-row  justify-content-center">
									<div class="left col-xl-6">
										<h2 class="header text-darkblue"><?php echo get_sub_field('title'); ?></h2>
										<div class="text-darkblue"><?php echo get_sub_field('main_description'); ?></div>
									</div>

									<div class="right col-sm-6 offset-sm-6 offset-xl-0"><img src="<?php echo get_sub_field('guarantee_stamp'); ?>" alt=""></div>
								</div>
							</div>

							<div class="steps container-fluid container-lg d-grid">
								<?php
								if( get_sub_field('steps') ){

									foreach(get_sub_field('steps') as $step){	
								?>	
								<div class="step-container">
									<h4 class="product-name text-darkblue"><?php echo  $step['step_title']; ?></h4>

									<div class="text-darkblue"><?php echo  $step['step_description']; ?></div>
								</div>
								<?php
									}

								}
								?>
							</div>
							
						</section>
		
						<?php
						endif;

						/* ==================================
						HEADER STEPS END
						================================== */

						/* ==================================
						SELECTABLE CONTENT
						================================== */
						if(get_row_layout() == 'selectable_content'):
							
							if(get_sub_field('selectable_content_background')){
								$styleString = ' style="background:url(' . get_sub_field('selectable_content_background') . ')no-repeat center;background-size:cover;"';
							}else{
								$styleString = '';
							}; 
							
						?>
				
						<section id="<?php echo get_sub_field('id'); ?>" class="selectable-content container-fluid flexible-content <?php echo $addMarginTop; ?>"<?php echo $styleString ?>>
							<div class="container-fluid container-xl">
								<div class="header-container col-8 offset-2 col-lg-8 offset-lg-2 d-flex align-items-center">
									<?php 
									if( get_sub_field('items') ){
										$siIndex = 0;
										$headerItems = get_sub_field('items');

										foreach($headerItems as $hItem){
									?>
									<div id="<?php echo $hItem['content_code'] ?>" class="header-item d-flex flex-column align-items-center <?php if($siIndex == 0){ echo "selected";}; ?>">
										<h2 class="header home-category-header text-darkblue"><?php echo $hItem['title']; ?></h2>
										<div class="home-category-header text-darkblue description"><?php echo $hItem['description']; ?></div>

										<?php if( $hItem['show_cta'] === true ){ ?>
										<a href="<?php echo $hItem['cta_url']; ?>" class="bold link text-darkblue"><?php echo $hItem['cta_text']; ?></a>
										<?php } ?>
									</div>
									<?php 
											$siIndex++;
										}
									} 
									?>
								</div>

								<div class="items d-flex flex-row  container-md">
									<?php
										$siIndex = 0;
										$items = get_sub_field('items');

										foreach($items as $item){
									?>
										<a id="btn-<?php echo $item['content_code'] ?>" href="#" class="img-link col-3  <?php if($siIndex == 0){ echo "selected";}; ?>" data-code="<?php echo $item['content_code'] ?>"><img src="<?php echo $item['icon']; ?>" alt=""></a>
									<?php
											$siIndex++;
										}
									?>
								</div>
							</div>
						</section>
				
						<?php				
						endif;
						/* ==================================
						SELECTABLE CONTENT END
						================================== */





					$firstRun = false;
				endwhile;

			}
			
		?>



		</div>


	</main><!-- #main -->

<?php
get_footer();
