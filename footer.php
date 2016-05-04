<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and l content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Tsumiki
 */

?>

	</div><!-- #content -->

  <?php $args = array(
        'theme_location' => 'footer',
        'menu_class' => 'mdl-mega-footer__link-list',
        'container_class' => 'mdl-mega-footer__top-section',
    );
    if (has_nav_menu('footer')) {
        wp_nav_menu($args);
    }
  ?>
	<footer id="colophon" class="site-footer mdl-mega-footer" role="contentinfo">
    <div class="mdl-mega-footer__middle-section">
      <div class="mdl-grid">
        <div class="left mdl-cell mdl-cell--4-col-desktop mdl-cell--4-col-tablet mdl-cell--4-col-phone">
          <?php dynamic_sidebar( 'footer-1' ); ?>
        </div>
        <div class="left mdl-cell mdl-cell--4-col-desktop mdl-cell--4-col-tablet mdl-cell--4-col-phone">
          <?php dynamic_sidebar( 'footer-2' ); ?>
        </div>
        <div class="left mdl-cell mdl-cell--4-col-desktop mdl-cell--4-col-tablet mdl-cell--4-col-phone">
          <?php dynamic_sidebar( 'footer-3' ); ?>
        </div>
      </div>
    </div>

		<div class="site-info">
      <?php tsumiki_copyright(); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->

  </div> <!-- .mdl-layout__content -->
</div><!-- #page -->

<button id="scroll-up-btn" class="mdl-button mdl-button--colored mdl-js-button mdl-button--fab mdl-js-ripple-effect"><i class="material-icons">expand_less</i></button>


<!-- <a href="#content" id="ToTop">
  <button class="mdl-button mdl-button--colored mdl-js-button mdl-button--fab mdl-js-ripple-effect">
  <i class="material-icons">expand_less</i>
  </button>
</a> -->

<?php wp_footer(); ?>

</body>
</html>
