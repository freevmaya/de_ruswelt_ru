<?php
/**
 * Loop item meta
 */

if ( 'yes' !== $this->get_attr( 'show_meta' ) ) {
	return;
}

echo '<div class="post-meta entry-meta">';

	jet_elements()->utility()->meta_data->get_date( array(
		'visible' => $this->get_attr( 'show_date' ),
		'class'   => 'post__date-link',
		'icon'    => '',
		'html'    => '<span class="post__date post-meta__item">%1$s<a href="%2$s" %3$s %4$s ><time datetime="%5$s" title="%5$s">%6$s%7$s</time></a></span>',
		'echo'    => true,
	) );

	jet_elements()->utility()->meta_data->get_terms( array(
		'visible'   => $this->get_attr( 'show_category' ),
		'type'      => 'category',
		'delimiter' => ', ',
		'prefix'    => esc_html__( 'in ', 'mortgates' ),
		'before'    => '<span class="post__cats post-meta__item">',
		'after'     => '</span>',
		'echo'      => true,
	) );

	jet_elements()->utility()->meta_data->get_comment_count( array(
		'visible' => $this->get_attr( 'show_comments' ),
		'class'   => 'post__comments-link',
		'icon'    => '<i class="fa fa-comments"></i>',
		'html'    => '<span class="post__comments post-meta__item">%1$s<a href="%2$s" %3$s %4$s>%5$s%6$s</a></span>',
		'echo'    => true,
	) );

echo '</div>';
