<?php
/**
 * Template Name: Template page "Technologies"
 */
?>
<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

    <div class="child-page-banner" style="background-image: url(<?php echo get_the_post_thumbnail_url()?>)">
        <div class="wrapper">
            <h1><?php the_title();?></h1> 
        </div>   
    </div>
    <div class="child-page-content technologies">
        <?php ale_part('breadcrumbs');?>
        <div class="wrapper">
            <div class="child-page-description">
                <div class="two-col-parent">
                    <div class="content"><?php echo get_field('text_block_top')['title'];?></div>
                    <div class="content"><?php echo get_field('text_block_top')['description'];?></div>
                </div>
            </div>
            <div class="main-page-title">
			    <h3 class="header-with-line blue">Technologies We Work with:</h3>
		    </div>
            <div class="technologies-wrap-block">
                <!--Technologies item-->
                <?php 
                    if( have_rows('technologies_row') ): while( have_rows('technologies_row') ) : the_row();

                    $technologies_name = get_sub_field('technologies_name');
                    $technologies_images = get_sub_field('technologies_image');
                ?>
                    <div class="item">
                        <div class="technologies-name"><?php echo $technologies_name;?></div>
                        <div class="technologies-image">
                            <?php 
                                foreach($technologies_images as $technologies_image) {
                            ?>
                                <div class="technologies-image_item">
                                    <img src="<?php echo $technologies_image?>" alt="technologies stack">
                                </div>
                            <?php }?>
                        </div>
                    </div>
                <?php endwhile; endif; ?>
            </div>
            <div class="child-page-description">
                <?php echo get_field('text_block_bottom')['description'];?>
            </div>
        </div>
        <?php if(get_field('bottom_banner')) { ?>
            <div class="bottom-banner">
                <div class="wrapper">
                    <?php echo get_field('bottom_banner');?>
                </div>
            </div>
        <?php } ?>
    </div>

<?php endwhile; endif; ?>
<?php get_footer(); ?>