<?php
/**
	* ========================================
	* Taxonomies
	* ========================================
	*/

/**
	* Register `Announcement Type` Taxonomy
	*/
if ( ! function_exists( 'wordpress_plugin_add_announcement_type_taxonomy' ) ) {

function wordpress_plugin_add_announcement_type_taxonomy() {

	$labels = array(
		'name'                       => 'Announcement Types',
		'singular_name'              => 'Announcement Type',
		'menu_name'                  => 'Announcement Types',
		'all_items'                  => 'All Announcement Types',
		'parent_item'                => 'Parent Announcement Type',
		'parent_item_colon'          => 'Parent Announcement Type:',
		'new_item_name'              => 'New Announcement Type Name',
		'add_new_item'               => 'Add New Announcement Type',
		'edit_item'                  => 'Edit Announcement Type',
		'update_item'                => 'Update Announcement Type',
		'view_item'                  => 'View Announcement Type',
		'separate_items_with_commas' => 'Separate Announcement Types with commas',
		'add_or_remove_items'        => 'Add or remove Announcement Types',
		'choose_from_most_used'      => 'Choose from the most used',
		'popular_items'              => 'Popular Announcement Types',
		'search_items'               => 'Search Announcement Types',
		'not_found'                  => 'Not Found',
		'no_terms'                   => 'No Announcement Types',
		'items_list'                 => 'Announcement Types list',
		'items_list_navigation'      => 'Announcement Types list navigation',
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => false,
		'show_in_rest'               => true,
	);
	register_taxonomy( 'announcement_type', array( 'announcement' ), $args );

}
add_action( 'init', 'wordpress_plugin_add_announcement_type_taxonomy', 0 );

}

/**
	* Register `Home Page Section Type` Taxonomy
	*/
if ( ! function_exists( 'wordpress_plugin_add_home_page_section_type_taxonomy' ) ) {

function wordpress_plugin_add_home_page_section_type_taxonomy() {

	$labels = array(
		'name'                       => 'Home Page Section Types',
		'singular_name'              => 'Home Page Section Type',
		'menu_name'                  => 'Home Page Section Types',
		'all_items'                  => 'All Home Page Section Types',
		'parent_item'                => 'Parent Home Page Section Type',
		'parent_item_colon'          => 'Parent Home Page Section Type:',
		'new_item_name'              => 'New Home Page Section Type Name',
		'add_new_item'               => 'Add New Home Page Section Type',
		'edit_item'                  => 'Edit Home Page Section Type',
		'update_item'                => 'Update Home Page Section Type',
		'view_item'                  => 'View Home Page Section Type',
		'separate_items_with_commas' => 'Separate Home Page Section Types with commas',
		'add_or_remove_items'        => 'Add or remove Home Page Section Types',
		'choose_from_most_used'      => 'Choose from the most used',
		'popular_items'              => 'Popular Home Page Section Types',
		'search_items'               => 'Search Home Page Section Types',
		'not_found'                  => 'Not Found',
		'no_terms'                   => 'No Home Page Section Types',
		'items_list'                 => 'Home Page Section Types list',
		'items_list_navigation'      => 'Home Page Section Types list navigation',
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => false,
		'show_in_rest'               => true,
	);
	register_taxonomy( 'home_page_section_type', array( 'home-page-section' ), $args );

}
add_action( 'init', 'wordpress_plugin_add_home_page_section_type_taxonomy', 0 );

}

/**
	* Register `Level` taxonomy
	*/
if ( ! function_exists( 'wordpress_plugin_add_opportunity_level_taxonomy' ) ) {

function wordpress_plugin_add_opportunity_level_taxonomy() {

	$labels = array(
		'name'                       => 'Levels',
		'singular_name'              => 'Level',
		'menu_name'                  => 'Levels',
		'all_items'                  => 'All Levels',
		'parent_item'                => 'Parent Level',
		'parent_item_colon'          => 'Parent Level:',
		'new_item_name'              => 'New Level Name',
		'add_new_item'               => 'Add New Level',
		'edit_item'                  => 'Edit Level',
		'update_item'                => 'Update Level',
		'view_item'                  => 'View Level',
		'separate_items_with_commas' => 'Separate Levels with commas',
		'add_or_remove_items'        => 'Add or remove Levels',
		'choose_from_most_used'      => 'Choose from the most used',
		'popular_items'              => 'Popular Levels',
		'search_items'               => 'Search Levels',
		'not_found'                  => 'Not Found',
		'no_terms'                   => 'No Levels',
		'items_list'                 => 'Levels list',
		'items_list_navigation'      => 'Levels list navigation',
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => false,
		'show_in_rest'               => true,
	);
	register_taxonomy(
		'opportunity_level',
		array(
			'opportunity'
		),
		$args
	);

}
add_action( 'init', 'wordpress_plugin_add_opportunity_level_taxonomy', 0 );

}

/**
	* Register `Video Type` Taxonomy
	*/
if ( ! function_exists( 'wordpress_plugin_add_video_type_taxonomy' ) ) {

function wordpress_plugin_add_video_type_taxonomy() {

	$labels = array(
		'name'                       => 'Video Types',
		'singular_name'              => 'Video Type',
		'menu_name'                  => 'Video Types',
		'all_items'                  => 'All Video Types',
		'parent_item'                => 'Parent Video Type',
		'parent_item_colon'          => 'Parent Video Type:',
		'new_item_name'              => 'New Video Type Name',
		'add_new_item'               => 'Add New Video Type',
		'edit_item'                  => 'Edit Video Type',
		'update_item'                => 'Update Video Type',
		'view_item'                  => 'View Video Type',
		'separate_items_with_commas' => 'Separate Video Types with commas',
		'add_or_remove_items'        => 'Add or remove Video Types',
		'choose_from_most_used'      => 'Choose from the most used',
		'popular_items'              => 'Popular Video Types',
		'search_items'               => 'Search Video Types',
		'not_found'                  => 'Not Found',
		'no_terms'                   => 'No Video Types',
		'items_list'                 => 'Video Types list',
		'items_list_navigation'      => 'Video Types list navigation',
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => false,
		'show_in_rest'               => true,
	);
	register_taxonomy( 'video_type', array( 'video' ), $args );

}
add_action( 'init', 'wordpress_plugin_add_video_type_taxonomy', 0 );

}