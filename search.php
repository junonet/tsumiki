<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Tsumiki
 */

get_header(); ?>

	<div class="container">
		<section id="primary" class="content-area mdl-cell mdl-cell--8-col-desktop mdl-cell--8-col-tablet mdl-cell--4-col-phone">
			<main id="main" class="site-main" role="main">
        <div class="bread mdl-shadow--1dp mdl-grid m8">
          <?php if ( function_exists( 'bread_crumb' ) ) { bread_crumb(); } ?>
        </div>
			<?php if ( have_posts() ) : ?>

				<header class="page-header p8 ts">
					<h1 class="page-title"><?php printf( esc_html__( 'Search Results for: %s', 'tsumiki' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
				</header><!-- .page-header -->

				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>

					<?php
					/**
					 * Run the loop for the search to output the results.
					 * If you want to overload this in a child theme then include a file
					 * called content-search.php and that will be used instead.
					 */
					get_template_part( 'template-parts/content', 'search' );
					?>

				<?php endwhile; ?>

				<?php the_posts_navigation(); ?>

			<?php else : ?>

				<?php get_template_part( 'template-parts/content', 'none' ); ?>

			<?php endif; ?>

			</main><!-- #main -->
		</section><!-- #primary -->
    <?php get_sidebar(); ?>
  </div><!-- .container -->
<?php get_footer(); ?>
