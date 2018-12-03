<?php
/**
	* ========================================
	* Dependencies and meta
	* ========================================
	*/

if ( ! function_exists( 'wordpress_theme_scripts' ) ) :

/**
	* Add stylesheets and scripts
	*/
function wordpress_theme_scripts() {
	
	wp_register_style( 'style', get_template_directory_uri() . '/css/style.css' );
	wp_enqueue_style( 'style' );

	wp_register_script( 'script', get_template_directory_uri() . '/js/script.js', array(
		// 'jquery'
	), false, $in_footer = true );
	wp_enqueue_script( 'script' );

	$get_stylesheet_directory_uri = array( 'stylesheet_directory_uri' => get_stylesheet_directory_uri() );
	wp_localize_script( 'script', 'directory_uri', $get_stylesheet_directory_uri );
}

add_action( 'wp_enqueue_scripts', 'wordpress_theme_scripts' );

endif;

if ( ! function_exists( 'wordpress_theme_add_async_attribute' ) ) :

/**
	* Add async attribute
	*/
function wordpress_theme_add_async_attribute($tag, $handle) {
	if ( /* Something that shouldn't be async */ == $handle ) {
		return $tag;
	}
	return str_replace( ' src', ' async="async" src', $tag );
}
add_filter('script_loader_tag', 'wordpress_theme_add_async_attribute', 10, 2);

endif;

if ( ! function_exists( 'wordpress_theme_remove_cssjs_ver' ) ) :

/**
	* Remove query string from static resources 
	*/
function wordpress_theme_remove_cssjs_ver( $src ) {
	if ( strpos( $src, '?ver=' ) )
		$src = remove_query_arg( 'ver', $src );
	return $src;
}
add_filter( 'style_loader_src', 'wordpress_theme_remove_cssjs_ver', 10, 2 );
add_filter( 'script_loader_src', 'wordpress_theme_remove_cssjs_ver', 10, 2 );

endif;

if ( ! function_exists( 'wordpress_theme_remove_emojicons' ) ) :

/**
	* Remove Emojicons
	*/
function wordpress_theme_remove_emojicons() {
    remove_action( 'admin_print_styles', 'print_emoji_styles' );
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
    remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
    remove_action( 'wp_print_styles', 'print_emoji_styles' );
    remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
    remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
    remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
    add_filter( 'tiny_mce_plugins', 'wordpress_theme_remove_emojicons_tinymce' );
    add_filter( 'emoji_svg_url', '__return_false' );
}
add_action( 'init', 'wordpress_theme_remove_emojicons' );

function wordpress_theme_remove_emojicons_tinymce( $plugins ) {
	return is_array( $plugins ) ? array_diff( $plugins, array( 'wpemoji' ) ) : array();
}

endif;

if ( ! function_exists( 'wordpress_theme_update_body_class' ) ) :

/**
	* Update body_class
	*/
function wordpress_theme_update_body_class( $classes ) {
	return array_merge( $classes, array(
		'site'
	) );
}
add_filter( 'body_class', 'wordpress_theme_update_body_class' );

endif;