<?php
/**
 *
 * Template Name: FrontPage
 *
 *
 * @package Tsumiki
 */

get_header(); ?>

	<div class="container container-fluid pt0">
		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">

				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'template-parts/content', 'front' ); ?>

				<?php endwhile; // End of the loop. ?>

			</main><!-- #main -->

			<section class="section">
				<div class="container-fluid">
					<h2 class="section-title mdl-typography--text-center ts">Blog</h2>
						<div class="mdl-grid">
							<?php
							global $post;
							$args = array( 'posts_per_page' => 4 );
							$myposts = get_posts( $args );
							foreach( $myposts as $post ) {
								setup_postdata($post);
							?>
								<div class="mdl-cell mdl-cell--3-col mdl-cell--4-col-tablet mdl-cell--4-col-phone mdl-card mdl-shadow--2dp">
									<div class="matchHeight" data-mh="content">
										<a href="<?php the_permalink(); ?>" alt="<?php the_title(); ?>"><?php the_post_thumbnail('rel_tmn', array('alt'=>get_the_title(), 'title'=>get_the_title())); ?></a>
										<div class="p1em">
											<h4 class="mt0"><a href="<?php the_permalink(); ?>" alt="<?php the_title(); ?>"><?php the_title(); ?></a></h4>
											<?php the_excerpt(); ?>
										</div>
									</div>
									<div class="mdl-card__actions mdl-card--border textright">
										<a class="mdl-button mdl-button--accent mdl-js-button mdl-js-ripple-effect" href="<?php the_permalink(); ?>"><i class="material-icons md-18">&#xE01F;</i> Read more</a>
									</div>
								</div>
							<?php
						}
						wp_reset_postdata();
						?>
					</div>
				</div>
			</section>

		</div><!-- #primary -->
	</div><!-- .container -->

<?php get_footer(); ?>
