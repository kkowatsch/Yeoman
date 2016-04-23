<?php
/*
  Template Name: Portfolio 2 Columns
 * 
 * @package artfolio
 */
?>

<?php get_header(); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="jumbotron">
        <div class="gallery">
            <div class="image">
                <?php do_action('slideshow_deploy', '1847'); ?>
                <div class="wrap">
                    <h1>Blair Yeomans</br></h1>
                    <span>A Portfolio to showcase my work!</span>
                </div>
            </div>
        </div>
        <div>
            <header class="entry-header">
                <?php the_title('<h2 class="entry-title">', '</h2>'); ?>
            </header><!-- .entry-header -->
            <?php
            $loop = new WP_Query(array('post_type' => 'project', 'posts_per_page' => -1));
            $count = 0;
            ?>

            <div class="container">
                <div id="portfolio-wrapper"  class="col-lg-12">
                    <ul id="portfolio-list">

                        <?php
                        if ($loop) :
                            $i = 0;
                            while ($loop->have_posts()) : $loop->the_post();
                                if ($i % 2 == 0) {
                                    ?> 
                                    <div class="row">
                                        <?php
                                    }
                                    ?>
                                    <div class="col-md-6">

                                        <?php
                                        $terms = get_the_terms($post->ID, 'tagportfolio');

                                        if ($terms && !is_wp_error($terms)) :
                                            $links = array();

                                            foreach ($terms as $term) {
                                                $links[] = $term->name;
                                            }
                                            $links = str_replace(' ', '-', $links);
                                            $tax = join(" ", $links);
                                        else :
                                            $tax = '';
                                        endif;
                                        ?>

                                        <?php $infos = get_post_custom_values('_url'); ?>

                                        <li class="portfolio-item <?php echo strtolower($tax); ?> all">
                                            <div id="wrap" class="well well-sm">
                                                <div class="thumb"><a href="<?php the_permalink() ?>"><?php the_post_thumbnail(array(400, 160)); ?></a></div>
                                                <h3><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
                                                <p class="excerpt"><a href="<?php the_permalink() ?>"><?php echo get_the_excerpt(); ?></a></p>
                                            </div>
                                        </li>
                                    </div><!--6-->
                                    <?php
                                    $i++;
                                    if ($i != 0 && $i % 2 == 0) {
                                        ?>
                                    </div><!--/.row-->
                                    <div class="clearfix"></div>

                                    <?php
                                }
                                ?>

                                <?php
                            endwhile;
                        else:
                            ?>

                            <li class="error-not-found">Sorry, no portfolio entries for while.</li>

                        <?php endif; ?>


                    </ul>

                    <div class="clearboth"></div>

                </div> <!-- end #portfolio-wrapper-->
            </div>
        </div>
        <script>
            jQuery(document).ready(function () {
                jQuery("#portfolio-list").filterable();
            });
        </script> 
    </div>


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


</article>

<?php get_footer(); ?>