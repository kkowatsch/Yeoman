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
    </head>
    <body <?php body_class(); ?>>
        <div id="page" class="site">
            <a class="skip-link screen-reader-text" href="#main"><?php esc_html_e('Skip to content', 'artfolio'); ?></a>

            <header id="top" class="site-header" role="banner">

                <nav id = "site-navigation" class = "navbar navbar-default navbar-fixed-top" role = "navigation">
                    <div class = "navbar-header">
                        <button type = "button" class = "navbar-toggle collapsed" data-toggle = "collapse" data-target = ".navbar-ex1-collapse" aria-controls = "primary-menu" aria-expanded = "false" aria-hidden = "true">
                            <span class = "sr-only">Toggle navigation</span>
                            <span class = "icon-bar"></span>
                            <span class = "icon-bar"></span>
                            <span class = "icon-bar"></span>
                        </button>
                        <a class = "navbar-brand" href = "<?php echo site_url(); ?>"><?php bloginfo('name'); ?></a>
                    </div><!--.navbar-header-->
                    <?php wp_nav_menu(array('theme_location' => 'primary', 'menu_id' => 'primary-menu')); ?>
                </nav><!-- #site-navigation -->
            </header><!-- #masthead -->

            <div id="content">
                <div id="primary" class="container">
                    <div class="well well-lg">
                        <div class="entry-content">