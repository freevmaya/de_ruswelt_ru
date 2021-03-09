<?php
/**
 * Template part for displaying post author.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Mortgates
 */

$utility = mortgates_utility()->utility;

if ( 'post' === get_post_type() ) :

	$author_visible   = ( is_single() ) ? mortgates_is_meta_visible( 'single_post_author', 'single' ) : mortgates_is_meta_visible( 'blog_post_author', 'loop' );
	$blog_layout_type = get_theme_mod( 'blog_layout_type', mortgates_theme()->customizer->get_default( 'blog_layout_type' ) );
	$avatar           = get_avatar( get_the_author_meta( 'user_email' ), 50, '', esc_attr( get_the_author_meta( 'nickname' ) ) );
	$html             = ( 'default' === $blog_layout_type || is_single() ) ? '<span class="posted-by">%1$s<a href="%2$s" %3$s %4$s rel="author">%5$s%6$s</a></span>' : '<div class="posted-by posted-by--avatar"><div class="posted-by__avatar">' . $avatar . '</div><div class="posted-by__content">%1$s<a href="%2$s" %3$s %4$s rel="author">%5$s%6$s</a></div></div>';

	$utility->meta_data->get_author( array(
		'visible' => $author_visible,
		'class'   => 'posted-by__author',
		'prefix'  => esc_html__( 'by ', 'mortgates' ),
		'html'    => $html,
		'echo'    => true,
	) );

endif;
