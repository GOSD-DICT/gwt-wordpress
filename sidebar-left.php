<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package gwt_wp
 * eol-15
 */
?>
<?php if ( is_active_sidebar( 'left-sidebar' ) ) : ?>
<aside id="sidebar-left" class="<?php govph_displayoptions( 'govph_sidebar_position_left' ); ?>columns" role="complementary">
	<?php do_action( 'before_sidebar' ); ?>
	<?php dynamic_sidebar( 'left-sidebar' ); ?>
</aside>
<?php endif; ?>