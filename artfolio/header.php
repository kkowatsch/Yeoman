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
        <link rel="profile" href="http://gmpg.org/xfn/11">
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

        <!--[if lt IE 9]>
        <script src="<?php echo esc_url(get_template_directory_uri()); ?>/js/html5.js"></script>
        <![endif]-->

        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>
        <div id="page" class="site">
            <div id="content" class="site-content">
                <div id="primary" class="content area">
                    <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e('Skip to content', 'artfolio'); ?></a>
                    <?php if (get_header_image()) { ?>
                        <header id="masthead" class="site-header" style="background: url(<?php header_image(); ?>) no-repeat center center;" role="banner">
                        <?php } else { ?>
                            <header id="masthead" class="site-header" role="banner">
                            <?php } ?>

                            <div class="site-branding">
                                <?php if (is_front_page() && is_home()) : ?>
                                    <h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
                                <?php else : ?>
                                    <p class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></p>
                                <?php endif; ?>
                                <?php
                                $description = get_bloginfo('description', 'display');
                                if ($description || is_customize_preview()) :
                                    ?>
                                    <p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
                                <?php endif; ?>
                            </div><!-- .site-branding -->
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
                        </header><!-- #masthead -->




