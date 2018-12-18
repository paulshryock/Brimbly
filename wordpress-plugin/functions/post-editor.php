<?php
/**
	* ========================================
	* Post Editor
	* ========================================
	*/

/**
	* Always show second bar in TinyMCE
	*/
function wordpress_plugin_show_tinymce_toolbar( $in ) {
	$in['wordpress_adv_hidden'] = false;
	return $in;
}
add_filter( 'tiny_mce_before_init', 'wordpress_plugin_show_tinymce_toolbar' );