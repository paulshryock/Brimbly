<?php
/**
	* ========================================
	* WordPress Login Page
	* ========================================
	*/

if ( ! function_exists( 'wordpress_theme_update_login_style' ) ) :

/**
	* Add custom login CSS and JavaScript
	*/
function wordpress_theme_update_login_style() {

	wp_register_style( 'custom_wp_login_css', get_template_directory_uri() . '/css/login/login-style.css' );
	wp_enqueue_style( 'custom_wp_login_css' );

	wp_register_script( 'custom_wp_login_js', get_template_directory_uri() . '/js/login/login-script.js', array(), false, $in_footer = true );
	wp_enqueue_script( 'custom_wp_login_js' );

}
add_action( 'login_enqueue_scripts', 'wordpress_theme_update_login_style' );

endif;

if ( ! function_exists( 'wordpress_theme_update_login_title' ) ) :

/**
	* Update Login H1 title
	*/
function wordpress_theme_update_login_title() {
	return get_bloginfo( 'name' );
}
add_filter( 'login_headertitle', 'wordpress_theme_update_login_title' );

endif;

if ( ! function_exists( 'wordpress_theme_update_login_title_link_url' ) ) :

/**
	* Update Login H1 title hyperlink URL
	*/
function wordpress_theme_update_login_title_link_url() {
	return home_url();
}
add_filter( 'login_headerurl', 'wordpress_theme_update_login_title_link_url' );

endif;