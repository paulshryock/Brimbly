<?php
/**
	* ========================================
	* Menus
	* ========================================
	*/

if ( ! function_exists( 'wordpress_theme_register_menus' ) ) :

/** 
	* Registers navigation menu(s)
	*/
function wordpress_theme_register_menus() {
	register_nav_menu( 'primary-navigation', __( 'Primary Navigation', 'wordpress-theme' ) );
	// register_nav_menu( 'secondary-navigation', __( 'Secondary Navigation', 'wordpress-theme' ) );
}
add_action( 'after_setup_theme', 'wordpress_theme_register_menus' );

endif;