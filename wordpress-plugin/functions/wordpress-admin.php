<?php
/**
	* ========================================
	* WordPress Admin Updates
	* ========================================
	*/

/**
	* Remove Admin update notice for all but Administrators
	*/
function wordpress_plugin_remove_admin_update_notice() {
	if ( ! current_user_can( 'update_core' ) ) {
		remove_action( 'admin_notices', 'update_nag', 3 );
	}
}
add_action( 'admin_head', 'wordpress_plugin_remove_admin_update_notice', 1 );

/**
	* ========================================
	* WordPress Admin Bar
	* ========================================
	*/

/**
	* Remove WordPress Admin bar links
	*/
function wordpress_plugin_remove_admin_bar_links() {
	global $wp_admin_bar;
		
	$wp_admin_bar->remove_node( 'wp-logo' );				// WordPress
	$wp_admin_bar->remove_menu( 'comments' );				// Comments

	if ( ! current_user_can( 'manage_options' ) ) {
		$wp_admin_bar->remove_menu( 'root-default' );		// Root Default
		$wp_admin_bar->remove_menu( 'top-secondary' );	// Top Secondary
		$wp_admin_bar->remove_menu( 'site-name' );			// Site Name
		$wp_admin_bar->remove_menu( 'new-content' );		// New Content
		$wp_admin_bar->remove_menu( 'my-account' );			// My Account
	}
}
add_action( 'wp_before_admin_bar_render', 'wordpress_plugin_remove_admin_bar_links' );

/**
	* Remove WordPress Admin bar
	*/
function wordpress_plugin_remove_admin_bar() {

	if ( ! current_user_can( 'manage_options' ) ) {
		show_admin_bar( false );
	}
	
}
add_action( 'set_current_user', 'wordpress_plugin_remove_admin_bar' );

/**
	* Remove admin screen options tab
	*/
function wordpress_plugin_remove_screen_options_tab() { 
	// return current_user_can( 'manage_options' );
	return false;
}
add_filter( 'screen_options_show_screen', 'wordpress_plugin_remove_screen_options_tab' );

/**
	* Remove admin help tab
	*/
function wordpress_plugin_remove_help_tab( $old_help, $screen_id, $screen ) {
	// if ( !current_user_can( 'manage_options' ) ) {
		$screen->remove_help_tabs();
		return $old_help;
	// }
}
add_filter( 'contextual_help', 'wordpress_plugin_remove_help_tab', 999, 3 );


/**
	* ========================================
	* WordPress Admin Menu
	* ========================================
	*/

/**
	* Remove Admin menu pages
	*/
