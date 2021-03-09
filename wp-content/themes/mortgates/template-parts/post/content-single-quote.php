<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Mortgates
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php mortgates_ads_post_before_content() ?>

	<div class="post-featured-content"><?php
		do_action( 'cherry_post_format_quote' );
	?></div><!-- .post-featured-content -->

	<figure class="post-thumbnail"><?php
		mortgates_get_template_part( 'template-parts/post/post-components/post-image' );
	?></figure><!-- .post-thumbnail -->

	<header class="entry-header">
		<div class="entry-meta"><?php
			mortgates_get_template_part( 'template-parts/post/post-meta/content-meta-date' );
			mortgates_get_template_part( 'template-parts/post/post-meta/content-meta-categories' );
			mortgates_get_template_part( 'template-parts/post/post-meta/content-meta-comments' );
			mortgates_get_template_part( 'template-parts/post/post-meta/content-meta-author' );
			mortgates_get_template_part( 'template-parts/post/post-meta/content-meta-view' );
		?></div>
		<?php mortgates_get_template_part( 'template-parts/post/post-components/post-title' ); ?>
	</header>

	<div class="entry-content">
		<?php the_content(); ?>
		<?php wp_link_pages( array(
			'before'      => '<div class="page-links"><span class="page-links__title">' . esc_html__( 'Pages:', 'mortgates' ) . '</span>',
			'after'       => '</div>',
			'link_before' => '<span class="page-links__item">',
			'link_after'  => '</span>',
			'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'mortgates' ) . ' </span>%',
			'separator'   => '<span class="screen-reader-text">, </span>',
		) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<div class="entry-footer-container"><?php
			mortgates_get_template_part( 'template-parts/post/post-meta/content-meta-tags' );
			mortgates_share_buttons( 'single' );
		?></div>
		<?php mortgates_get_template_part( 'template-parts/post/post-meta/content-meta-rating' ); ?>
	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
