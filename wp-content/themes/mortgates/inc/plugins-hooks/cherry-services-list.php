<?php
/**
 * Cherry-services-list hooks.
 *
 * @package Mortgates
 */

// Customization cherry-services-list plugin.
add_filter( 'cherry_services_list_meta_options_args', 'mortgates_modify_services_list_meta_options' );
add_filter( 'cherry_services_default_icon_format', 'mortgates_cherry_services_default_icon_format' );
add_filter( 'cherry_services_listing_templates_list', 'mortgates_cherry_services_listing_templates_list' );
add_filter( 'cherry_services_single_templates_list', 'mortgates_cherry_services_single_templates_list' );
add_filter( 'cherry_services_styles', 'mortgates_dequeue_cherry_services_grid_style' );
add_filter( 'cherry_services_cta_link_format', 'mortgates_cherry_services_cta_link_format' );
add_filter( 'cherry_services_cta_submit_format', 'mortgates_cherry_services_cta_submit_format' );
add_filter( 'cherry_services_shortcode_heading_format', 'mortgates_modify_cherry_services_shortcode_heading_format' );
add_filter( 'cherry_services_data_callbacks', 'mortgates_modify_cherry_services_data_callbacks', 10, 2 );

/**
 * Modify cherry-services-list meta options.
 */
function mortgates_modify_services_list_meta_options( $fields ) {

	// Change icon data.
	$fields['fields']['cherry-services-icon']['icon_data'] = mortgates_get_iconsmind_icons_data();

	// Add `Button style presets` option.
	$fields['fields']['cherry-services-cta-btn-style-presets'] = array(
		'type'              => 'select',
		'element'           => 'control',
		'parent'            => 'styling',
		'value'             => 'primary',
		'options'           => mortgates_get_btn_style_presets(),
		'label'             => esc_html__( 'Call to action button style preset', 'mortgates' ),
		'sanitize_callback' => 'esc_attr',
	);

	return $fields;
}

/**
 * Change cherry-services-list icon format
 *
 * @return string
 */
function mortgates_cherry_services_default_icon_format( $icon_format ) {
	return '<i class="lnr %s"></i>';
}

/**
 *  Add template to cherry services-list templates list;
 */
function mortgates_cherry_services_listing_templates_list( $tmpl_list ) {

	$new_tmpl = array(
		'media-icon-2'          => 'media-icon-2.tmpl',
		'media-icon-3'          => 'media-icon-3.tmpl',
		'media-icon-background' => 'media-icon-bg.tmpl',
		'cards'                 => 'cards.tmpl',
	);

	return array_merge( $tmpl_list, $new_tmpl );
}


/**
 * Add template to cherry services-list single templates list;
 *
 * @param array $list Single templates list.
 *
 * @return array
 */
function mortgates_cherry_services_single_templates_list( $list = array() ){

	$list['single-with-builder'] = 'single-with-builder.tmpl';

	return $list;
}

/**
 * Dequeue cherry-services grid style.
 *
 * @param array $styles Cherry services list styles.
 *
 * @return array
 */
function mortgates_dequeue_cherry_services_grid_style ( $styles = array() ) {

	unset( $styles['cherry-services-grid'] );

	return $styles;
}

/**
 * Modify cta link format.
 *
 * @param string $link_format Default cta link format.
 *
 * @return string
 */
function mortgates_cherry_services_cta_link_format( $link_format ) {

	global $post;
	$btn_preset       = get_post_meta( $post->ID, 'cherry-services-cta-btn-style-presets', true );
	$additional_class = $btn_preset ? sprintf( 'btn-%s', sanitize_html_class( $btn_preset ) ) : '';

	$link_format = '<div class="cta-button-wrap"><a href="%s" class="cta-button btn ' . $additional_class . '">%s</a></div>';

	return $link_format;
}

/**
 * Modify cta submit button format.
 *
 * @param string $submit_format Default submit format.
 *
 * @return string
 */
function mortgates_cherry_services_cta_submit_format( $submit_format ) {
	global $post;
	$btn_preset       = get_post_meta( $post->ID, 'cherry-services-cta-btn-style-presets', true );
	$additional_class = $btn_preset ? sprintf( 'btn-%s', sanitize_html_class( $btn_preset ) ) : '';

	$submit_format = '<button type="submit" class="cta-form_submit btn ' . $additional_class . '">%s</button>';

	return $submit_format;
}

/**
 * Modify heading format.
 *
 * @param array $heading_format Default heading format.
 *
 * @return array
 */
function mortgates_modify_cherry_services_shortcode_heading_format( $heading_format = array() ) {

	$heading_format['super_title'] = '<h6 class="services-heading_super_title">%s</h6>';
	$heading_format['title']       = '<h2 class="services-heading_title">%s</h2>';

	return $heading_format;
}

/**
 * Modify cherry-services data callbacks.
 *
 * @param array $data Item data.
 * @param array $atts Attributes.
 *
 * @return array
 */
function mortgates_modify_cherry_services_data_callbacks( $data = array(), $atts = array() ) {

	$data['desc'] = 'mortgates_get_cherry_services_desc';

	return $data;
}

/**
 * Modify callback function to marcos %%DESC%%.
 *
 * @param array $args Macros arguments.
 */
function mortgates_get_cherry_services_desc( $args = array() ) {

	$callbacks = cherry_services_templater()->callbacks;
	$atts = $callbacks->atts;

	if ( ! isset( $atts['show_content'] ) ) {
		return;
	}

	$atts['show_content'] = filter_var( $atts['show_content'], FILTER_VALIDATE_BOOLEAN );

	if ( ! $atts['show_content'] ) {
		return;
	}

	return $callbacks->get_desc( $args );
}