function wordpress_plugin_remove_admin_menu_pages() {

	// Remove for all users
	remove_menu_page( 'edit-comments.php' );									// Comments
	remove_submenu_page( 'users.php', 'profile.php' );				// Users > Profile
	remove_menu_page( 'profile.php' );											// Profile

	// Remove for all users except Administrators
	if ( ! current_user_can( 'manage_options' ) ) {

		remove_submenu_page( 'index.php', 'index.php' );				// Dashboard > Home
		remove_submenu_page( 'index.php', 'update-core.php' );	// Dashboard > Updates
		remove_menu_page( 'edit-comments.php' );								// Comments
		remove_menu_page( 'edit.php?post_type=page' ); 					// Pages
		// remove_menu_page( 'edit.php?post_type=announcement' );	// Announcements
		remove_menu_page( 'edit.php?post_type=home-page-section' );	// Home Page Sections
		remove_menu_page( 'edit.php?post_type=opportunity' );		// Opportunities
		remove_menu_page( 'edit.php?post_type=partner' );				// Partners
		remove_menu_page( 'edit.php?post_type=brand' );					// Brands
		remove_menu_page( 'edit.php' );													// Articles
		remove_menu_page( 'edit.php?post_type=video' );					// Videos
		// remove_menu_page( 'edit.php?post_type=[your_post_type_slug]' );	// Post_Type
		remove_menu_page( 'edit.php?post_type=wplf-form' );			// Forms
		remove_submenu_page( 'edit.php?post_type=wplf-form', 'edit.php?post_type=wplf-form' );					// Forms > All Forms
		remove_submenu_page( 'edit.php?post_type=wplf-form', 'post-new.php?post_type=wplf-form' );			// Forms > Add Form
		remove_submenu_page( 'edit.php?post_type=wplf-form', 'edit.php?post_type=wplf-submission' );		// Forms > Submissions
		remove_menu_page( 'upload.php' );												// Media
		remove_menu_page( 'edit.php?post_type=acf-field-group' );	// Custom Fields
		remove_menu_page( 'themes.php' );												// Appearance
		remove_submenu_page( 'themes.php', 'themes.php' );			// Appearance > Themes
		remove_submenu_page( 'themes.php', 'customize.php?return=' . urlencode( $_SERVER['REQUEST_URI'] ) ); // Appearance > Customizer
		remove_submenu_page( 'themes.php', 'widgets.php' );			// Appearance > Widgets
		remove_menu_page( 'plugins.php' ); 											// Plugins
		remove_menu_page( 'users.php' );												// Users
		remove_menu_page( 'tools.php' );												// Tools
		remove_menu_page( 'options-general.php' );							// Settings
		remove_menu_page('gutenberg');													// Gutenberg
		remove_submenu_page('gutenberg', 'gutenberg');					// Gutenberg > Demo
		remove_submenu_page('gutenberg', 'https://wordpress.org/support/plugin/gutenberg');						// Gutenberg > Support
		remove_submenu_page('gutenberg', 'http://wordpressdotorg.polldaddy.com/s/gutenberg-support');	// Gutenberg > Feedback
		remove_submenu_page('gutenberg', 'https://wordpress.org/gutenberg/handbook/');								// Gutenberg > Documentation
		remove_menu_page( 'wppusher' );													// WP Pusher

	}
}
add_action( 'admin_menu', 'wordpress_plugin_remove_admin_menu_pages', 999 );

/**
	* Reorder admin menu
	*/
function wordpress_plugin_custom_menu_order( $menu_ord ) {

	if ( ! $menu_ord ) {
		return true;
	}

	// Default: bottom of menu structure
	// 2 – Dashboard
	// 4 – Separator
	// 5 – Posts
	// 10 – Media
	// 15 – Links
	// 20 – Pages
	// 25 – Comments
	// 59 – Separator
	// 60 – Appearance
	// 65 – Plugins
	// 70 – Users
	// 75 – Tools
	// 80 – Settings
	// 99 – Separator

	return array(
		'index.php',																		// Dashboard
		'profile.php',																	// Your Profile
		wp_logout_url(),																// Logout
		'separator1',																		// ----------
		'edit.php?post_type=page',											// Pages
		'edit.php?post_type=announcement',							// Announcements
		'edit.php?post_type=home-page-section',					// Home Page Sections
		'edit.php?post_type=opportunity',								// Opportunities
		'edit.php?post_type=partner',										// Partners
		'edit.php?post_type=brand',											// Brands
		'edit.php',																			// Articles
		'edit.php?post_type=video',											// Videos
		// 'edit.php?post_type=[your_post_type_slug]',	// Post_Type
		'edit.php?post_type=wplf-form',									// Forms
		'upload.php',																		// Media
		'edit-comments.php',														// Comments
		'edit.php?post_type=acf-field-group',						// Custom Fields
		'separator2',																		// ----------
		'subscribers',																	// Subscribers
		'extra-custom-settings',												// Extra Settings
		'separator',																		// ----------
		'themes.php',																		// Appearance
		'plugins.php',																	// Plugins
		'users.php',																		// Users
		'tools.php',																		// Tools
		'options-general.php',													// Settings
	);

}
add_filter( 'custom_menu_order', 'wordpress_plugin_custom_menu_order' );
add_filter( 'menu_order', 'wordpress_plugin_custom_menu_order' );

