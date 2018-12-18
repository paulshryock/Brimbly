<?php

/**
	* ========================================
	* User Roles
	* ========================================
	*/

/**
	* Clone the administrator user role
	*/
function wordpress_plugin_create_role_agency_developer() {
	global $wp_roles;
	if ( ! isset( $wp_roles ) )
		$wp_roles = new WP_Roles();

	// Add new "Agency: Developer" role based on administrator capabilities
	$wp_roles->add_role(
		$role = 'agency-developer',
		$display_name = 'Agency: Developer',
		$capabilities = [
			'activate_plugins'				=> true,
			'delete_others_pages'			=> true,
			'delete_others_posts'			=> true,
			'delete_pages'						=> true,
			'delete_posts'						=> true,
			'delete_private_pages'		=> true,
			'delete_private_posts'		=> true,
			'delete_published_pages'	=> true,
			'delete_published_posts'	=> true,
			'edit_dashboard'					=> true,
			'edit_others_pages'				=> true,
			'edit_others_posts'				=> true,
			'edit_pages'							=> true,
			'edit_posts'							=> true,
			'edit_private_pages'			=> true,
			'edit_private_posts'			=> true,
			'edit_published_pages'		=> true,
			'edit_published_posts'		=> true,
			'edit_theme_options'			=> true,
			'export'									=> true,
			'import'									=> true,
			'list_users'							=> true,
			'manage_categories'				=> true,
			'manage_links'						=> true,
			'manage_options'					=> true,
			'moderate_comments'				=> true,
			'promote_users'						=> true,
			'publish_pages'						=> true,
			'publish_posts'						=> true,
			'read_private_pages'			=> true,
			'read_private_posts'			=> true,
			'read'										=> true,
			'remove_users'						=> true,
			'switch_themes'						=> true,
			'upload_files'						=> true,
			'customize'								=> true,
			'delete_site'							=> true,
			'update_core'							=> true,
			'update_plugins'					=> true,
			'update_themes'						=> true,
			'install_plugins'					=> true,
			'install_themes'					=> true,
			'upload_plugins'					=> true,
			'upload_themes'						=> true,
			'delete_themes'						=> true,
			'delete_plugins'					=> true,
			'edit_plugins'						=> true,
			'edit_themes'							=> true,
			'edit_files'							=> true,
			'edit_users'							=> true,
			'create_users'						=> true,
			'delete_users'						=> true,
			'unfiltered_html'					=> true,
		]
	);

}
add_action( 'init', 'wordpress_plugin_create_role_agency_developer' );

/**
	* Clone the editor user role
	*/
function wordpress_plugin_create_role_client_stakeholder() {
	global $wp_roles;
	if ( ! isset( $wp_roles ) )
		$wp_roles = new WP_Roles();
	
	// Add new "Client: Stakeholder" role based on editor capabilities
	$wp_roles->add_role(
		$role = 'client-stakeholder',
		$display_name = 'Client: Stakeholder',
		$capabilities = [
			'delete_others_pages'			=> false,
			'delete_others_posts'			=> false,
			'delete_pages'						=> false,
			'delete_posts'						=> false,
			'delete_private_pages'		=> false,
			'delete_private_posts'		=> false,
			'delete_published_pages'	=> false,
			'delete_published_posts'	=> false,
			'edit_others_pages'				=> false,
			'edit_others_posts'				=> false,
			'edit_pages'							=> false,
			'edit_posts'							=> true, // See Form Submissions
			'edit_private_pages'			=> false,
			'edit_private_posts'			=> false,
			'edit_published_pages'		=> false,
			'edit_published_posts'		=> false,
			'manage_categories'				=> true, // See Form Submissions
			'manage_links'						=> false,
			'moderate_comments'				=> false,
			'publish_pages'						=> false,
			'publish_posts'						=> false,
			'read'										=> true, // See Form Submissions
			'read_private_pages'			=> false,
			'read_private_posts'			=> false,
			'unfiltered_html'					=> false,
			'upload_files'						=> false,
		]
	);

}
add_action( 'init', 'wordpress_plugin_create_role_client_stakeholder' );