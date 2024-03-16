<?php
/*
 * eol-35
 */
/**
 * Set the content width based on the theme's design and stylesheet.
 */
function gwt_wp_scripts() {
	/** css **/
	wp_enqueue_style( 'gwt_wp-foundation', get_template_directory_uri() . '/foundation/css/foundation.min.css', [], '20160530' );
	// wp_enqueue_style( 'gwt_wp-motion-ui', '//cdnjs.cloudflare.com/ajax/libs/motion-ui/1.1.1/motion-ui.min.css', array(), '20160530' );
	wp_enqueue_style( 'gwt_wp-fontawesome', get_template_directory_uri() . '/css/font-awesome.min.css', [], '20160530' );
		
	// Add Genericons, used in the main stylesheet.
	wp_enqueue_style( 'genericons', get_template_directory_uri() . '/genericons/genericons.css', [], '3.4.1' );
	wp_enqueue_style( 'gwt_wp-style', get_template_directory_uri() . '/theme.css', [], '20160530' );
	wp_enqueue_style( 'gwt_wp-user-style', get_stylesheet_uri(), [], '20160530' );
		
	/** js **/
	//Upgraded JQuery
	wp_enqueue_script( 'gwt_wp-jquery', get_template_directory_uri() . '/foundation/js/vendor/jquery-2.2.2.min.js', [], '20160530', false );
	wp_enqueue_script( 'gwt_wp-foundation', get_template_directory_uri() . '/foundation/js/vendor/foundation.min.js', [], '20160530', false );
	wp_enqueue_script( 'gwt_wp-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', [], '20130115', true );
	wp_enqueue_script( 'gwt_wp-theme-js', get_template_directory_uri() . '/js/theme.js', ['jquery'], '20160530', true );
	// wp_enqueue_script( 'gwt_wp-analytics-js', get_template_directory_uri() . '/js/analytics.js', array('jquery'), '20160530', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'gwt_wp-keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', ['jquery'], '20160530' );
	}
}
add_action( 'wp_enqueue_scripts', 'gwt_wp_scripts' );