<!doctype html>
	<html <?php language_attributes(); ?>>
		<head>
			<meta charset="<?php bloginfo( 'charset' ); ?>">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<link rel="profile" href="https://gmpg.org/xfn/11">
			<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0/css/all.min.css" integrity="sha256-ybRkN9dBjhcS2qrW1z+hfCxq+1aBdwyQM5wlQoQVt/0=" crossorigin="anonymous" async/>
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
			<?php wp_head(); ?>
		</head>
		<body <?php body_class(); ?>>

					<div class="meta-navigation">
						<ul class="meta-navigation__list">
							<li class="meta-navigation__item  menu-item menu-item-type-post_type menu-item-object-page menu-item-32">
							<a href="/hilfe" target="_top">Hilfe</a>
							</li>
							<li class="meta-navigation__item  menu-item menu-item-type-post_type menu-item-object-page menu-item-31">
								<a href="/kontakt" target="_top">Kontakt</a>							
							</li>
							<li class="meta-navigation__item meta-button menu-item menu-item-type-post_type menu-item-object-page menu-item-323">
								<a href="https://www.instagram.com/puzzle_enterprise/" target="_self" class="meta-navigation__link">Instagram</a>
							</li>
						</ul>
	 				</div>

			<header id="header">
				<div class="container">
					<div class="row">
						<div class="menu-here">

							<nav class="navbar navbar-light navbar-expand-md navbar-center">

								<a class="logo-header" href="<?php echo esc_url(home_url('/')); ?>">
									<?php dynamic_sidebar('logo_header');?>
								</a> 

								<div class="navbar-toggler" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
									<div class="menu-m">
										<span class="menu-global menu-top"></span>
										<span class="menu-global menu-middle"></span>
										<span class="menu-global menu-bottom"></span>
									</div>
								</div>
						
								<div class="collapse navbar-collapse overlay-full" id="navbarNav">
									<ul class="navbar-nav">
										<?php wp_nav_menu(
											array(
											'theme_location'    => 'menu-1',
											)
											); 
										?>
									</ul>
								</div>

							</nav>
								
						</div>
					</div>
				</div> 
		</header>

				<?php if(is_front_page()):?>
					
				<div class="welcomesec" id="welcomesec">
					<div class="swiper-container1">
						<div class="swiper-wrapper ">
							<?php
							$args = array(
							'post_type' => 'homeslide',
							'posts_per_page' => '-1',
							'order' => 'ASC',
							);
							$loop = new WP_Query($args);
							while($loop->have_posts()):
							$loop->the_post();
							?>

							<div class="swiper-slide">

								<div class="slideimg" id="slideimg">
									<?php the_content(); ?>
								</div>
	
							</div>

							<?php
							endwhile;
							wp_reset_postdata();
							?>
						</div>
					</div>
				</div>

				<?php else: ?>
				
				<?php endif;?>
