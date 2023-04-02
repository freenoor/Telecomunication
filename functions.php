<?php
/**
 * webs functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package webs
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'webs_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function webs_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on webs, use a find and replace
		 * to change 'webs' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'webs', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'webs' ),
				'menu-2' => esc_html__( 'Secondary', 'webs' ),
				'menu-extra' => esc_html__( 'Extra', 'webs' ),
				'menu-extra2' => esc_html__( 'Extra2', 'webs' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'webs_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'webs_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function webs_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'webs_content_width', 640 );
}
add_action( 'after_setup_theme', 'webs_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function webs_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'LogoHeader', 'webs' ),
			'id'            => 'logo_header',
			'description'   => esc_html__( 'Add widgets here.', 'webs' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Contact us', 'webs' ),
			'id'            => 'contact',
			'description'   => esc_html__( 'Add widgets here.', 'webs' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'webs_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function webs_scripts() {
	wp_enqueue_style( 'webs-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_enqueue_style('animate-css', get_template_directory_uri().'/assets/css/animate.css', array(), 'all');
	wp_enqueue_style('main-css', get_template_directory_uri().'/assets/css/main.css', array(), 'all');
	wp_enqueue_style('bootstrap-css', get_template_directory_uri().'/assets/bootstrap/bootstrap.min.css', array(), '4.5.0', 'all');
	wp_enqueue_style('swiper-css', get_template_directory_uri().'/assets/swiper/css/swiper.min.css', array(), 'all');
	wp_style_add_data( 'webs-style', 'rtl', 'replace' );

	wp_enqueue_script( 'webs-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
	wp_enqueue_script('swiper-js', get_template_directory_uri().'/assets/swiper/js/swiper.min.js', array(), true);
	wp_enqueue_script('bootstrap-js', get_template_directory_uri().'/assets/bootstrap/bootstrap.min.js', array(), '4.5.0', 'all');
	wp_enqueue_script('jquery-slim-min.js', get_template_directory_uri().'assets/js/jquery.slim.min.js', array(), '3.5.1', 'all');
	wp_enqueue_script('jquery-min.js', get_template_directory_uri().'assets/js/jquery.min.js', array(), '1.12.0', 'all');

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'webs_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}


function custom_post_type(){
    
	$labels_frontpage = array(
	'name' => 'Home Fade',
	);
	register_post_type('homeslide', array(
	'labels' => $labels_frontpage,
	'public' => true,
	'has_archive' => true,
	'publicly_queryable' => true,
	'query_var' => true,
	'rewrite' => true,
	'capability_type' => 'post',
	'hierarchical' => false,
	'supports' => array(
	'title',
	'editor',
	'excerpt',
	'thumbnail',
	'revisions',),
	'menu_position' => 8,
	'exclude_from_search' => false,
	'menu_icon' => 'dashicons-format-gallery',
	));
	$labels_frontpage = array(
	'name' => 'Offers',
	);
	register_post_type('categorys', array(
	'labels' => $labels_frontpage,
	'public' => true,
	'has_archive' => true,
	'publicly_queryable' => true,
	'query_var' => true,
	'rewrite' => true,
	'capability_type' => 'post',
	'hierarchical' => false,
	'supports' => array(
	'title',
	'editor',
	'excerpt',
	'thumbnail',
	'revisions',),
	'menu_position' => 8,
	'exclude_from_search' => false,
	'menu_icon' => 'dashicons-format-gallery',
	));
	$labels_frontpage = array(
	'name' => 'Adventages',
	);
	register_post_type('adventages', array(
	'labels' => $labels_frontpage,
	'public' => true,
	'has_archive' => true,
	'publicly_queryable' => true,
	'query_var' => true,
	'rewrite' => true,
	'capability_type' => 'post',
	'hierarchical' => false,
	'supports' => array(
	'title',
	'editor',
	'excerpt',
	'thumbnail',
	'revisions',),
	'menu_position' => 8,
	'exclude_from_search' => false,
	'menu_icon' => 'dashicons-format-gallery',
	));
	$labels_frontpage = array(
	'name' => 'Impressum',
	);
	register_post_type('impressum', array(
	'labels' => $labels_frontpage,
	'public' => true,
	'has_archive' => true,
	'publicly_queryable' => true,
	'query_var' => true,
	'rewrite' => true,
	'capability_type' => 'post',
	'hierarchical' => false,
	'supports' => array(
	'title',
	'editor',
	'excerpt',
	'thumbnail',
	'revisions',),
	'menu_position' => 8,
	'exclude_from_search' => false,
	'menu_icon' => 'dashicons-format-gallery',
	));
	$labels_frontpage = array(
	'name' => 'Datenschutz',
	);
	register_post_type('datenschutz', array(
	'labels' => $labels_frontpage,
	'public' => true,
	'has_archive' => true,
	'publicly_queryable' => true,
	'query_var' => true,
	'rewrite' => true,
	'capability_type' => 'post',
	'hierarchical' => false,
	'supports' => array(
	'title',
	'editor',
	'excerpt',
	'thumbnail',
	'revisions',),
	'menu_position' => 8,
	'exclude_from_search' => false,
	'menu_icon' => 'dashicons-format-gallery',
	));
}
	add_action('init', 'custom_post_type');

add_action( 'init', 'crunchify_create_deals_custom_taxonomy', 0 );
//create a custom taxonomy name it "type" for your posts
function crunchify_create_deals_custom_taxonomy() {

$labels2 = array(
'name' => _x( 'Offers', 'taxonomy general gesundheit' ),
'singular_name' => _x( 'Offers', 'taxonomy singular gesundheit' ),//jo te kategories
'search_items' => __( 'Search Menu Categories' ),
'all_items' => __( 'All Menu Categories' ),
'parent_item' => __( 'Parent Offers' ),
'parent_item_colon' => __( 'Parent Offers:' ),
'edit_item' => __( 'Edit Offers' ),
'update_item' => __( 'Update Offers' ),
'add_new_item' => __( 'Add New Offers' ),
'new_item_name' => __( 'New Offers Name' ),
'menu_name' => __( 'Offers' ),
);


register_taxonomy('offerstax',array('categorys'), array(
'hierarchical' => true,
'labels' => $labels2,
'show_ui' => true,
'show_admin_column' => true,
'query_var' => true,
'rewrite' => array( 'slug' => 'offerstax' ),
));
}




function my_wpcf7_form_elements($html) {
	
	function ov3rfly_replace_include_blank($name, $text, &$html) {
		
		$matches = false;preg_match('/<select name="' . $name . '"[^>]*>(.*)<\/select>/iU', $html, $matches);
		if ($matches) {$select = str_replace(
			'<option value="">---</option>', '<option value="">' . $text . '</option>', 
			$matches[0]);$html = preg_replace(
			'/<select name="' . $name . '"[^>]*>(.*)<\/select>/iU', $select, $html);
			}
			}
			ov3rfly_replace_include_blank('menu-918', 'Thema auswählen', $html);
			ov3rfly_replace_include_blank('menu-919', 'Anrede', $html);
		return $html;}

		add_filter('wpcf7_form_elements', 'my_wpcf7_form_elements');
