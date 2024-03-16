<?php
/**
 * The template part for displaying page content
 *
 * @package GWT
 * @since Government Website Template 2.0
 * eol-21
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<!-- entry-content -->
	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( ['before' => '<div class="page-links">' . __( 'Pages:', 'gwt_wp' ), 'after'  => '</div>'] );
		?>
	</div>

</article>