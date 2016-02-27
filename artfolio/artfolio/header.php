<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package artfolio
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php wp_title('|', true, 'right'); ?></title>
        <link rel="profile" href="http://gmpg.org/xfn/11">
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

        <!--[if lt IE 9]>
        <script src="<?php echo esc_url(get_template_directory_uri()); ?>/js/html5.js"></script>
        <![endif]-->

        <?php wp_head(); ?>
        <?php include (TEMPLATEPATH . '/myGallery/gallery_header_include.php'); ?>
    </head>
    <body <?php body_class(); ?>>
        <div id="page" class="site">
            <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e('Skip to content', 'artfolio'); ?></a>
            <nav id="site-navigation" class="main-navigation navbar navbar-default navbar-fixed-top" role="navigation">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-ex1-collapse" aria-controls="primary-menu" aria-expanded="false" aria-hidden="true">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?php echo site_url(); ?>"><?php bloginfo('name'); ?></a>
                </div><!--.navbar-header-->
                <?php
                if (is_mobile() && is_tablet()) {
                    wp_nav_menu(array('menu' => 'Front Page Menu'));
                }
//                    /**
//                     *
//                     * Test for the negative (it's not a mobile browser) - if wp_is_mobile is false, then do something
//                     * else do some other thing.
//                     */
                if (!is_mobile()) {
                    wp_nav_menu(array('theme_location' => 'primary', 'menu_id' => 'primary-menu'));
                }
                ?>
            </nav> <!--#site-navigation-->
            <header id="top" class="header">
                <div class="intro-text">
                    <!--Test for the negative (it's not a mobile browser) - if wp_is_mobile is false, then do something
         else do some other thing.-->
                    <?php if (!is_mobile()) : ?>
                        <?php if (is_front_page()) : ?>   
                            <a class="home-link" href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" rel="home">
                                <div class = "site-branding">

                                    <?php if (is_front_page() && is_home()) : ?>
                                        <h1 class="site-title"><?php bloginfo('name'); ?></h1>
                                    <?php else : ?>
                                        <p class="site-title"><?php bloginfo('name'); ?></p>
                                    <?php
                                    endif;
                                    $description = get_bloginfo('description', 'display');
                                    if ($description || is_customize_preview()) :
                                        ?>
                                        <h3 class="site-description"><?php bloginfo('description'); ?></h3>
                                    <?php endif; ?>
                                </div> <!--.site-branding-->
                            </a>

                            <div class="slideshow">
                                <?php
                                echo do_shortcode("[metaslider id=1762]");
                                ?>
                            </div>
                        <?php else : ?>
                            <div class="header"></div>
                        <?php endif; ?>
                    <?php endif; ?> 
                </div>
            </header>

            <div id="content" class="site-content">
                <div id="primary" class="content area">