/**
	* Add Admin menu separator
	*
	* param {number} position - The admin menu position
	* https://tommcfarlin.com/add-a-separator-to-the-wordpress-menu/
	*/
function wordpress_plugin_add_admin_menu_separator( $position ) {

	global $menu;

	$menu[ $position ] = array(
		0	=>	'',
		1	=>	'read',
		2	=>	'separator' . $position,
		3	=>	'',
		4	=>	'wp-menu-separator'
	);

}

/**
	* Set Admin menu separator position
	*/
function set_admin_menu_separator() {
	do_action( 'admin_init', 59 );
}
add_action( 'admin_menu', 'wordpress_plugin_add_admin_menu_separator' );

/**
	* Add Admin menu items
	*/
// function wordpress_plugin_add_admin_menu_items() {

// 	$avatar = get_avatar(
// 		$id_or_email = get_current_user_id(),
// 		$size = 'avatar',
// 		$default = '',
// 		$alt = 'Your Profile',
// 		$args = null
// 	);

// 	echo '
// 		<li><a href="profile.php">' . $avatar . '</a></li>
// 	';

// }
// add_action( 'adminmenu', 'wordpress_plugin_add_admin_menu_items' );

/**
	* ========================================
	* WordPress Admin Profile page
	* ========================================
	*/

/**
	* Remove Admin Profile items for non-Administrators
	*/
function wordpress_plugin_remove_admin_profile_items() {
	if ( ! current_user_can( 'update_core' ) ) {
		// Removes admin color scheme options
		remove_action( 'admin_color_scheme_picker', 'admin_color_scheme_picker' );

		// Removes the leftover 'Visual Editor', 'Keyboard Shortcuts' and 'Toolbar' options.
		add_action( 'admin_head', function () {
			ob_start( function( $subject ) {
				$subject = preg_replace( '#<h[0-9]>'.__("Personal Options").'</h[0-9]>.+?/table>#s', '', $subject, 1 );
				return $subject;
			});
		});

		add_action( 'admin_footer', function(){
			ob_end_flush();
		});
	}
}
add_action( 'admin_head', 'wordpress_plugin_remove_admin_profile_items', 1 );

/**
	* ========================================
	* WordPress Admin Footer
	* ========================================
	*/

/**
	* Update Admin footer text
	*/
function wordpress_plugin_update_admin_footer() {

	/**
		* Use this block if function executes from the plugin root folder
		*/
	// $plugins_directory = WP_PLUGIN_DIR . '/';
	// $plugin_uri = plugin_basename( __File__ );
	// $plugin_file = $plugins_directory . $plugin_uri;
	// $plugin_data = get_plugin_data( $plugin_file, $markup = false, $translate = true );

	/**
		* Use this block if function executes from the /inc folder
		*/
	$plugin_directory_path = plugin_dir_path( dirname( __FILE__ , 1 ) );
	$plugin_file_name = strtolower( basename( $plugin_directory_path ) );
	$plugin_file = $plugin_directory_path . $plugin_file_name . '.php';
	$plugin_data = get_plugin_data( $plugin_file, $markup = false, $translate = true );

	echo '<span id="footer-thankyou">&copy ';
	echo date("Y") . ' ';
	echo bloginfo( 'name' );
	echo '. All rights reserved. Created by <a href="' .
				$plugin_data['AuthorURI'] .
				'" target="_blank">' .
				$plugin_data['Author'] .
				'</a>.</span>';
}
add_filter( 'admin_footer_text', 'wordpress_plugin_update_admin_footer' );

/**
	* Remove WordPress version number from Admin footer
	*/
function wordpress_plugin_remove_footer_version() {
	remove_filter( 'update_footer', 'core_update_footer' ); 
}
add_action( 'admin_menu', 'wordpress_plugin_remove_footer_version' );  