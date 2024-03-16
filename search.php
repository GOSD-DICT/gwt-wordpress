<?php
/**
 * The template for displaying search results pages
 *
 * @package GWT
 * @since Government Website Template 2.0
 * eol-49
 */

get_header();
include_once('inc/banner.php');
?>

<div id="main-content" class="container-main" role="document">
	<div class="row search-results">
		<div id="content" class="<?php govph_displayoptions( 'govph_content_position' );?> columns">
			<?php if ( have_posts() ) : ?>

				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'template-parts/content', 'search' ); ?>

				<?php endwhile; ?>

				<?php gwt_wp_content_nav( 'nav-below' ); ?>

<?php else : ?>

				<?php get_template_part( 'template-parts/content', 'none' ); ?>

			<?php endif; ?>
		</div>
		<?php 
		if(is_active_sidebar('left-sidebar')){
			govph_displayoptions( 'govph_sidebar_left' );
		}
		?>
		<?php 
		if(is_active_sidebar('right-sidebar')){
			govph_displayoptions( 'govph_sidebar_right' );
		}
		?>		
	</div>
</div>

<?php govph_displayoptions( 'govph_panel_bottom' ); ?>

<?php get_footer(); ?>