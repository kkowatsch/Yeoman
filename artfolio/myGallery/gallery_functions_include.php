<?php

	function load_my_scripts(){

	// uncomment the line below if your theme does nto have jQuery loaded
	// wp_register_script( 'jquery', get_template_directory_uri() . '/myGallery/jquery-1.8.3.min.js' );

	wp_register_script( 'mygallery_lightbox', get_template_directory_uri() . '/myGallery/lightbox/js/lightbox-2.6.min.js', array( 'jquery' ) );
	wp_register_script( 'mygallery_custom', get_template_directory_uri() . '/myGallery/gallery.js', array( 'jquery' ) );

	wp_enqueue_script( 'mygallery_lightbox' );
	wp_enqueue_script( 'mygallery_custom' );

}

add_action( 'wp_enqueue_scripts', 'load_my_scripts' );



?>