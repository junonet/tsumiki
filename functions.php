<?php
/**
 * Tsumiki functions and definitions.
 *
 * @link https://codex.wordpress.org/Functions_File_Explained
 *
 * @package Tsumiki
 */

if ( ! function_exists( 'tsumiki_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function tsumiki_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Tsumiki, use a find and replace
	 * to change 'tsumiki' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'tsumiki', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 320, 180, true );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'tsumiki' ),
		'mobile-menu' => esc_html__( 'Mobile Menu', 'tsumiki' ),
		'footer' => esc_html__( 'Footer Menu', 'tsumiki' )
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'tsumiki_custom_background_args', array(
		'default-color' => 'fefefe',
		'default-image' => '',
	) ) );
}
endif; // tsumiki_setup
add_action( 'after_setup_theme', 'tsumiki_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function tsumiki_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'tsumiki_content_width', 750 );
}
add_action( 'after_setup_theme', 'tsumiki_content_width', 0 );


/**
 * Add editor css
 */
function tsumiki_add_editor_styles() {
   add_editor_style( 'editor-style.css' );
}
add_action( 'after_setup_theme', 'tsumiki_add_editor_styles' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function tsumiki_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'tsumiki' ),
		'id'            => 'sidebar-1',
		'description'   => 'Sidebar widget area.',
		'before_widget' => '<aside id="%1$s" class="widget %2$s sidebar-widget mdl-card mdl-shadow--2dp mdl-grid mdl-cell mdl-cell--12-col">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer 1', 'tsumiki' ),
		'id'            => 'footer-1',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h1 class="mdl-mega-footer__heading footer-title">',
		'after_title'   => '</h1>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer 2', 'tsumiki' ),
		'id'            => 'footer-2',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h1 class="mdl-mega-footer__heading footer-title">',
		'after_title'   => '</h1>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer 3', 'tsumiki' ),
		'id'            => 'footer-3',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h1 class="mdl-mega-footer__heading footer-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'tsumiki_widgets_init' );


/**
 * Enqueue scripts and styles.
 */
function tsumiki_scripts() {
	wp_enqueue_style( 'tsumiki-underscores-style', get_template_directory_uri().'/layouts/underscores.css' );

	wp_enqueue_style( 'tsumiki-mdl-material-style', get_template_directory_uri().'/mdl/material.min.css' );

	wp_enqueue_style( 'tsumiki-mdl-icons', '//fonts.googleapis.com/icon?family=Material+Icons');

	wp_enqueue_style( 'tsumiki-style', get_stylesheet_uri() );

	wp_enqueue_script( 'tsumiki-material', get_template_directory_uri() . '/mdl/material.min.js', array(), '', true );

	wp_enqueue_script( 'tsumiki-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'tsumiki-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	wp_enqueue_script( 'tsumiki-matchHeight', get_template_directory_uri() . '/js/jquery.matchHeight-min.js', array( 'jquery' ), '20150901', true );

	wp_enqueue_script( 'tsumiki-tsumiki-js', get_template_directory_uri() . '/js/tsumiki.js', array( 'jquery' ), '20150901', true );


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'tsumiki_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load helpers
 */
require( get_template_directory() . '/inc/functions_helpers.php' );

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * bread-crumb
 */
require get_template_directory() . '/inc/bread-crumb.php';

/**
 * Pagination (for WP 4.0 and earlier versions)
 */
	if (!function_exists('tsumiki_pagination')) {
		function tsumiki_pagination($pages = '', $range = 2) {
			$showitems = ($range * 1)+1;
			global $paged; if(empty($paged)) $paged = 1;
			if($pages == '') {
				global $wp_query; $pages = $wp_query->max_num_pages;
				if(!$pages){ $pages = 1; }
			}
			if(1 != $pages) {
				echo "<div class='pagination mdl-cell mdl-cell--12-col'><ul>";
				if($paged > 2 && $paged > $range+1 && $showitems < $pages)
				echo "<li><a rel='nofollow' href='".get_pagenum_link(1)."' class='mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect'><i class='fa fa-chevron-left'></i> ".__('First','tsumiki')."</a></li>";
				if($paged > 1 && $showitems < $pages)
				echo "<li><a rel='nofollow' href='".get_pagenum_link($paged - 1)."' class='inactive mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect'>&lsaquo; ".__('Previous','tsumiki')."</a></li>";
				for ($i=1; $i <= $pages; $i++){
					if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems )) {
						echo ($paged == $i)? "<li class='current'><span class='currenttext mdl-button mdl-js-button mdl-button--raised mdl-button--colored mdl-js-ripple-effect'>".$i."</span></li>":"<li><a rel='nofollow' href='".get_pagenum_link($i)."' class='mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect'>".$i."</a></li>";
					}
				}
				if ($paged < $pages && $showitems < $pages)
				echo "<li><a rel='nofollow' href='".get_pagenum_link($paged + 1)."' class='inactive mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect'>".__('Next','tsumiki')." &rsaquo;</a></li>";
				if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages)
				echo "<li><a rel='nofollow' class='inactive mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect' href='".get_pagenum_link($pages)."'>".__('Last','tsumiki')." &raquo;</a></li>";
				echo "</ul></div>";
			}
		}
	}

/**
 * Display logo.
 */

if ( ! function_exists( 'tsumiki_logo' ) ) {
	function tsumiki_logo() {
		$logo_image = get_theme_mod( 'logo_image' );
		if ($logo_image) { ?>
			<a href="<?php echo home_url(); ?>" title="<?php bloginfo('name'); ?>">
				<img src="<?php echo esc_url( $logo_image ); ?>" alt="<?php bloginfo('name'); echo ' - '; bloginfo('description'); ?>" />
			</a>
		<?php } else { ?>
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
	<?php }
	}
}



/**
 * the_excerpt
 */
function tsumiki_excerpt_mblength($length) {
     return 30;
}
add_filter('excerpt_mblength', 'tsumiki_excerpt_mblength');

function tsumiki_excerpt_more($more) {
	return '...';
}
add_filter('excerpt_more', 'tsumiki_excerpt_more');
