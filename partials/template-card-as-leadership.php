<?php 
	if( have_rows('card_as_leadership') ): while( have_rows('card_as_leadership') ) : the_row();

	$img = get_sub_field('photo');
	$icon = get_sub_field('icon');
	$title = get_sub_field('title');
	$subtitle = get_sub_field('subtitle');
	$text = get_sub_field('text');
?>
	<div class="item_as_leadership">
		<div class="item_photo">
			<img src="<?php echo $img;?>" alt="image">
		</div>
		<?php if($icon) {?>
			<div class="item_icon">
				<a href="#">
					<svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path opacity="0.3" d="M5.6752 24.6973V8.50451H0.31618V24.6973H5.6752ZM2.99638 6.29233C4.86516 6.29233 6.02839 5.04892 6.02839 3.49506C5.99357 1.90617 4.86524 0.697266 3.03184 0.697266C1.19874 0.697266 0 1.90619 0 3.49506C0 5.04899 1.16294 6.29233 2.9614 6.29233H2.99621H2.99638ZM8.6414 24.6973H14.0004V15.6544C14.0004 15.1705 14.0352 14.687 14.1767 14.3411C14.5642 13.3741 15.4459 12.3727 16.9263 12.3727C18.8655 12.3727 19.6413 13.8576 19.6413 16.0344V24.6971H25V15.4124C25 10.4386 22.3561 8.12435 18.8302 8.12435C15.9393 8.12435 14.6699 9.74727 13.9648 10.8526H14.0005V8.50417H8.64152C8.71184 10.0236 8.64152 24.6969 8.64152 24.6969L8.6414 24.6973Z" fill="#2063B8"/>
					</svg>
				</a>
			</div>
		<?php }?>
		<div class="item_title"><?php echo $title;?></div>
		<div class="item_subtitle"><?php echo $subtitle;?></div>
		<div class="item_text"><?php echo $text;?></div>
	</div>
<?php endwhile; endif; ?>