<!DOCTYPE html>
<html lang="ru">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

		<!-- Адаптирование страницы для мобильных устройств -->
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

		<!-- Подключение шрифтов -->
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,200..1000;1,200..1000&display=swap" rel="stylesheet">

		<!-- Изменение цвета панели моб. браузера -->
		<meta name="msapplication-TileColor" content="#DE041D">
		<meta name="theme-color" content="#DE041D">
		
		<!-- Подключение файлов стилей -->
		<link async rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/swiper-bundle.min.css">		
		<link async rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/swiper.css">
		<link async rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/fancybox.css">
		<link async rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/nice-select.css">
		<link async rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/styles.css">

		<link async rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/response_1600.css" media="print, (max-width: 1600px)">
		<link async rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/response_1300.css" media="print, (max-width: 1300px)">
		<link async rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/response_1187.css" media="print, (max-width: 1187px)">
		<link async rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/response_1023.css" media="print, (max-width: 1023px)">
		<link async rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/response_767.css" media="print, (max-width: 767px)">
		<link async rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/response_479.css" media="(max-width: 479px)">
		<?php wp_head(); ?>
	</head>

	<body>
		<div class="wrap">
			<div class="main <?php if(!is_front_page()){echo "page";} ?>">
				<header>									
					<div class="cont">														
						<div class="header_wrap">
							<button class="mob_menu_btn">
								<img src="<?php bloginfo('template_url'); ?>/images/mob_menu.svg" alt="">
							</button>
							<button class="close_btn">
								<img src="<?php bloginfo('template_url'); ?>/images/close.svg" alt="">
							</button>	

							<a href="<?php bloginfo('siteurl'); ?>" class="header_logo">
								<img src="<?php bloginfo('template_url'); ?>/images/logo.svg" alt="">
								<span>AppData</span>
							</a>
							
							<?php  wp_nav_menu ( array ( 'theme_location'  => 'header-menu',  
				                'menu'            => '',   
				                'container'       => '',   
				                'container_class' => '',   
				                'container_id'    => '',  
				                'menu_class'      => 'menu',   
				                'menu_id'         => '',  
				                'echo'            => true,  
				                'fallback_cb'     => 'wp_page_menu',  
				                'before'          => '',  
				                'after'           => '',  
				                'link_before'     => '',  
				                'link_after'      => '',  
				                'depth'           => 0,     
				                ) );  ?>			
						
							<a href="#" class="header_contact btn modal_link" data-content="#modal">
								<span>связаться</span>
							</a>														
						</div>

						<?php if(is_front_page()): ?>
						<div class="header_bottom">
							<h1 class="header_title"><?php the_field("zagolovok"); ?></h1>
							<div class="header_subtitle"><?php the_field("podzagolovok"); ?></div>
							<div class="header_text"><?php the_field("opisanie"); ?></div>
							<a href="#" class="header_btn btn modal_link" data-content="#modal">
								<span><?php the_field("text_button"); ?></span>
							</a>
						</div>
						<?php endif; ?>	
					</div>	
					<?php if(is_front_page()): ?>
						<div class="header_img1">
							<img src="<?php bloginfo('template_url'); ?>/images/header_img1.png" alt="" loading="lazy">
						</div>
						<div class="header_img2">
							<img src="<?php bloginfo('template_url'); ?>/images/header_img2.png" alt="" loading="lazy">
						</div>
						<div class="header_img3">
							<img src="<?php bloginfo('template_url'); ?>/images/header_img3.png" alt="" loading="lazy">
						</div>
						<div class="header_img4">
							<img src="<?php bloginfo('template_url'); ?>/images/header_img4.png" alt="" loading="lazy">
						</div>	
					<?php endif; ?>				
				</header>
