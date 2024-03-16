<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @package GWT
 * @since Government Website Template 2.0
 * eol-60
 */

get_header(); 
include_once('inc/banner.php');
?>
		<?php govph_displayoptions( 'govph_panel_top' ); ?>

		<div class="container-main" role="document">
			<div id="main-content" class="row">
				<div id="content" class="<?php govph_displayoptions( 'govph_content_position' ); ?>columns" role="main">
					<?php if ( have_posts() ) : ?>

						<?php
						// Start the loop.
						while ( have_posts() ) : the_post();
						/*
						 * Include the Post-Format-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						get_template_part( 'template-parts/content', get_post_format() );
						// End the loop.
						endwhile;
						gwt_wp_content_nav( 'nav-below' );

						else :
							get_template_part( 'no-results', 'index' ); 
						endif; ?>
				</div><!-- end content -->
				   
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