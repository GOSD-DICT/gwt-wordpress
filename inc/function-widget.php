<?php
/**
 * Register widgetized area
 * This theme uses wp_nav_menu() in one location.
 *
 * @package GWT
 * @since Government Website Template 2.0
 * eol-32
 */
 
function gwt_wp_widgets_init() {
	register_nav_menus( ['aux_nav'		=> __( 'Auxiliary Menu', 'gwt_wp' ), 'topbar_left' 	=> __( 'Left Menu Top bar', 'gwt_wp' ), 'topbar_right' 	=> __( 'Right Menu Top bar', 'gwt_wp' )] );
	register_sidebar( ['name'			=> __( 'Left Sidebar', 'gwt_wp' ), 'id'			=> 'left-sidebar', 'before_widget'	=> '<aside id="%1$s" class="widget callout secondary %2$s">', 'after_widget'	=> '</aside>', 'before_title'	=> '<h3 class="widget-title">', 'after_title'	=> '</h3>'] );
	register_sidebar( ['name'			=> __( 'Right Sidebar', 'gwt_wp' ), 'id'			=> 'right-sidebar', 'before_widget'	=> '<aside id="%1$s" class="widget callout secondary %2$s">', 'after_widget'	=> '</aside>', 'before_title'	=> '<h3 class="widget-title">', 'after_title'	=> '</h3>'] );
	register_sidebar( ['name'			=> __( 'Banner Section 1', 'gwt_wp' ), 'id'			=> 'banner-section-1', 'before_widget'	=> '<div id="%1$s" class="banner-content widget anchor %2$s">', 'after_widget'	=> '</div>', 'before_title'	=> '<h3 class="widget-title">', 'after_title'	=> '</h3>'] );
	register_sidebar( ['name'			=> __( 'Banner Section 2', 'gwt_wp' ), 'id'			=> 'banner-section-2', 'before_widget'	=> '<div id="%1$s" class="banner-content widget anchor %2$s">', 'after_widget'	=> '</div>', 'before_title'	=> '<h3 class="widget-title">', 'after_title'	=> '</h3>'] );
	register_sidebar( ['name'			=> __( 'Ear Content 1', 'gwt_wp' ), 'id'			=> 'ear-content-1', 'before_widget'	=> '<div id="%1$s" class="ear-content widget anchor %2$s">', 'after_widget'	=> '</div>', 'before_title'	=> '<h3 class="widget-title">', 'after_title'	=> '</h3>'] );
	register_sidebar( ['name'			=> __( 'Ear Content 2', 'gwt_wp' ), 'id'			=> 'ear-content-2', 'before_widget'	=> '<div id="%1$s" class="ear-content widget anchor %2$s">', 'after_widget'	=> '</div>', 'before_title'	=> '<h3 class="widget-title">', 'after_title'	=> '</h3>'] );
	register_sidebar( ['name'			=> __( 'Panel Top 1', 'gwt_wp' ), 'id'			=> 'panel-top-1', 'before_widget'	=> '<div id="%1$s" class="widget %2$s">', 'after_widget'	=> '</div>', 'before_title'	=> '<h3 class="widget-title">', 'after_title'	=> '</h3>'] );
	register_sidebar( ['name'			=> __( 'Panel Top 2', 'gwt_wp' ), 'id'			=> 'panel-top-2', 'before_widget'	=> '<div id="%1$s" class="widget %2$s">', 'after_widget'	=> '</div>', 'before_title'	=> '<h3 class="widget-title">', 'after_title'	=> '</h3>'] );
	register_sidebar( ['name'			=> __( 'Panel Top 3', 'gwt_wp' ), 'id'			=> 'panel-top-3', 'before_widget'	=> '<div id="%1$s" class="widget %2$s">', 'after_widget'	=> '</div>', 'before_title'	=> '<h3 class="widget-title">', 'after_title'	=> '</h3>'] );
	register_sidebar( ['name'			=> __( 'Panel Top 4', 'gwt_wp' ), 'id'			=> 'panel-top-4', 'before_widget'	=> '<div id="%1$s" class="widget %2$s">', 'after_widget'	=> '</div>', 'before_title'	=> '<h3 class="widget-title">', 'after_title'	=> '</h3>'] );
	register_sidebar( ['name'			=> __( 'Panel Bottom 1', 'gwt_wp' ), 'id'			=> 'panel-bottom-1', 'before_widget'	=> '<div id="%1$s" class="widget %2$s">', 'after_widget'	=> '</div>', 'before_title'	=> '<h3 class="widget-title">', 'after_title'	=> '</h3>'] );
	register_sidebar( ['name'			=> __( 'Panel Bottom 2', 'gwt_wp' ), 'id'			=> 'panel-bottom-2', 'before_widget'	=> '<div id="%1$s" class="widget %2$s">', 'after_widget'	=> '</div>', 'before_title'	=> '<h3 class="widget-title">', 'after_title'	=> '</h3>'] );
	register_sidebar( ['name'			=> __( 'Panel Bottom 3', 'gwt_wp' ), 'id'			=> 'panel-bottom-3', 'before_widget'	=> '<div id="%1$s" class="widget %2$s">', 'after_widget'	=> '</div>', 'before_title'	=> '<h3 class="widget-title">', 'after_title'	=> '</h3>'] );
	register_sidebar( ['name'			=> __( 'Panel Bottom 4', 'gwt_wp' ), 'id'			=> 'panel-bottom-4', 'before_widget'	=> '<div id="%1$s" class="widget %2$s">', 'after_widget'	=> '</div>', 'before_title'	=> '<h3 class="widget-title">', 'after_title'	=> '</h3>'] );
	register_sidebar( ['name'			=> __( 'Agency Footer 1', 'gwt_wp' ), 'id'			=> 'footer-1', 'before_widget'	=> '<aside id="%1$s" class="widget %2$s">', 'after_widget'	=> '</aside>', 'before_title'	=> '<h3 class="widget-title">', 'after_title'	=> '</h3>'] );
	register_sidebar( ['name'			=> __( 'Agency Footer 2', 'gwt_wp' ), 'id'			=> 'footer-2', 'before_widget'	=> '<aside id="%1$s" class="widget %2$s">', 'after_widget'	=> '</aside>', 'before_title'	=> '<h3 class="widget-title">', 'after_title'	=> '</h3>'] );
	register_sidebar( ['name'			=> __( 'Agency Footer 3', 'gwt_wp' ), 'id'			=> 'footer-3', 'before_widget'	=> '<aside id="%1$s" class="widget %2$s">', 'after_widget'	=> '</aside>', 'before_title'	=> '<h3 class="widget-title">', 'after_title'	=> '</h3>'] );
	register_sidebar( ['name'			=> __( 'Agency Footer 4', 'gwt_wp' ), 'id'			=> 'footer-4', 'before_widget'	=> '<div id="%1$s" class="widget %2$s">', 'after_widget'	=> '</div>', 'before_title'	=> '<h3 class="widget-title">', 'after_title'	=> '</h3>'] );
}
add_action( 'widgets_init', 'gwt_wp_widgets_init' );