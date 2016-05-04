<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Tsumiki
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('mdl-card mdl-shadow--2dp mdl-cell mdl-cell--12-col'); ?>>

	<header class="entry-header mdl-cell mdl-cell--12-col">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		<div class="entry-meta">
			<?php tsumiki_posted_on(); ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<div class="entry-content mdl-cell mdl-cell--12-col">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'tsumiki' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer border-top">
		<?php tsumiki_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->

