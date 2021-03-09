<?php
/**
 * Menus configuration.
 *
 * @package Solidbuild
 */

add_action( 'after_setup_theme', 'solidbuild_register_menus', 5 );
/**
 * Register menus.
 */
function solidbuild_register_menus() {

	register_nav_menus( array(
		'top'          => esc_html__( 'Top', 'solidbuild' ),
		'main'         => esc_html__( 'Main', 'solidbuild' ),
		'main_landing' => esc_html__( 'Landing Main', 'solidbuild' ),
		'footer'       => esc_html__( 'Footer', 'solidbuild' ),
		'social'       => esc_html__( 'Social', 'solidbuild' ),
	) );
}
