<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Mortgates
 */
$sidebar_position = get_theme_mod( 'sidebar_position', mortgates_theme()->customizer->get_default( 'sidebar_position' ) );

if ( 'fullwidth' === $sidebar_position ) {
	return;
}

if ( is_active_sidebar( 'sidebar' ) ) {
	do_action( 'mortgates_render_widget_area', 'sidebar' );
}
