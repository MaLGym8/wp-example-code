<?php get_header(); ?>
<!-- Content -->
<div class="notfound-page-content">
    <div class="notfound-top-banner">
        <div class="wrapper">
            <div class="notfound-banner-parent">
                <div class="notfound-text">
                    <?php ale_option('notfoundcontent'); ?>
                    <a href="/">Back to Homepage</a>
                </div>
                <div class="notfound-img">
                    <img src="<?php ale_option('notfoundimg'); ?>" alt="404">
                </div>
            </div>
        </div>
    </div>
    <section class="services-home">
        <div class="wrapper">
            <div class="main-page-title">
                <h3 class="header-with-line blue">Services</h3>
            </div>
            <div class="wrap-services-block">
                <!--Service-->
                <?php
                $postsservice = new WP_Query(array('post_type' => 'services'));

                if ($postsservice->have_posts()) : while ($postsservice->have_posts()) : $postsservice->the_post();
                ?>
                        <a href="<?php the_permalink(); ?>">
                            <div class="item">
                                <div class="icons-item">
                                    <img src="<?php echo get_field('item_icon'); ?>" alt="icon services" class="style-svg">
                                    <img src="<?php echo get_template_directory_uri(); ?>/img/orange-arrow.svg" alt="go to" class="arrow-go">
                                </div>
                                <div class="title-item"><?php the_title(); ?></div>
                                <div class="desc-item"><?php the_content(); ?></div>
                            </div>
                        </a>
                <?php endwhile;
                endif;
                wp_reset_postdata(); ?>
            </div>
        </div>
    </section>
    <section class="portfolio-404">
        <div class="wrapper">
            <div class="portfolio-404-parent">
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
                        <a href="<?php the_permalink(); ?>" class="item-portfolio">
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
    </section>
</div>
<?php get_footer(); ?>