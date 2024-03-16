<?php
// This is to disable post block editor
if(!govph_displayoptions('govph_enable_post_classic_editor')){
	add_filter( 'use_block_editor_for_post', '__return_false' );
}
// End for disable block editor on post