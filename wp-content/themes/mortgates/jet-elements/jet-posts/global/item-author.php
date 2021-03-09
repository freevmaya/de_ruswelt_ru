<?php
/**
 * Loop item author
 */
if ( 'yes' !== $this->get_attr( 'show_meta' ) ) {
	return;
}

$avatar_size = intval( $this->get_attr( 'avatar_size' ) );
$avatar      = get_avatar( get_the_author_meta( 'user_email' ), $avatar_size, '', esc_attr( get_the_author_meta( 'nickname' ) ) );
$html        = '<div class="posted-by posted-by--avatar"><div class="posted-by__avatar">' . $avatar . '</div><div class="posted-by__content">%1$s<a href="%2$s" %3$s %4$s rel="author">%5$s%6$s</a></div></div>';

jet_elements()->utility()->meta_data->get_author( array(
	'visible' => $this->get_attr( 'show_author' ),
	'class'   => 'posted-by__author',
	'prefix'  => esc_html__( 'by ', 'mortgates' ),
	'html'    => $html,
	'echo'    => true,
) );
