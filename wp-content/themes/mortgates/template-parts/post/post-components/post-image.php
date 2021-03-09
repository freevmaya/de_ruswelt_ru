<?php
/**
 * Template part for displaying post featured image.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Mortgates
 */

$utility = mortgates_utility()->utility;
$html    = ( is_single() ) ? '<img class="post-thumbnail__img wp-post-image" src="%3$s" alt="%4$s" %5$s>' : '<a href="%1$s" %2$s><img class="post-thumbnail__img wp-post-image" src="%3$s" alt="%4$s" %5$s></a>';
$size    = mortgates_post_thumbnail_size( array(
	'class_prefix' => 'post-thumbnail--',
) );

$utility->media->get_image( array(
	'size'        => $size['size'],
	'mobile_size' => $size['size'],
	'class'       => 'post-thumbnail__link ' . $size['class'],
	'html'        => $html,
	'placeholder' => false,
	'echo'        => true,
) );
