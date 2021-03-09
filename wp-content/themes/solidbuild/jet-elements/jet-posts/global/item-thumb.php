<?php
/**
 * Loop item thumbnail
 */

if ( 'yes' !== $this->get_attr( 'show_image' ) ) {
	return;
} ?>

<div class="post-thumbnail__wrap">

<?php

if ( 'yes' == $this->get_attr( 'show_meta' ) ) {
	jet_elements()->utility()->meta_data->get_date( array(
		'html'        => '<div class="post__date post__date-circle"><a href="%2$s" %3$s %4$s ><time datetime="%5$s">',
		'class'       => 'post__date-link',
		'echo'        => true,
	) );

	jet_elements()->utility()->meta_data->get_date( array(
		'date_format' => 'd',
		'html'        => '<span class="post__date-day">%6$s%7$s</span>',
		'class'       => 'post__date-link',
		'echo'        => true,
	) );

	jet_elements()->utility()->meta_data->get_date( array(
		'date_format' => 'M',
		'html'        => '<span class="post__date-month">%6$s%7$s</span>',
		'class'       => 'post__date-link',
		'echo'        => true,
	) );

	jet_elements()->utility()->meta_data->get_date( array(
		'html'        => '</time></a></div>',
		'class'       => 'post__date-link',
		'echo'        => true,
	) );
}

jet_elements()->utility()->media->get_image( array(
	'size'        => $this->get_attr( 'thumb_size' ),
	'class'       => 'post-thumbnail__link',
	'html'        => '<div class="post-thumbnail"><a href="%1$s" %2$s><img class="post-thumbnail__img wp-post-image" src="%3$s" alt="%4$s" %5$s></a></div>',
	'placeholder' => false,
	'echo'        => true,
) );

?>

</div>
