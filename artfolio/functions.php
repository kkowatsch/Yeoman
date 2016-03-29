<?php
/**
 * artfolio functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package artfolio
 */
if (!function_exists('artfolio_setup')) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function artfolio_setup() {
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on artfolio, use a find and replace
         * to change 'artfolio' to the name of your theme in all the template files.
         */
        load_theme_textdomain('artfolio', get_template_directory() . '/languages');
// Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');
        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
//	add_theme_support( 'title-tag' );
        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support('post-thumbnails');
        set_post_thumbnail_size(828, 360, true);
        add_image_size('artfolio-small-thumb', 300, 150, true);
// This theme uses wp_nav_menu() in one location.
        register_nav_menus(array(
            'primary' => esc_html__('Primary', 'artfolio'),
        ));
        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support('html5', array(
            'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
        ));
        /*
         * Enable support for Post Formats.
         * See https://developer.wordpress.org/themes/functionality/post-formats/
         */
        add_theme_support('post-formats', array(
            'aside', 'image', 'video', 'quote', 'link',
        ));
// Set up the WordPress core custom background feature.
        add_theme_support('custom-background', apply_filters('artfolio_custom_background_args', array(
            'default-color' => 'ffffff', 'default-image' => '',
        )));
    }
endif;
add_action('after_setup_theme', 'artfolio_setup');
/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function artfolio_content_width() {
    $GLOBALS['content_width'] = apply_filters('artfolio_content_width', 640);
}
add_action('after_setup_theme', 'artfolio_content_width', 0);
/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
//function artfolio_widgets_init() {
//	register_sidebar( array(
//		'name'          => esc_html__( 'Sidebar', 'artfolio' ),
//		'id'            => 'sidebar-1',
//		'description'   => '',
//		'before_widget' => '<section id="%1$s" class="widget %2$s">',
//		'after_widget'  => '</section>',
//		'before_title'  => '<h2 class="widget-title">',
//		'after_title'   => '</h2>',
//	) );
//}
//add_action( 'widgets_init', 'artfolio_widgets_init' );
/**
 * Enqueue scripts and styles.
 */
function artfolio_scripts() {
    wp_enqueue_style('artfolio-style', get_stylesheet_uri());
//Add Google Fonts: Amaranth and Fira Sans
//wp_enqueue_script('artfolio-google-fonts','https://fonts.googleapis.com/css?family=Amaranth:400,700|Fira+Sans:400,500');
    wp_enqueue_style('artfolio-local-fonts', get_template_directory_uri() . '/fonts/custom-fonts.css');
//Add Font Awesome icons (http://fontawesome.io)
    wp_enqueue_style('artfolio-fontawesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css');
    wp_enqueue_script('artfolio-jquery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js');
    wp_enqueue_script('artfolio-navigation', get_template_directory_uri() . '/js/navigation.js', array('jquery'), '20120206', true);
    wp_localize_script('artfolio-navigation', 'screenReaderText', array(
        'expand' => '<span class="screen-reader-text">' . __('expand child menu', 'artfolio') . '</span>',
        'collapse' => '<span class="screen-reader-text">' . __('collapse child menu', 'artfolio') . '</span>',
    ));
    wp_enqueue_script('artfolio-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true);
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
function artfolio_scripts_with_bootstrap() {
    if (is_front_page()) {
        wp_enqueue_style('bootstrap', get_template_directory_uri() . '/bootstrap/css/bootstrap.min.css');
        wp_enqueue_style('bootstrap', get_template_directory_uri() . '/bootstrap/css/bootstrap.css');
    }
}
function artfolio_scripts_with_jquery() {
    if (is_front_page()) {
// Register the script like this for a theme:
        wp_register_script('custom-script', get_template_directory_uri() . '/bootstrap/js/bootstrap.js', array('jquery'));
// For either a plugin or a theme, you can then enqueue the script:
        wp_enqueue_script('custom-script');
    }
}
add_action('wp_enqueue_scripts', 'artfolio_scripts_with_bootstrap');
add_action('wp_enqueue_scripts', 'artfolio_scripts');
add_action('wp_enqueue_scripts', 'artfolio_scripts_with_jquery');
function get_images_from_media_library() {
    $args = array(
        'post_type' => 'attachment',
        'post_mime_type' => 'image',
        'post_status' => 'inherit',
        'posts_per_page' => 1,
        'orderby' => 'rand'
    );
    $query_images = new WP_Query($args);
    $images = array();
    foreach ($query_images->posts as $image) {
        $images[] = $image->guid;
    }
    return $images;
}
function display_images_from_media_library() {
    $imgs = get_images_from_media_library();
    $html = '<div id="media-gallery" class="img-fluid">';
    foreach ($imgs as $img) {
        $html .= '<img src="' . $img . '" alt="" />';
    }
    $html .= '</div>';
    return $html;
}
/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';
/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';
/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';
/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';
/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
include (TEMPLATEPATH . '/myGallery/gallery_functions_include.php');