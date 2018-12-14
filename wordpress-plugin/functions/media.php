<?php
/**
	* ========================================
	* Media
	* ========================================
	*/

/** 
 * Add Categories for attachments
 */
function wordpress_plugin_add_categories_for_attachments() {
	register_taxonomy_for_object_type( 'category', 'attachment' );
}
add_action( 'init' , 'wordpress_plugin_add_categories_for_attachments' );