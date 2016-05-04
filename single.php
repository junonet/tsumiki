<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Tsumiki
 */

get_header(); ?>

	<div class="container">
		<div id="primary" class="content-area mdl-cell mdl-cell--8-col-desktop mdl-cell--8-col-tablet mdl-cell--4-col-phone">
			<main id="main" class="site-main" role="main">
				<div class="bread mdl-shadow--1dp mdl-grid m8">
					<?php if ( function_exists( 'bread_crumb' ) ) { bread_crumb(); } ?>
				</div>

				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'template-parts/content', 'single' ); ?>

					<?php
					the_post_navigation(array(
						'prev_text' => '<button class="mdl-button mdl-button--colored mdl-js-button mdl-button--fab mdl-js-ripple-effect"><i class="material-icons">navigate_before</i></button>',
						'next_text' => '<button class="mdl-button mdl-button--colored mdl-js-button mdl-button--fab mdl-js-ripple-effect"><i class="material-icons">navigate_next</i></button>'
					));
					?>
					<?php
						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;
					?>

				<?php endwhile; // End of the loop. ?>

			</main><!-- #main -->
		</div><!-- #primary -->
		<?php get_sidebar(); ?>
	</div><!-- .container -->


<?php get_footer(); ?>
