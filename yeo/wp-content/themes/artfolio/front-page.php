<?php
/**
 * This is the custom template for the one-page style of the theme artfolio.
 *
 * @package artfolio
 */

get_header(); ?>
	
	<div id="primary" class="content area">

		<main id="main" class="site-main" role="main">

		<!--This is the section for the gallery of paintings (for now there is one genre but later there may be sub-genres under the genre)-->	

			<section id="gallery">
				<div class="container">					
					<?php
						$query = new WP_Query( array( 'pagename' => 'gallery' ) );
							if ($query -> have_posts()){
								while ($query -> have_posts()){
									$query -> the_post(); 
									echo '<div class="entry-content"';
									the_content();
									echo '</div>';
								}  
							}
							
						wp_reset_postdata();
					?>	
				</div>
			</section>

			
		<!--This is the section for the biography-->
			<section id="bio">
				<div class="container">
					<?php
						$query = new WP_Query( array( 'pagename' => 'bio' ) );
							if ($query -> have_posts()){
								while ($query -> have_posts()){
									$query -> the_post(); 
									echo '<div class="entry-content"';
									the_content();
									echo '</div>';
								}  
							}
							
						wp_reset_postdata();
					?>	
				</div>
			</section>
			
		<!--This is the section for the artist statement-->
			<section id="statement">
				<div class="container">
					<?php
						$query = new WP_Query( array( 'pagename' => 'artist-statement' ) );
							if ($query -> have_posts()){
								while ($query -> have_posts()){
									$query -> the_post(); 
									echo '<div class="entry-content"';
									the_content();
									echo '</div>';
								}  
							}
							
						wp_reset_postdata();
					?>	
				</div>
			</section>
		
		<!--This is the section for the contact form-->
			<section id="contact">
				<div class="container">
					<?php
						$query = new WP_Query( array( 'pagename' => 'contact' ) );
							if ($query -> have_posts()){
								while ($query -> have_posts()){
									$query -> the_post(); 
									echo '<div class="entry-content"';
									the_content();
									echo '</div>';
								}  
							}
							
						wp_reset_postdata();
					?>	
				</div><!-- .indent -->
			</section><!-- #contact -->
		</main><!-- #main -->

	</div><!-- #primary -->

<?php get_footer(); ?>
