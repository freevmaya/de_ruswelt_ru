<?php
/**
 * Template part for displaying post video.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Mortgates
 */

$utility    = mortgates_utility()->utility;
$size       = mortgates_post_thumbnail_size();
$size_array = $utility->satellite->get_thumbnail_size_array( $size['size'] );

do_action( 'cherry_post_format_video', array(
	'width'  => $size_array['width'],
	'height' => $size_array['height'],
) );
