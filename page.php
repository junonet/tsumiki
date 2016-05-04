<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
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

        <?php while ( have_posts() ) : the_post(); ?>

          <?php get_template_part( 'template-parts/content', 'page' ); ?>

        <?php endwhile; // End of the loop. ?>

      </main><!-- #main -->
    </div><!-- #primary -->
    <?php get_sidebar(); ?>
  </div><!-- .container -->


<?php get_footer(); ?>
