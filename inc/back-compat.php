<?php
/**
 * GWT back compat functionality
 *
 * Prevents GWT from running on WordPress versions prior to 4.4,
 * since this theme is not meant to be backward compatible beyond that and
 * relies on many newer functions and markup changes introduced in 4.4.
 *
 * @package GWT
 * @since Government Website Template 2.0
 * eol-69
 */

/**
 * Prevent switching to GWT on old versions of WordPress.
 *
 * Switches to the default theme.
 *
 * @since Government Website Template 2.0
 */
function gwt_switch_theme() {
	switch_theme( WP_DEFAULT_THEME, WP_DEFAULT_THEME );

	unset( $_GET['activated'] );

	add_action( 'admin_notices', 'gwt_upgrade_notice' );
}
add_action( 'after_switch_theme', 'gwt_switch_theme' );

/**
 * Adds a message for unsuccessful theme switch.
 *
 * Prints an update nag after an unsuccessful attempt to switch to
 * GWT on WordPress versions prior to 4.4.
 *
 * @since Government Website Template 2.0
 *
 * @global string $wp_version WordPress version.
 */
function gwt_upgrade_notice() {
	$message = sprintf( __( 'GWT requires at least WordPress version 4.4. You are running version %s. Please upgrade and try again.', 'gwt' ), $GLOBALS['wp_version'] );
	printf( '<div class="error"><p>%s</p></div>', $message );
}

/**
 * Prevents the Customizer from being loaded on WordPress versions prior to 4.4.
 *
 * @since Government Website Template 2.0
 *
 * @global string $wp_version WordPress version.
 */
function gwt_customize() {
	wp_die( sprintf( __( 'GWT requires at least WordPress version 4.4. You are running version %s. Please upgrade and try again.', 'gwt' ), $GLOBALS['wp_version'] ), '', ['back_link' => true] );
}
add_action( 'load-customize.php', 'gwt_customize' );

/**
 * Prevents the Theme Preview from being loaded on WordPress versions prior to 4.4.
 *
 * @since Government Website Template 2.0
 *
 * @global string $wp_version WordPress version.
 */
function gwt_preview() {
	if ( isset( $_GET['preview'] ) ) {
		wp_die( sprintf( __( 'GWT requires at least WordPress version 4.4. You are running version %s. Please upgrade and try again.', 'gwt' ), $GLOBALS['wp_version'] ) );
	}
}
add_action( 'template_redirect', 'gwt_preview' );