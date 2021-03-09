<?php
/**
 * The template for displaying elementor library single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Mortgates
 */
while ( have_posts() ) : the_post();

	mortgates_get_template_part( 'template-parts/page/content', 'page' );

endwhile; // End of the loop.
