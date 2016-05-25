<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package artfolio
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <div class="entry-content">
            <?php if (is_page(array('bio', 'actionstory',))) : ?>
                <div class="col-md-4">
                    <?php echo display_images_from_media_library(); ?>
                </div>
                <div class="col-md-8">
                    <header class="entry-header">
                        <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
                    </header><!-- .entry-header -->
                    <?php the_content(); ?>
                </div>
            <?php elseif (is_page(array('contact-us'))) : ?>
                <div class="col-md-12">
                    <header class="entry-header">
                        <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
                    </header><!-- .entry-header -->
                    <?php the_content(); ?>
                </div>
            <?php else : ?>
                <div class="col-md-8">
                    <header class="entry-header">
                        <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
                    </header><!-- .entry-header -->
                    <?php the_content(); ?>
                </div>
                <div class="col-md-4">
                    <?php echo display_images_from_media_library(); ?>
                </div>
            <?php endif; ?>
        </div>

        <?php
        wp_link_pages(array(
            'before' => '<div class="page-links">' . esc_html__('Pages:', 'artfolio'),
            'after' => '</div>',
        ));
        ?>
</div><!-- .entry-content -->



<footer class="entry-footer">
    <?php
    edit_post_link(
            sprintf(
                    /* translators: %s: Name of current post */
                    esc_html__('Edit %s', 'artfolio'), the_title('<span class="screen-reader-text">"', '"</span>', false)
            ), '<span class="edit-link">', '</span>'
    );
    ?>
</footer><!-- .entry-footer -->
</article><!-- #post-## -->
