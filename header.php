<!doctype html>
<html lang="en">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<title><?php wp_title('|', true, 'right'); bloginfo('name'); ?></title>
		<link type="image/x-icon" rel="shortcut icon" href="<?php echo get_template_directory_uri()?>/favicon/favicon.ico">
		<link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri()?>/favicon/apple-touch-icon.png">
		<link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_template_directory_uri()?>/favicon/favicon-48x48.png">
		<link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_template_directory_uri()?>/favicon/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_template_directory_uri()?>/favicon/favicon-16x16.png">
		<meta name="msapplication-config" content="<?php echo get_template_directory_uri()?>/favicon/browserconfig.xml">
		<link rel="mask-icon" href="<?php echo get_template_directory_uri()?>/favicon/safari-pinned-tab.svg" color="#86c8db">
		<meta name="msapplication-TileColor" content="#da532c">
		<meta name="theme-color" content="#ffffff">
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?> >
		<header>
			<div class="wrapper">
				<div class="wrap-header">
					<div class="logo-site">
						<a href="/">
							<img src="<?php ale_option('sitelogo'); ?>" alt="gp solutions">
						</a>
					</div>
					<div class="header-menu">
						<?php
							wp_nav_menu(array(
								'theme_location' => 'header_menu_main',
								'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
								'menu_class' => 'nav-header',
								'menu_id' => '',
								'depth' => 3,
							));
						?>
					</div>
					<!--Mob hamburger menu-->
					<div class="hamburger-menu">
						<div class="ic-menu"> 
							<span></span> 
							<span></span> 
							<span></span>
						</div>
					</div>
				</div>
			</div>
			<!--Mob menu-->
			<div id="mob-menu" class="header-mob-menu">
				<?php
					wp_nav_menu(array(
						'theme_location' => 'header_menu_mob',
						'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
						'menu_class' => 'mob-nav-header',
						'menu_id' => '',
						'depth' => 3,
					));
				?>
			</id=>
		</header>
