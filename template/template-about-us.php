<?php
/**
 * Template Name: Template page "About Us"
 */
?>
<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

    <div class="child-page-banner" style="background-image: url(<?php echo get_the_post_thumbnail_url()?>)">
        <div class="wrapper">
            <h1><?php the_title();?></h1> 
        </div>   
    </div>
    <div class="about-us-page-content">
        <?php ale_part('breadcrumbs');?>
        <?php if( have_rows('about_page_content') ): while( have_rows('about_page_content') ): the_row(); ?>

            <?php 
                if( get_row_layout() == 'text_block' ): 
                    $column_one = get_sub_field('text');
                    $column_two = get_sub_field('column-two');
                    $column_chebox = get_sub_field('column');
            ?>
                <div class="wrapper">
                    <div class="default-text-block <?php echo $column_chebox;?>">
                        <div class="col-1"><?php echo $column_one; ?></div>
                        <?php if($column_two) { ?>
                            <div class="col-2"><?php echo $column_two;?></div>
                        <?php } ?>
                    </div>
                </div>

            <?php 
                elseif( get_row_layout() == 'why_choose_us' ): 
                    $title_block = get_sub_field('title_block');
                    $description_block = get_sub_field('description_block');
                    $info_row_blocks = get_sub_field('info_row');
            ?>

                <div class="wrapper">
                    <div class="why-choose-block">
                        <?php if($title_block) {?>
                            <div class="header">
                                <div class="title"><?php echo $title_block;?></div>
                                <div class="description"><?php echo $description_block;?></div>
                            </div>
                        <?php }?>
                        <div class="info-row-block-parent">
                            <?php foreach($info_row_blocks as $info_row_block):?>
                                <div class="info-row-block">
                                    <div class="info-row-block_left">
                                        <div class="icon">
                                            <img src="<?php echo $info_row_block['icon'];?>" alt="icon">
                                        </div>
                                        <div class="title"><?php echo $info_row_block['name'];?></div>
                                    </div>
                                    <div class="info-row-block_right">
                                        <?php echo $info_row_block['description'];?>
                                    </div>
                                </div>
                            <?php endforeach;?>
                        </div>
                    </div>
                </div>

                <?php 
                    elseif( get_row_layout() == 'separator_page' ): 
                        $text = get_sub_field('text');
                ?>
                    <div class="separator-page">
                        <div class="wrapper">
                            <div class="separator-content"><?php echo $text; ?></div>
                        </div>
                    </div>

                <?php 
                    elseif( get_row_layout() == 'some_facts' ): 
                        $title = get_sub_field('title_block');
                        $some_facts = get_sub_field('some_facts_block');
                ?>
                    <div class="some-facts-block">
                        <div class="wrapper">
                            <div class="main-page-title">
                                <div class="header-with-line blue"><?php echo $title;?></div>
                            </div>
                            <div class="some-facts-parent">
                                <?php foreach($some_facts as $some_fact) { ?>
                                    <div class="item">
                                        <div class="count"><?php echo $some_fact['value'];?></div>
                                        <div class="description"><?php echo $some_fact['description'];?></div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>

                <?php 
                    elseif( get_row_layout() == 'we_are_reputable' ): 
                        $title = get_sub_field('title');
                        $content = get_sub_field('content');
                        $gallerys = get_sub_field('gallery');
                ?>
                    <div class="we-are-reputable">
                        <div class="wrapper">
                            <div class="main-page-title">
                                <div class="header-with-line blue"><?php echo $title;?></div>
                            </div>
                            <div class="content"><?php echo $content;?></div>
                            <div class="gallery">
                                <?php foreach($gallerys as $gallery) { ?>  
                                    <div class="item">
                                       <img src="<?php echo $gallery;?>" alt="icon"> 
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                
                <?php 
                    elseif( get_row_layout() == 'history_of_success' ): 
                        $title = get_sub_field('title');
                        $contents = get_sub_field('content');
                ?>
                    <div class="history-of-success">
                        <div class="wrapper">
                            <div class="main-page-title">
                                <div class="header-with-line blue"><?php echo $title;?></div>
                            </div>
                            <div class="history-of-success-parent">
                                <?php foreach($contents as $content) { ?>
                                    <div class="history-of-success-row">
                                        <div class="item col-1"><?php echo $content['column_one'];?></div>
                                        <div class="item col-2"><?php echo $content['column_two'];?></div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>

                <?php 
                    elseif( get_row_layout() == 'leadership' ): 
                        $title = get_sub_field('title_block');
                        $leadership_tabs = get_sub_field('leadership_tabs');
                ?>
                    <section class="leadership">
                        <div class="wrapper">
                            <div class="main-page-title">
                                <div class="header-with-line blue"><?php echo $title;?></div>
                            </div>
                            <!--Leadership Desk-->
                            <div class="leadership-parent">
                                <div class="item tabs">
                                    <?php foreach($leadership_tabs as $leadership_tab) {?>
                                        <div class="header-tab">
                                            <div class="photo-person">
                                                <img src="<?php echo $leadership_tab['photo'];?>" alt="photo" class="lead-photo">
                                                <a href="<?php echo $leadership_tab['linkedin'];?>" target="_blank">
                                                    <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <rect x="1" y="1" width="23" height="23" fill="#FAFAFA" stroke="#113563" stroke-width="2"/>
                                                        <path d="M9.31712 17.4987V9.62722H6.69015V17.4987H9.31712ZM8.00397 8.55186C8.92004 8.55186 9.49025 7.94742 9.49025 7.19207C9.47318 6.41969 8.92008 5.83203 8.02135 5.83203C7.12277 5.83203 6.53516 6.4197 6.53516 7.19207C6.53516 7.94745 7.10523 8.55186 7.98682 8.55186H8.00389H8.00397ZM10.7711 17.4987H13.3981V13.1029C13.3981 12.8676 13.4152 12.6326 13.4845 12.4644C13.6745 11.9944 14.1067 11.5076 14.8324 11.5076C15.783 11.5076 16.1633 12.2294 16.1633 13.2876V17.4986H18.7901V12.9852C18.7901 10.5674 17.4941 9.44242 15.7657 9.44242C14.3485 9.44242 13.7263 10.2313 13.3806 10.7687H13.3982V9.62705H10.7712C10.8057 10.3657 10.7712 17.4985 10.7712 17.4985L10.7711 17.4987Z" fill="#113563"/>
                                                    </svg>
                                                </a>
                                            </div>
                                            <div class="name"><?php echo $leadership_tab['name'];?></div>
                                            <div class="position"><?php echo $leadership_tab['position'];?></div>
                                        </div>
                                    <?php }?>
                                </div>
                                <div class="item content">
                                    <?php foreach($leadership_tabs as $leadership_tab) {?>
                                        <div class="content-tab">
                                            <div class="author-info">
                                                <div class="name">
                                                    <span><?php echo $leadership_tab['name'];?></span>
                                                    <a href="<?php echo $leadership_tab['linkedin'];?>" target="_blank">
                                                        <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <rect x="1" y="1" width="23" height="23" fill="#FAFAFA" stroke="#113563" stroke-width="2"/>
                                                            <path d="M9.31712 17.4987V9.62722H6.69015V17.4987H9.31712ZM8.00397 8.55186C8.92004 8.55186 9.49025 7.94742 9.49025 7.19207C9.47318 6.41969 8.92008 5.83203 8.02135 5.83203C7.12277 5.83203 6.53516 6.4197 6.53516 7.19207C6.53516 7.94745 7.10523 8.55186 7.98682 8.55186H8.00389H8.00397ZM10.7711 17.4987H13.3981V13.1029C13.3981 12.8676 13.4152 12.6326 13.4845 12.4644C13.6745 11.9944 14.1067 11.5076 14.8324 11.5076C15.783 11.5076 16.1633 12.2294 16.1633 13.2876V17.4986H18.7901V12.9852C18.7901 10.5674 17.4941 9.44242 15.7657 9.44242C14.3485 9.44242 13.7263 10.2313 13.3806 10.7687H13.3982V9.62705H10.7712C10.8057 10.3657 10.7712 17.4985 10.7712 17.4985L10.7711 17.4987Z" fill="#113563"/>
                                                        </svg>
                                                    </a>
                                                </div>
                                                <div class="position"><?php echo $leadership_tab['position'];?></div>
                                                <div class="desc"><?php echo $leadership_tab['description'];?></div>
                                            </div>
                                            <div class="author-photo">
                                                <img src="<?php echo $leadership_tab['photo'];?>" alt="photo">
                                            </div>
                                        </div>
                                    <?php }?>
                                </div>
                            </div>
                            <!--Leadership Mob-->
                            <div class="leadership-parent-mob">
                                <!--Item-->
                                <?php foreach($leadership_tabs as $leadership_tab) {?>
                                    <div class="item-leadership">
                                        <div class="leadership-photo">
                                            <img src="<?php echo $leadership_tab['photo'];?>" alt="photo">
                                            <a href="<?php echo $leadership_tab['linkedin'];?>" target="_blank">
                                                <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <rect x="1" y="1" width="23" height="23" fill="#FAFAFA" stroke="#113563" stroke-width="2"/>
                                                            <path d="M9.31712 17.4987V9.62722H6.69015V17.4987H9.31712ZM8.00397 8.55186C8.92004 8.55186 9.49025 7.94742 9.49025 7.19207C9.47318 6.41969 8.92008 5.83203 8.02135 5.83203C7.12277 5.83203 6.53516 6.4197 6.53516 7.19207C6.53516 7.94745 7.10523 8.55186 7.98682 8.55186H8.00389H8.00397ZM10.7711 17.4987H13.3981V13.1029C13.3981 12.8676 13.4152 12.6326 13.4845 12.4644C13.6745 11.9944 14.1067 11.5076 14.8324 11.5076C15.783 11.5076 16.1633 12.2294 16.1633 13.2876V17.4986H18.7901V12.9852C18.7901 10.5674 17.4941 9.44242 15.7657 9.44242C14.3485 9.44242 13.7263 10.2313 13.3806 10.7687H13.3982V9.62705H10.7712C10.8057 10.3657 10.7712 17.4985 10.7712 17.4985L10.7711 17.4987Z" fill="#113563"/>
                                                        </svg>
                                            </a>
                                        </div>
                                        <div class="leadership-info">
                                            <div class="leadership-info-name">
                                                <div class="name"><?php echo $leadership_tab['name'];?></div>
                                                <div class="position"><?php echo $leadership_tab['position'];?></div>
                                            </div>
                                            <div class="read-more-leadership">Read more</div>
                                        </div>
                                        <div class="desc"><?php echo $leadership_tab['description'];?></div>
                                    </div>
                                <?php }?>
                                <!--End-->
                            </div>
                        </div>
                    </section>

        <?php endif; endwhile; endif; ?>
    </div>
<?php endwhile; endif; ?>
<?php get_footer(); ?>