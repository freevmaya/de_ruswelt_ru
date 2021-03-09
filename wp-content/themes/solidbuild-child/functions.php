<?php
/**
 * Child functions and definitions.
 */
add_action( 'wp_enqueue_scripts', 'solidbuild_child_theme_enqueue_styles', 20 );

/**
 * Enqueue styles.
 */
function solidbuild_child_theme_enqueue_styles() {

	$parent_style = 'solidbuild-theme-style';

	wp_enqueue_style( $parent_style,
		get_template_directory_uri() . '/style.css',
		array( 'font-awesome', 'magnific-popup', 'nucleo-outline', 'nucleo-mini' )
	);

	wp_enqueue_style( 'solidbuild-child-theme-style',
		get_stylesheet_directory_uri() . '/style.css',
		array( $parent_style ),
		wp_get_theme()->get( 'Version' )
	);
}

function wpschool_insert_header() {
    echo '<meta name="facebook-domain-verification" content="7hwh0sn05vf7g57osonqxa3ltpinq5" />'."\n";
}

add_action( 'wp_head', 'wpschool_insert_header' );


