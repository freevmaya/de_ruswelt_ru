<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Mortgates
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'posts-list__item card' ); ?>>

	<?php $blog_layout_type = get_theme_mod( 'blog_layout_type', mortgates_theme()->customizer->get_default( 'blog_layout_type' ) ); ?>

	<?php if ( 'default' === $blog_layout_type ) : ?>

		<div class="post-featured-content"><?php
			mortgates_get_template_part( 'template-parts/post/post-components/post-video' );
		?></div><!-- .post-featured-content -->

		<div class="posts-list__item-content">

			<header class="entry-header">
				<div class="entry-meta"><?php
					mortgates_get_template_part( 'template-parts/post/post-meta/content-meta-date' );
					mortgates_get_template_part( 'template-parts/post/post-meta/content-meta-categories' );
					mortgates_get_template_part( 'template-parts/post/post-meta/content-meta-comments' );
					mortgates_get_template_part( 'template-parts/post/post-meta/content-meta-author' );
					mortgates_get_template_part( 'template-parts/post/post-meta/content-meta-view' );
				?></div>
				<?php mortgates_get_template_part( 'template-parts/post/post-components/post-title' ); ?>
			</header><!-- .entry-header -->

			<div class="entry-content"><?php
				mortgates_get_template_part( 'template-parts/post/post-components/post-content' );
			?></div><!-- .entry-content -->

			<footer class="entry-footer">
				<div class="entry-footer-container"><?php
					mortgates_get_template_part( 'template-parts/post/post-meta/content-meta-tags' );
					mortgates_share_buttons( 'loop' );
					mortgates_get_template_part( 'template-parts/post/post-components/post-button' );
				?></div>
			</footer><!-- .entry-footer -->
		</div><!-- .posts-list__item-content -->

	<?php else: ?>

		<div class="post-featured-content"><?php
			mortgates_get_template_part( 'template-parts/post/post-components/post-video' );
		?></div><!-- .post-featured-content -->

		<div class="posts-list__item-content">

			<header class="entry-header">
				<?php mortgates_get_template_part( 'template-parts/post/post-meta/content-meta-tags' ); ?>
				<?php mortgates_get_template_part( 'template-parts/post/post-components/post-title' ); ?>
				<div class="entry-meta"><?php
					mortgates_get_template_part( 'template-parts/post/post-meta/content-meta-date' );
					mortgates_get_template_part( 'template-parts/post/post-meta/content-meta-categories' );
					mortgates_get_template_part( 'template-parts/post/post-meta/content-meta-comments' );
					if ( 'post' === get_post_type() ) :
						do_action( 'cherry_trend_posts_display_views' );
					endif;
				?></div>
			</header><!-- .entry-header -->

			<div class="entry-content"><?php
				mortgates_get_template_part( 'template-parts/post/post-components/post-content' );
			?></div><!-- .entry-content -->

			<footer class="entry-footer">
				<div class="entry-meta"><?php
					mortgates_get_template_part( 'template-parts/post/post-meta/content-meta-author' );
				?></div>
				<div class="entry-footer-container"><?php
					mortgates_share_buttons( 'loop' );
					mortgates_get_template_part( 'template-parts/post/post-components/post-button' );
				?></div>
			</footer><!-- .entry-footer -->
		</div><!-- .posts-list__item-content -->

	<?php endif; ?>

</article><!-- #post-## -->
