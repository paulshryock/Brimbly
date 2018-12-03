<?php
/**
	* ========================================
	* Browser
	* ========================================
	*/

/**
	* Logs PHP to the JavaScript console
	*/
function console_log( $message ) {
	$output = $message;
	if ( is_array( $output ) )
		$output = implode( ',', $output );
			
	// print the result into the JavaScript console
	echo '<script>console.log( ' . $output . ' );</script>';
}

/**
	* Customizes console_log()
	*/
function browser_log( $message, $status ) ) {
	$output = $message;
	if ( is_array( $output ) )
		$output = implode( ',', $output );
			
	// print the result into the JavaScript console
	echo '<script>browser.log( ' . $output . ', ' . $status ' );</script>';

	// browser_log('Hello World!')
	// browser_log('Success!', 'success')
	// browser_log('Error!', 'error')
	// browser_log('Warning!', 'warning')
	// browser_log('Info...', 'info')
}