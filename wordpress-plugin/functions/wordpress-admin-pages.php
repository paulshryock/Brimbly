<?php
/**
	* ========================================
	* WordPress Admin Pages
	* ========================================
	*/

/**
	* Add menu pages
	*/
function wordpress_plugin_add_menu_pages() {

	add_menu_page(
		$page_title = 'Your Profile', // Title tag
		$menu_title = 'Your Profile',
		$capability = 'read',
		$menu_slug	= 'profile.php',
		$function		= '',
		$icon_url		= 'dashicons-admin-users',
		$position		= 3
	);

	add_menu_page(
		$page_title = 'Log Out', // Title tag
		$menu_title = 'Log Out',
		$capability = 'read',
		$menu_slug	= wp_logout_url(),
		$function		= '',
		$icon_url		= 'dashicons-admin-network',
		$position		= 3
	);

	add_menu_page(
		$page_title = 'Subscribers', // Title tag
		$menu_title = 'Subscribers',
		$capability = 'edit_posts',
		$menu_slug	= 'subscribers',
		$function		= 'wordpress_plugin_add_subscribers_page_markup',
		$icon_url		= 'dashicons-groups',
		$position		= 4
	);

}
add_action( 'admin_menu', 'wordpress_plugin_add_menu_pages' );

/**
	* Add Subscribers page markup
	*/
function wordpress_plugin_add_subscribers_page_markup() { ?>
	<div class="wrap">
		<h1>Subscribers</h1>
		<ul>
			<?php
			$args = array(
				'post_type' 			=> 'wplf-submission',
				'orderby'					=> 'date',
				'order'						=> 'ASC',
				'posts_per_page'	=> '-1',
			);  
			$posts = new WP_Query( $args );
			$posts = $posts->posts;

			foreach($posts as $post) {
				switch ($post->post_type) {
					case 'revision':
					case 'nav_menu_item':
						break;
					case 'page':
						$permalink = get_page_link($post->ID);
						break;
					case 'post':
						$permalink = get_permalink($post->ID);
						break;
					case 'attachment':
						$permalink = get_attachment_link($post->ID);
						break;
					default:
						$permalink = get_post_permalink($post->ID);
						break;
				}
			  echo '<li>' . "{$post->post_title}" . '</li>';
			} ?>
		</ul>
	</div>
<?php }

/**
	* Add Extra Settings page markup
	*/
function wordpress_plugin_add_extra_settings_page_markup() { ?>
	<div class="wrap">
		<h1>Extra Settings</h1>
		<form method="post" action="options.php">
			<?php
				settings_fields( 'section-login-settings' );
				do_settings_sections( 'login-settings' );
				submit_button();
			?>
		</form>
	</div>
<?php }

/**
	* Add Login Key setting
	*/
function wordpress_plugin_add_login_key_setting() {
	$setting_login_key = get_option('setting_login_key');
	echo '<input type="text" name="setting_login_key" id="setting_login_key" value="' . $setting_login_key . '">';
}

/**
	* Add Login Value setting
	*/
function wordpress_plugin_add_login_value_setting() {
	$setting_login_value = get_option('setting_login_value');
	echo '<input type="text" name="setting_login_value" id="setting_login_value" value="' . $setting_login_value . '">';
}

/**
	* Setup Extra Settings page
	*/
function wordpress_plugin_setup_extra_settings_page() {

	add_settings_section(
		$id				= 'section-login-settings',
		$title		= 'Login', // H2 element
		$callback = null,
		$page			= 'login-settings'
	);

	add_settings_field(
		$id = 'setting_login_key',
		$title = 'Login Key',
		$callback = 'wordpress_plugin_add_login_key_setting',
		$page = 'login-settings',
		$section = 'section-login-settings',
		$args = array()
	);

	add_settings_field(
		$id = 'setting_login_value',
		$title = 'Login Value',
		$callback = 'wordpress_plugin_add_login_value_setting',
		$page = 'login-settings',
		$section = 'section-login-settings',
		$args = array()
	);

	register_setting( 'section-login-settings', 'setting_login_key' );
	register_setting( 'section-login-settings', 'setting_login_value' );
}
add_action( 'admin_init', 'wordpress_plugin_setup_extra_settings_page' );