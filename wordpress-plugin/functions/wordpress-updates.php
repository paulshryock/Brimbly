<?php
/**
	* ========================================
	* WordPress Updates
	* ========================================
	*/

/**
	* Automatically update plugins
	*/
add_filter( 'auto_update_plugin', '__return_true' );

/**
	* Automatically update themes
	*/
add_filter( 'auto_update_theme', '__return_true' );