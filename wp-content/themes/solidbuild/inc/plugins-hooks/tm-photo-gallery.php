<?php
/**
 * Tm-photo-gallery hooks.
 *
 * @package Solidbuild
 */

// Customization tm-photo-gallery plugin.
add_filter( 'theme_mod_sidebar_position', 'solidbuild_gallery_single_sidebar_position' );

add_filter( 'theme_mod_content_container_type', 'solidbuild_gallery_single_content_fullwidth' );

/**
 * Disable sidebar to single gallery albums & sets.
 */
function solidbuild_gallery_single_sidebar_position( $value ) {

	if ( is_singular( 'tm_pg_album' ) || is_singular('tm_pg_set') ) {
		return 'fullwidth';
	}

	return $value;
}

/**
 * Fullwidth single gallery albums & sets.
 */
function solidbuild_gallery_single_content_fullwidth( $value ) {

	if ( is_singular( 'tm_pg_album' ) || is_singular('tm_pg_set') ) {
		return 'fullwidth';
	}

	return $value;
}
