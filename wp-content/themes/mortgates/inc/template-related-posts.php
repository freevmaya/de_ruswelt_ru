<?php
/**
 * Related Posts Template Functions.
 *
 * @package Mortgates
 */

/**
 * Print HTML with related posts block.
 *
 * @since  1.0.0
 * @return array
 */
function mortgates_related_posts() {

	if ( ! is_singular( 'post' ) ) {
		return;
	}

	$visible = get_theme_mod( 'related_posts_visible', mortgates_theme()->customizer->get_default( 'related_posts_visible' ) );

	if ( false === $visible ) {
		return;
	}

	global $post;

	$post  = get_post( $post );
	$terms = get_the_terms( $post, 'post_tag' );

	if ( ! $terms ) {
		return;
	}

	$post_terms  = array();
	$post_number = get_theme_mod( 'related_posts_count', mortgates_theme()->customizer->get_default( 'related_posts_count' ) );

	$post_terms = wp_list_pluck( $terms, 'term_id' );

	$post_args = array(
		'post_type'    => 'post',
		'tag__in'      => $post_terms,
		'numberposts'  => (int) $post_number,
		'post__not_in' => array( $post->ID ),
	);

	$posts = get_posts( $post_args );

	if ( ! $posts ) {
		return;
	}

	$utility         = mortgates_utility()->utility;
	$holder_view_dir = mortgates_get_locate_template( 'template-parts/content-related-posts.php' );

	$settings = array(
		'block_title'      => 'related_posts_block_title',
		'title_length'     => 'related_posts_title_length',
		'image_visible'    => 'related_posts_image',
		'content_length'   => 'related_posts_content_length',
		'content_type'     => 'related_posts_content',
		'category_visible' => 'related_posts_categories',
		'tag_visible'      => 'related_posts_tags',
		'author_visible'   => 'related_posts_author',
		'date_visible'     => 'related_posts_publish_date',
		'comment_count'    => 'related_posts_comment_count',
		'layout_columns'   => 'related_posts_grid',
	);

	foreach ( $settings as $setting_key => $setting_value ) {
		$settings[ $setting_key ] = get_theme_mod( $setting_value, mortgates_theme()->customizer->get_default( $setting_value ) );
	}

	$settings['title_visible']   = $settings['title_length'] ? get_theme_mod( 'related_posts_title', mortgates_theme()->customizer->get_default( 'related_posts_title' ) ) : false;
	$settings['content_visible'] = ( 0 === $settings['content_length'] || 'hide' === $settings['content_type'] ) ? false : true;
	$settings['grid_count']      = (int) 12 / $settings['layout_columns'];
	$grid_class                  = 'col-xs-12 col-sm-6 col-md-6 col-lg-6 col-xl-' . $settings['grid_count'];
	$thumb_class                 = $settings['image_visible'] ? 'has-thumb' : 'no-thumb';

	if ( $holder_view_dir ) {

		$block_title_format = apply_filters( 'mortgates_rp_block_title_format', '<h5 class="related-posts__title">%s</h5>' );
		$block_title        = ( $settings['block_title'] ) ? sprintf( $block_title_format, $settings['block_title'] ) : '';
		$accent_color       = get_theme_mod( 'regular_accent_color_1', mortgates_theme()->customizer->get_default( 'regular_accent_color_1' ) );
		$placeholder_bg     = str_replace( '#', '', $accent_color );

		echo '<div class="related-posts posts-list" >'
				. $block_title .
				'<div class="row" >';

		foreach ( $posts as $post ) {
			setup_postdata( $post );

			$image = $utility->media->get_image( apply_filters( 'mortgates_rp_image_settings', array(
				'visible'                => $settings['image_visible'],
				'class'                  => 'post-thumbnail__img',
				'html'                   => '<a href="%1$s" class="post-thumbnail__link post-thumbnail--fullwidth" ><img src="%3$s" alt="%4$s" %2$s %5$s ></a>',
				'size'                   => 'post-thumbnail',
				'mobile_size'            => 'post-thumbnail',
				'placeholder_background' => $placeholder_bg,
				'placeholder_title'      => get_bloginfo( 'name' ),
			) ) );

			$title = $utility->attributes->get_title( apply_filters( 'mortgates_rp_title_settings', array(
				'visible' => $settings['title_visible'],
				'length'  => $settings['title_length'],
				'class'   => 'entry-title',
				'html'    => '<h4 %1$s><a href="%2$s" %3$s rel="bookmark">%4$s</a></h4>',
			) ) );

			$excerpt = $utility->attributes->get_content( apply_filters( 'mortgates_rp_excerpt_settings', array(
				'visible'      => $settings['content_visible'],
				'length'       => $settings['content_length'],
				'content_type' => $settings['content_type'],
			) ) );

			$category = $utility->meta_data->get_terms( apply_filters( 'mortgates_rp_category_settings', array(
				'type'      => 'category',
				'visible'   => $settings['category_visible'],
				'delimiter' => ', ',
				'prefix'    => esc_html__( 'in ', 'mortgates' ),
				'before'    => '<span class="post__cats">',
				'after'     => '</span>',
			) ) );

			$tag = $utility->meta_data->get_terms( apply_filters( 'mortgates_rp_tag_settings', array(
				'type'      => 'post_tag',
				'visible'   => $settings['tag_visible'],
				'before'    => '<div class="post__tags">',
				'after'     => '</div>',
			) ) );

			$author = $utility->meta_data->get_author( apply_filters( 'mortgates_rp_author_settings', array(
				'visible' => $settings['author_visible'],
				'prefix'  => esc_html__( 'by ', 'mortgates' ),
				'class'   => 'posted-by__author',
				'html'    => '<span class="posted-by">%1$s<a href="%2$s" %3$s %4$s rel="author">%5$s%6$s</a></span>',
			) ) );

			$date = $utility->meta_data->get_date( apply_filters( 'mortgates_rp_date_settings', array(
				'visible' => $settings['date_visible'],
				'html'    => '<span class="post__date">%1$s<a href="%2$s" %3$s %4$s ><time datetime="%5$s">%6$s%7$s</time></a></span>',
				'class'   => 'post__date-link',
			) ) );

			$comment_count = $utility->meta_data->get_comment_count( apply_filters( 'mortgates_rp_comment_count_settings', array(
				'visible' => $settings['comment_count'],
				'icon'    => '<i class="fa fa-comments"></i>',
				'html'    => '<span class="post__comments">%1$s<a href="%2$s" %3$s %4$s>%5$s%6$s</a></span>',
				'class'   => 'post__comments-link',
			) ) );

			require( $holder_view_dir );
		} // End foreach().

		echo '</div>
		</div>';

	} // End if().

	wp_reset_postdata();
}
