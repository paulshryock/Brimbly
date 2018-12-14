<?php
/**
	* ========================================
	* API
	* ========================================
	*/

/**
	* Disable xmlrpc.php
	*/
add_filter( 'xmlrpc_enabled', '__return_false' );
remove_action( 'wp_head', 'rsd_link' );
remove_action( 'wp_head', 'wlwmanifest_link' );

/** 
	* Disable JSON REST API  
	*/
// add_filter('json_enabled', '__return_false');
// add_filter('json_jsonp_enabled', '__return_false');