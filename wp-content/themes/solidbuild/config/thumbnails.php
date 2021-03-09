<?php
/**
 * Thumbnails configuration.
 *
 * @package Solidbuild
 */

add_action( 'after_setup_theme', 'solidbuild_register_image_sizes', 5 );
/**
 * Register image sizes.
 */
function solidbuild_register_image_sizes() {
	set_post_thumbnail_size( 360, 203, true );

	// Registers a new image sizes.
	add_image_size( 'solidbuild-thumb-s', 150, 150, true );
	add_image_size( 'solidbuild-thumb-m', 460, 460, true );
	add_image_size( 'solidbuild-thumb-l', 660, 371, true );
	add_image_size( 'solidbuild-thumb-l-2', 766, 203, true );
	add_image_size( 'solidbuild-thumb-xl', 1160, 508, true );

	add_image_size( 'solidbuild-thumb-masonry', 560, 9999 );

	add_image_size( 'solidbuild-slider-thumb', 150, 86, true );

	add_image_size( 'solidbuild-thumb-78-78', 78, 78, true );
	add_image_size( 'solidbuild-thumb-260-147', 260, 147, true );
	add_image_size( 'solidbuild-thumb-260-195', 260, 195, true );
	add_image_size( 'solidbuild-thumb-260-260', 260, 260, true );
	add_image_size( 'solidbuild-thumb-360-270', 360, 270, true );
	add_image_size( 'solidbuild-thumb-480-271', 480, 271, true );
	add_image_size( 'solidbuild-thumb-480-360', 480, 360, true );
	add_image_size( 'solidbuild-thumb-560-315', 560, 315, true );
	add_image_size( 'solidbuild-thumb-660-495', 660, 495, true );
	add_image_size( 'solidbuild-thumb-760-571', 760, 571, true );
	add_image_size( 'solidbuild-custom-post-370-216', 370, 216, true );
}
