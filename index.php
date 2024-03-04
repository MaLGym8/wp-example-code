<?php get_header(); ?>

	<section class="top-banner-home">
		<div class="wrapper">
			<?php $banner_group = get_field('top_banner'); ?>
			<div class="wrap-top-banner">
				<div class="title"><?php echo $banner_group['title'];?></div>
				<div class="description"><?php echo $banner_group['description'];?></div>
			</div>
		</div>
	</section>
	<section class="services-home">
		<div class="wrapper">
			<div class="main-page-title">
				<h2 class="header-with-line blue">Services</h2>
			</div>
			<div class="wrap-services-block">
				<!--Service-->
				<?php 
					$postsservice = new WP_Query( array('post_type' => 'services') );

					if ($postsservice->have_posts()) : while ($postsservice->have_posts()) : $postsservice->the_post();
				?>
					<a href="<?php the_permalink(); ?>">
						<div class="item">
							<div class="icons-item">
								<img src="<?php echo get_field('item_icon');?>" alt="icon services" class="style-svg">
								<img src="<?php echo get_template_directory_uri();?>/img/orange-arrow.svg" alt="go to" class="arrow-go">
							</div>
							<div class="title-item"><?php the_title();?></div>
							<div class="desc-item"><?php the_content();?></div>
						</div>
					</a>
				<?php endwhile; endif; wp_reset_postdata();?>
			</div> 
		</div>
	</section>
	<section class="domains-home">
		<?php $domains_group = get_field('domains_block'); ?>
		<div class="wrapper">
			<div class="main-page-title">
				<div class="header-with-line blue">
					<?php echo $domains_group['title'];?>
				</div>
			</div>
			<div class="wrap-domains-block">
				<!--Domains item-->
				<?php 
					$domains_posts = $domains_group['posts'];

					foreach($domains_posts as $domains_post) {
						$post_row = get_post($domains_post->ID);
				?>
					<a href="<?php echo get_permalink($post_row->ID);?>">
						<div class="item">
							<div class="content-item">
								<div class="title"><?php echo $post_row->post_title;?></div>
								<div class="description"><?php echo $post_row->post_content;?></div>
							</div>
							<div class="icon-item">
								<img src="<?php echo get_field('item_icon', $post_row->ID);?>" alt="<?php echo $post_row->post_title;?>" class="style-svg">
							</div>
						</div>
					</a>
				<?php }?>
			</div>
		</div>
	</section>
	<section class="featured-clients-home">
		<div class="wrapper">
			<div class="main-page-title col-2">
				<h2 class="header-with-line blue">Featured Clients</h2>
				<p class="sub-title-type-1">Discover some of the renowned brands that found success with GP Solutions.</p>
			</div>
			<div class="wrap-featured-clients-block">
				<!--Featured clients item-->
				<?php 
					$postsfeaturedclient = new WP_Query( array('post_type' => 'featured-clients') );

					if ($postsfeaturedclient->have_posts()) : while ($postsfeaturedclient->have_posts()) : $postsfeaturedclient->the_post();
				?>
					<div class="item">
						<img src="<?php echo get_the_post_thumbnail_url();?>" alt="<?php the_title();?>">
					</div>
				<?php endwhile; endif; wp_reset_postdata();?>
			</div>
		</div>
	</section>
	<section class="portfolio-home">
		<div class="wrapper">
			<div class="wrap-portfolio-block">
				<!--Portfolio item-->
				<div class="item">
					<div class="main-page-title blue">
						<h2 class="header-with-line blue">Portfolio</h2>
					</div>
				</div>
				<?php 
					$postsportfolio = new WP_Query( array('post_type' => 'portfolio', 'posts_per_page' => 4) );

					if ($postsportfolio->have_posts()) : while ($postsportfolio->have_posts()) : $postsportfolio->the_post();

					$post_category = get_the_terms($post->ID, 'portfolio-category');
				?>	
					<a href="<?php the_permalink(); ?>">
						<div class="item" style="background-image: url(<?php echo get_the_post_thumbnail_url();?>)">
							<div class="content-portfolio">
								<div class="icon-portfolio">
									<img src="<?php echo ale_get_meta('portfolio_icon');?>" alt="<?php the_title();?>">
								</div>
								<div class="category-portfolio"><?php echo $post_category[0]->name; ?></div>
								<div class="title-portfolio"><?php the_title();?></div>
							</div>
						</div>
					</a>
				<?php endwhile; endif; wp_reset_postdata();?>
			</div>
			<div class="more-portfolio">
				<a href="/portfolio/" class="btn-blue">Read more cases</a>
			</div>
		</div>
	</section>
	<section class="technology-stack-home">
		<div class="wrapper">
			<div class="main-page-title">
				<h2 class="header-with-line blue">Technology stack</h2>
			</div>
			<div class="wrap-technology-stack-block">
				<!--Technology stack item-->
				<?php do_shortcode('[ale-slider name="technology-stack"]');?>
			</div>
		</div>
	</section>
	<section class="your-reliable-partner-home">
		<div class="your-reliable-partner-wrapper">
			<div class="wrapper">
				<div class="main-page-title">
					<h2 class="header-with-line white">Your Reliable Partner</h2>
				</div>
				<div class="wrap-your-reliable-partner-block">
					<!--Your reliable partner item-->
					<?php 
						$group = get_field('your_reliable_partner');
						$group_repeators = $group['your_reliable_partner_info'];
						$group_logos = $group['your_reliable_partner_logo'];
						if($group_repeators) {
							foreach( $group_repeators as $group_repeator ) { 
					?>
						<div class="item">
							<div class="count"><?php echo $group_repeator['value'];?></div>
							<div class="description"><?php echo $group_repeator['description'];?></div>
						</div>
					<?php }} ?>
				</div>
			</div>
		</div>
		<div class="your-reliable-partner-logos">
			<div class="wrapper">
				<div class="your-reliable-partner-logos-block">
					<!--Your reliable partner logos-->
					<?php 
						if($group_logos) {
							foreach( $group_logos as $group_logo ) { 
					?>
					<div class="item">
						<img src="<?php echo $group_logo;?>" alt="logo">
					</div>
					<?php }} ?>
				</div>
			</div>
		</div>
	</section>

	<?php 
		$we_are_valued_for_group = get_field('we_are_valued_for_group');
	?>
	<section class="we-are-valued-for-home">
		<div class="wrapper">
			<div class="we-are-valued-for-block">
				<div class="we-are-valued-for-left">
					<div class="main-page-title">
						<h2 class="header-with-line blue">We are valued for</h2>
					</div>
					<div class="wrap-valued-left">
						<!--Item-->
						<?php foreach($we_are_valued_for_group['we_are_valued_for'] as $we_are_valued_for) { ?>
							<div class="item">
								<div class="title"><?php echo $we_are_valued_for['title'];?></div>
								<div class="description"><?php echo $we_are_valued_for['text'];?></div>
							</div>
						<?php } ?>
					</div>
				</div>
				<div class="we-are-valued-for-right">
					<img src="<?php echo $we_are_valued_for_group['image'];?>" alt="we are valued for right">
				</div>
			</div>
		</div>
	</section>
	<section class="customers-about-us-home">
		<div class="wrapper">
			<div class="main-page-title">
				<h2 class="header-with-line blue">Customers about us</h2>
			</div>
			<div class="customers-about-us-block">
				<!--Slide-->
				<div class="swiper customers-about-us-slider">
					<div class="swiper-wrapper">
						<?php 
							$sliders = get_field('customers_about_us');
							foreach($sliders as $slider) { 
						?>
							<div class="swiper-slide">
								<div class="feedback-info">
									<div class="feedback-card">
										<div class="header-feedback-wrap">
											<div class="info-client">
												<div class="photo-client">
													<img src="<?php echo $slider['author_photo'];?>" alt="client photo">
												</div>
												<div class="client-name">
													<div class="name"><?php echo $slider['author_name'];?></div>
													<div class="position"><?php echo $slider['author_position'];?></div>
												</div>
											</div>
											<div class="company-logo">
												<img src="<?php echo $slider['company_logo'];?>" alt="company logo">
											</div>
										</div>
										<div class="feedback-description">
											<?php echo $slider['text'];?>
										</div>
									</div>
								</div>
								<div class="feedback-img">
									<img src="<?php echo $slider['image_right_block'];?>" alt="feedback">
								</div>
							</div>
						<?php } ?>
					</div>
				</div>
				<div class="navigate-customers-about-us">
					<div class="customers-about-us-prev customers-arrow">
						<svg width="73" height="24" viewBox="0 0 73 24" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path opacity="0.74" d="M72.0607 13.0607C72.6464 12.4749 72.6464 11.5251 72.0607 10.9393L62.5147 1.3934C61.9289 0.807611 60.9792 0.807611 60.3934 1.3934C59.8076 1.97919 59.8076 2.92893 60.3934 3.51472L68.8787 12L60.3934 20.4853C59.8076 21.0711 59.8076 22.0208 60.3934 22.6066C60.9792 23.1924 61.9289 23.1924 62.5147 22.6066L72.0607 13.0607ZM0 13.5H71V10.5H0V13.5Z" fill="#232323"/>
						</svg>
					</div>
					<div class="customers-about-us-nav"></div>
					<div class="customers-about-us-next customers-arrow">
						<svg width="73" height="24" viewBox="0 0 73 24" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path opacity="0.74" d="M72.0607 13.0607C72.6464 12.4749 72.6464 11.5251 72.0607 10.9393L62.5147 1.3934C61.9289 0.807611 60.9792 0.807611 60.3934 1.3934C59.8076 1.97919 59.8076 2.92893 60.3934 3.51472L68.8787 12L60.3934 20.4853C59.8076 21.0711 59.8076 22.0208 60.3934 22.6066C60.9792 23.1924 61.9289 23.1924 62.5147 22.6066L72.0607 13.0607ZM0 13.5H71V10.5H0V13.5Z" fill="#232323"/>
						</svg>
					</div>
				</div>
			</div>
		</div>
	</section>

<?php get_footer(); ?>