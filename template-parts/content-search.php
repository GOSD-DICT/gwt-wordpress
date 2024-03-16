<?php
/**
 * The template part for displaying results in search pages
 *
 * @package GWT
 * @since Government Website Template 2.0
 * eol-53
 */
?>

<div class="post-box">
	<article id="post-<?php the_ID(); ?>" <?php post_class('callout secondary'); ?>>

		<?php 
			$content_class = 'large-12';
			if(has_post_thumbnail()) : 
				$content_class = 'large-9';
				the_post_thumbnail( 'thumbnail', ['class' => 'thumbnail'] );
			endif;
		?>

		<div class="entry-wrapper <?php echo $content_class; ?> medium-12 small-12">
			<!-- entry-header -->
			<header class="entry-header">
				<h2 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
				<div class="entry-meta">
					<?php gwt_wp_posted_on(); ?>
				</div>
			</header>


			<!-- entry-summary entry-content -->
			<?php if ( is_search() ) : // Only display Excerpts for Search ?>
				<div class="entry-summary">
					<?php the_excerpt(); ?>
				</div>
<?php else : ?>
				<div class="entry-content">
					<?php the_excerpt(); ?>
					<?php
						wp_link_pages( ['before' => '<div class="page-links">' . __( 'Pages:', 'gwt_wp' ), 'after'  => '</div>'] );
					?>
				</div>
			<?php endif; ?>

			<!-- footer entry-meta -->
			<footer class="entry-meta">
				<?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search ?>
<?php endif; ?>
			</footer>
		</div>
	</article>
</div>