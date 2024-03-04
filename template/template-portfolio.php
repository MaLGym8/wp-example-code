<?php
/**
 * Template Name: Template page "Portfolio"
 */
?>
<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

    <div class="portfolio-page">
        <div class="child-page-banner" style="background-image: url(<?php echo get_the_post_thumbnail_url()?>)">
            <div class="wrapper">
                <h1><?php the_title();?></h1> 
            </div>   
        </div>
        <div class="portfolio-page-content">
            <?php ale_part('breadcrumbs');?>
            <div class="wrapper">
                <div class="filters-parent">
                    <div class="all-portfolio-parent">
                        <!--Items-->
                        <?php 
                            $postsportfolio = new WP_Query( array('post_type' => 'portfolio') );
                            if ($postsportfolio->have_posts()) : while ($postsportfolio->have_posts()) : $postsportfolio->the_post();

                            $post_category = get_the_terms($post->ID, 'portfolio-category');
                        ?>
                            <a href="<?php the_permalink();?>" class="item-portfolio" data-filter-tag="<?php echo $post_category[0]->name; ?>">
                                <div class="item-portfolio-parent" style="background-image: url(<?php echo get_the_post_thumbnail_url()?>)">
                                    <div class="portfolio-item_content">
                                        <div class="portfolio_tag"><?php echo $post_category[0]->name; ?></div>
                                        <div class="portfolio_title"><?php the_title();?></div>
                                        <div class="hover-cover">
                                            <img src="<?php echo ale_get_meta('portfolio_icon');?>" alt="<?php the_title();?>">
                                        </div>
                                    </div>
                                </div>
                            </a>
                        <?php endwhile; endif; wp_reset_postdata();?>
                    </div>
                    <div class="filters-portfolio-case">
                        <div class="filter-title">Filter</div>
                        <ul class="filter-portfolio">
                            <li class="active-filters" data-filters="All">All</li>
                            <?php 
                                $terms_postfolio = get_terms([
                                    'taxonomy' => 'portfolio-category',
                                    'hide_empty' => true,
                                ]);

                                foreach ( $terms_postfolio as $term_postfolio ) :
                            ?>
                                <li data-filters="<?php echo $term_postfolio->name;?>"><?php echo $term_postfolio->name;?></li>
                            <?php endforeach;?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php endwhile; endif; ?>
<?php get_footer(); ?>