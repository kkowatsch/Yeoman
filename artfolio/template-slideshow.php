<?php
/*
  Template Name: Slideshow
 */
get_header();
<div id = "ei-slider" class = "ei-slider">
<ul class = "ei-slider-large">
<?php
//This is for our custom Slides menu
$args = array( 'post_type' => 'slides', 'orderby' => 'menu_order');
$loop = new WP_Query( $args );
while ( $loop->have_posts() ) : $loop->the_post();
?>
<li>
    <?php the_post_thumbnail('full'); ?>
    <div class="ei-title">
        <h2><?php the_title(); ?></h2>
        <?php the_excerpt(); ?>
    </div>
</li>
<?php
endwhile;
?>
</ul>
<ul class="ei-slider-thumbs">
    <li class="ei-slider-element">Current</li>
        <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
    <li><a href="#"><?php the_title(); ?></a></li>
    <?php endwhile; ?>
</ul>
</div><!-- ei-slider -->

/* Include any code you want in your page */

<?php the_sidebar(); ?>
<?php the_footer(); ?>