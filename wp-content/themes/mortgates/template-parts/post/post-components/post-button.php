<?php
/**
 * Template part for displaying post read more button.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Mortgates
 */

$utility     = mortgates_utility()->utility;
$btn_visible = get_theme_mod( 'blog_read_more_btn', mortgates_theme()->customizer->get_default( 'blog_read_more_btn' ) );
$btn_text    = get_theme_mod( 'blog_read_more_text', mortgates_theme()->customizer->get_default( 'blog_read_more_text' ) );

$utility->attributes->get_button( array(
	'visible' => $btn_visible,
	'class'   => 'post__button btn-link',
	'text'    => $btn_text,
	'icon'    => '<i class="fa fa-chevron-right"></i>',
	'html'    => '<div class="post__button-wrap"><a href="%1$s" %3$s><span class="btn__text">%4$s</span>%5$s</a></div>',
	'echo'    => true,
) );
