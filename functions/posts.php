<?php
/**
	* ========================================
	* Posts
	* ========================================
	*/

if ( ! function_exists( 'wordpress_theme_update_excerpt_length' ) ) :

/**
	* Updates excerpt length
	*/
function wordpress_theme_update_excerpt_length( $length ) {
	return 25;
}
add_filter( 'excerpt_length', 'wordpress_theme_update_excerpt_length', 999 );

endif;

if ( ! function_exists( 'wordpress_theme_update_read_more_link' ) ) :

/**
	* Updates Read More link markup
	*/
function wordpress_theme_update_read_more_link() {
	return '<a href="' . get_permalink() . '">Read More</a>';
}
add_filter( 'the_content_more_link', 'wordpress_theme_update_read_more_link' );

endif;

if ( ! function_exists( 'wordpress_theme_update_more_excerpt' ) ) :

/**
	* Updates More excerpt
	*/
function wordpress_theme_update_more_excerpt( $more ) {
	return '...';
}
add_filter( 'excerpt_more', 'wordpress_theme_update_more_excerpt' );

endif;

if ( ! function_exists( 'wordpress_theme_lead_paragraph_class' ) ) :

/**
	* Adds lead class to first paragraph
	*/
function wordpress_theme_lead_paragraph_class( $content ) {
	return preg_replace( '/<p([^>]+)?>/', '<p$1 class="lead">', $content, 1 );
}
add_filter( 'the_content', 'wordpress_theme_lead_paragraph_class' );

endif;