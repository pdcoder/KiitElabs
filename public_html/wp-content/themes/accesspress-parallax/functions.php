<?php
session_start();
/**
 * accesspress_parallax functions and definitions
 *
 * @package accesspress_parallax
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */

wp_enqueue_script('jquery');

if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'accesspress_parallax_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function accesspress_parallax_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on accesspress_parallax, use a find and replace
	 * to change 'accesspress_parallax' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'accesspress-parallax', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	// Add Support WooCommerce
	add_theme_support( 'woocommerce' );
    add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-lightbox' );
    add_theme_support( 'wc-product-gallery-slider' );

	/**
	 * Add callback for custom TinyMCE editor stylesheets. (editor-style.css)
	 * @see http://codex.wordpress.org/Function_Reference/add_editor_style
	 */
	add_editor_style('css/editor-style.css');

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'blog-header', 900, 300, array('center','center')); //blog Image
	add_image_size( 'portfolio-thumbnail', 560, 450, array('center','center')); //Portfolio Image
    add_image_size( 'blog-thumbnail', 480, 300, array('center','center')); //Blog Image	
	add_image_size( 'team-thumbnail', 380, 380, array('top','center')); //Portfolio Image

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'accesspress-parallax' ),
	) );
	
	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'accesspress_parallax_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // accesspress_parallax_setup
