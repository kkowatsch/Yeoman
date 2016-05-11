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

        add_filter('use_default_gallery_style', '__return_false');
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

// Enqueue Scripts/Styles for our Lightbox
function artfolio_add_lightbox() {
    wp_enqueue_style('lightbox-style', get_template_directory_uri() . '/inc/lightbox/css/lightgallery.min.css');
    wp_enqueue_script('fancybox', get_template_directory_uri() . '/inc/lightbox/js/lightgallery.min.js', array('jquery'), false, true);
    wp_enqueue_script('lightbox', get_template_directory_uri() . '/inc/lightbox/js/lightbox.js', array('fancybox'), false, true);
    
    wp_enqueue_script('mousewheel', get_template_directory_uri() . '/inc/lightbox/js/jquery.mousewheel-3.0.6.pack.js', array('jquery'), false, true);
}

add_action('wp_enqueue_scripts', 'artfolio_add_lightbox');

function artfolio_scripts_with_zoom() {
    //Colorbox jQuery plugin js file
    wp_enqueue_script('zoom', get_template_directory_uri() . '/zoom/jquery.zoom.min.js', array('jquery'), '', true);

    //Add main.js file
    wp_enqueue_script('zoom-init', get_template_directory_uri() . '/zoom/zoom-init.js', array('zoom'), '', true);
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
add_action('wp_enqueue_scripts', 'artfolio_scripts_with_zoom');

function enqueue_filterable() {
    wp_register_script('filterable', get_template_directory_uri() . '/js/filterable.js', array('jquery'));
    wp_enqueue_script('filterable');
}

add_action('wp_enqueue_scripts', 'enqueue_filterable');

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
    $html = '<div id="media-gallery">';
    foreach ($imgs as $img) {
        $html .= '<img class="img-fluid img-rounded" src="' . $img . '" alt="" />';
    }
    $html .= '</div>';
    return $html;
}

add_action('init', 'project_custom_init');

/* -- Custom Post Init Begin -- */

function project_custom_init() {
    $labels = array(
        'name' => _x('Projects', 'post type general name'),
        'singular_name' => _x('Project', 'post type singular name'),
        'add_new' => _x('Add New', 'project'),
        'add_new_item' => __('Add New Project'),
        'edit_item' => __('Edit Project'),
        'new_item' => __('New Project'),
        'view_item' => __('View Project'),
        'search_items' => __('Search Projects'),
        'not_found' => __('No projects found'),
        'not_found_in_trash' => __('No projects found in Trash'),
        'parent_item_colon' => '',
        'menu_name' => 'Project'
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => true,
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => null,
        'supports' => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments')
    );
    // The following is the main step where we register the post.
    register_post_type('project', $args);

    // Initialize New Taxonomy Labels
    $labels = array(
        'name' => _x('Tags', 'taxonomy general name'),
        'singular_name' => _x('Tag', 'taxonomy singular name'),
        'search_items' => __('Search Types'),
        'all_items' => __('All Tags'),
        'parent_item' => __('Parent Tag'),
        'parent_item_colon' => __('Parent Tag:'),
        'edit_item' => __('Edit Tags'),
        'update_item' => __('Update Tag'),
        'add_new_item' => __('Add New Tag'),
        'new_item_name' => __('New Tag Name'),
    );
    // Custom taxonomy for Project Tags
    register_taxonomy('tagportfolio', array('project'), array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'tag-portfolio'),
    ));
}

/* -- Custom Post Init Ends -- */

/* --- Custom Messages - project_updated_messages --- */
add_filter('post_updated_messages', 'project_updated_messages');

function project_updated_messages($messages) {
    global $post, $post_ID;

    $messages['project'] = array(
        0 => '', // Unused. Messages start at index 1.
        1 => sprintf(__('Project updated. <a href="%s">View project</a>'), esc_url(get_permalink($post_ID))),
        2 => __('Custom field updated.'),
        3 => __('Custom field deleted.'),
        4 => __('Project updated.'),
        /* translators: %s: date and time of the revision */
        5 => isset($_GET['revision']) ? sprintf(__('Project restored to revision from %s'), wp_post_revision_title((int) $_GET['revision'], false)) : false,
        6 => sprintf(__('Project published. <a href="%s">View project</a>'), esc_url(get_permalink($post_ID))),
        7 => __('Project saved.'),
        8 => sprintf(__('Project submitted. <a target="_blank" href="%s">Preview project</a>'), esc_url(add_query_arg('preview', 'true', get_permalink($post_ID)))),
        9 => sprintf(__('Project scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview project</a>'),
                // translators: Publish box date format, see http://php.net/date
                date_i18n(__('M j, Y @ G:i'), strtotime($post->post_date)), esc_url(get_permalink($post_ID))),
        10 => sprintf(__('Project draft updated. <a target="_blank" href="%s">Preview project</a>'), esc_url(add_query_arg('preview', 'true', get_permalink($post_ID)))),
    );

    return $messages;
}

/* --- #end SECTION - project_updated_messages --- */

/* --- Demo URL meta box --- */

add_action('admin_init', 'portfolio_meta_init');

function portfolio_meta_init() {
    // add a meta box for WordPress 'project' type
    add_meta_box('portfolio_meta', 'Project Infos', 'portfolio_meta_setup', 'project', 'side', 'low');

    // add a callback function to save any data a user enters in
    add_action('save_post', 'portfolio_meta_save');
}

function portfolio_meta_setup() {
    global $post;
    ?>
    <div class="portfolio_meta_control">
        <label>URL</label>
        <p>
            <input type="text" name="_url" value="<?php echo get_post_meta($post->ID, '_url', TRUE); ?>" style="width: 100%;" />
        </p>
    </div>
    <?php
    // create for validation
    echo '<input type="hidden" name="meta_noncename" value="' . wp_create_nonce(__FILE__) . '" />';
}

function portfolio_meta_save($post_id) {
    // check nonce
    if (!isset($_POST['meta_noncename']) || !wp_verify_nonce($_POST['meta_noncename'], __FILE__)) {
        return $post_id;
    }

    // check capabilities
    if ('post' == $_POST['post_type']) {
        if (!current_user_can('edit_post', $post_id)) {
            return $post_id;
        }
    } elseif (!current_user_can('edit_page', $post_id)) {
        return $post_id;
    }

    // exit on autosave
    if (defined('DOING_AUTOSAVE') == DOING_AUTOSAVE) {
        return $post_id;
    }

    if (isset($_POST['_url'])) {
        update_post_meta($post_id, '_url', $_POST['_url']);
    } else {
        delete_post_meta($post_id, '_url');
    }
}

/* --- #end  Demo URL meta box --- */

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
