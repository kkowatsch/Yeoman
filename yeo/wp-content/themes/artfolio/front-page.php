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
				<h2 class="section-title">Gallery</h2>
				<div class="col-md-12">
					<div class="col-md-3">Item 1</div>
					<div class="col-md-3">Item 2</div>
					<div class="col-md-3">Item 3</div>
					<div class="col-md-3">Item 4</div>
				</div>
			</section>
			
		<!--This is the section for the biography-->
			<section id="bio">
				<h2 class="section-title">Biography</h2>
				<p>Lorem ipsum dolor sit amet,Lorem ipsum dolor sit amet,Lorem ipsum dolor sit amet,</p>
			</section>
			
		<!--This is the section for the artist statement-->
			<section id="statement">
				<h2 class="section-title">Artist Statement</h2>
				<p>Lorem ipsum dolor sit amet,Lorem ipsum dolor sit amet,Lorem ipsum dolor sit amet,Lorem ipsum dolor sit amet,</p>
			</section>
		
		<!--This is the section for the contact form-->
			<section id="contact">
				<h2 class="section-title">Contact</h2>
				<div class="col-md-6">
					contact info
				</div>
				<div class="col-md-6">
					Form
				</div>
			</section>
		
		</main><!-- #main -->

	</div><!-- #primary -->

<?php get_footer(); ?>
