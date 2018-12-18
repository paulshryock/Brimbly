<?php
/**
	* ========================================
	* Post Types
	* ========================================
	*/

/**
	* Rename `Posts` to `Articles`
	*/
function wordpress_plugin_update_post_label() {
		global $menu;
		global $submenu;

		$menu[5][0] = 'Articles';
		$submenu['edit.php'][5][0] = 'All Articles';
		$submenu['edit.php'][10][0] = 'Add Article';
		$submenu['edit.php'][16][0] = 'Tags';
}
function wordpress_plugin_update_post_object() {
		global $wp_post_types;
		$labels = &$wp_post_types['post']->labels;
		$labels->name = 'Articles';
		$labels->singular_name = 'Article';
		$labels->add_new = 'Add Article';
		$labels->add_new_item = 'Add New Article';
		$labels->edit_item = 'Edit Article';
		$labels->new_item = 'New Article';
		$labels->view_item = 'View Article';
		$labels->search_items = 'Search Articles';
		$labels->not_found = 'No Articles found';
		$labels->not_found_in_trash = 'No Articles found in Trash';
		$labels->all_items = 'All Articles';
		$labels->menu_name = 'Articles';
		$labels->name_admin_bar = 'Articles';
}
 
add_action( 'admin_menu', 'wordpress_plugin_update_post_label' );
add_action( 'init', 'wordpress_plugin_update_post_object' );

/**
	* Remove comment support
	*/
function wordpress_plugin_remove_comment_support() {
	remove_post_type_support( 'post', 'comments' );
	remove_post_type_support( 'page', 'comments' );
}
add_action( 'init', 'wordpress_plugin_remove_comment_support', 100 );

/**
	* Register `Announcement` post type
	*/
if ( ! function_exists('wordpress_plugin_add_announcement_post_type') ) {

function wordpress_plugin_add_announcement_post_type() {

	$labels = array(
		'name'                  => 'Announcements',
		'singular_name'         => 'Announcement',
		'menu_name'             => 'Announcements',
		'name_admin_bar'        => 'Announcement',
		'archives'              => 'Announcement Archives',
		'attributes'            => 'Announcement Attributes',
		'parent_item_colon'     => 'Parent Announcement:',
		'all_items'             => 'All Announcements',
		'add_new_item'          => 'Add New Announcement',
		'add_new'               => 'Add New',
		'new_item'              => 'New Announcement',
		'edit_item'             => 'Edit Announcement',
		'update_item'           => 'Update Announcement',
		'view_item'             => 'View Announcement',
		'view_items'            => 'View Announcements',
		'search_items'          => 'Search Announcement',
		'not_found'             => 'Not found',
		'not_found_in_trash'    => 'Not found in Trash',
		'featured_image'        => 'Featured Image',
		'set_featured_image'    => 'Set featured image',
		'remove_featured_image' => 'Remove featured image',
		'use_featured_image'    => 'Use as featured image',
		'insert_into_item'      => 'Insert into Announcement',
		'uploaded_to_this_item' => 'Uploaded to this Announcement',
		'items_list'            => 'Announcements list',
		'items_list_navigation' => 'Announcements list navigation',
		'filter_items_list'     => 'Filter Announcements list',
	);
	$args = array(
		'label'                 => 'Announcement',
		'description'           => 'Announcement message consisting of a headline and paragraph that can be posted in various website sections',
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor' ),
		'taxonomies'            => array( 'announcement-type' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-admin-page',
		'show_in_admin_bar'     => false,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => 'announcements',
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
		'show_in_rest'          => true,
	);
	register_post_type( 'announcement', $args );

}
add_action( 'init', 'wordpress_plugin_add_announcement_post_type', 0 );

}

/**
	* Register `Brand` post type
	*/
if ( ! function_exists('wordpress_plugin_add_brand_post_type') ) {

function wordpress_plugin_add_brand_post_type() {

	$labels = array(
		'name'                  => 'Brands',
		'singular_name'         => 'Brand',
		'menu_name'             => 'Brands',
		'name_admin_bar'        => 'Brand',
		'archives'              => 'Brand Archives',
		'attributes'            => 'Brand Attributes',
		'parent_item_colon'     => 'Parent Brand:',
		'all_items'             => 'All Brands',
		'add_new_item'          => 'Add New Brand',
		'add_new'               => 'Add New',
		'new_item'              => 'New Brand',
		'edit_item'             => 'Edit Brand',
		'update_item'           => 'Update Brand',
		'view_item'             => 'View Brand',
		'view_items'            => 'View Brands',
		'search_items'          => 'Search Brand',
		'not_found'             => 'Not found',
		'not_found_in_trash'    => 'Not found in Trash',
		'featured_image'        => 'Featured Image',
		'set_featured_image'    => 'Set featured image',
		'remove_featured_image' => 'Remove featured image',
		'use_featured_image'    => 'Use as featured image',
		'insert_into_item'      => 'Insert into Brand',
		'uploaded_to_this_item' => 'Uploaded to this Brand',
		'items_list'            => 'Brands list',
		'items_list_navigation' => 'Brands list navigation',
		'filter_items_list'     => 'Filter Brands list',
	);
	$args = array(
		'label'                 => 'Brand',
		'description'           => 'Realogy-Owned Real Estate Brand',
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'custom-fields' ),
		'taxonomies'            => array(),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-admin-page',
		'show_in_admin_bar'     => false,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => 'brands',
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
		'show_in_rest'          => true,
	);
	register_post_type( 'brand', $args );

}
add_action( 'init', 'wordpress_plugin_add_brand_post_type', 0 );

}

