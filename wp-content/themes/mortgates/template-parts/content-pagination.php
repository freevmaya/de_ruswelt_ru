<?php
/**
 * Template part for posts pagination.
 *
 * @package Mortgates
 */

the_posts_pagination(
	array(
		'prev_text' => '<i class="fa fa-chevron-left"></i>',
		'next_text' => '<i class="fa fa-chevron-right"></i>',
	)
);
