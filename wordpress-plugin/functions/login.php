<?php
/**
  * ========================================
  * Login
  * ========================================
  */

/**
	* Redirect page
  *
  * param {string} $url - The URL to redirect to
  * param {boolean} $permanent - (Optional) Is the redirect permanent? Default: false
	*/
function wordpress_plugin_redirect_page($url, $permanent = false) {
	header('Location: ' . $url, true, $permanent ? 301 : 302);
	exit();
}

/**
  * Restrict Login page
 */
function wordpress_plugin_restrict_login_page( $errors, $redirect_to ) {

  // access the login form like so:
  // get_bloginfo( 'url' )/wp-login.php?$login_key=$login_value

  $login_key = 'username';
  $login_value = $_GET[ $login_key ];
  $username_exists = username_exists( $login_value );
  
  if (
    !isset( $login_key ) ||
    !$username_exists
  ) {
  	$url = get_bloginfo( 'url' );
		wordpress_plugin_redirect_page( $url );
    exit;
  }
  
  return $errors;
}
/* TODO: Is there a better filter we can hook into */
add_filter( 'wp_login_errors', 'wordpress_plugin_restrict_login_page', 90, 2 );

/**
	* Update the login error message to avoid revealing
	* which item was incorrect.
	*/
function wordpress_plugin_update_login_error_message() {
	return "The credentials you entered were incorrect. Please try again.";
}
add_filter('login_errors', 'wordpress_plugin_update_login_error_message');