/**
 * Template Name: Parallax Page
 *
 * @package artfolio
 */
<?php	 	 
get_header();	 	 
$args = array(	 	 
	'post_type' => 'parallax',	 	 
	'order' => 'ASC',	 	 
	'orderby' => 'menu_order'	 	 
);
 
$parallax = new WP_Query($args);	 	 
	while($parallax->have_posts()) : $parallax->the_post();	 	 
 
		$parallaxImage = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large');	 	 
		$breakUrl = str_replace(home_url(), '', $parallaxImage[0]); ?>	 	 
		
		<section class="parallax" id="section_<?php echo the_ID(); ?>" style="background: url('../<?php echo $breakUrl; ?>') fixed;"></section>
		<section id="section_<?php echo the_ID(); ?>" class="parallax" style="background: url('../<?php echo $breakUrl; ?>') fixed;"></section>We are looking forward to see your comments.
 
		<div class="container">	 	 
			<h2><?php the_title(); ?></h2>	 	 
			<div class="page-content">	 	 
				<?php the_content(); ?>	 	 
			</div>	 	 
		</div>	 	 
	<?php endwhile;	 	 
wp_reset_postdata();	 	 
get_footer();	 	 
?>