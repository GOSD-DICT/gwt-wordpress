<?php
/**
 * The template part for displaying single posts
 *
 * @package GWT
 * @since Government Website Template 2.0
  * eol-25
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<!-- entry-content -->
	<div class="entry-content">
		<div class="entry-meta">
			<?php gwt_wp_posted_on(); ?>
			<p></p>
		</div>
		<?php the_content(); ?>
		<?php
			wp_link_pages( ['before' => '<div class="page-links">' . __( 'Pages:', 'gwt_wp' ), 'after'  => '</div>'] );
		?>
	</div>

</article>