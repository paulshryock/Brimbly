<?php
/**
	* ========================================
	* Admin
	* ========================================
	*/

if ( ! function_exists( 'wordpress_theme_update_admin_style' ) ) :

/**
	* Updates Admin CSS and JavaScript
	*/
function wordpress_theme_update_admin_style($hook) {

	// wp_dequeue_style( 'admin' );
	// wp_dequeue_script( 'admin' );

	wp_register_style( 'custom_admin_style', get_template_directory_uri() . '/css/admin/admin-style.css' );
	wp_enqueue_style( 'custom_admin_style' );

	wp_register_script( 'custom_admin_script', get_template_directory_uri() . '/js/admin/admin-script.js', array(), false, $in_footer = true );
	wp_enqueue_script( 'custom_admin_script' );

}
add_action( 'admin_enqueue_scripts', 'wordpress_theme_update_admin_style' );

endif;