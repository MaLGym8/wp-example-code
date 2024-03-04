		<?php 
			$footer_content_group = get_field('footer_content_group');
		?>
		<footer>
			<div class="contact-parent">
				<div class="wrapper">
					<h2 class="header-with-line">Contact us</h2>
					<div class="footer-contacts-wrap">
						<div class="contacts-text">
							<div class="title-contact-form">Let’s get in touch</div>
							<div class="desc-contact-form">
								<?php if($footer_content_group['description']) {
									echo $footer_content_group['description'];
								} else {?>
									Please use the form if you have any questions about GP Solutions services and we will get back to you.
								<?php }?>
							</div>
						</div>
						<div class="contacts-form">
							<?php echo do_shortcode('[contact-form-7 id="26" title="Contact form footer"]'); ?>
						</div>
					</div>
				</div>
			</div>
			<div class="offices-footer">
				<div class="wrapper">
					<h2 class="header-with-line">Our offices</h2>
					<div class="offices-wrap">
						<!--Item office-->
						<?php 
							$postslist = new WP_Query( array('post_type' => 'offices') );

							if ($postslist->have_posts()) : while ($postslist->have_posts()) : $postslist->the_post();
						?>
						<div class="item" style="background-image: url(<?php echo get_the_post_thumbnail_url()?>)">
							<div class="office-city"><?php echo ale_get_meta('offices_city');?></div>
							<div class="office-position"><?php echo ale_get_meta('office_departament');?></div>
							<div class="office-address">
								<?php echo ale_get_meta('office_address');?>
							</div>
						</div>
						<?php endwhile; endif; wp_reset_postdata();?>
					</div>
				</div>
			</div>
			<div class="bottom-footer">
				<div class="wrapper">
					<div class="footer-logo">
						<img src="<?php ale_option('sitelogofooter'); ?>" alt="gp solutions">
					</div>
					<div class="wrap-footer-menu">
						<!--Footer menu-->
						<div class="footer-nav">
							<div class="title-footer-menu">
								<span>Who we are</span>
								<span>
									<svg width="18" height="10" viewBox="0 0 18 10" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M3.00002 0.199805L9.00002 6.1998L15 0.199806L17.4 1.39981L9.00002 9.7998L0.600024 1.3998L3.00002 0.199805Z" fill="#113563"/>
									</svg>
								</span>
							</div>
							<div class="footer-menu">
								<?php
									wp_nav_menu(array(
										'theme_location' => 'who_we_are_menu',
										'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
										'menu_class' => 'footer__menu',
										'menu_id' => '',
										'depth' => 1,
									));
								?>
							</div>
						</div>
						<!--Footer menu-->
						<div class="footer-nav">
							<div class="title-footer-menu">
								<span>Services</span>
								<span>
									<svg width="18" height="10" viewBox="0 0 18 10" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M3.00002 0.199805L9.00002 6.1998L15 0.199806L17.4 1.39981L9.00002 9.7998L0.600024 1.3998L3.00002 0.199805Z" fill="#113563"/>
									</svg>
								</span>
							</div>
							<div class="footer-menu">
								<?php
									wp_nav_menu(array(
										'theme_location' => 'services_menu',
										'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
										'menu_class' => 'footer__menu',
										'menu_id' => '',
										'depth' => 1,
									));
								?>
							</div>
						</div>
						<!--Footer menu-->
						<div class="footer-nav">
							<div class="title-footer-menu">
								<span>Industries</span>
								<span>
									<svg width="18" height="10" viewBox="0 0 18 10" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M3.00002 0.199805L9.00002 6.1998L15 0.199806L17.4 1.39981L9.00002 9.7998L0.600024 1.3998L3.00002 0.199805Z" fill="#113563"/>
									</svg>
								</span>
							</div>
							<div class="footer-menu">
								<?php
									wp_nav_menu(array(
										'theme_location' => 'industries_menu',
										'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
										'menu_class' => 'footer__menu',
										'menu_id' => '',
										'depth' => 1,
									));
								?>
							</div>
						</div>
						<!--Footer menu-->
						<div class="footer-nav">
							<div class="title-footer-menu">Follow Us</div>
							<div class="footer-menu social-links">
								<?php if(ale_get_option('linkedin')) { ?>
									<a href="<?php echo ale_get_option('linkedin');?>" title="LinkedIn">
										<svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path opacity="0.3" d="M5.6752 24.6973V8.50451H0.31618V24.6973H5.6752ZM2.99638 6.29233C4.86516 6.29233 6.02839 5.04892 6.02839 3.49506C5.99357 1.90617 4.86524 0.697266 3.03184 0.697266C1.19874 0.697266 0 1.90619 0 3.49506C0 5.04899 1.16294 6.29233 2.9614 6.29233H2.99621H2.99638ZM8.6414 24.6973H14.0004V15.6544C14.0004 15.1705 14.0352 14.687 14.1767 14.3411C14.5642 13.3741 15.4459 12.3727 16.9263 12.3727C18.8655 12.3727 19.6413 13.8576 19.6413 16.0344V24.6971H25V15.4124C25 10.4386 22.3561 8.12435 18.8302 8.12435C15.9393 8.12435 14.6699 9.74727 13.9648 10.8526H14.0005V8.50417H8.64152C8.71184 10.0236 8.64152 24.6969 8.64152 24.6969L8.6414 24.6973Z" fill="#333333"/>
										</svg>
									</a>
								<?php } ?>
								<?php if(ale_get_option('fb')) { ?>
									<a href="<?php echo ale_get_option('fb');?>" title="Facebook">
										<svg width="12" height="25" viewBox="0 0 12 25" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path opacity="0.3" d="M3.06332 24.6973V13.4358H0V9.38109H3.06332V5.91787C3.06332 3.19643 4.87284 0.697266 9.04235 0.697266C10.7305 0.697266 11.9788 0.854586 11.9788 0.854586L11.8805 4.64097C11.8805 4.64097 10.6074 4.62892 9.21814 4.62892C7.71455 4.62892 7.47365 5.30248 7.47365 6.42043V9.38109H12L11.8031 13.4358H7.47365V24.6973H3.06332Z" fill="#333333"/>
										</svg>
									</a>
								<?php } ?>
								<?php if(ale_get_option('insta')) { ?>
									<a href="<?php echo ale_get_option('insta');?>" title="Instagram">
										<svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path opacity="0.3" d="M10.5371 7.72227C8.60176 7.72227 7.02237 9.30166 7.02237 11.237C7.02237 13.1724 8.60176 14.7518 10.5371 14.7518C12.4725 14.7518 14.0519 13.1724 14.0519 11.237C14.0519 9.30166 12.4725 7.72227 10.5371 7.72227ZM21.0787 11.237C21.0787 9.78154 21.0919 8.33926 21.0102 6.88643C20.9284 5.19893 20.5435 3.70127 19.3095 2.46729C18.0729 1.23067 16.5778 0.848343 14.8903 0.766605C13.4349 0.684866 11.9926 0.69805 10.5397 0.69805C9.08428 0.69805 7.642 0.684866 6.18916 0.766605C4.50166 0.848343 3.00401 1.2333 1.77002 2.46729C0.533401 3.70391 0.151077 5.19893 0.0693389 6.88643C-0.0123994 8.3419 0.000784277 9.78418 0.000784277 11.237C0.000784277 12.6898 -0.0123994 14.1348 0.0693389 15.5876C0.151077 17.2751 0.536038 18.7728 1.77002 20.0067C3.00664 21.2434 4.50166 21.6257 6.18916 21.7074C7.64463 21.7892 9.08692 21.776 10.5397 21.776C11.9952 21.776 13.4375 21.7892 14.8903 21.7074C16.5778 21.6257 18.0755 21.2407 19.3095 20.0067C20.5461 18.7701 20.9284 17.2751 21.0102 15.5876C21.0945 14.1348 21.0787 12.6925 21.0787 11.237ZM10.5371 16.6449C7.54444 16.6449 5.1292 14.2297 5.1292 11.237C5.1292 8.24434 7.54444 5.8291 10.5371 5.8291C13.5298 5.8291 15.945 8.24434 15.945 11.237C15.945 14.2297 13.5298 16.6449 10.5371 16.6449ZM16.1665 6.87061C15.4678 6.87061 14.9035 6.30635 14.9035 5.60762C14.9035 4.90889 15.4678 4.34463 16.1665 4.34463C16.8652 4.34463 17.4295 4.90889 17.4295 5.60762C17.4297 5.77354 17.3972 5.93786 17.3338 6.09119C17.2704 6.24452 17.1774 6.38383 17.06 6.50115C16.9427 6.61847 16.8034 6.71149 16.6501 6.77489C16.4968 6.83829 16.3324 6.87081 16.1665 6.87061Z" fill="#333333"/>
										</svg>
									</a>
								<?php } ?>
								<?php if(ale_get_option('youtube')) { ?>
									<a href="<?php echo ale_get_option('youtube');?>" title="Youtube">
										<svg width="31" height="21" viewBox="0 0 31 21" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path opacity="0.3" d="M29.4357 3.83527C29.2659 3.22968 28.9352 2.68141 28.4788 2.24875C28.0094 1.80278 27.4342 1.48377 26.8073 1.32183C24.4613 0.70346 15.0621 0.70346 15.0621 0.70346C11.1437 0.658879 7.22625 0.85496 3.33188 1.2906C2.705 1.4645 2.13083 1.79064 1.66041 2.24001C1.1982 2.68473 0.863409 3.23314 0.688518 3.83402C0.268395 6.09729 0.0642701 8.39537 0.078896 10.6973C0.0639053 12.9971 0.267529 15.2944 0.688518 17.5605C0.859661 18.1589 1.1932 18.7048 1.65667 19.1458C2.12013 19.5867 2.69727 19.9053 3.33188 20.0739C5.70915 20.6911 15.0621 20.6911 15.0621 20.6911C18.9855 20.7357 22.9079 20.5396 26.8073 20.1039C27.4342 19.942 28.0094 19.623 28.4788 19.177C28.941 18.736 29.2695 18.1876 29.4344 17.5905C29.8655 15.3281 30.0751 13.0291 30.0603 10.726C30.0927 8.41318 29.8834 6.10331 29.4357 3.83402V3.83527ZM12.074 14.9746V6.42116L19.8941 10.6985L12.074 14.9746Z" fill="#333333"/>
										</svg>
									</a>
								<?php } ?>
							</div>
						</div>
					</div>
					<div class="copyright-footer">
						<div class="copy"><?php ale_option('copyrights'); ?></div>
					</div>
				</div>
			</div>
		</footer>
    	<!-- Scripts -->
    	<?php wp_footer(); ?>
		<script>
            let menu = new MmenuLight(document.querySelector("#mob-menu"), "all");

            let navigator = menu.navigation({
                // selectedClass: 'Selected',
                // slidingSubmenus: true,
                // theme: 'dark',
                // title: 'Menu'
            });
            document
                .querySelector('.ic-menu')
                .addEventListener("click", (evnt) => {
                    evnt.preventDefault();
                    drawer.open();
                });
        </script>
		<!--Schema.org-->
		<script type="application/ld+json">
			<?php ale_option('schemascripts'); ?>
		</script>
	</body>
</html>