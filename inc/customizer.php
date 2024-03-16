<?php
/**
 * gwt_wp Theme Customizer
 *
 * @package GWT
 * @since Government Website Template 2.0
 * eol-28
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function gwt_wp_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
}
add_action( 'customize_register', 'gwt_wp_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function gwt_wp_customize_preview_js() {
	wp_enqueue_script( 'gwt_wp_customizer', get_template_directory_uri() . '/js/customizer.js', ['customize-preview'], '20130508', true );
}
add_action( 'customize_preview_init', 'gwt_wp_customize_preview_js' );