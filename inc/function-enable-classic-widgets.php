<?php
// This is an option in themes options page to disable widget block editor
if(!govph_displayoptions( 'govph_enable_widget_classic_editor' )){
	add_filter( 'use_widgets_block_editor', '__return_false' );
}
// End for disable block editor