add_action( 'after_setup_theme', 'accesspress_parallax_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function accesspress_parallax_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'accesspress-parallax' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title"><span>',
		'after_title'   => '</span></h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer One', 'accesspress-parallax' ),
		'id'            => 'footer-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Two', 'accesspress-parallax' ),
		'id'            => 'footer-2',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Three', 'accesspress-parallax' ),
		'id'            => 'footer-3',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Four', 'accesspress-parallax' ),
		'id'            => 'footer-4',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'accesspress_parallax_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function accesspress_parallax_scripts() {
	$query_args = array(
		'family' => 'Roboto:400,300,500,700|Oxygen:400,300,700',
	);
	wp_enqueue_style( 'accesspress-parallax-google-fonts', add_query_arg( $query_args, "//fonts.googleapis.com/css" ) );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/fontawesome/css/font-awesome.min.css' );
	wp_enqueue_style( 'jquery-bxslider', get_template_directory_uri() . '/css/jquery.bxslider.css' );
	wp_enqueue_style( 'nivo-lightbox', get_template_directory_uri() . '/css/nivo-lightbox.css' );
	wp_enqueue_style( 'animate', get_template_directory_uri() . '/css/animate.css' );
    wp_enqueue_style('accesspress-parallax-woocommerce',get_template_directory_uri().'/woocommerce/ap-parallax-style.css');
	wp_enqueue_style( 'accesspress-parallax-style', get_stylesheet_uri() );
	if(of_get_option('enable_responsive') == 1) :
		wp_enqueue_style( 'accesspress-parallax-responsive', get_template_directory_uri() . '/css/responsive.css' );
	endif;
	
	if (of_get_option('enable_animation') == '1' && is_front_page()) :
        wp_enqueue_script('wow', get_template_directory_uri() . '/js/wow.js', array('jquery'), '1.0', true);
    endif;

	wp_enqueue_script( 'smoothscroll', get_template_directory_uri() . '/js/SmoothScroll.js', array('jquery'), '1.2.1', true );
    wp_enqueue_script( 'parallax', get_template_directory_uri() . '/js/parallax.js', array('jquery'), '1.1.3', true );
	wp_enqueue_script( 'scrollto', get_template_directory_uri() . '/js/jquery.scrollTo.min.js', array('jquery'), '1.4.14', true );
	wp_enqueue_script( 'jquery-localscroll', get_template_directory_uri() . '/js/jquery.localScroll.min.js', array('jquery'), '1.3.5', true );
	wp_enqueue_script( 'accesspress-parallax-parallax-nav', get_template_directory_uri() . '/js/jquery.nav.js', array('jquery'), '2.2.0', true );
	wp_enqueue_script( 'jquery-bxslider', get_template_directory_uri() . '/js/jquery.bxslider.min.js', array('jquery'), '4.2.1', true );
	wp_enqueue_script( 'jquery-easing', get_template_directory_uri() . '/js/jquery.easing.min.js', array('jquery'), '1.3', true );
	wp_enqueue_script( 'jquery-fitvid', get_template_directory_uri() . '/js/jquery.fitvids.js', array('jquery'), '1.0', true );
	wp_enqueue_script( 'jquery-actual', get_template_directory_uri() . '/js/jquery.actual.min.js', array('jquery'), '1.0.16', true );
	wp_enqueue_script( 'nivo-lightbox', get_template_directory_uri() . '/js/nivo-lightbox.min.js', array('jquery'), '1.2.0', true );
	wp_enqueue_script( 'accesspress-parallax-custom', get_template_directory_uri() . '/js/custom.js', array('jquery'), '1.0', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'accesspress_parallax_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/accesspress-header.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/accesspress-functions.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Load Theme Option Frame work files
 */
require get_template_directory() . '/inc/options-framework/options-framework.php';

/**
 * Load woocommerce function
 * */
require get_template_directory().'/woocommerce/ap-parallax-woocommerce-function.php';

/**
 * Load Welcome Page
 * */
require get_template_directory().'/welcome/welcome.php';

function accesspress_parallax_ajax_script(){
	 wp_localize_script( 'accesspress-parallax-ajax', 'ajax_script', array( 'ajaxurl' => admin_url( 'admin-ajax.php' )) );
     wp_enqueue_script( 'accesspress-parallax-ajax', get_template_directory_uri().'/inc/options-framework/js/ajax.js', 'jquery', true);

}
add_action('admin_enqueue_scripts', 'accesspress_parallax_ajax_script');

function accesspress_parallax_get_my_option(){
	require get_template_directory() . '/inc/ajax.php';
	die();
}

add_action("wp_ajax_get_my_option", "accesspress_parallax_get_my_option");

define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/inc/options-framework/' );


/**
 * Load Styles and Scripts
 * */
wp_enqueue_script('jquery');

function style_enqueue(){
	wp_enqueue_script('bootsrapjs', get_template_directory_uri().'/js/bootstrap.min.js', array(), '1.0.0', true);
	wp_enqueue_style('bootstrapcss', get_template_directory_uri().'/css/bootstrap.min.css');
	wp_enqueue_style('mycss', get_template_directory_uri().'/css/mystyle.css', array(), '9.0.1', 'all');
	wp_enqueue_script('myjs', get_template_directory_uri().'/js/mystyle.js', array('jquery'), '9.0.1', true);
}
add_action('wp_enqueue_scripts', 'style_enqueue');

/**
 * Limited Registrations
 * */
add_action('wp_head', 'myplugin_ajaxurl');

function myplugin_ajaxurl() {
    echo '<script type="text/javascript">
           var ajaxurl = "' . admin_url('admin-ajax.php') . '";
         </script>';
}

function get_seats_remaining(){
	global $wpdb;
	$java = $wpdb->get_row('SELECT * FROM seats_remaining WHERE course="Java"');
	$android = $wpdb->get_row('SELECT * FROM seats_remaining WHERE course="Android"');
	$web = $wpdb->get_row('SELECT * FROM seats_remaining WHERE course="Web Development"');
	$networking = $wpdb->get_row('SELECT * FROM seats_remaining WHERE course="Networking"');
	$iot = $wpdb->get_row('SELECT * FROM seats_remaining WHERE course="IOT"');
	$embedded = $wpdb->get_row('SELECT * FROM seats_remaining WHERE course="Embedded Systems"');
	$seats = array('Java'=>$java->seats, 'Android'=>$android->seats, 'Web'=>$web->seats, 'Networking'=>$networking->seats, 'IOT'=>$iot->seats, 'Embedded'=>$embedded->seats);
	$seats = json_encode($seats);
	echo $seats;
	wp_die();
}
add_action('wp_ajax_get_seats_remaining', 'get_seats_remaining');
add_action('wp_ajax_nopriv_get_seats_remaining', 'get_seats_remaining'); 


/**
 * Flushing Rewrite Rules
 * */
register_deactivation_hook( __FILE__, 'flush_rewrite_rules' );
register_activation_hook( __FILE__, 'wdocs_flush_rewrites' );
 
 
register_deactivation_hook( __FILE__, 'flush_rewrite_rules' );
register_activation_hook( __FILE__, 'myplugin_flush_rewrites' );
function myplugin_flush_rewrites() {
	custom_post_types2();
	custom_post_types1();
	flush_rewrite_rules();
}

/**
 * Adding Custom Menu and Submenus
 * */
function custom_post_type_course_structure(){

    $labels = array(
        'name' => 'Course Structure',
        'singular_name' => 'Course Structure',
        'add_new' => 'Add New Course Structure',
        'all_items' => 'All Course Structures',
        'add_new_item' => 'Add New Course Structure',
        'edit_item' => 'Edit Course Structure',
        'new_item' => 'New Course Structure',
        'view_item' => 'View Course Structure',
        'search_item' => 'Search Course Structure',
        'not_found' => 'No Course Structures Found',
        'not_found_in_trash' => 'No Course Structures in Trash',
        'parent_item_colon' => 'Parent Course Structure'
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'publicly_queryable' => false,
        'query_var' => true,
        'rewrite' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'supports' => array(
            'title',
            'editor',
            'revisions'
        ),
        'menu_position' => 5,
        'exclude_from_search' => true
    );

    register_post_type('course-structure', $args);
    
}

add_action('init', 'custom_post_type_course_structure');


function custom_post_type_members(){

    $labels = array(
        'name' => 'Members',
        'singular_name' => 'Member',
        'add_new' => 'Add New Member',
        'all_items' => 'All Members',
        'add_new_item' => 'Add New Member',
        'edit_item' => 'Edit Member',
        'new_item' => 'New Member',
        'view_item' => 'View Members',
        'search_item' => 'Search Members',
        'not_found' => 'No Members Found',
        'not_found_in_trash' => 'No Members in Trash',
        'parent_item_colon' => 'Parent Member'
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'publicly_queryable' => false,
        'query_var' => true,
        'rewrite' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'supports' => array(
            'title',
            'editor',
            'revisions',
            'custom-fields',
            'thumbnail'
        ),
        'menu_position' => 5,
        'exclude_from_search' => true
    );

    register_post_type('members', $args);
    
}

add_action('init', 'custom_post_type_members');