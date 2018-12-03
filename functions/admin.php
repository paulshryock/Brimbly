<?php
/**
	* ========================================
	* Admin
	* ========================================
	*/

if ( ! function_exists( 'wordpress_theme_update_admin_style' ) ) :

/**
	* Update Admin CSS
	*/
function wordpress_theme_update_admin_style($hook) {
	wp_register_style( 'custom_wp_admin_css', get_template_directory_uri() . '/css/admin/admin-style.css' );
	
	wp_enqueue_style( 'custom_wp_admin_css' );
}
add_action( 'admin_enqueue_scripts', 'wordpress_theme_update_admin_style' );

endif;