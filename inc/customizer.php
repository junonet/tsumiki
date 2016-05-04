<?php
/**
 * Tsumiki Theme Customizer.
 *
 * @package Tsumiki
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function tsumiki_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport				 = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport	= 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	//logo upload
	$wp_customize->add_setting(
		'logo_image' , array(
			'default'		 => '',
			'sanitize_callback' => 'esc_url_raw',
			));

	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'logo_image',
			array(
				'label' => __( 'Logo Image', 'tsumiki' ),
				'section' => 'title_tagline',
				'settings' => 'logo_image',
			)
		)
	);
}
add_action( 'customize_register', 'tsumiki_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function tsumiki_customize_preview_js() {
	wp_enqueue_script( 'tsumiki_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'tsumiki_customize_preview_js' );
