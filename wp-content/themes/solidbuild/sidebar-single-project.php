<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Solidbuild
 */
$sidebar_position = get_theme_mod( 'sidebar_position' );

if ( ! is_active_sidebar( 'single-project' ) || 'fullwidth' === $sidebar_position ) {
	return;
}
?>

<?php do_action( 'solidbuild_render_widget_area', 'single-project' );
