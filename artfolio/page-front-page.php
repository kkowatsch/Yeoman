<?php
/**
 * This is the custom template for the one-page style of the theme artfolio.
 *
 * @package artfolio
 */
get_header();
?>


<main id="main" class="site-main" role="main">
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
    
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <!--This is the section for the artist statement-->
                <section id="action">
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
            </div>
            <div class="col-md-6">
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
    </div>
</main><!-- #main -->

<?php get_footer(); ?>
