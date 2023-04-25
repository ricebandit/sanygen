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
 * Fix pagination on archive pages
 * After adding a rewrite rule, go to Settings > Permalinks and click Save to flush the rules cache
 */
function my_pagination_rewrite() {
    add_rewrite_rule('blog/page/?([0-9]{1,})/?$', 'index.php?category_name=blog&paged=$matches[1]', 'top');
}
add_action('init', 'my_pagination_rewrite');

function remove_page_from_query_string($query_string)
{
    if (isset($query_string['paged'])) {
        unset($query_string['name']);
		$GLOBALS['paged_n'] = $query_string['paged'];
        $query_string['paged'] = $query_string['page'];

    }
    return $query_string;
}
add_filter('request', 'remove_page_from_query_string');

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
	register_nav_menu('productsubnav', __('Products Sub Navigation'));
	// register_nav_menu('products', __('Products'));
	// register_nav_menu('aboutus', __('About Us'));
	// register_nav_menu('resources', __('Resources'));
	// register_nav_menu('contact', __('Contact Us'));
	// register_nav_menu('phone', __('Phone Numbers'));


}

add_action( 'after_setup_theme', 'register_menus');

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

/** 
 * Cleaner VAR_DUMP
*/

if(!function_exists('wp_dump')) :
    function wp_dump(){
        if(func_num_args() === 1)
        {
            $a = func_get_args();
            echo '<pre>', var_dump( $a[0] ), '</pre><hr>';
        }
        else if(func_num_args() > 1)
            echo '<pre>', var_dump( func_get_args() ), '</pre><hr>';
        else
            throw Exception('You must provide at least one argument to this function.');
    }
endif;


/**
 * SEARCH PAGINATION
 */
function search_filter($query) {
	if ( !is_admin() && $query->is_main_query() ) {
		if ($query->is_search) {
		$query->set('paged', ( get_query_var('paged') ) ? get_query_var('paged') : 1 );
		$query->set('posts_per_page',9);
		}
	}
}
add_action( 'pre_get_posts', 'search_filter' );

function search_pagination() {
  
    if( is_singular() )
        return;
  
    global $wp_query;
  
    /** Stop execution if there's only 1 page */
    if( $wp_query->max_num_pages <= 1 )
        return;
  
    $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;

    $max   = intval( $wp_query->max_num_pages );
	

	if ( $paged == 1 ){
		$links[] = $paged;
		$links[] = $paged + 1;
		if($max > 2){
			$links[] = $paged + 2;
		}
	}

	if ( $paged == 2 ){
		$links[] = $paged - 1;
		$links[] = $paged;
		if($max > 2){
			$links[] = $paged + 1;
		}
	}

		
	if( ($paged > 2 && $paged < $max)){
		$links[] = $paged - 1;
		$links[] = $paged;
		if($max > 2){
			$links[] = $paged + 1;
		}
	}

	if($max > 2){
		if($paged == $max){
			$links[] = $paged - 2;
			$links[] = $paged - 1;
			$links[] = $paged;
		}
	}

  
    echo '<div class="navigation"><ul>' . "\n";
  
    /** Previous Post Link */
	if(get_prev_pagelink() ){
		echo '<li><a href="' . get_prev_pagelink() . '" class="arrow prev"></a></li>';
	}
  
  
    /** Link to current page, plus 2 pages in either direction if necessary */
    sort( $links );
    foreach ( (array) $links as $link ) {
        $class = $paged == $link ? ' class="active"' : '';
        printf( '<li%s><a href="%s"><span>%s</span></a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
    }
  
  
    /** Next Post Link */
    if ( get_next_posts_link($max) )
		echo '<li><a href="' . get_next_pagelink($max) . '" class="arrow next"></a></li>';
  
    echo '</ul></div>' . "\n";
  
}

function get_next_pagelink($max) {
    global $paged;

    if ( !is_single() ) {
        $nextpage = intval($paged) + 1;
        if ( $nextpage == $max )
            $nextpage = $max;
        return get_pagenum_link($nextpage);
    }

}

function get_prev_pagelink() {
    global $paged;

    if ( !is_single() ) {
        $nextpage = intval($paged) - 1;
        if ( $nextpage < 1 )
            $nextpage = 1;

        return get_pagenum_link($nextpage);
    }

}

/**
 * CATEGORY PAGINATION
 */
function category_pagination($query, $paged) {
  
    if( is_singular() )
        return;
  

  
    /** Stop execution if there's only 1 page */
    if( $query->max_num_pages <= 1 )
        return;
	

    $max   = intval( $query->max_num_pages );
	

	if ( $paged == 1 ){
		$links[] = $paged;
		$links[] = $paged + 1;
		if($max > 2){
			$links[] = $paged + 2;
		}
	}

	if ( $paged == 2 ){
		$links[] = $paged - 1;
		$links[] = $paged;
		if($max > 2){
			$links[] = $paged + 1;
		}
	}

		
	if( ($paged > 2 && $paged < $max)){
		$links[] = $paged - 1;
		$links[] = $paged;
		if($max > 2){
			$links[] = $paged + 1;
		}
	}

	if($max > 2){
		if($paged == $max){
			$links[] = $paged - 2;
			$links[] = $paged - 1;
			$links[] = $paged;
		}
	}

  
    echo '<div class="navigation"><ul>' . "\n";

	
  
    /** Previous Post Link */
	if(get_prev_catlink($paged) ){
		echo '<li><a href="' . get_prev_catlink($paged) . '" class="arrow prev"></a></li>';
	}
  
  
    /** Link to current page, plus 2 pages in either direction if necessary */
    sort( $links );
    foreach ( (array) $links as $link ) {
        $class = $paged == $link ? ' class="active"' : '';
        printf( '<li%s><a href="%s"><span>%s</span></a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
    }
  
  
    /** Next Post Link */
    if ( get_next_catlink($paged, $max) )
		echo '<li><a href="' . get_next_catlink($paged, $max) . '" class="arrow next"></a></li>';

  
    echo '</ul></div>' . "\n";
  
}

function get_next_catlink($paged, $max) {

    if ( !is_single() ) {
        $nextpage = intval($paged) + 1;
        if ( $nextpage >= $max - 1)
            $nextpage = $max;
		return get_pagenum_link($nextpage);
        
    }

}

function get_prev_catlink($paged) {

    if ( !is_single() ) {
        $nextpage = intval($paged) - 1;
        if ( $nextpage < 1 )
            $nextpage = 1;

        return get_pagenum_link($nextpage);
    }

}




