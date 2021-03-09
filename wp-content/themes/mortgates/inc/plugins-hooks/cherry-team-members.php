<?php
/**
 * Cherry Team Members hooks.
 *
 * @package Mortgates
 */

// Modify heading format.
add_filter( 'cherry_team_shortcode_heading_format', 'mortgates_modify_cherry_team_shortcode_heading_format' );

// Modify templates list.
add_filter( 'cherry_team_templates_list', 'mortgates_modify_cherry_team_templates_list' );

// Modify meta args.
add_filter( 'cherry_team_members_meta_args', 'mortgates_modify_cherry_team_members_meta_args' );

// Modify data callbacks.
add_filter( 'cherry_team_data_callbacks', 'mortgates_modify_cherry_team_data_callbacks', 10, 2 );

/**
 * Modify heading format.
 *
 * @param array $format Heading formats.
 *
 * @return array
 */
function mortgates_modify_cherry_team_shortcode_heading_format( $format = array() ) {

	$format['super_title'] = '<h6 class="team-heading_super_title">%s</h6>';
	$format['title']       = '<h2 class="team-heading_title">%s</h2>';
	$format['subtitle']    = '<h6 class="team-heading_subtitle">%s</h6>';

	return $format;
}

/**
 * Modify templates list.
 *
 * @param array $list Default template list.
 *
 * @return array
 */
function mortgates_modify_cherry_team_templates_list( $list = array() ) {

	$list['listing']              = 'listing.tmpl';
	$list['listing-contact-info'] = 'listing-contact-info.tmpl';

	return $list;
}

/**
 * Modify meta args.
 *
 * @param array $args Meta arguments.
 *
 * @return array
 */
function mortgates_modify_cherry_team_members_meta_args( $args = array() ) {

	$fields_keys = array_keys( $args['fields'] );
	$offset      = array_search( 'cherry-team-phone', $fields_keys );

	$new_field = array(
		'cherry-team-email' => array(
			'type'        => 'text',
			'placeholder' => esc_html__( 'Email', 'mortgates' ),
			'label'       => esc_html__( 'Email', 'mortgates' ),
		),
		'cherry-team-skype' => array(
			'type'        => 'text',
			'placeholder' => esc_html__( 'Skype', 'mortgates' ),
			'label'       => esc_html__( 'Skype', 'mortgates' ),
		),
		'cherry-team-description' => array(
			'type'              => 'textarea',
			'placeholder'       => esc_html__( 'Description', 'mortgates' ),
			'label'             => esc_html__( 'Description', 'mortgates' ),
			'sanitize_callback' => 'wp_kses_post',
		),
	);

	$args['fields'] = array_merge(
		array_slice( $args['fields'], 0, $offset + 1, true ),
		$new_field,
		array_slice( $args['fields'], $offset + 1, null, true )
	);

	return $args;
}

/**
 * Modify data callbacks.
 *
 * @param array $data Data callbacks.
 * @param array $atts
 *
 * @return array
 */
function mortgates_modify_cherry_team_data_callbacks ( $data = array(), $atts =array() ) {

	require_once trailingslashit( MORTGATES_THEME_EXT ) . 'class-additional-cherry-team-template-callbacks.php';

	$additional_callbacks = new Mortgates_Additional_Cherry_Team_Template_Callbacks( $atts );

	$new_data = array(
		'desc'  => array( $additional_callbacks, 'get_desc' ),
		'email' => array( $additional_callbacks, 'get_email' ),
		'skype' => array( $additional_callbacks, 'get_skype' ),
	);

	return array_merge( $data, $new_data );
}
