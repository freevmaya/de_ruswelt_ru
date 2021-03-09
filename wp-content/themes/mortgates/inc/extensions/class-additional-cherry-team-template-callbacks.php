<?php
/**
 * Additional template callbacks for Cherry Team Members Plugin.
 *
 * @package Mortgates
 */
if ( ! class_exists( 'Cherry_Team_Members_Template_Callbacks' ) ) {
	return;
}

/**
 * Class Mortgates_Additional_Cherry_Team_Template_Callbacks.
 */
class Mortgates_Additional_Cherry_Team_Template_Callbacks extends Cherry_Team_Members_Template_Callbacks{

	/**
	 * Get description.
	 *
	 * @param array $args Macros arguments.
	 *
	 * @return string
	 */
	public function get_desc( $args = array() ) {

		if ( isset( $this->atts['show_desc'] ) && false === $this->atts['show_desc'] ) {
			return;
		}

		$args = wp_parse_args( $args, array(
			'wrap'  => 'div',
			'class' => 'team-listing_desc',
			'crop'  => 'no',
			'more'  => '&hellip;',
		) );

		global $post;

		$desc = get_post_meta( $post->ID, 'cherry-team-description', true );

		$args['crop'] = filter_var( $args['crop'], FILTER_VALIDATE_BOOLEAN );

		if ( true === $args['crop'] ) {
			$desc_length = ( ! empty( $this->atts['excerpt_length'] ) ) ? intval( $this->atts['excerpt_length'] ) : 20;
			$more        = esc_attr( $args['more'] );
			$desc        = wp_trim_words( $desc, $desc_length, $more );
		}

		return $this->macros_wrap( $args, $desc );
	}

	/**
	 * Get email.
	 *
	 * @param array $args Macros arguments.
	 *
	 * @return string
	 */
	public function get_email( $args = array() ) {

		$args = wp_parse_args( $args, array(
			'wrap'  => 'div',
			'class' => '',
		) );

		return $this->macros_wrap( $args, $this->get_meta_html( 'email' ) );
	}

	/**
	 * Get skype.
	 *
	 * @param array $args Macros arguments.
	 *
	 * @return string
	 */
	public function get_skype( $args = array() ) {

		$args = wp_parse_args( $args, array(
			'wrap'  => 'div',
			'class' => '',
		) );

		return $this->macros_wrap( $args, $this->get_meta_html( 'skype' ) );
	}
}
