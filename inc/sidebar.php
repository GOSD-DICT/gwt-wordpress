<?php
/**
 * Insert default widgets
 * on left sidebar
 *
 * @package GWT
 * @since Government Website Template 2.0
 * eol-41
 */

function govph_default_widget() {

	$templatedir = get_template_directory_uri();
	$new_active_widgets = array (
		'left-sidebar' => array (
			'text-1',
			'text-2'
		),
		'ear-content-2' => array (
			'text-3',
		),
	);
	update_option('widget_text',array( 
		1 => array(
			'title' => '',
			'text' => '<a href=""><img id="tp-seal" src="'. $templatedir . '/images/transparency-seal-160x160.png" alt="transparency seal logo" title="Transparency Seal"></a>',
		),
		2 => array(
			'title' => '',
			'text' => '<a href="https://www.foi.gov.ph/"><img id="foi-logo" src="'. $templatedir . '/images/foi-logo-160x160.png" alt="freedom of infromation logo" title="Freedom of Information"></a>',
		),
		3 => array(
			'title' => '',
			'text' => '<div id="pst-container">
						<div>Philippine Standard Time:</div><div id="pst-time"></div>
					   </div>',
		),
	));
	update_option('sidebars_widgets', $new_active_widgets);
}
add_action('after_switch_theme', 'govph_default_widget', 10, 2);