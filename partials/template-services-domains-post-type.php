    <div class="child-page-banner" style="background-image: url(<?php echo get_the_post_thumbnail_url()?>)">
        <div class="wrapper">
            <h1><?php the_title();?></h1>
            <?php 
                $top_section_group = get_field('top_section');
            ?>
            <?php if($top_section_group['description']) {?>
                <div class="description-section-parent">
                    <div class="decription"><?php echo $top_section_group['description'];?></div>
                    <div class="link">
                        <a href="<?php echo $top_section_group['link']['url'];?>" id="gaBannerCTA"><?php echo $top_section_group['link']['title'];?></a>
                    </div>
                </div> 
            <?php }?>
        </div>   
    </div>
    <div class="child-page-content single-services">
        <?php ale_part('breadcrumbs');?>
        <?php if( have_rows('services_content') ): while( have_rows('services_content') ): the_row(); ?>

            <?php 
                if( get_row_layout() == 'text_block' ): 
                    $text_block = get_sub_field('text');
                    $check_two_column = get_sub_field('two_column');
                    $group_two_column = get_sub_field('two_column_content');
                    $margin = get_sub_field('margin');

                    $margin_top = $margin['top'] ? $margin['top'] : 0;
                    $margin_bottom = $margin['bottom'] ? $margin['bottom'] : 0;

            ?>
                <div class="wrapper">
                    <div class="default-text-block">       
                        <?php if(!$check_two_column) { ?>
                            <div class="one-col-parent" <?php if($margin['top'] || $margin['bottom']) {?>style="margin:<?php echo $margin_top;?> 0 <?php echo $margin_bottom; ?> 0;"<?php }?>><?php echo $text_block;?></div>
                            <?php } else { ?>
                            <div class="two-col-parent" <?php if($margin['top'] || $margin['bottom']) {?>style="margin:<?php echo $margin_top;?> 0 <?php echo $margin_bottom; ?> 0;"<?php }?>>
                                <div class="content"><?php echo $group_two_column['one_column'];?></div>
                                <div class="content"><?php echo $group_two_column['two_column'];?></div>
                            </div>
                        <?php } ?>
                    </div>
                </div>

            <?php 
                elseif( get_row_layout() == 'our_enterprise_software' ): 
                    $rows = get_sub_field('row');
            ?>
                <div class="our-enterprise-software">
                    <div class="wrapper">
                        <div class="our-enterprise-software-parent">
                            <?php foreach($rows as $row) { ?>
                                <div class="row">
                                    <?php if($row['left_text_block']) {?>
                                        <div class="left" <?php if($row['image']) {?> style="padding-left:150px;"<?php }?>>
                                            <?php if($row['image']) {?>
                                                <div class="img">
                                                    <img src="<?php echo $row['image']['url'];?>" alt="<?php echo $row['image']['alt'];?>">
                                                </div>
                                            <?php }?>
                                            <div class="text"><?php echo $row['left_text_block'];?></div>
                                        </div>
                                    <?php }?>
                                    <?php if($row['right_text_block']) {?>
                                        <div class="right"><?php echo $row['right_text_block'];?></div>
                                    <?php }?>
                                </div>
                            <?php }?>
                        </div>
                    </div>
                </div>
            <?php 
                elseif( get_row_layout() == 'how_we_can_help' ): 
                    $type_block = get_sub_field('type_block_how_we_can_help');

                    $bg_block = get_sub_field('background_block');
                    $title = get_sub_field('title');
                    $description_group = get_sub_field('how_we_can_help_description');
                    $how_we_can_help_type_2 = get_sub_field('how_we_can_help_type_2');

            ?>
                <div class="how-we-can-help <?php echo $type_block['value'];?>" <?php if($bg_block) { ?>style="background:<?php echo $bg_block;?>"<?php } ?>>
                    <div class="wrapper">
                        <?php if($title) {?>
                            <div class="title-block"><?php echo $title;?></div>
                        <?php }?>
                        <?php if($type_block['value'] == 'type_1') {?>
                            <div class="wrap-description">
                                <div class="text"><?php echo $description_group['description'];?></div>
                                <div class="img">
                                    <img src="<?php echo $description_group['image']['url'];?>" alt="<?php echo $description_group['image']['alt'];?>">
                                </div>
                            </div>
                        <?php }?>
                        <?php if($type_block['value'] == 'type_2') {?>
                            <div class="how-we-can-help_type_2-parent <?php echo $how_we_can_help_type_2['overlay_type'][0]['value'];?>">
                                <div class="image">
                                    <img src="<?php echo $how_we_can_help_type_2['image']['url'];?>" alt="<?php echo $how_we_can_help_type_2['image']['alt'];?>">
                                </div>
                                <div class="items-parent">
                                    <!--Item-->
                                    <?php foreach($how_we_can_help_type_2['items'] as $how_we_can_help_item) {?>
                                        <div class="item">
                                            <div class="icon">
                                                <img src="<?php echo $how_we_can_help_item['icon']['url'];?>" alt="<?php echo $how_we_can_help_item['icon']['alt'];?>">
                                            </div>
                                            <div class="content">
                                                <div class="title"><?php echo $how_we_can_help_item['title'];?></div>
                                                <div class="desc"><?php echo $how_we_can_help_item['description'];?></div>
                                            </div>
                                        </div>
                                    <?php }?>
                                    <!--End-->
                                    <?php if(count($how_we_can_help_type_2['overlay_type']) > 0 && $how_we_can_help_type_2['clutch_group']['link']) {?>
                                        <div class="item clutch">
                                            <a href="<?php echo $how_we_can_help_type_2['clutch_group']['link'];?>" target="_blank">
                                                <img src="<?php echo $how_we_can_help_type_2['clutch_group']['image']['url'];?>" alt="<?php echo $how_we_can_help_type_2['clutch_group']['image']['alt'];?>">
                                            </a>
                                        </div>
                                    <?php }?>
                                </div>
                            </div>
                        <?php }?>
                    </div>
                </div>

            <?php 
                elseif( get_row_layout() == 'cases' ): 
                    $case_items = get_sub_field('case_item');
            ?>
                <div class="cases-block">
                    <div class="wrapper">
                        <div class="cases-parent">
                            <!--Item-->
                            <?php foreach( $case_items as  $case_item ) { ?>
                                <div class="item-case">
                                    <div class="img-case">
                                        <img src="<?php echo $case_item['image']['url'];?>" alt="<?php echo $case_item['image']['alt'];?>">
                                    </div>
                                    <div class="text-case"><?php echo $case_item['description'];?></div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>

            <?php 
                elseif( get_row_layout() == 'feedback_row' ): 
                    $author_photo = get_sub_field('author_photo');
                    $author_name = get_sub_field('author_name');
                    $author_position = get_sub_field('author_position');
                    $author_feedback = get_sub_field('author_feedback');
                    $margin = get_sub_field('margin');

                    $margin_top = $margin['top'] ? $margin['top'] : 0;
                    $margin_bottom = $margin['bottom'] ? $margin['bottom'] : 0;

                    $feedback_type = get_sub_field('feedback_type');
                    $feedback_type_slider = get_sub_field('feedback_type_slider');
            ?>

                <div class="feedback-row <?php echo $feedback_type['value'];?>" <?php if($margin['top'] || $margin['bottom'] || $feedback_type_slider['background']) {?>style="margin:<?php echo $margin_top;?> 0 <?php echo $margin_bottom; ?> 0; background: url(<?php echo $feedback_type_slider['background'];?>) no-repeat center center/cover;"<?php }?>>
                    <div class="wrapper">
                        <?php if($feedback_type['value'] == 'type_1_basic') {?>
                            <div class="feedback-parent">
                                <div class="author-info">
                                    <div class="author-info_photo">
                                        <img src="<?php echo $author_photo['url'];?>" alt="<?php echo $author_photo['alt'];?>">
                                    </div>
                                    <div class="author-info_name-and-position">
                                        <div class="name"><?php echo $author_name;?></div>
                                        <div class="position"><?php echo $author_position;?></div>
                                    </div>
                                </div>
                                <div class="author-feedback"><?php echo $author_feedback;?></div>
                            </div>
                        <?php }?>
                        <?php if($feedback_type['value'] == 'type_2_slider') {?>
                            <div class="slider-services-feedback-parent">
                                <div class="swiper-wrapper">
                                    <?php foreach($feedback_type_slider['feedback_slide'] as $feedback_slide) {?>
                                        <div class="swiper-slide">
                                            <div class="feedback-parent">
                                                <div class="author-info">
                                                    <div class="author-info_photo">
                                                        <img src="<?php echo $feedback_slide['author_photo']['url'];?>" alt="<?php echo $feedback_slide['author_photo']['alt'];?>">
                                                    </div>
                                                    <div class="author-info_name-and-position">
                                                        <div class="name"><?php echo $feedback_slide['author_name'];?></div>
                                                        <div class="position"><?php echo $feedback_slide['author_position'];?></div>
                                                    </div>
                                                </div>
                                                <div class="author-feedback"><?php echo $feedback_slide['author_feedback'];?></div>
                                            </div>
                                        </div>
                                    <?php }?>
                                </div>
                            </div>  
                            <div class="navigate-feedback-type-slider">
                                <div class="feedback-type-slider-prev feedback-type-slider-arrow">
                                    <svg width="28" height="22" viewBox="0 0 28 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M10.2133 0.617676L0.83828 9.99268V12.6177L10.2133 21.9927L12.8758 19.3677L6.72578 13.1802H27.6133V9.43018H6.72578L12.9133 3.24268L10.2133 0.617676Z" fill="#ffffff"></path>
                                    </svg>
                                </div>
                                <div class="feedback-type-slider-nav"></div>
                                <div class="feedback-type-slider-next feedback-type-slider-arrow">
                                    <svg width="28" height="22" viewBox="0 0 28 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M17.7867 0.617676L27.1617 9.99268V12.6177L17.7867 21.9927L15.1242 19.3677L21.2742 13.1802H0.386719V9.43018H21.2742L15.0867 3.24268L17.7867 0.617676Z" fill="#ffffff"></path>
                                    </svg>
                                </div>
                            </div>
                        <?php }?>
                    </div>
                </div>

            <?php 
                elseif( get_row_layout() == 'custom_enterprise_solutions' ): 
                    $title_block = get_sub_field('title');
                    $description_block = get_sub_field('description');
                    $sub_description = get_sub_field('sub_description');

                    $tab_type = get_sub_field('tab_type_custom_enterprise_solutions');

                    $custom_enterprise_solutions_tabs = get_sub_field('custom_enterprise_solutions_tabs');
            ?>
                <div class="custom-enterprise-solutions <?php echo $tab_type['value'];?>">
                    <div class="wrapper">
                        <?php if($title_block || $description_block) {?>
                            <div class="title-parent">
                                <div class="header-with-line blue"><?php echo $title_block;?></div>
                                <div class="description"><?php echo $description_block;?></div>
                            </div>
                        <?php }?>
                        <?php if($tab_type['value'] == 'type_1') {?>
                            <div class="custom-enterprise-solutions-tabs">
                                <div class="item tabs">
                                    <?php foreach($custom_enterprise_solutions_tabs as $key=>$custom_enterprise_solutions_tab) {?>
                                        <div class="header-tab <?php if($key == 0) {?>active<?php }?>">
                                            <img src="<?php echo $custom_enterprise_solutions_tab['icon']['url'];?>" alt="<?php echo $custom_enterprise_solutions_tab['icon']['alt'];?>">
                                            <?php echo $custom_enterprise_solutions_tab['title'];?>
                                        </div>
                                    <?php }?>
                                </div>
                                <div class="item content">
                                    <?php foreach($custom_enterprise_solutions_tabs as $key=>$custom_enterprise_solutions_tab) {?>
                                        <div class="tab-heading-mob"><?php echo $custom_enterprise_solutions_tab['title'];?></div>
                                        <div class="content-tab <?php if($key == 0) {?>active<?php }?>">
                                            <?php echo $custom_enterprise_solutions_tab['description'];?>
                                        </div>
                                    <?php }?>
                                </div>
                            </div>
                        <?php }?>
                        <?php if($tab_type['value'] == 'type_2') {?>
                            <div class="sub-description">
                                <?php echo $sub_description;?>
                            </div>
                            <?php ale_part('icon-slide-mob-tabs');?>
                            <div class="custom-enterprise-solutions-tabs">
                                <div class="item tabs">
                                    <?php foreach($custom_enterprise_solutions_tabs as $key=>$custom_enterprise_solutions_tab) {?>
                                        <div class="header-tab <?php if($key == 0) {?>active<?php }?>">
                                            <?php echo $custom_enterprise_solutions_tab['title'];?>
                                        </div>
                                    <?php }?>
                                </div>
                                <div class="item content">
                                    <?php foreach($custom_enterprise_solutions_tabs as $key=>$custom_enterprise_solutions_tab) {?>
                                        <div class="content-tab <?php if($key == 0) {?>active<?php }?>">
                                            <div class="content-wrap">
                                                <div class="icon">
                                                    <img src="<?php echo $custom_enterprise_solutions_tab['icon']['url'];?>" alt="<?php echo $custom_enterprise_solutions_tab['icon']['alt'];?>">
                                                </div>
                                                <div class="content">
                                                    <?php echo $custom_enterprise_solutions_tab['description'];?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php }?>
                                </div>
                            </div>
                        <?php }?>
                    </div>
                </div>

            <?php 
                elseif( get_row_layout() == 'gallery_block' ): 
                    $gallery_type = get_sub_field('gallery_type');
                    $galleries_row_four = get_sub_field('gallery_type_2');
                    $galleries_row_six = get_sub_field('gallery');
                    $background = get_sub_field('background');
            ?>
                <div class="gallery-block <?php echo $gallery_type['value'];?>" <?php if($background) {?>style="background:<?php echo $background;?>"<?php }?>>
                    <div class="wrapper">
                        <?php if($gallery_type['value'] == 'type_1') {?>
                            <div class="gallery-parent">
                                <!--Item-->
                                <?php foreach($galleries_row_six as $gallery) {?>
                                    <div class="item">
                                        <img src="<?php echo $gallery['url'];?>" alt="<?php echo $gallery['alt'];?>">
                                    </div>
                                <?php }?>
                            </div>
                        <?php }?>
                        <?php if($gallery_type['value'] == 'type_2') {?>
                            <div class="title-parent">
                                <div class="header-with-line blue"><?php echo $galleries_row_four['title'];?></div>
                                <div class="description"><?php echo $galleries_row_four['description'];?></div>
                            </div>
                            <div class="gallery-parent">
                                <!--Gallery Item-->
                                <?php foreach($galleries_row_four['gallery'] as $gallery_img) {?>
                                    <div class="item">
                                        <img src="<?php echo $gallery_img['url'];?>" alt="<?php echo $gallery_img['alt'];?>">
                                    </div>
                                <?php }?>
                                <!--End-->
                            </div>
                        <?php }?>
                    </div>
                </div>

            <?php
                elseif( get_row_layout() == 'faq_block' ): 
                    $heading_type = get_sub_field('heading_in_two_columns');
                    $title = get_sub_field('title');
                    $description = get_sub_field('description');

                    $type_accordion = get_sub_field('accordion_type');

                    $background = get_sub_field('background');
                    $type_2_static_image = get_sub_field('static_image');
                    $faq_rows = get_sub_field('faq_row');
            ?>
                <div class="faq-section <?php echo $type_accordion['value'];?>" <?php if($background) {?>style="background: <?php echo $background; ?>;"<?php }?>>
                    <div class="wrapper">
                        <div class="title-block <?php echo $heading_type[0]['value'];?>">
                            <div class="header-with-line blue"><?php echo $title;?></div>
                            <?php if($description) {?>
                                <div class="content-description"><?php echo $description;?></div>
                            <?php }?>
                        </div>
                        <?php if($type_accordion['value'] == 'type_1') {?>
                        <div class="accordion-parent">
                             <!--Item-->
                             <?php foreach($faq_rows as $faq_row) {?>
                                <div class="accordion-row">
                                    <div class="accordion-header">
                                        <?php if($faq_row['icon']) {?>
                                            <div class="icon">
                                                <img src="<?php echo $faq_row['icon']['url'];?>" alt="<?php echo $faq_row['icon']['alt'];?>">
                                            </div>
                                        <?php }?>
                                        <?php echo $faq_row['question'];?>
                                    </div>
                                    <div class="accordion-content">
                                        <div class="description">
                                            <?php echo $faq_row['answer'];?>
                                        </div>
                                    </div>
                                </div>
                            <?php }?>
                            <!--End-->
                        </div>
                        <?php }?>
                        <?php if($type_accordion['value'] == 'type_2') {?>
                            <div class="accordion-container">
                                <div class="accordion-parent">
                                    <!--Item-->
                                    <?php foreach($faq_rows as $faq_row) {?>
                                        <div class="accordion-row">
                                            <div class="accordion-header">
                                                <?php if($faq_row['icon']) {?>
                                                    <div class="icon">
                                                        <img src="<?php echo $faq_row['icon']['url'];?>" alt="<?php echo $faq_row['icon']['alt'];?>">
                                                    </div>
                                                <?php }?>
                                                <?php echo $faq_row['question'];?>
                                            </div>
                                            <div class="accordion-content">
                                                <div class="description">
                                                    <?php echo $faq_row['answer'];?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php }?>
                                    <!--End-->
                                </div>
                                <div class="static-cover-block">
                                    <img src="<?php echo $type_2_static_image['url'];?>" alt="<?php echo $type_2_static_image['alt'];?>">
                                </div>
                            </div>
                        <?php }?>
                    </div>
                </div>

            <?php 
                elseif( get_row_layout() == 'development_lifecycle' ): 
                    $title_block = get_sub_field('title');
                    $description_block = get_sub_field('description');
                    $sub_description_block = get_sub_field('sub_description');

                    $lifecycle_steps = get_sub_field('lifecycle_step');
            ?>
                <div class="development-lifecycle">
                    <div class="wrapper">
                        <div class="title-block">
                            <div class="header-with-line blue"><?php echo $title_block;?></div>
                            <div class="content-description"><?php echo $description_block;?></div>
                        </div>
                        <div class="development-lifecycle-parent">
                            <!--Item-->
                            <?php foreach($lifecycle_steps as $lifecycle_step) {?>
                                <div class="item">
                                    <div class="lifecycle-name"><?php echo $lifecycle_step['title'];?></div>
                                    <div class="lifecycle-icon">
                                        <img src="<?php echo $lifecycle_step['icon']['url'];?>" alt="<?php echo $lifecycle_step['title']['alt'];?>">
                                    </div>
                                </div>
                            <?php }?>
                        </div>
                        <div class="sub-description"><?php echo $sub_description_block;?></div>
                    </div>
                </div>

            <?php 
                elseif( get_row_layout() == 'cta_mail' ): 
                    $cta_text = get_sub_field('text');
                    $cta_link = get_sub_field('link');
                    $margin = get_sub_field('margin');

                    $margin_top = $margin['top'] ? $margin['top'] : 0;
                    $margin_bottom = $margin['bottom'] ? $margin['bottom'] : 0;
            ?>
                <div class="section-cta-mail" <?php if($margin['top'] || $margin['bottom']) {?>style="margin:<?php echo $margin_top;?> 0 <?php echo $margin_bottom; ?> 0;"<?php }?>>
                    <div class="wrapper">
                        <div class="cta-contact-row">
                            <div class="messages"><?php echo $cta_text;?></div>
                            <div class="link">
                                <a href="<?php echo $cta_link;?>" id="gaThirdCTA">
                                    <svg width="46" height="30" viewBox="0 0 46 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M2.00046 28.302L2.00865 1.84656H44.4652L44.457 28.302H2.00046Z" stroke="white" stroke-width="3"></path>
                                        <path d="M2.21569 2.05451L23.8934 16.7822L44.25 2.05451" stroke="white" stroke-width="3"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

            <?php 
                elseif( get_row_layout() == 'featured_clients' ): 
                    $title_block = get_sub_field('title');
                    $description_block = get_sub_field('description');
                    $featured_clients_slider = get_sub_field('featured_clients_slider'); 
            ?>

                <div class="featured-clients-services">
                    <div class="wrapper">
                        <div class="title-parent <?php if($description_block) {?>two-col<?php }?>">
                            <div class="header-with-line blue"><?php echo $title_block;?></div>
                            <?php if($description_block) {?>
                                <div class="description"><?php echo $description_block;?></div>
                            <?php }?>
                        </div>
                        <div class="featured-clients-services-slider">
                            <!--Slide-->
                            <div class="swiper customers-about-us-slider">
                                <div class="swiper-wrapper">
                                    <?php 
                                        $sliders = $featured_clients_slider['slide'];
                                        foreach($sliders as $key => $slider) { 
                                    ?>
                                        <div class="swiper-slide featured-clients-slide">
                                            <div class="featured-clients_content">
                                                <?php echo $slider['content'];?>
                                                <?php if($slider['link']['url']) { ?>
                                                    <div class="slide-link">
                                                        <a href="<?php echo $slider['link']['url'];?>" id="gaRelatedCase<?php echo $key+1;?>"><?php echo $slider['link']['title'];?></a>
                                                    </div>
                                                <?php }?>
                                            </div>
                                            <div class="featured-clients_img">
                                                <img src="<?php echo $slider['image']['url'];?>" alt="<?php echo $slider['image']['alt'];?>">
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                            <?php if(count($sliders) > 1) {?>
                                <div class="navigate-customers-about-us">
                                    <div class="customers-about-us-prev customers-arrow">
                                        <svg width="28" height="22" viewBox="0 0 28 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M10.2133 0.617676L0.83828 9.99268V12.6177L10.2133 21.9927L12.8758 19.3677L6.72578 13.1802H27.6133V9.43018H6.72578L12.9133 3.24268L10.2133 0.617676Z" fill="#B0B0B0"/>
                                        </svg>
                                    </div>
                                    <div class="customers-about-us-nav"></div>
                                    <div class="customers-about-us-next customers-arrow">
                                        <svg width="28" height="22" viewBox="0 0 28 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M17.7867 0.617676L27.1617 9.99268V12.6177L17.7867 21.9927L15.1242 19.3677L21.2742 13.1802H0.386719V9.43018H21.2742L15.0867 3.24268L17.7867 0.617676Z" fill="#B0B0B0"/>
                                        </svg>
                                    </div>
                                </div>
                            <?php }?>
			            </div>
                    </div>
                </div>

            <?php 
                elseif( get_row_layout() == 'why_choose_block' ): 
                    $title_block = get_sub_field('title_block');
                    $description_block = get_sub_field('description_block');
                    $info_row_blocks = get_sub_field('info_row'); 

                    $why_choose_us_type_accordions = get_sub_field('why_choose_us_type_accordion');

                    $type_block = get_sub_field('type_block');
            ?>
                <div class="why-choose-main <?php echo $type_block;?>">
                    <div class="wrapper">
                        <div class="why-choose-block <?php echo $type_block;?>">
                            <?php if($title_block) {?>
                                <div class="header">
                                    <div class="title" <?php if(!$description_block) {?>style="width:100%;"<?php }?>><?php echo $title_block;?></div>
                                    <?php if($description_block) {?>
                                        <div class="description"><?php echo $description_block;?></div>
                                    <?php }?>
                                </div>
                            <?php }?>
                            <?php if($type_block == 'type_1') {?>
                            <div class="info-row-block-parent">
                                <?php foreach($info_row_blocks as $info_row_block):?>
                                    <div class="info-row-block">
                                        <div class="info-row-block_left">
                                            <div class="icon">
                                                <img src="<?php echo $info_row_block['icon']['url'];?>" alt="<?php echo $info_row_block['icon']['alt'];?>">
                                            </div>
                                            <div class="title"><?php echo $info_row_block['name'];?></div>
                                        </div>
                                        <div class="info-row-block_right">
                                            <?php echo $info_row_block['description'];?>
                                        </div>
                                    </div>
                                <?php endforeach;?>
                            </div>
                            <?php } elseif($type_block == 'type_3') {?>
                                <div class="why-choose-accordion">
                                    <div class="accordion-parent">
                                        <!--Item-->
                                        <?php foreach($why_choose_us_type_accordions as $why_choose_us_type_accordion) {?>
                                            <div class="accordion-row">
                                                <div class="accordion-header">
                                                    <h3><?php echo $why_choose_us_type_accordion['title_accrordion'];?></h3>
                                                </div>
                                                <div class="accordion-content">
                                                    <div class="description left">
                                                        <?php echo $why_choose_us_type_accordion['left_content'];?>
                                                        <?php if($why_choose_us_type_accordion['link']['url']) {?>
                                                            <a href="<?php echo $why_choose_us_type_accordion['link']['url'];?>" class="more-info"><?php echo $why_choose_us_type_accordion['link']['title'];?></a>
                                                        <?php }?>
                                                    </div>
                                                    <div class="description right">
                                                        <?php echo $why_choose_us_type_accordion['right_content'];?>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php }?>
                                        <!--End-->
                                    </div>
                                </div>
                            <?php }?>
                        </div>
                    </div>
                </div>

            <?php 
                elseif( get_row_layout() == 'info_row' ): 
                    $info_row_type = get_sub_field('info_row_type');
                    $info_row_group = get_sub_field('info_row_group');
                    $info_rows_group_type_2 = get_sub_field('info_row_group_type_2');
                    $info_rows_group_type_3 = get_sub_field('infor_row_group_type_3');
                    $main_title = get_sub_field('title_block');

                    $margin = get_sub_field('margin');

                    $margin_top = $margin['top'] ? 'margin-top:'.$margin['top'] : '';
                    $margin_bottom = $margin['bottom'] ? 'margin-bottom'.$margin['bottom'] : '';

            ?>
                <div class="info-row <?php echo $info_row_type['value']?>" style="<?php if($margin['top']) { echo 'margin-top:'.$margin['top'];}?>;<?php if($margin['bottom']) { echo 'margin-bottom:'.$margin['bottom'];}?>;">
                    <!-- <div class="wrapper"> -->
                        <?php if($info_row_type['label'] == 'type 1') { ?>
                            <div class="wrapper">
                                <div class="info-row-parent">
                                    <div class="info-row_title">
                                        <div class="icon">
                                            <img src="<?php echo $info_row_group['icon']['url'];?>" alt="<?php echo $info_row_group['icon']['alt'];?>">
                                        </div>
                                        <div class="title"><?php echo $info_row_group['title'];?></div>
                                    </div>
                                    <div class="info-row_content"><?php echo $info_row_group['content'];?></div>
                                </div>
                            </div>
                        <?php } elseif($info_row_type['label'] == 'type 2') { ?>
                            <div class="wrapper">
                                <?php if($main_title) { ?>
                                    <div class="title-block">
                                        <div class="content"><?php echo $main_title;?></div>
                                    </div>
                                <?php } ?>
                                <div class="info-row-parent_type2">
                                    <?php foreach($info_rows_group_type_2 as $info_row_group_type_2) { ?>
                                        <div class="item">
                                            <div class="title"><?php echo $info_row_group_type_2['title'];?></div>
                                            <div class="description"><?php echo $info_row_group_type_2['description'];?></div>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        <?php } elseif($info_row_type['label'] == 'type 3') { ?>
                            <div class="info-row-parent_type3">
                                <div class="logos-parent" style="background: url('<?php echo $info_rows_group_type_3['background_block_with_logos'];?>') no-repeat center center/cover; <?php if(!$info_rows_group_type_3['messages']) {?> padding-bottom: 3.75rem;<?php }?>">
                                    <div class="wrapper">
                                        <?php if($main_title) { ?>
                                            <div class="title-block">
                                                <div class="content"><?php echo $main_title;?></div>
                                            </div>
                                        <?php } ?>
                                        <div class="info-row-logos">
                                            <!--Item-->
                                            <?php foreach($info_rows_group_type_3['logos'] as $logo) { ?>
                                                <div class="item">
                                                    <img src="<?php echo $logo['url'];?>" alt="<?php echo $logo['alt'];?>">
                                                </div>
                                            <?php }?>
                                            <!--End-->
                                        </div>
                                    </div>
                                </div>
                                <?php if($info_rows_group_type_3['messages']) {?>
                                    <div class="wrapper">
                                        <div class="cta-contact-row">
                                            <div class="messages"><?php echo $info_rows_group_type_3['messages'];?></div>
                                            <div class="link">
                                                <a href="<?php echo $info_rows_group_type_3['link'];?>" id="gaFirstCTA">
                                                    <svg width="46" height="30" viewBox="0 0 46 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M2.00046 28.302L2.00865 1.84656H44.4652L44.457 28.302H2.00046Z" stroke="white" stroke-width="3"/>
                                                        <path d="M2.21569 2.05451L23.8934 16.7822L44.25 2.05451" stroke="white" stroke-width="3"/>
                                                    </svg>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                <?php }?>
                            </div>
                        <?php }?>
                    <!-- </div> -->
                </div>

            <?php 
                elseif( get_row_layout() == 'deliverables_block' ): 
                    $title = get_sub_field('title');
                    $deliverables_items = get_sub_field('deliverables_items');
            ?>
                <div class="deliverables-block">
                    <div class="wrapper">
                        <div class="header-with-line blue"><?php echo $title;?></div>
                        <div class="deliverables-items-parent">
                            <?php foreach($deliverables_items as $deliverables_item) { ?>
                                <div class="item">
                                    <div class="icon">
                                        <img src="<?php echo $deliverables_item['icon']['url'];?>" alt="<?php echo $deliverables_item['icon']['alt'];?>">
                                    </div>
                                    <div class="description"><?php echo $deliverables_item['description']; ?></div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>

            <?php 
                elseif( get_row_layout() == 'bottom_banner' ): 
                    $text = get_sub_field('text');
            ?>
                <div class="bottom-banner">
                    <div class="wrapper">
                        <div class="content"><?php echo $text;?></div>
                    </div>
                </div>

            <?php 
                elseif( get_row_layout() == 'custom_post_type_block' ): 
                    $group_title_and_description = get_sub_field('group_title_and_description');
                    $slug_custom_post_type = get_sub_field('slug_custom_post_type');
            ?>
                <div class="services-posts-block">
                    <div class="wrapper">
                        <div class="main-page-title">
                            <div class="content"><?php echo $group_title_and_description['content_column_1'];?></div>
                            <div class="content"><?php echo $group_title_and_description['content_column_2'];?></div>
                        </div>
                        <div class="wrap-services-block">
                            <!--Service-->
                            <?php 
                                $postsservice = new WP_Query( array('post_type' => $slug_custom_post_type) );

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
                </div>

            <?php 
                elseif( get_row_layout() == 'it_specializations' ): 
                    $it_specializations_title = get_sub_field('title');
                    $it_specializations_desc = get_sub_field('description');
                    $it_specializations_items = get_sub_field('items');
            ?>
                <div class="it-specializations">
                    <div class="wrapper">
                        <div class="main-page-title">
                            <div class="content"><?php echo $it_specializations_title;?></div>
                            <div class="content"><?php echo $it_specializations_desc;?></div>
                        </div>
                        <div class="it-specializations-parent">
                            <?php foreach($it_specializations_items as $it_specializations_item) { ?>
                                <div class="item">
                                    <div class="item-icon">
                                        <img src="<?php echo $it_specializations_item['icon']['url'];?>" alt="<?php echo $it_specializations_item['icon']['alt'];?>">
                                    </div>
                                    <div class="item-text"><?php echo $it_specializations_item['text'];?></div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>

            <?php 
                elseif( get_row_layout() == 'full-cycle_services' ): 
                    $header_group = get_sub_field('header_group');
                    $items_content = get_sub_field('items_content');
            ?>
                <div class="full-cycle-services">
                    <div class="full-cycle-services_content" <?php if($header_group['warning_block_show']) { ?> style= "padding-bottom: 10rem;"<?php }?>>
                        <div class="wrapper">
                            <div class="main-page-title">
                                <div class="content"><?php echo $header_group['title'];?></div>
                                <div class="content"><?php echo $header_group['description'];?></div>
                            </div>
                            <div class="full-cycle-services-parent">
                                <?php foreach($items_content as $item_content) { ?>
                                    <div class="item">
                                        <div class="title"><?php echo $item_content['title'];?></div>
                                        <div class="description"><?php echo $item_content['description'];?></div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <?php if($header_group['warning_block_show']) { ?>
                        <div class="full-cycle-services_warning">
                            <div class="wrapper">
                                <div class="warning-full-cycle-services-row">
                                    <div class="warning-icon">
                                        <img src="<?php echo $header_group['warning_group']['warning_icon']['url'];?>" alt="<?php echo $header_group['warning_group']['warning_icon']['alt'];?>">
                                    </div>
                                    <div class="warning-text">
                                        <?php echo $header_group['warning_group']['warning'];?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>

            <?php 
                elseif( get_row_layout() == 'our_allocation_process' ): 
                    $header_group = get_sub_field('header_group');
                    $process_items = get_sub_field('process_items');
                    $background = get_sub_field('background');
            ?>
                <div class="our-allocation-process" <?php if($background) {?>style="background:<?php echo $background;?>;"<?php }?>>
                    <div class="wrapper">
                        <div class="main-page-title" <?php if(!$header_group['description']) {?> style="grid-template-columns: 1fr;padding-bottom:4rem;"<?php }?>>
                            <div class="content"><?php echo $header_group['title'];?></div>
                            <?php if($header_group['description']) {?>
                                <div class="content"><?php echo $header_group['description'];?></div>
                            <?php }?>
                        </div>
                        <div class="our-allocation-process-parent">
                            <?php foreach($process_items as $process_item) { ?>
                                <div class="item">
                                    <div class="icon"><?php echo $process_item['icon'];?></div>
                                    <div class="content">
                                        <?php if($process_item['title']) { ?>
                                            <div class="title"><?php echo $process_item['title'];?></div>
                                        <?php } ?>
                                        <?php if($process_item['sub_title']) { ?>
                                            <div class="sub-title"><?php echo $process_item['sub_title'];?></div>
                                        <?php } ?>
                                        <?php if($process_item['text']) { ?>
                                            <div class="text"><?php echo $process_item['text'];?></div>
                                        <?php } ?>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>

            <?php 
                elseif( get_row_layout() == 'solutions_card' ): 
                    $cards = get_sub_field('card');
            ?>
                <div class="solutions-card">
                    <div class="wrapper">
                        <div class="solutions-card-parent">
                            <?php foreach($cards as $card) { ?>
                                <div class="item">
                                    <div class="header-card">
                                        <div class="icon">
                                            <img src="<?php echo $card['icon']['url'];?>" alt="<?php echo $card['icon']['alt'];?>">
                                        </div>
                                        <div class="name"><?php echo $card['name'];?></div>
                                    </div>
                                    <div class="type-card">
                                        <div class="title-type">Type:</div>
                                        <div class="text-type"><?php echo $card['type'];?></div>
                                    </div>
                                    <div class="case-card">
                                        <div class="title-case">Case:</div>
                                        <div class="text-case"><?php echo $card['case'];?></div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>

            <?php 
                elseif( get_row_layout() == 'solutions_block' ): 
                    $solutions_type = get_sub_field('solutions_type');

                    $attribute_block = get_sub_field('attribute_block');
                    $title_block = get_sub_field('title_block');
                    $sub_title = get_sub_field('sub_title');
                    $row_case_group = get_sub_field('row_case_group');
                    $cases_description = get_sub_field('case_description');
                    $content = get_sub_field('content');
                    $ux_ui_visual_designer_rows = get_sub_field('ux_ui_visual_designer_row');

                    $info_cards_type_2 = get_sub_field('info_card');

            ?>
                <div class="solutions-block <?php echo $solutions_type['value']; ?>" <?php echo $attribute_block;?>>
                        <?php if($solutions_type['value'] == 'type_1') {?>
                            <div class="row-header-case">
                                <div class="wrapper">
                                    <div class="header-with-line blue"><?php echo $title_block;?></div>
                                    <div class="sub-title-block"><?php echo $sub_title;?></div>
                                    <div class="row-title-case" <?php if(!$row_case_group['description_case']) {?> style="grid-template-columns:1fr;" <?php }?>>
                                        <div class="case-name"><?php echo $row_case_group['case_name'];?></div>
                                        <?php if($row_case_group['description_case']) { ?>
                                            <div class="case-description"><?php echo $row_case_group['description_case'];?></div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row-description-case">
                                <div class="wrapper">
                                    <div class="row-description-case-parent">
                                        <?php foreach($cases_description as $case_description) { ?>
                                            <div class="item" style="background: url(<?php echo $case_description['icon'];?>);">
                                                <div class="title"><?php echo $case_description['title'];?></div>
                                                <div class="description"><?php echo $case_description['description'];?></div>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row-content-case">
                                <div class="wrapper">
                                    <div class="content"><?php echo $content;?></div>
                                </div>
                            </div>
                            <div class="row-ux-ui-visual-designer">
                                <div class="wrapper">
                                    <div class="row-ux-ui-visual-designer-parent">
                                        <?php foreach($ux_ui_visual_designer_rows as $ux_ui_visual_designer_row) { ?>
                                            <div class="item">
                                                <div class="ux-ui-visual-designer_left">
                                                    <div class="title"><?php echo $ux_ui_visual_designer_row['title'];?></div>
                                                </div>
                                                <div class="ux-ui-visual-designer_right"><?php echo $ux_ui_visual_designer_row['description'];?></div>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        <?php }?>
                        <?php if($solutions_type['value'] == 'type_2') {?>
                            <div class="wrapper">
                                <div class="title-parent">
                                    <div class="header-with-line blue"><?php echo $title_block;?></div>
                                    <div class="description"><?php echo $sub_title;?></div>
                                </div>
                                <div class="solutions-card-parent">
                                    <!--Item-->
                                    <?php foreach($info_cards_type_2 as $info_card) {?>
                                        <div class="item">
                                            <div class="front-content" style="background: url(<?php echo $info_card['image'];?>) no-repeat center center/cover">
                                                <div class="card-title"><?php echo $info_card['title'];?></div>
                                            </div>
                                            <div class="back-content"><?php echo $info_card['content'];?></div>
                                        </div>
                                    <?php }?>
                                    <!--End-->
                                </div>
                            </div>
                        <?php }?>   
                </div>

            <?php 
                elseif( get_row_layout() == 'we_serve_various_industries' ): 
                    $block_group_type_1 = get_sub_field('type_1');
                    $bg = $block_group_type_1['background'];
                    $title = $block_group_type_1['title'];
                    $sub_title = $block_group_type_1['sub_title'];
                    $number_of_columns = $block_group_type_1['number_of_columns'];
                    $items = $block_group_type_1['items'];

                    $margin = get_sub_field('margin');

                    $margin_top = $margin['top'] ? 'margin-top:'.$margin['top'] : '';
                    $margin_bottom = $margin['bottom'] ? 'margin-bottom'.$margin['bottom'] : '';
            ?>
                <div class="deliverables-block" style="<?php if($margin['top']) { echo 'margin-top:'.$margin['top'];}?><?php if($margin['bottom']) { echo 'margin-bottom:'.$margin['bottom'];}?>; background-image: url('<?php echo $bg;?>');">
                    <div class="wrapper">
                        <div class="what-do-you-get">
                            <div class="deliverables-block_title">
                                <div class="title"><?php echo  $title;?></div>
                                <div class="sub-title"><?php echo $sub_title;?></div>
                            </div>
                            <div class="what-do-you-get_values <?php echo $number_of_columns['value'];?>">
                                <!--Item-->
                                <?php 
                                    foreach($items as $item) {
                                ?>
                                    <div class="item">
                                        <div class="icon">
                                            <img src="<?php echo $item['icon']['url'];?>" alt="<?php echo $item['icon']['alt'];?>">
                                        </div>
                                        <div class="description"><?php echo $item['description'];?></div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>

            <?php 
                elseif( get_row_layout() == 'all-around_java_development_services' ): 
                    $title_block = get_sub_field('title_block');
                    $enterprise_solution_development_group = get_sub_field('enterprise_solution_development_group');
                    $redesign_of_existing_solutions_group = get_sub_field('redesign_of_existing_solutions_group');
            ?>
                    <div class="all-around-java-development-services">
                        <div class="wrapper">
                            <div class="title-block">
                                <div class="content"><?php echo $title_block;?></div>
                            </div>
                        </div>
                        <div class="enterprise-solution-development">
                            <div class="wrapper">
                                <div class="info-row-dev">
                                    <div class="title"><?php echo $enterprise_solution_development_group['info_row_title'];?></div>
                                    <div class="description"><?php echo $enterprise_solution_development_group['info_row_description'];?></div>
                                </div>
                                <div class="automate-widest-range"><?php echo $enterprise_solution_development_group['sub_title'];?></div>
                                <div class="enterprise-solution-development-parent">
                                    <?php foreach($enterprise_solution_development_group['items'] as $item) { ?>
                                        <div class="item">
                                            <div class="title"><?php echo $item['text'];?></div>
                                            <div class="icon">
                                                <img src="<?php echo $item['icon']['url'];?>" alt="<?php echo $item['icon']['alt'];?>">
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <div class="redesign-existing-solutions">
                            <div class="wrapper">
                                <div class="info-row-dev">
                                    <div class="title"><?php echo $redesign_of_existing_solutions_group['info_title'];?></div>
                                    <div class="description"><?php echo $redesign_of_existing_solutions_group['info_row_description'];?></div>
                                </div>
                                <div class="main-sub-title"><?php echo $redesign_of_existing_solutions_group['sub_title'];?></div>
                                <div class="redesign-existing-solutions-parent">
                                    <?php foreach($redesign_of_existing_solutions_group['items'] as $item) { ?>
                                        <div class="item">
                                            <div class="header">
                                                <div class="icon">
                                                    <img src="<?php echo $item['icon']['url'];?>" alt="<?php echo $item['icon']['alt'];?>">
                                                </div>
                                                <div class="title"><?php echo $item['title'];?></div>
                                            </div>
                                            <?php if($item['sub_title']) { ?>
                                                <div class="sub-title"><?php echo $item['sub_title'];?></div>
                                            <?php } ?>
                                            <div class="content"><?php echo $item['text'];?></div>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php 
                    elseif( get_row_layout() == 'separator' ): 
                        $separator_type_1 = get_sub_field('type_1');

                        $margin = get_sub_field('margin');

                        $margin_top = $margin['top'] ? 'margin-top:'.$margin['top'] : '';
                        $margin_bottom = $margin['bottom'] ? 'margin-bottom'.$margin['bottom'] : '';
                ?>
                    <div class="separator" style="<?php if($margin['top']) { echo 'margin-top:'.$margin['top'];}?><?php if($margin['bottom']) { echo 'margin-bottom:'.$margin['bottom'];}?>;">
                        <div class="wrapper">
                            <div class="content">
                                <div class="title"><?php echo $separator_type_1['title'];?></div>
                                <div class="description"><?php echo $separator_type_1['description'];?></div>
                            </div>
                        </div>
                    </div>

                <?php 
                    elseif( get_row_layout() == 'cta_separator' ): 
                        $cta_type = get_sub_field('cta_type');
                        $cta_type_1 = get_sub_field('cta_type_1');
                        $cta_type_2 = get_sub_field('cta_type_2');
                        $cta_type_3 = get_sub_field('cta_type_3');

                        $margin = get_sub_field('margin');
                        $margin_top = $margin['top'] ? 'margin-top:'.$margin['top'] : '';
                        $margin_bottom = $margin['bottom'] ? 'margin-bottom'.$margin['bottom'] : '';

                        $bg = '';
                        if($cta_type['value'] == 'type_1_basic') {
                            if($cta_type_1['background'] == 'color') {
                                $bg = "background:".$cta_type_1['background_color'].";";
                            } elseif($cta_type_1['background'] == 'image') {
                                $bg = "background:url(".$cta_type_1['background_image'].") no-repeat center center/cover;";
                            }
                        } elseif($cta_type['value'] == 'type_2_with_photo_person') {
                            $bg = "background:".$cta_type_2['background'].";";
                        } elseif($cta_type['value'] == 'type_3_text_and_button_center') {
                            $bg = "background:url(".$cta_type_3['background'].") no-repeat center center/cover;";
                        }
                ?>
                    <div class="cta-separator <?php echo $cta_type['value'];?>" style="<?php if($margin['top']) { echo 'margin-top:'.$margin['top'];}?><?php if($margin['bottom']) { echo 'margin-bottom:'.$margin['bottom'];}?>; <?php echo $bg;?>">
                        <div class="wrapper">
                            <?php if($cta_type['value'] == 'type_1_basic') {?>
                                <div class="cta-card">
                                    <div class="text"><?php echo $cta_type_1['text'];?></div>
                                    <div class="cta-link">
                                        <a href="<?php echo $cta_type_1['link']['url'];?>"><?php echo $cta_type_1['link']['title'];?></a>
                                    </div>
                                </div>
                            <?php }?>
                            <?php if($cta_type['value'] == 'type_2_with_photo_person') {?>
                                <div class="cta-with-photo-person-parent">
                                    <div class="photo-person">
                                        <img src="<?php echo $cta_type_2['photo_person']['url'];?>" alt="<?php echo $cta_type_2['photo_person']['alt'];?>">
                                    </div>
                                    <div class="text"><?php echo $cta_type_2['text'];?></div>
                                    <div class="cta-btn">
                                        <a href="<?php echo $cta_type_2['link']['url'];?>" id="gaSalesExpertCTA"><?php echo $cta_type_2['link']['title'];?></a>
                                    </div>
                                </div>
                            <?php }?>
                            <?php if($cta_type['value'] == 'type_3_text_and_button_center') {?>
                                <div class="cta-text-button-center-paret">
                                    <div class="text"><?php echo $cta_type_3['text'];?></div>
                                    <a href="<?php echo $cta_type_3['link']['url'];?>" id="gaSecondCTA"><?php echo $cta_type_3['link']['title'];?></a>
                                </div>
                            <?php }?>
                        </div>
                    </div>

                <?php 
                    elseif( get_row_layout() == 'Industry_specific_solutions' ): 
                        $title = get_sub_field('title');
                        $description = get_sub_field('description');
                        $number_of_columns = get_sub_field('number_of_columns');
                        $items = get_sub_field('items');
                ?>
                    <div class="industry-specific-solutions">
                        <div class="wrapper">
                            <div class="title-parent">
                                <div class="header-with-line blue"><?php echo $title;?></div>
                                <div class="description"><?php echo $description;?></div>
                            </div>
                            <div class="industry-specific-solutions-parent" style="grid-template-columns: repeat(<?php echo $number_of_columns; ?>,1fr);">
                                <!--Item-->
                                <?php foreach($items as $item) {?>
                                    <div class="item">
                                        <img src="<?php echo $item['icon']['url'];?>" alt="<?php echo $item['icon']['alt'];?>">
                                        <span><?php echo $item['title'];?></span>
                                    </div>
                                <?php }?>
                                <!--End-->
                            </div>
                        </div>
                    </div>

                <?php 
                    elseif( get_row_layout() == 'cooperation_models' ): 
                        $title = get_sub_field('title');
                        $columns = get_sub_field('columns');
                ?>
                    <div class="cooperation-models">
                        <div class="wrapper">
                            <div class="title-parent">
                                <div class="header-with-line blue"><?php echo $title;?></div>
                            </div>
                            <div class="cooperation-models-parent">
                                <!--Item-->
                                <?php foreach($columns as $column) {?>
                                    <div class="item">
                                        <div class="item-header">
                                            <div class="icon">
                                                <img src="<?php echo $column['icon']['url'];?>" alt="<?php echo $column['icon']['alt'];?>">
                                            </div>
                                            <div class="title"><?php echo $column['title'];?></div>
                                        </div>
                                        <?php foreach($column['description_row'] as $description_row) {?>
                                            <div class="description-row">
                                                <span><?php echo $description_row['title'];?></span>
                                                <span><?php echo $description_row['text'];?></span>
                                            </div>
                                        <?php }?>
                                        <?php if($column['simple_text']) {?>
                                            <div class="simple-text"><?php echo $column['simple_text'];?></div>
                                        <?php }?>
                                        <?php if($column['button']['url']) {?>
                                            <div class="item-btn">
                                                <a href="<?php echo $column['button']['url'];?>"><?php echo $column['button']['title'];?></a>
                                            </div>
                                        <?php }?>
                                    </div>
                                <?php }?>
                                <!--End-->
                            </div>
                        </div>
                    </div>

                <?php 
                    elseif( get_row_layout() == 'why_rely_on_gp_solutions' ): 
                        $title = get_sub_field('title');
                        $why_rely_on_gp_solutions_rows = get_sub_field('why_rely_on_gp_solutions_rows');
                        $bg_color = get_sub_field('background_color');
                ?>
                    <div class="why-rely-on-gp-solutions" <?php if($bg_color) {?> style="background-color:<?php echo $bg_color;?>;" <?php }?>>
                        <div class="wrapper">
                            <div class="title-parent">
                                <div class="header-with-line blue"><?php echo $title;?></div>
                            </div>
                            <div class="why-rely-on-gp-solutions-parent">
                                <!--Row-->
                                <?php foreach($why_rely_on_gp_solutions_rows as $why_rely_on_gp_solutions_row) {?>
                                    <div class="row">
                                        <div class="text-block"><?php echo $why_rely_on_gp_solutions_row['content'];?></div>
                                        <div class="img-block">
                                            <img src="<?php echo $why_rely_on_gp_solutions_row['image']['url'];?>" alt="<?php echo $why_rely_on_gp_solutions_row['image']['alt'];?>">
                                        </div>
                                    </div>
                                <?php }?>
                                <!--End-->
                            </div>
                        </div>
                    </div>

                <?php 
                    elseif( get_row_layout() == 'our_java_development_stack' ): 
                        $title_block = get_sub_field('title_block');
                        $description_block = get_sub_field('description_block');
                        $cards = get_sub_field('card');
                ?>

                    <div class="our-java-development-stack">
                        <div class="wrapper">
                            <div class="title-block" <?php if($description_block) {?>style="grid-template-columns: 1fr 1.5fr;"<?php }?>>
                                <div class="content"><?php echo $title_block;?></div>
                                <?php if($description_block) { ?>
                                    <div class="content"><?php echo $description_block;?></div>
                                <?php }?>
                            </div>
                            <div class="our-java-development-stack-parent">
                                <?php foreach($cards as $card) { ?>
                                    <div class="item">
                                        <div class="front-card">
                                            <div class="icon">
                                                <img src="<?php echo $card['icon']['url'];?>" alt="<?php echo $card['icon']['alt'];?>">
                                            </div>
                                            <div class="title-card"><?php echo $card['title'];?></div>
                                        </div>
                                        <div class="back-card">
                                            <div class="java-frameworks-parent">
                                                <div class="title-item"><?php echo $card['java_frameworks']['title'];?></div>
                                                <?php foreach($card['java_frameworks']['stack_items'] as $stack_name) { ?>
                                                    <div class="item"><?php echo $stack_name['stack_name'];?></div>
                                                <?php } ?>
                                            </div>
                                            <div class="spring-framework-parent">
                                                <div class="title-item"><?php echo $card['spring_framework']['title'];?></div>
                                                <?php foreach($card['spring_framework']['framework_items'] as $framework_name) { ?>
                                                    <div class="item"><?php echo $framework_name['framework_name'];?></div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                                    <?php if(get_sub_field('show_last_block_talk_us')) { ?>
                                        <div class="item-cta-block">
                                            <a href="/contact-us/"><span>Not In This List? Talk to Us!</span></a>
                                        </div>
                                    <?php } ?>
                            </div>
                        </div>
                    </div>

                <?php 
                    elseif( get_row_layout() == 'our_java_development_stack_type_tab' ): 
                        $title_block = get_sub_field('title_block');
                        $description_block = get_sub_field('description_block');
                        $sub_description = get_sub_field('sub_description');
                        $cover = get_sub_field('image_cover');
                        $cards = get_sub_field('card');
                ?>
                    <div class="our-java-development-stack">
                        <div class="wrapper">
                            <?php if($title_block || $description_block) {?>
                                <div class="title-block" <?php if($description_block) {?>style="grid-template-columns: 1fr 1.5fr;"<?php }?>>
                                    <div class="content"><?php echo $title_block;?></div>
                                    <?php if($description_block) { ?>
                                        <div class="content"><?php echo $description_block;?></div>
                                    <?php }?>
                                </div>
                            <?php }?>
                            <?php if($sub_description) {?>
                                <div class="sub-desc">
                                    <?php echo $sub_description;?>
                                </div>
                            <?php }?>
                            <?php ale_part('icon-slide-mob-tabs');?>
                            <div class="technologies-use-parent">
                                <div class="item cover">
                                    <img src="<?php echo $cover['url'];?>" alt="<?php echo $cover['alt'];?>">
                                </div>
                                <div class="item tabs">
                                    <?php foreach($cards as $key=>$card) { ?>
                                        <div class="header-tab <?php if($key == 0) {?>active<?php }?>"><?php echo $card['technologies_stack_tab']['title'];?></div>
                                    <?php } ?>
                                </div>
                                <div class="item content">
                                    <?php foreach($cards as $key=>$card) { ?>
                                        <div class="content-tab <?php if($key == 0) {?>active<?php }?>">
                                            <div class="icon-stack">
                                                <img src="<?php echo $card['icon']['url'];?>" alt="<?php echo $card['icon']['alt'];?>">
                                            </div>
                                            <?php if($card['technologies_stack_tab']['stack_first_title']) { ?>
                                                <div class="title-framework" style="margin-top:0;"><?php echo $card['technologies_stack_tab']['stack_first_title'];?></div>
                                            <?php } ?>
                                            <div class="each-stack">
                                                <?php foreach($card['technologies_stack_tab']['stack_items'] as $stack_item) { ?>
                                                    <span><?php echo $stack_item['stack_name'];?></span>
                                                <?php } ?>
                                            </div>
                                            <?php if($card['technologies_framework_tab']['title']) { ?>
                                                <div class="title-framework"><?php echo $card['technologies_framework_tab']['title'];?></div>
                                                <div class="each-stack">
                                                    <?php foreach($card['technologies_framework_tab']['framework_items'] as $framework_item) { ?>
                                                        <span><?php echo $framework_item['framework_name'];?></span>
                                                    <?php } ?>
                                                </div> 
                                            <?php } ?>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php 
                    elseif( get_row_layout() == 'how_we_work' ): 
                        $title_block = get_sub_field('title_block');
                        $rows = get_sub_field('row');
                ?>
                    <section class="how-we-work-services">
                        <div class="wrapper">
                            <div class="main-page-title">
                                <div class="header-with-line blue"><?php echo $title_block;?></div>
                            </div>
                            <div class="how-we-work-services-parent">
                                <!--Item-->
                                <?php foreach($rows as $row) {?>
                                    <div class="item">
                                        <div class="cover_item">
                                            <?php if($row['title']) {?>
                                                <div class="title"><?php echo $row['title'];?></div>
                                            <?php }?>
                                            <div class="cover">
                                                <img src="<?php echo $row['cover']['url'];?>" alt="<?php echo $row['cover']['alt'];?>">
                                            </div>
                                        </div>
                                        <div class="content_item"><?php echo $row['content'];?></div>
                                    </div>
                                <?php }?>
                                <!--End-->
                            </div>
                        </div>
                    </section>

        <?php endif; endwhile; endif; ?>
    </div>