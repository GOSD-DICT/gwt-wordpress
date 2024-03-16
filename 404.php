<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package GWT
 * @since Government Website Template 2.0
 * eol31
 */

get_header();
?>

<div id="main-content" class="row container-main" >
	<div class="large-2 medium-2 columns"><p></p></div>
	
	<div class="large-8 medium-8 columns">
		<div class="notfound">
			<h1 class="page-title"><?php _e( 'Sorry, the page you are looking for cannot be found', 'gwt_wp' ); ?></h1>
			
			<div class="page-content notfound">
				<p>The page you requested may have been moved to a new location or removed from the site. 
				<br>Go back to the <a href="<?php echo esc_url(home_url())?>">HOME PAGE</a> or find what you are looking for in the search box below.</p>
				<aside class="search-404"><?php get_search_form(); ?></aside>
			</div>
		</div>
	</div>
	
	<div class="large-2 medium-2 columns"><p></p></div>
</div>

<?php get_footer(); ?>