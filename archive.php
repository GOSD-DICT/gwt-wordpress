<?php
/**
 * The template for displaying archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each one. For example, tag.php (Tag archives),
 * category.php (Category archives), author.php (Author archives), etc.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package GWT
 * @since Government Website Template 2.0
 *eol-65
 */

get_header();
include_once('inc/banner.php');
?>
<?php govph_displayoptions( 'govph_panel_top' ); ?>

	<div id="container-main" class="container-main" role="document">
		<div id="main-content" class="row">
			<div id="content" class="<?php govph_displayoptions( 'govph_content_position' ); ?>columns" role="main">
				<?php if ( have_posts() ) : ?>
					<?php /* Start the Loop */ ?>
					<?php while ( have_posts() ) : the_post(); ?>

						<?php
							/* Include the Post-Format-specific template for the content.
							 * If you want to overload this in a child theme then include a file
							 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
							 */
							get_template_part( 'template-parts/content', get_post_format() );
						?>

					<?php endwhile; ?>

					<?php gwt_wp_content_nav( 'nav-below' ); ?>

<?php else : ?>

					<?php get_template_part( 'no-results', 'archive' ); ?>

				<?php endif; ?>
			</div><!-- #content -->
			
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
		</div><!-- #main -->
	</div><!-- #primary -->

<?php govph_displayoptions( 'govph_panel_bottom' ); ?>

<?php get_footer(); ?>