<?php
/**
 * Cherry-testi hooks.
 *
 * @package Mortgates
 */

// Customization cherry-testimonials pagination args.
add_filter( 'tm_testimonials_pagination_args', 'mortgates_tm_testimonials_pagination_args', 10, 2 );

// Modify atts.
add_filter( 'tm_testimonials_get_shortcode_atts', 'mortgates_modify_tm_testimonials_shortcode_atts' );

// Modify default arguments.
add_filter( 'tm_the_testimonials_default_args', 'mortgates_modify_tm_testimonials_default_args' );

// Modify testimonials container.
add_filter( 'tm_the_testimonials_args', 'mortgates_modify_tm_testimonials_container' );

// Modify testimonials item classes.
add_filter( 'tm_testimonials_item_classes', 'mortgates_modify_tm_testimonials_item_classes', 10, 2 );

// Modify testimonials archive page arguments.
add_filter( 'tm_testimonials_archive_template_args', 'mortgates_modify_tm_testimonials_archive_args' );

// Add template to tm-testimonials templates list.
add_filter( 'tm_testimonials_templates_list', 'mortgates_add_template_to_tm_testimonials_templates_list' );

/**
 * Add template to tm-testimonials templates list.
 *
 * @param array $tmpl_list Templates list.
 *
 * @return array
 */
function mortgates_add_template_to_tm_testimonials_templates_list( $tmpl_list ) {
	$tmpl_list['default-avatar-first.tmpl'] = 'default-avatar-first.tmpl';

	return $tmpl_list;
}

/**
 * Customization cherry-testimonials pagination args.
 *
 * @return array
 */
function mortgates_tm_testimonials_pagination_args( $pagination_args, $args ) {

	$pagination_args = array(
		'prev_text' => '<i class="fa fa-chevron-left"></i>',
		'next_text' => '<i class="fa fa-chevron-right"></i>',
	);

	return $pagination_args;
}

/**
 * Modify atts.
 *
 * @param array $atts Shortcode atts.
 *
 * @return array
 */
function mortgates_modify_tm_testimonials_shortcode_atts( $atts = array() ){

	$columns_options = array(
		1 => 1,
		2 => 2,
		3 => 3,
		4 => 4,
	);

	$atts['type']['options']['list'] = array(
		'label' => esc_html__( 'List', 'mortgates' ),
		'slave' => 'testi-list-options',
	);

	$atts['img_pagination']['value'] = 'off';
	$atts['size']['value'] = 85;

	$columns_atts = array(
		'columns' => array(
			'type'        => 'select',
			'title'       => esc_html__( 'Desktop columns', 'mortgates' ),
			'description' => esc_html__( 'Desktop columns ( only list type )', 'mortgates' ),
			'options'     => $columns_options,
			'value'       => 1,
			'default'     => 1,
			'master'      => 'testi-list-options',
			'condition'   => array(
				'type' => 'list',
			),
		),

		'columns_tablet' => array(
			'type'      => 'select',
			'title'       => esc_html__( 'Tablet columns', 'mortgates' ),
			'description' => esc_html__( 'Tablet columns ( only list type )', 'mortgates' ),
			'options'   => $columns_options,
			'value'     => 1,
			'default'   => 1,
			'master'    => 'testi-list-options',
			'condition' => array(
				'type' => 'list',
			),
		),

		'columns_phone' => array(
			'type'      => 'select',
			'title'       => esc_html__( 'Phone columns', 'mortgates' ),
			'description' => esc_html__( 'Phone columns ( only list type )', 'mortgates' ),
			'options'   => $columns_options,
			'value'     => 1,
			'default'   => 1,
			'master'    => 'testi-list-options',
			'condition' => array(
				'type' => 'list',
			),
		),
	);

	return array_merge( $atts, $columns_atts );
}

/**
 * Modify default arguments.
 *
 * @param array $args Default Arguments.
 *
 * @return array
 */
function mortgates_modify_tm_testimonials_default_args( $args = array() ) {

	$new_args = array(
		'type'           => 'list',
		'columns'        => 1,
		'columns_tablet' => 1,
		'columns_phone'  => 1,
	);

	return array_merge( $args, $new_args );
}

/**
 * Modify testimonials container.
 *
 * @param array $args Arguments.
 *
 * @return array
 */
function mortgates_modify_tm_testimonials_container( $args = array() ) {

	if ( isset( $args['is_service'] ) && $args['is_service'] ) {
		return $args;
	}

	if ( isset( $args['container'] ) && 'list' === $args['type'] ) {
		$args['container'] = '<div class="tm-testi__list row">%s</div>';
	}

	return $args;
}

/**
 * Modify testimonials item classes.
 *
 * @param array $classes Item css classes.
 * @param array $args Arguments.
 *
 * @return array
 */
function mortgates_modify_tm_testimonials_item_classes( $classes = array(), $args = array() ) {

	if ( isset( $args['is_service'] ) && $args['is_service'] ) {
		return $classes;
	}

	if ( 'list' === $args['type'] ) {

		$col_classes = array(
			'xs' => $args['columns_phone'],
			'md' => $args['columns_tablet'],
			'lg' => $args['columns'],
		);

		foreach ( $col_classes as $device => $columns ) {
			$classes[] = sprintf( 'col-%1$s-%2$s', $device, ( 12 / $columns ) );
		}
	}

	return $classes;
}

/**
 * Modify testimonials archive page arguments.
 *
 * @param array $args Testimonials archive page arguments.
 *
 * @return array
 */
function mortgates_modify_tm_testimonials_archive_args ( $args = array() ) {

	$args['template']       = 'speech-bubble.tmpl';
	$args['columns']        = 2;
	$args['columns_tablet'] = 2;

	return $args;
}
