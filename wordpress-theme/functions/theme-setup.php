<?php
/**
	* ========================================
	* Theme setup
	* ========================================
	*/

if ( ! function_exists( 'wordpress_theme_add_theme_support' ) ) :

/**
	* Adds theme support
	*/
function wordpress_theme_add_theme_support() {
	add_theme_support( 'title-tag' ); // Proper WordPress Titles
	add_theme_support( 'post-thumbnails' ); // Featured images

	/*
	 * Switches default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );
}
add_action( 'after_setup_theme', 'wordpress_theme_add_theme_support' );

endif;