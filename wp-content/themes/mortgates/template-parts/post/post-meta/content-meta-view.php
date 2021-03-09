<?php
/**
 * Template part for displaying post view.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Mortgates
 */

if ( 'post' === get_post_type() ) :

	$view_visible = ( is_single() ) ? mortgates_is_meta_visible( 'single_post_trend_views', 'single' ) : mortgates_is_meta_visible( 'blog_post_trend_views', 'loop' );

	if ( $view_visible ) :

		do_action( 'cherry_trend_posts_display_views' );

	endif;

endif;
