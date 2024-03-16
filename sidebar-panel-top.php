<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package gwt_wp
 * eol-39
 */
?>

<?php if(is_active_sidebar('panel-top-1') || is_active_sidebar('panel-top-2') || is_active_sidebar('panel-top-3') || is_active_sidebar('panel-top-4')): ?>
<div id="panel-top" class="anchor" role="complementary">
	<div class="row">
		<?php if(is_active_sidebar('panel-top-1')): ?>
			<aside id="panel-top-1" class="<?php govph_displayoptions( 'govph_position_panel_top' ); ?>" role="complementary">
			<?php do_action( 'before_sidebar' ); ?>
			<?php dynamic_sidebar( 'panel-top-1' ) ?>
		</aside>
		<?php endif; ?>
		<?php if(is_active_sidebar('panel-top-2')): ?>
			<aside id="panel-top-2" class="<?php govph_displayoptions( 'govph_position_panel_top' ); ?>" role="complementary">
			<?php do_action( 'before_sidebar' ); ?>
			<?php dynamic_sidebar( 'panel-top-2' ) ?>
		</aside>
		<?php endif; ?>
		<?php if(is_active_sidebar('panel-top-3')): ?>
			<aside id="panel-top-3" class="<?php govph_displayoptions( 'govph_position_panel_top' ); ?>" role="complementary">
			<?php do_action( 'before_sidebar' ); ?>
			<?php dynamic_sidebar( 'panel-top-3' ) ?>
		</aside>
		<?php endif; ?>
		<?php if(is_active_sidebar('panel-top-4')): ?>
			<aside id="panel-top-4" class="<?php govph_displayoptions( 'govph_position_panel_top' ); ?>" role="complementary">
			<?php do_action( 'before_sidebar' ); ?>
			<?php dynamic_sidebar( 'panel-top-4' ) ?>
			</aside>
		<?php endif; ?>
	</div>
</div>
<?php endif; ?>