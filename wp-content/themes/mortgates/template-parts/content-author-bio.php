<?php
/**
 * The template for displaying author bio.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Mortgates
 */

if ( ! get_the_author_meta( 'description' ) ) {
	return;
}
?>
<div class="post-author-bio">
	<div class="post-author__holder clear">
		<div class="post-author__avatar"><?php
			echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'mortgates_author_bio_avatar_size', 85 ), '', esc_attr( get_the_author_meta( 'nickname' ) ) );
		?></div>
		<h3 class="post-author__title"><?php the_author_posts_link(); ?></h3>
		<div class="post-author__content"><?php
			echo get_the_author_meta( 'description' );
		?></div>
	</div>
</div><!--.post-author-bio-->
