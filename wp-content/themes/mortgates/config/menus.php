<?php
/**
 * Menus configuration.
 *
 * @package Mortgates
 */

add_action( 'after_setup_theme', 'mortgates_register_menus', 5 );
/**
 * Register menus.
 */
function mortgates_register_menus() {

	register_nav_menus( array(
		'top'    => esc_html__( 'Top', 'mortgates' ),
		'main'   => esc_html__( 'Main', 'mortgates' ),
		'footer' => esc_html__( 'Footer', 'mortgates' ),
		'social' => esc_html__( 'Social', 'mortgates' ),
	) );
}
