<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
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
			<?php if ( have_posts() ) : ?>

				<header class="page-header p8 ts">
					<?php
						the_archive_title( '<h1 class="page-title">', '</h1>' );
						the_archive_description( '<div class="taxonomy-description">', '</div>' );
					?>
				</header><!-- .page-header -->

				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>

					<?php

						/*
						 * Include the Post-Format-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						get_template_part( 'template-parts/content', get_post_format() );
					?>

				<?php endwhile; ?>

				<?php tsumiki_pagination(); ?>

			<?php else : ?>

				<?php get_template_part( 'template-parts/content', 'none' ); ?>

			<?php endif; ?>

      </main><!-- #main -->
    </div><!-- #primary -->
    <?php get_sidebar(); ?>
  </div><!-- .container -->

<?php get_footer(); ?>
