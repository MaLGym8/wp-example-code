<?php
/**
 * Template Name: Template page "Services"
 */
?>
<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

    <div class="child-page-banner" style="background-image: url(<?php echo get_the_post_thumbnail_url()?>)">
        <div class="wrapper">
            <h1><?php the_title();?></h1> 
        </div>   
    </div>
    <div class="services-page-content">
        <?php ale_part('breadcrumbs');?>
        <?php if( have_rows('services_page_content') ): while( have_rows('services_page_content') ): the_row(); ?>

        <?php 
            if( get_row_layout() == 'how_we_work' ): 
                $title = get_sub_field('title');
                $description = get_sub_field('description');
                $cards = get_sub_field('card');
        ?>

                <div class="how-we-work">
                    <div class="wrapper">
                        <div class="header">
                            <div class="title"><?php echo $title;?></div>
                            <div class="description"><?php echo $description;?></div>
                        </div>
                        <div class="how-we-work-projects">
                            <!--Item-->
                            <?php 
                                foreach($cards as $card) {
                            ?>
                            <div class="item">
                                <div class="header-item">
                                    <div class="icon">
                                        <img src="<?php echo $card['icon'];?>" alt="project">
                                    </div>
                                    <div class="title"><?php echo $card['title'];?></div>
                                </div>
                                <div class="info-item">
                                    <?php 
                                        foreach($card['info_card'] as $info_card) {
                                    ?>
                                        <div class="info-item_row">
                                            <div class="title"><?php echo $info_card['title'];?></div>
                                            <div class="value"><?php echo $info_card['value'];?></div>
                                        </div>
                                    <?php }?>
                                </div>
                                <div class="anchor-link">
                                    <a href="<?php echo $card['link']['url'];?>"><?php echo $card['link']['title'];?></a>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            <?php 
                elseif( get_row_layout() == 'how_we_work_details' ): 
                    $title = get_sub_field('title');
                    $info_projects = get_sub_field('info_project');
                    $text_info_project = get_sub_field('two-column_text_box');
                    $best_fit_for_block = get_sub_field('best_fit_for_block');
                    $attributes_block = get_sub_field('attrebutes_block');
            ?>
                <div class="how-we-work-details" <?php echo $attributes_block;?> >
                    <div class="wrapper">
                        <div class="main-page-title">
				            <div class="header-with-line"><?php echo $title;?></div>
			            </div>
                        <div class="info-project-row">
                            <!--Item-->
                            <?php 
                                foreach($info_projects as $info_project) {
                            ?>
                                <div class="item">
                                    <div class="icon">
                                        <img src="<?php echo $info_project['icon'];?>" alt="info project">
                                    </div>
                                    <div class="project-info">
                                        <div class="key"><?php echo $info_project['title'];?></div>
                                        <div class="value"><?php echo $info_project['value'];?></div>
                                    </div>
                                </div>
                            <?php }?>
                        </div>
                        <div class="text-info-about-project">
                            <div class="title"><?php echo $text_info_project['title'];?></div>
                            <div class="description"><?php echo $text_info_project['descriptions'];?></div>
                        </div>
                        <div class="best-fit-for">
                            <div class="title"><?php echo $best_fit_for_block['best_fit_for_title'];?></div>
                            <div class="best-fit-for-items">
                                <?php 
                                    foreach($best_fit_for_block['best_fit_for_items'] as $best_fit_for_item) {
                                ?>
                                    <div class="item">
                                        <div class="icon">
                                            <img src="<?php echo $best_fit_for_item['icon'];?>" alt="icon">
                                        </div>
                                        <div class="name"><?php echo $best_fit_for_item['text'];?></div>
                                    </div>
                                <?php }?>
                            </div>
                        </div>
                    </div>
                </div>
        <?php endif; endwhile; endif; ?>
    </div>
<?php endwhile; endif; ?>
<?php get_footer(); ?>