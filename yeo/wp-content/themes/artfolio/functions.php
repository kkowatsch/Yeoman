<?php 
if ( ! function_exists( 'artfolio_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */

function artfolio_setup() {
	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'artfolio' ),
                'social' => __( 'Social Menu', 'artfolio'),
	) );

	// Enable support for Post Formats.
	add_theme_support( 'post-formats', array( 'aside' ) );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'artfolio_custom_background_args', array(
		'default-color' => 'b2b2b2',
	) ) );
	
	// Enable support for HTML5 markup.
	add_theme_support( 'html5', array(
		'comment-list',
		'search-form',
		'comment-form',
		'gallery',
                'caption',
	) );
}
endif; // simone_setup
add_action( 'after_setup_theme', 'artfolio_setup' );
function artfolio_scripts_with_jquery() {
	if( is_front_page() ) {
		// Register the script like this for a theme:
		wp_register_script( 'custom-script', get_template_directory_uri() . '/bootstrap/js/bootstrap.js', array( 'jquery' ) );
		// For either a plugin or a theme, you can then enqueue the script:
		wp_enqueue_script( 'custom-script' );
	}
}
add_action( 'wp_enqueue_scripts', 'artfolio_scripts_with_jquery' );

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
?>