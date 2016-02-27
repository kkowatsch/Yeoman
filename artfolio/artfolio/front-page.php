<?php
/**
 * This is the custom template for the one-page style of the theme artfolio.
 *
 * @package artfolio
 */
get_header();
?>


<main id="main" class="site-main" role="main">
    <?php if (is_mobile() && is_tablet()) : ?>
        <div class="container-fluid">
            <!--This is the section for the gallery of paintings (for now there is one genre but later there may be sub-genres under the genre)-->	
            <section id="gallery">	
                <?php
                $query = new WP_Query(array('pagename' => 'gallery'));
                if ($query->have_posts()) {
                    while ($query->have_posts()) {
                        $query->the_post();
                        echo '<div class="entry-content">';
                        the_content();
                        echo '</div>';
                    }
                }
                wp_reset_postdata();
                ?>	
            </section>

            <!--This is the section for the biography-->
            <section id="bio">
                <?php
                $query = new WP_Query(array('pagename' => 'bio'));
                if ($query->have_posts()) {
                    while ($query->have_posts()) {
                        $query->the_post();
                        echo '<div class="entry-content">';
                        the_content();
                        echo '</div>';
                    }
                }
                wp_reset_postdata();
                ?>	
            </section>
        </div>
        <div class="fullscreen background parallax"  data-img-width="1600" data-img-height="1064" data-diff="100">
            <div class="content-a">
                <div class="container">
                    <div class="well well-lg">
                        <!--This is the section for the action story-->
                        <section id="action">
                            <p>
                                <?php
                                $query = new WP_Query(array('pagename' => 'actionstory'));
                                if ($query->have_posts()) {
                                    while ($query->have_posts()) {
                                        $query->the_post();
                                        echo '<div class="entry-content">';
                                        the_content();
                                        echo '</div>';
                                    }
                                }
                                wp_reset_postdata();
                                ?>
                            </p>
                        </section>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div id="row1" class="row">
                <div class="col-md-6">
                    <!--This is the section for the artist statement-->
                    <section id="statement">
                        <?php
                        $query = new WP_Query(array('pagename' => 'artist-statement'));
                        if ($query->have_posts()) {
                            while ($query->have_posts()) {
                                $query->the_post();
                                echo '<div class="entry-content">';
                                the_content();
                                echo '</div>';
                            }
                        }
                        wp_reset_postdata();
                        ?>	
                    </section>
                </div>
                <div class="col-md-6">
                    <?php
                    if (is_mobile()) {
                        echo "I'm not a mobile browser.";
                    }
                    /**
                     *
                     * Test for the negative (it's not a mobile browser) - if wp_is_mobile is false, then do something
                     * else do some other thing.
                     */
                    if (!is_mobile()) {
                        echo display_images_from_media_library();
                    } else {
                        echo "Full of Mobile Goodness.";
                    }
                    ?>
                </div>
            </div>
            <div id="row3" class="row">
                <!--This is the section for the contact form-->
                <section id="contact">
                    <?php
                    $query = new WP_Query(array('pagename' => 'contact-us'));
                    if ($query->have_posts()) {
                        while ($query->have_posts()) {
                            $query->the_post();
                            echo '<div class="entry-content">';
                            the_content();
                            echo '</div>';
                        }
                    }
                    wp_reset_postdata();
                    ?>
                </section>
            </div>
        </div>
    <?php endif; ?>
</main><!-- #main -->
<?php get_footer(); ?>
