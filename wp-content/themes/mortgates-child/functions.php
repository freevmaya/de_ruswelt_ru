<?php
/**
 * Child functions and definitions.
 */
add_action( 'wp_enqueue_scripts', 'mortgates_child_theme_enqueue_styles', 20 );

/**
 * Enqueue styles.
 */
function mortgates_child_theme_enqueue_styles() {

	$parent_style = 'mortgates-theme-style';

	wp_enqueue_style( $parent_style,
		get_template_directory_uri() . '/style.css',
		array( 'font-awesome', 'magnific-popup', 'jquery-swiper', 'iconsmind', 'linearicons-free', 'materialdesignicons' )
	);
	wp_enqueue_style(
		'mortgates-child-theme-style', get_stylesheet_uri(), array( $parent_style ), wp_get_theme()->get( 'Version' )
	);
}
