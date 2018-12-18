<?php

/*
Plugin Name:  WordPress Plugin
Plugin URI:   https://github.com/paulshryock/Brimbly
Description:  Start WordPress from scratch without reinventing the wheel
Version:      1.0.0
Author:       Paul Shryock
Author URI:   https://pshry.com/
License:      GPL2
License URI:  https://www.gnu.org/licenses/gpl-2.0.html
Text Domain:  WordPress-Plugin
Domain Path:  /languages
*/

/**
	* ========================================
	* Includes
	* ========================================
	*/

require plugin_dir_path( __File__ ) . '/functions/browser.php';
require plugin_dir_path( __File__ ) . '/functions/api.php';
require plugin_dir_path( __File__ ) . '/functions/login.php';
require plugin_dir_path( __File__ ) . '/functions/wordpress-updates.php';
require plugin_dir_path( __File__ ) . '/functions/wordpress-admin.php';
require plugin_dir_path( __File__ ) . '/functions/wordpress-admin-pages.php';
require plugin_dir_path( __File__ ) . '/functions/wordpress-dashboard.php';
require plugin_dir_path( __File__ ) . '/functions/users.php';
require plugin_dir_path( __File__ ) . '/functions/post-types.php';
require plugin_dir_path( __File__ ) . '/functions/taxonomies.php';
require plugin_dir_path( __File__ ) . '/functions/post-editor.php';
require plugin_dir_path( __File__ ) . '/functions/media.php';