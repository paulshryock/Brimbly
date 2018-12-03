<?php
/**
	* ========================================
	* WordPress Dashboard
	* ========================================
	*/

/**
	* Remove all dashboard widgets
	*/
function wordpress_plugin_remove_dashboard_widgets() {
	global $wp_meta_boxes;
	
	unset( $wp_meta_boxes['dashboard']['normal']['core']['dashboard_activity'] );
	unset( $wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links'] );
	unset( $wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now'] );
	unset( $wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins'] );
	unset( $wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_drafts'] );
	unset( $wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments'] );
	unset( $wp_meta_boxes['dashboard']['side']['core']['dashboard_browser_nag'] );
	unset( $wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press'] );
	unset( $wp_meta_boxes['dashboard']['side']['core']['dashboard_primary'] );
	unset( $wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary'] );
	// unset($wp_meta_boxes['dashboard']['normal']['core']['yoast_db_widget']); // Yoast SEO

	remove_action( 'welcome_panel', 'wp_welcome_panel' );
	remove_action( 'try_gutenberg_panel', 'wp_try_gutenberg_panel' );
}

// if ( ! current_user_can('manage_options') ) { // Only hide for non-admins
	add_action('wp_dashboard_setup', 'wordpress_plugin_remove_dashboard_widgets' );
// }

/**
	* Add Website Subscribers dashboard widget
	*/
function wordpress_plugin_add_website_subscribers_dashboard_widget() {

	$args = array(
		'post_type' 			=> 'wplf-submission',
		'orderby'					=> 'date',
		'order'						=> 'ASC',
		'posts_per_page'	=> '-1',
	);  
	$loop = new WP_Query( $args );

	if ( $loop->have_posts() ) :

	$submissions_count = $loop->found_posts;
	echo '<h2>' . $submissions_count . ' Subscribers</h2>';
	?>

	<a class="button" href="admin.php?page=subscribers">View Subscribers</a>

	<?php else : ?>

	<p><?php esc_html_e( 'There are no subscribers.' ); ?></p>

	<?php endif; wp_reset_postdata();
}

function wordpress_plugin_add_dashboard_widgets() {
	wp_add_dashboard_widget(
		'dashboard_widget_website_subscribers', // Widget
		'Website subscribers', // Widget Title
		'wordpress_plugin_add_website_subscribers_dashboard_widget' // Widget Display Function
	);
}
add_action( 'wp_dashboard_setup', 'wordpress_plugin_add_dashboard_widgets' );

/**
	* Replace 'Howdy' with 'Welcome'
	*/
function wordpress_plugin_replace_howdy($translated, $text, $domain) {

	if (!is_admin() || 'default' != $domain)
		return $translated;

	if (false !== strpos($translated, 'Howdy'))
		return str_replace('Howdy', 'Welcome', $translated);

	return $translated;
}
add_filter('gettext', 'wordpress_plugin_replace_howdy', 10, 3);