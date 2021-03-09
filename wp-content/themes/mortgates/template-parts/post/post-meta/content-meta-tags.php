<?php
/**
 * Template part for displaying post tags.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Mortgates
 */

$utility = mortgates_utility()->utility;

if ( 'post' === get_post_type() ) :

	$tags_visible = ( is_single() ) ? mortgates_is_meta_visible( 'single_post_tags', 'single' ) : mortgates_is_meta_visible( 'blog_post_tags', 'loop' );

	$utility->meta_data->get_terms( array(
		'visible'   => $tags_visible,
		'type'      => 'post_tag',
		'before'    => '<div class="post__tags">',
		'after'     => '</div>',
		'echo'      => true,
	) );

endif;
