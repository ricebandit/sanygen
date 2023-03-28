<?php
/**
 * Sanytize functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Sanytize
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function sanytize_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Sanytize, use a find and replace
		* to change 'sanytize' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'sanytize', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Primary', 'sanytize' ),
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
			'sanytize_custom_background_args',
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
add_action( 'after_setup_theme', 'sanytize_setup' );


/** 
 * Add slug to body tag as class
*/
function add_page_slug_to_the_body( $classes ) {

	global $post;
	if ( isset( $post ) ) {
		$classes[] = $post->post_type . '_' . $post->post_name;
	}
	return $classes;
}
add_filter( 'body_class', 'add_page_slug_to_the_body' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function sanytize_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'sanytize_content_width', 640 );
}
add_action( 'after_setup_theme', 'sanytize_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function sanytize_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'sanytize' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'sanytize' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'sanytize_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function sanytize_scripts() {
	wp_enqueue_style( 'sanytize-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_enqueue_style( 'sanytize-gliderstyles', get_template_directory_uri() . '/js/glider.min.css', false );
	wp_enqueue_style( 'sanytize-font', 'https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,400;0,600;1,700&display=swap', false );
	wp_style_add_data( 'sanytize-style', 'rtl', 'replace' );

	wp_enqueue_script( 'sanytize-glider', get_template_directory_uri() . '/js/glider.min.js', array(), _S_VERSION, true );

	wp_enqueue_script( 'sanytize-customjs', get_template_directory_uri() . '/js/customjs.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'sanytize-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'sanytize_scripts' );

/*
ADDITIONAL MENUS
*/

function register_menus(){

	register_nav_menu('secondary-nav', __('Secondary Nav'));
	// register_nav_menu('products', __('Products'));
	// register_nav_menu('aboutus', __('About Us'));
	// register_nav_menu('resources', __('Resources'));
	// register_nav_menu('contact', __('Contact Us'));
	// register_nav_menu('phone', __('Phone Numbers'));
	

}

add_action( 'init', 'register_menus');

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

