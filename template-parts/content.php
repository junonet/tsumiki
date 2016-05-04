<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Tsumiki
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('mdl-card mdl-shadow--2dp mdl-cell mdl-cell--12-col mb2em'); ?>>
	<header class="entry-header mdl-cell mdl-cell--12-col">
		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

		<?php if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php tsumiki_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content mdl-cell mdl-cell--12-col">
		<div class="alignleft mt1em">
			<?php
				if ( has_post_thumbnail() ) {
					the_post_thumbnail();
				}
			?>
		</div>
		<?php
			the_excerpt( sprintf(
				/* translators: %s: Name of current post. */
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'tsumiki' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );
		?>

		<div class="mdl-card__actions textright">
      <a class="mdl-button mdl-button--accent mdl-js-button mdl-js-ripple-effect" href="<?php the_permalink(); ?>"><i class="material-icons md-18">&#xE01F;</i> Read more</a>
    </div>

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
