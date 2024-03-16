<?php
add_filter( 'rest_authentication_errors', function( $result ) {
	if (!empty( $result ) ) {
	return $result;
	}
	if (!is_user_logged_in() ) {
	return new WP_Error( 'restx_logged_out', 'Sorry, you must be logged in to make a request.', array( 'status' => 401 ) );
	}
	return $result;
});