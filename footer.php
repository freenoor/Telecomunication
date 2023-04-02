<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package webs
 */

?>

<footer id="colophon" class="site-footer">
	<div class="inner__footer">
		<div class="footers1 allinonefooter col-lg-4 col-md-4 col-sm-4">
			<h1>Abos</h1>
			<nav class="navbar2 navbar-expand-lg navbar-light navbar-center">
                <?php wp_nav_menu(
					array(
					'theme_location'    => 'menu-2',
					)
					); 
				?>
			</nav>

		</div>
		<div class="footers2 allinonefooter col-lg-4 col-md-4 col-sm-4">
			<h1>Handy</h1>
			<nav class="navbar3 navbar-expand-lg navbar-light navbar-center">
                <?php wp_nav_menu(
					array(
					'theme_location'    => 'menu-extra',
					)
					); 
				?>
			</nav>
		</div>
		<div class="footers3 allinonefooter col-lg-4 col-md-4 col-sm-4">
			<h1>Hilfe</h1>
			<nav class="navbar4 navbar-expand-lg navbar-light navbar-center">
                <?php wp_nav_menu(
					array(
					'theme_location'    => 'menu-extra2',
					)
					); 
				?>
			</nav>
		</div>
	</div>

	<div class="underfooter">
		<ul class="meta-navigation__underfooter">
			<li class="meta-navigation__item__underfooter">
			<div class="rightside-2">
			<a class="title-imp" data-toggle="modal" data-target="#myModal2">Datenschutz</a>
				<div class="modal fade" id="myModal2" role="dialog">
					<div class="modal-dialog modal-lg">
						<?php
						$impressum_args = array(
						'post_type' => 'datenschutz',
						'posts_per_page' => 1
						);
						$impressum_query = new WP_Query($impressum_args);
						if($impressum_query->have_posts()) :
						while ($impressum_query->have_posts()) : $impressum_query->the_post(); 
						?>
						<div class="modal-content">
							<div class="modal-header">
								<h4 class="modal-title"><?php the_title();?></h4>
									<button type="button" class="close" data-dismiss="modal">&times;</button>
							</div>
						
							<div class="modal-body">
								<div class="left_impre2">
									<?php the_content();?>
								</div>
							</div>
							
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Schließen</button>
							</div>
						</div>
						
						<?php endwhile; 
						wp_reset_postdata(); ?>
						<?php else: ?> 
						<h2>Can't find post</h2>
						<p>Sorry, we were unable to find the posts you requested</p>
						<?php endif; ?> 

					</div>
				</div>
			</div>
			</li>

			<li class="meta-navigation__item__underfooter">
			<div class="rightside-1">
			<a class="title-imp" data-toggle="modal" data-target="#myModal">Impressum</a>
				<div class="modal fade" id="myModal" role="dialog">
					<div class="modal-dialog modal-lg">
						<?php
						$impressum_args = array(
						'post_type' => 'impressum',
						'posts_per_page' => 1
						);
						$impressum_query = new WP_Query($impressum_args);
						if($impressum_query->have_posts()) :
						while ($impressum_query->have_posts()) : $impressum_query->the_post(); 
						?>
						<div class="modal-content">
							<div class="modal-header">
								<h4 class="modal-title"><?php the_title();?></h4>
									<button type="button" class="close" data-dismiss="modal">&times;</button>
							</div>
						
							<div class="modal-body">
								<div class="row">
									<div class="left_impre col-lg-6 col-md-6 col-sm-6">
										<?php the_field('adress_left');?>
									</div>
									<div class="right_impre col-lg-6 col-md-6 col-sm-6">
										<?php the_field('adress_right');?>
									</div>
								</div>
								<div class="left_impre2">
									<?php the_content();?>
								</div>
							</div>
							
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Schließen</button>
							</div>
						</div>
						
						<?php endwhile; 
						wp_reset_postdata(); ?>
						<?php else: ?> 
						<h2>Can't find post</h2>
						<p>Sorry, we were unable to find the posts you requested</p>
						<?php endif; ?> 

					</div>
				</div>
			</div>
			</li>
		</ul>
	</div>
</footer><!-- #colophon -->

<!-- </div> -->

<?php wp_footer(); ?>



<script>
	var homeSwiper = new Swiper(".swiper-container1", {
		loop: true,
		fadeEffect: { crossFade: true },
		virtualTranslate: true,
		autoplay: {
		delay: 1500,
		disableOnInteraction: true,
		},
		speed: 1000, 
		slidersPerView: 1,
		effect: "fade"
		});


	window.onscroll = function() {myFunction()};
		var navbar = document.getElementById("header");
		var sticky = navbar.offsetTop;
		var navbari = document.getElementById("int-welc");
		var stickyy = navbar.offsetTop;

		function myFunction() {
		if (window.pageYOffset >= sticky) {
			navbar.classList.add("sticky")
		} else {
			navbar.classList.remove("sticky");
		}
		if (window.pageYOffset >= stickyy) {
			navbari.classList.add("stickyy")
		} else {
			navbari.classList.remove("stickyy");
		}
		}


	var swiper = new Swiper('.swiper-container2', {
		slidesPerView: 1,
		spaceBetween: 30,
		loop: true, 
		pagination: {
		el: '.swiper-pagination',
		clickable: true,
		},
		breakpoints: {
		991.98: {
		slidesPerView: 3,	
		},
		1024: {
		  slidesPerView: 3,
		},
		}
		});	


	var Menu = {
		el: {
		ham: $('.menu-m'),
		menuTop: $('.menu-top'),
		menuMiddle: $('.menu-middle'),
		menuBottom: $('.menu-bottom')
		},
		init: function() {
		Menu.bindUIactions();
		},
		bindUIactions: function() {
		Menu.el.ham
		.on(
		'click',
		function(event) {
		Menu.activateMenu(event);
		event.preventDefault();
		}
		);
		},
		activateMenu: function() {
		Menu.el.menuTop.toggleClass('menu-top-click');
		Menu.el.menuMiddle.toggleClass('menu-middle-click');
		Menu.el.menuBottom.toggleClass('menu-bottom-click'); 
		}
		};
		Menu.init();



	function SmoothVerticalScrolling(e, time, where) {
		var eTop = e.getBoundingClientRect().top;
		var eAmt = eTop / 100;
		var curTime = 0;
		while (curTime <= time) {
		window.setTimeout(SVS_B, curTime, eAmt, where);
		curTime += time / 100;
		}
		}

		function SVS_B(eAmt, where) {
		if(where == "center" || where == "")
		window.scrollBy(0, eAmt / 2);
		if (where == "top")
		window.scrollBy(0, eAmt);
		}
</script>


</body>
</html>
