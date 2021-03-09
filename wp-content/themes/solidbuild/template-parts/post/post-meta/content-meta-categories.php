<?php
/**
 * Template part for displaying post categories.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Solidbuild
 */

$utility = solidbuild_utility()->utility;

if ( 'post' === get_post_type() ) :

	$cats_visible = ( is_single() ) ? solidbuild_is_meta_visible( 'single_post_categories', 'single' ) : solidbuild_is_meta_visible( 'blog_post_categories', 'loop' );

	$utility->meta_data->get_terms( array(
		'visible'   => $cats_visible,
		'type'      => 'category',
		'delimiter' => ', ',
		'prefix'    => esc_html( 'in ', 'solidbuild' ),
		'before'    => '<span class="post__cats">',
		'after'     => '</span>',
		'echo'      => true,
	) );

endif;