/**
	* Register `Home Page Section` post type
	*/
if ( ! function_exists('wordpress_plugin_add_home_page_section_post_type') ) {

function wordpress_plugin_add_home_page_section_post_type() {

	$labels = array(
		'name'                  => 'Home Page Sections',
		'singular_name'         => 'Home Page Section',
		'menu_name'             => 'Home Page Sections',
		'name_admin_bar'        => 'Home Page Section',
		'archives'              => 'Home Page Section Archives',
		'attributes'            => 'Home Page Section Attributes',
		'parent_item_colon'     => 'Parent Home Page Section:',
		'all_items'             => 'All Home Page Sections',
		'add_new_item'          => 'Add New Home Page Section',
		'add_new'               => 'Add New',
		'new_item'              => 'New Home Page Section',
		'edit_item'             => 'Edit Home Page Section',
		'update_item'           => 'Update Home Page Section',
		'view_item'             => 'View Home Page Section',
		'view_items'            => 'View Home Page Sections',
		'search_items'          => 'Search Home Page Section',
		'not_found'             => 'Not found',
		'not_found_in_trash'    => 'Not found in Trash',
		'featured_image'        => 'Featured Image',
		'set_featured_image'    => 'Set featured image',
		'remove_featured_image' => 'Remove featured image',
		'use_featured_image'    => 'Use as featured image',
		'insert_into_item'      => 'Insert into Home Page Section',
		'uploaded_to_this_item' => 'Uploaded to this Home Page Section',
		'items_list'            => 'Home Page Sections list',
		'items_list_navigation' => 'Home Page Sections list navigation',
		'filter_items_list'     => 'Filter Home Page Sections list',
	);
	$args = array(
		'label'                 => 'Home Page Section',
		'description'           => 'Sections for the home page',
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail' ),
		'taxonomies'            => array( 'home-page-section-type' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-admin-page',
		'show_in_admin_bar'     => false,
		'show_in_nav_menus'     => false,
		'can_export'            => true,
		'has_archive'           => false,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
		'show_in_rest'          => false,
	);
	register_post_type( 'home-page-section', $args );

}
add_action( 'init', 'wordpress_plugin_add_home_page_section_post_type', 0 );

}

/**
	* Register `Opportunity` post type
	*/
if ( ! function_exists('wordpress_plugin_add_opportunity_post_type') ) {

function wordpress_plugin_add_opportunity_post_type() {

	$labels = array(
		'name'                  => 'Opportunities',
		'singular_name'         => 'Opportunity',
		'menu_name'             => 'Opportunities',
		'name_admin_bar'        => 'Opportunity',
		'archives'              => 'Opportunity Archives',
		'attributes'            => 'Opportunity Attributes',
		'parent_item_colon'     => 'Parent Opportunity:',
		'all_items'             => 'All Opportunities',
		'add_new_item'          => 'Add New Opportunity',
		'add_new'               => 'Add New',
		'new_item'              => 'New Opportunity',
		'edit_item'             => 'Edit Opportunity',
		'update_item'           => 'Update Opportunity',
		'view_item'             => 'View Opportunity',
		'view_items'            => 'View Opportunities',
		'search_items'          => 'Search Opportunity',
		'not_found'             => 'Not found',
		'not_found_in_trash'    => 'Not found in Trash',
		'featured_image'        => 'Featured Image',
		'set_featured_image'    => 'Set featured image',
		'remove_featured_image' => 'Remove featured image',
		'use_featured_image'    => 'Use as featured image',
		'insert_into_item'      => 'Insert into Opportunity',
		'uploaded_to_this_item' => 'Uploaded to this Opportunity',
		'items_list'            => 'Opportunities list',
		'items_list_navigation' => 'Opportunities list navigation',
		'filter_items_list'     => 'Filter Opportunities list',
	);
	$args = array(
		'label'                 => 'Opportunity',
		'description'           => 'Purchasable Sponsor and Exhibitor packages, and A La Cart options',
		'labels'                => $labels,
		'supports'              => array(
			'title',
			'editor',
			'excerpt'
		),
		'taxonomies'            => array( 'opportunity_level' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-admin-page',
		'show_in_admin_bar'     => false,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => 'opportunities',
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
		'show_in_rest'          => true,
	);
	register_post_type( 'opportunity', $args );

}
add_action( 'init', 'wordpress_plugin_add_opportunity_post_type', 0 );

}

/**
	* Register `Partner` post type
	*/
if ( ! function_exists('wordpress_plugin_add_partner_post_type') ) {

function wordpress_plugin_add_partner_post_type() {

	$labels = array(
		'name'                  => 'Partners',
		'singular_name'         => 'Partner',
		'menu_name'             => 'Partners',
		'name_admin_bar'        => 'Partner',
		'archives'              => 'Partner Archives',
		'attributes'            => 'Partner Attributes',
		'parent_item_colon'     => 'Parent Partner:',
		'all_items'             => 'All Partners',
		'add_new_item'          => 'Add New Partner',
		'add_new'               => 'Add New',
		'new_item'              => 'New Partner',
		'edit_item'             => 'Edit Partner',
		'update_item'           => 'Update Partner',
		'view_item'             => 'View Partner',
		'view_items'            => 'View Partners',
		'search_items'          => 'Search Partner',
		'not_found'             => 'Not found',
		'not_found_in_trash'    => 'Not found in Trash',
		'featured_image'        => 'Featured Image',
		'set_featured_image'    => 'Set featured image',
		'remove_featured_image' => 'Remove featured image',
		'use_featured_image'    => 'Use as featured image',
		'insert_into_item'      => 'Insert into Partner',
		'uploaded_to_this_item' => 'Uploaded to this Partner',
		'items_list'            => 'Partners list',
		'items_list_navigation' => 'Partners list navigation',
		'filter_items_list'     => 'Filter Partners list',
	);
	$args = array(
		'label'                 => 'Partner',
		'description'           => 'Realogy-Owned Real Estate Partner',
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail' ),
		'taxonomies'            => array(),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-admin-page',
		'show_in_admin_bar'     => false,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => 'partners',
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
		'show_in_rest'          => true,
	);
	register_post_type( 'partner', $args );

}
add_action( 'init', 'wordpress_plugin_add_partner_post_type', 0 );

}

/**
	* Register `Video` post type
	*/
if ( ! function_exists('wordpress_plugin_add_video_post_type') ) {

function wordpress_plugin_add_video_post_type() {

	$labels = array(
		'name'                  => 'Videos',
		'singular_name'         => 'Video',
		'menu_name'             => 'Videos',
		'name_admin_bar'        => 'Video',
		'archives'              => 'Video Archives',
		'attributes'            => 'Video Attributes',
		'parent_item_colon'     => 'Parent Video:',
		'all_items'             => 'All Videos',
		'add_new_item'          => 'Add New Video',
		'add_new'               => 'Add New',
		'new_item'              => 'New Video',
		'edit_item'             => 'Edit Video',
		'update_item'           => 'Update Video',
		'view_item'             => 'View Video',
		'view_items'            => 'View Videos',
		'search_items'          => 'Search Video',
		'not_found'             => 'Not found',
		'not_found_in_trash'    => 'Not found in Trash',
		'featured_image'        => 'Featured Image',
		'set_featured_image'    => 'Set featured image',
		'remove_featured_image' => 'Remove featured image',
		'use_featured_image'    => 'Use as featured image',
		'insert_into_item'      => 'Insert into Video',
		'uploaded_to_this_item' => 'Uploaded to this Video',
		'items_list'            => 'Videos list',
		'items_list_navigation' => 'Videos list navigation',
		'filter_items_list'     => 'Filter Videos list',
	);
	$args = array(
		'label'                 => 'Video',
		'description'           => 'Individual videos',
		'labels'                => $labels,
		'supports'              => array( 'title' ),
		'taxonomies'            => array( 'video_type' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-admin-page',
		'show_in_admin_bar'     => false,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => 'videos',
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
		'show_in_rest'          => true,
	);
	register_post_type( 'video', $args );

}
add_action( 'init', 'wordpress_plugin_add_video_post_type', 0 );

}

/**
 * Plugin Name: Disable ACF on Frontend
 * Description: Provides a performance boost if ACF frontend functions aren't being used
 * Version:     1.0
 * Author:      Bill Erickson
 * Author URI:  http://www.billerickson.net
 * License:     MIT
 * License URI: http://www.opensource.org/licenses/mit-license.php
 */
 
/**
	* Disable ACF on Frontend
	*
	* More on correct implementation:
	* https://www.billerickson.net/advanced-custom-fields-frontend-dependency/
	*/
function ea_disable_acf_on_frontend( $plugins ) {
	if( is_admin() )
		return $plugins;
	foreach( $plugins as $i => $plugin )
		if( 'advanced-custom-fields-pro/acf.php' == $plugin )
			unset( $plugins[$i] );
	return $plugins;
}
add_filter( 'option_active_plugins', 'ea_disable_acf_on_frontend' );