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
            <header id="masthead" class="site-header" role="banner">
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
                            <h2 class="site-description"><?php bloginfo('description'); ?></h2>
                        <?php endif;
                        ?>
                    </div> <!--.site-branding-->
                </a>

            </header>
            <nav id="site-navigation" class="main-navigation navbar navbar-default" role="navigation">
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
                if (is_front_page()) {
                    wp_nav_menu(array('menu' => 'Front Page Menu'));
                } else {
                    wp_nav_menu(array('theme_location' => 'primary', 'menu_id' => 'primary-menu'));
                }
                ?>
            </nav> <!--#site-navigation-->

            <!--                    <div class="centre" id="slideShowImages">
            <?php echo display_images_from_media_library(); ?>
                                </div>SlideSHow Div-->



            <div id="content" class="site-content">
                <div id="primary" class="content area">




