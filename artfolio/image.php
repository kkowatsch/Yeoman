<?php
/**
 * The template for displaying image attachments
 *
 * @package WordPress
 * @subpackage artfolio
 * @since artfolio 1.0
 */
get_header();
?>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
        <div class="container">
            <div class="well well-lg" style="min-height:1005px; text-align: center;">

        <?php
        // Start the loop.
        while (have_posts()) : the_post();
            ?>

            <article>

                <nav id="image-navigation" class="navigation image-navigation">
                    <div class="nav-links">
                        <div class="nav-previous" style="float: left;"><?php previous_image_link(false, __('Previous Image', 'artfolio')); ?></div><div class="nav-next" style="float: right;"><?php next_image_link(false, __('Next Image', 'artfolio')); ?></div>
                    </div><!-- .nav-links -->
                </nav><!-- .image-navigation -->

                <header class="entry-header">
                    <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
                </header><!-- .entry-header -->
<div class="col-md-12" style="margin-left:15%;">
                <div class="entry-content">

                    <div class="entry-attachment">
                        <?php
                        /**
                         * Filter the default artfolio image attachment size.
                         *
                         * @since artfolio 1.0
                         *
                         * @param string $image_size Image size. Default 'large'.
                         */
                        $image_size = apply_filters('artfolio_attachment_size', 'large');

                        echo wp_get_attachment_image(get_the_ID(), $image_size);
                        ?>

 

                    </div><!-- .entry-attachment -->
                </div>
                    <?php
                    the_content();
                    wp_link_pages(array(
                        'before' => '<div class="page-links"><span class="page-links-title">' . __('Pages:', 'artfolio') . '</span>',
                        'after' => '</div>',
                        'link_before' => '<span>',
                        'link_after' => '</span>',
                        'pagelink' => '<span class="screen-reader-text">' . __('Page', 'artfolio') . ' </span>%',
                        'separator' => '<span class="screen-reader-text">, </span>',
                    ));
                    ?>
                </div><!-- .entry-content -->

                <footer class="entry-footer">
                    <?php edit_post_link(__('Edit', 'artfolio'), '<span class="edit-link">', '</span>'); ?>
                </footer><!-- .entry-footer -->

            </article><!-- #post-## -->

            <?php
            // If comments are open or we have at least one comment, load up the comment template
            if (comments_open() || get_comments_number()) :
                comments_template();
            endif;

            // Previous/next post navigation.
            the_post_navigation(array(
                'prev_text' => _x('<span class="meta-nav">Published in</span><span class="post-title">%title</span>', 'Parent post link', 'artfolio'),
            ));

        // End the loop.
        endwhile;
        ?>
        </div>
        </div>
    </main><!-- .site-main -->
</div><!-- .content-area -->

<?php get_footer(); ?>
