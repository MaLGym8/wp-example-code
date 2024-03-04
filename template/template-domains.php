<?php
/**
 * Template Name: Template page "Domains"
 */
?>
<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

    <div class="child-page-banner" style="background-image: url(<?php echo get_the_post_thumbnail_url()?>)">
        <div class="wrapper">
            <h1><?php the_title();?></h1> 
        </div>   
    </div>
    <div class="child-page-content domains-page">
		<?php ale_part('breadcrumbs');?>
		<?php if( have_rows('domains_page_content') ): while( have_rows('domains_page_content') ): the_row(); ?>

			<?php 
				if( get_row_layout() == 'default_text_block' ): 
					$text = get_sub_field('text');
			?>
				<div class="default-text-block">
					<div class="wrapper">
						<?php echo $text;?>
					</div>
				</div>
			
			<?php 
                elseif( get_row_layout() == 'domains_block' ): 
                    $text = get_sub_field('text_block');
					$domains_posts = get_sub_field('posts');
            ?>
				<div class="domains-home">
					<div class="domains-content">
						<div class="wrapper">
							<div class="default-text-block"><?php echo $text;?></div>
							<div class="wrap-domains-block">
								<!--Domains item-->
								<?php 
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
					</div>
				</div>
			
			<?php 
                elseif( get_row_layout() == 'featured_clients_block' ): 
                    $text_block = get_sub_field('text_block');
                    $gallerys = get_sub_field('gallery');
            ?>
				<div class="featured-clients-gallery">
					<div class="wrapper">
						<div class="two-col-parent">
							<div class="content"><?php echo $text_block['column_one']?></div>
							<div class="content"><?php echo $text_block['column_two']?></div>
						</div>
						<div class="gallery">
							<?php foreach($gallerys as  $gallery) { ?>
								<div class="item">
									<img src="<?php echo $gallery;?>" alt="featured clients">
								</div>
							<?php } ?>
						</div>
					</div>
				</div>

				<div class="featured-cases">
					<div class="wrapper">
						<div class="featured-cases-parent">
							<div class="text-portfolio">
								<p>Browse through our featured cases</p>
								<a href="/portfolio/">See All</a>
							</div>
							<div class="all-portfolio-parent">
								<!--Items-->
								<?php
									$postsportfolio = new WP_Query(array('post_type' => 'portfolio', 'posts_per_page' => 2));
									if ($postsportfolio->have_posts()) : while ($postsportfolio->have_posts()) : $postsportfolio->the_post();

									$post_category = get_the_terms($post->ID, 'portfolio-category');
								?>
									<a href="<?php the_permalink();?>" class="item-portfolio">
										<div class="item-portfolio-parent" style="background-image: url(<?php echo get_the_post_thumbnail_url() ?>)" data-filter-tag="<?php echo $post_category[0]->name; ?>">
											<div class="portfolio-item_content">
												<div class="portfolio_tag"><?php echo $post_category[0]->name; ?></div>
												<div class="portfolio_title"><?php the_title(); ?></div>
												<div class="hover-cover">
													<img src="<?php echo ale_get_meta('portfolio_icon');?>" alt="<?php the_title();?>">
												</div>
											</div>
										</div>
									</a>
								<?php endwhile; endif; wp_reset_postdata(); ?>
							</div>
						</div>
					</div>
				</div>
		<?php endif; endwhile; endif; ?>
    </div>

<?php endwhile; endif; ?>
<?php get_footer(); ?>