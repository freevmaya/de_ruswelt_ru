<?php
/**
 * Template part for displaying post rating.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Mortgates
 */

if ( 'post' === get_post_type() ) :

	$rating_visible = mortgates_is_meta_visible( 'single_post_trend_rating', 'single' );

	if ( $rating_visible ) :

		do_action( 'cherry_trend_posts_display_rating' );

	endif;

endif;
