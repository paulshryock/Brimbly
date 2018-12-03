<?php
/**
	* ========================================
	* Images
	* ========================================
	*/

if ( ! function_exists( 'wordpress_theme_update_default_image_sizes' ) ) :

/**
	* Updates default image sizes
	*/
function wordpress_theme_update_default_image_sizes() {

	$thumbnail_size_w = '';
	$thumbnail_size_h = '';
	$thumbnail_crop = false;

	$medium_size_w = '';
	$medium_size_h = '';
	$medium_crop = false;

	$large_size_w = '';
	$large_size_h = '';
	$large_crop = false;

	$post_thumbnail_size_w = '';
	$post_thumbnail_size_h = '';
	$post_thumbnail_size_crop = false;

	// update_option( 'thumbnail_size_w', $thumbnail_size_w );
	// update_option( 'thumbnail_size_h', $thumbnail_size_h );
	// update_option( 'thumbnail_crop', $thumbnail_crop );

	// update_option( 'medium_size_w', $medium_size_w );
	// update_option( 'medium_size_h', $medium_size_h );
	// update_option( 'medium_crop', $medium_crop );

	// update_option( 'large_size_w', $large_size_w );
	// update_option( 'large_size_h', $large_size_h );
	// update_option( 'large_crop', $large_crop );

	// set_post_thumbnail_size( $post_thumbnail_size_w, $post_thumbnail_size_h, $post_thumbnail_size_crop );

}
add_action( 'after_setup_theme', 'wordpress_theme_update_default_image_sizes' );

endif;

if ( ! function_exists( 'wordpress_theme_add_custom_image_sizes' ) ) :

/**
	* Adds custom image sizes
	*/
function wordpress_theme_add_custom_image_sizes() {

	// Reserved Image Size Names: ‘thumb’, ‘thumbnail’, ‘medium’, ‘large’, ‘post-thumbnail’
	add_image_size(
		$name = 'avatar',
		$width = '72',
		$height = '72',
		$crop = false
	);

}
add_action( 'after_setup_theme', 'wordpress_theme_add_custom_image_sizes' );

endif;

if ( ! function_exists( 'wordpress_theme_add_custom_image_size_names' ) ) :

/**
	* Adds custom image size names for use in Add Media modal
	*/
function wordpress_theme_add_custom_image_size_names( $sizes ) {
	
	return array_merge( $sizes, array(
		'avatar' => __( 'Avatar' ),
	) );

}
add_filter( 'image_size_names_choose', 'wordpress_theme_add_custom_image_size_names' );

endif;