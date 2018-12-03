<?php
/**
	* ========================================
	* Widget areas
	* ========================================
	*/

if ( ! function_exists( 'wordpress_theme_remove_widget_titles' ) ) :

/**
	* Remove widget titles
	*
	*/
function wordpress_theme_remove_widget_titles($t) {
	return null;
}
add_filter('widget_title','wordpress_theme_remove_widget_titles');

endif;

if ( ! function_exists( 'wordpress_theme_widgets_init' ) ) :

/**
	* Register widget area(s)
	*
	* @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
	*/
function wordpress_theme_widgets_init() {

	register_sidebar( array(
		'name'          => esc_html__( 'Widget Area Name', 'wordpress-theme' ),
		'id'            => 'widget-area-name',
		'description'   => esc_html__( 'Widget area description', 'wordpress-theme' ),
		'class'					=> '',
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '',
		'after_title'   => '',
	) );

	// register_sidebar( array(
	// 	'name'          => esc_html__( 'Widget Area Name 2', 'wordpress-theme' ),
	// 	'id'            => 'widget-area-name-2',
	// 	'description'   => esc_html__( 'Widget area description', 'wordpress-theme' ),
	// 	'class'					=> '',
	// 	'before_widget' => '',
	// 	'after_widget'  => '',
	// 	'before_title'  => '',
	// 	'after_title'   => '',
	// ) );

}
add_action( 'widgets_init', 'wordpress_theme_widgets_init' );

endif;