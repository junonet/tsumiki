<?php
/**
 * Tsumiki functions and definitions.
 *
 * @link https://codex.wordpress.org/Functions_File_Explained
 *
 * @package Tsumiki
 */

/**
 * copyright
 */
function tsumiki_copyright() {
	$theme_url     = 'http://junonet.biz/';
	$wordpress_url = 'http://wordpress.org/';
	$theme_link = sprintf(
		'<a href="%s" target="_blank">%s</a>',
		esc_url( $theme_url ),
		__( 'Junonet', 'tsumiki' )
	);
	$wordpress_link = sprintf(
		'<a href="%s" target="_blank">%s</a>',
		esc_url( $wordpress_url ),
		__( 'WordPress', 'tsumiki' )
	);
	$theme_by   = sprintf( __( 'Tsumiki theme by %s &amp;', 'tsumiki' ), $theme_link );
	$powered_by = sprintf( __( 'Powered by %s', 'tsumiki' ), $wordpress_link );
	$copyright  = sprintf(
		'%s&nbsp;%s',
		$theme_by,
		$powered_by
	);

	echo apply_filters( 'tsumiki_copyright', $copyright );
}
