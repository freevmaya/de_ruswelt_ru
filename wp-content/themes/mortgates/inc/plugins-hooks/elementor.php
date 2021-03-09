<?php
/**
 * Elementor hooks.
 *
 * @package Mortgates
 */

// Set theme icon.
add_action( 'elementor/controls/controls_registered', 'mortgates_add_theme_icons_to_icon_control', 20 );
add_action( 'elementor/editor/after_enqueue_styles', 'mortgates_enqueue_icon_font' );

// Modify default values into widgets.
add_action( 'elementor/element/before_section_end', 'mortgates_modify_default_values_widgets', 10, 3 );

// Add additional controls into tabs widget.
add_action( 'elementor/element/tabs/section_tabs_style/before_section_end', 'mortgates_add_tabs_additional_controls', 10, 2 );

// Add column additional classes.
add_action( 'elementor/frontend/element/before_render', 'mortgates_add_column_additional_classes' );

// Add multi columns settings into text-editor widget.
add_action( 'elementor/element/text-editor/section_style/before_section_end', 'mortgates_add_columns_to_text_editor', 10, 2 );

// Add additional classes into social-icons widget.
add_action( 'elementor/element/social-icons/section_social_style/before_section_end', 'mortgates_social_icons_additional_classes', 10, 2 );

// Modify jet-posts atts.
add_filter( 'jet-elements/shortcodes/jet-posts/atts', 'mortgates_modify_jet_posts_atts' );

// Add additional styling option into jet-post widget.
add_action( 'elementor/element/jet-posts/section_excerpt_style/before_section_start', 'mortgates_jet_posts_additional_style_options', 10, 2 );

// FIX Responsive Custom Column Width Bug on tablet.
add_action( 'elementor/element/column/layout/before_section_end', 'mortgates_fix_responsive_column_width_bug', 10, 2 );

// UPD column typography heading selectors.
add_action( 'elementor/element/column/section_typo/before_section_end', 'mortgates_update_column_typog_heading_selectors', 10, 2 );

// Modify content container type into elementor library page.
add_filter( 'theme_mod_content_container_type', 'mortgates_elementor_library_content_container_type' );

// Modify video widget.
add_action( 'elementor/element/video/section_video_style/before_section_end', 'mortgates_modify_elementor_video_widget', 10, 2 );

// Modify progress bar widget.
add_action( 'elementor/element/progress/section_progress_style/before_section_end', 'mortgates_add_controls_to_section_progress_style', 10, 2 );
add_action( 'elementor/element/progress/section_title/after_section_end', 'mortgates_add_section_progress_percentage_style', 10, 2 );

// Modify wp widget arguments.
add_filter( 'elementor/widgets/wordpress/widget_args', 'mortgates_modify_elementor_wp_widget_args', 10, 2 );

// Modify countdown timer widget.
add_action( 'elementor/element/jet-countdown-timer/section_label_styles/before_section_end', 'mortgates_countdown_timer_additional_control', 10, 2 );

// Modify accordion widget.
add_action( 'elementor/element/accordion/section_title_style/before_section_end', 'mortgates_modify_accordion_widget', 10, 2 );

/**
 * Add theme icons to the icon control.
 *
 * @param object $controls_manager Object Controls manager.
 */
function mortgates_add_theme_icons_to_icon_control( $controls_manager ) {

	$settings    = $controls_manager->get_control( 'icon' )->get_settings();
	$setting_key = '';

	if ( isset( $settings['icons'] ) ) {
		$setting_key = 'icons'; // in old Elementor version or in rewrite control in other plugins.
	} elseif ( isset( $settings['options'] ) ) {
		$setting_key = 'options';
	}

	if ( ! $setting_key ) {
		return;
	}

	$default_icons = $controls_manager->get_control( 'icon' )->get_settings( $setting_key );

	$iconsmind_icons_data = array(
		'icons'  => mortgates_get_iconsmind_icons_set(),
		'format' => 'iconsmind %s',
	);

	$iconsmind_icons_array = array();

	foreach( $iconsmind_icons_data['icons'] as $index => $icon ) {
		$key = sprintf( $iconsmind_icons_data['format'], $icon );

		$iconsmind_icons_array[ $key ] = $icon;
	}

	$new_icons = array_merge( $default_icons, $iconsmind_icons_array );

	$controls_manager->get_control( 'icon' )->set_settings( $setting_key, $new_icons );
}

/**
 * Enqueue icon font.
 */
function mortgates_enqueue_icon_font() {
	wp_enqueue_style( 'iconsmind', MORTGATES_THEME_CSS . '/iconsmind.min.css', array(), '1.0.0' );
    wp_register_style( 'linearicons-free', MORTGATES_THEME_CSS . '/linearicons-free.css', array(), '1.0.0' );
}

/**
 * Modify default values into widgets.
 *
 * @param object $element    Element object.
 * @param string $section_id Section id.
 * @param array  $args       Element arguments.
 */
function mortgates_modify_default_values_widgets( $element, $section_id, $args ) {

	$grey_color    = get_theme_mod( 'grey_color_1', mortgates_theme()->customizer->get_default( 'grey_color_1' ) );
	$primary_color = get_theme_mod( 'regular_accent_color_1', mortgates_theme()->customizer->get_default( 'regular_accent_color_1' ) );

	$theme_default_settings = array(

		'jet-circle-progress' => array(
			'value_stroke'     => array( 'size' => 5 ),
			'bg_stroke'        => array( 'size' => 5 ),
			'val_bg_color'     => $grey_color,
			'val_stroke_color' => $primary_color,
		),

		'jet-pricing-table' => array(
			'table_border_border'  => '',
			'included_bullet_icon' => '',
			'excluded_bullet_icon' => '',
			'button_border_border' => 'solid',
		),

		'jet-posts' => array (
			'show_more' => '',
		),

		'jet-countdown-timer' => array(
			'items_size'    => 'auto',
			'border_border' => '',
			'value_order'   => 2,
			'label_order'   => 1,
		),

		'button' => array(
			'border_border' => 'solid',
		),

	);

	foreach ( $theme_default_settings as $widget => $default_settings ) {

		if ( $widget === $element->get_name() ) {

			foreach ( $default_settings as $setting_name => $default_value ) {
				$element->update_control(
					$setting_name,
					array(
						'default' => $default_value,
					)
				);
			}
		}
	}
}

/**
 * Add additional controls into tabs widget.
 *
 * @param object $widget Widget object.
 * @param array  $args   Widget arguments.
 */
function mortgates_add_tabs_additional_controls( $widget, $args ) {

	$widget->remove_control( 'border_width' );
	$widget->remove_control( 'border_color' );

	$widget->update_control(
		'background_color',
		array(
			'selectors' => array(
				'{{WRAPPER}} .elementor-tabs-content-wrapper' => 'background-color: {{VALUE}};',
			)
		)
	);

	$widget->add_control(
		'tab_hover_color',
		array(
			'label' => esc_html__( 'Hover Color', 'mortgates' ),
			'type' => Elementor\Controls_Manager::COLOR,
			'selectors' => array(
				'{{WRAPPER}} .elementor-tab-title:hover' => 'color: {{VALUE}};',
			),
		),
		array(
			'position' => array(
				'of' => 'tab_color',
			)
		)
	);

	$widget->add_control(
		'tab_title_bg',
		array(
			'label'     => esc_html__( 'Background Color', 'mortgates' ),
			'type'      => Elementor\Controls_Manager::COLOR,
			'selectors' => array(
				'{{WRAPPER}} .elementor-tab-title' => 'background-color: {{VALUE}};',
			),
		),
		array(
			'position' => array(
				'of' => 'tab_active_color',
			)
		)
	);

	$widget->add_control(
		'tab_title_hover_bg',
		array(
			'label'     => esc_html__( 'Hover Background Color', 'mortgates' ),
			'type'      => Elementor\Controls_Manager::COLOR,
			'selectors' => array(
				'{{WRAPPER}} .elementor-tab-title:hover' => 'background-color: {{VALUE}};',
			),
		),
		array(
			'position' => array(
				'of' => 'tab_title_bg',
			)
		)
	);

	$widget->add_control(
		'tab_title_active_bg',
		array(
			'label'     => esc_html__( 'Active Background Color', 'mortgates' ),
			'type'      => Elementor\Controls_Manager::COLOR,
			'selectors' => array(
				'{{WRAPPER}} .elementor-tab-title.elementor-active' => 'background-color: {{VALUE}};',
			),
		),
		array(
			'position' => array(
				'of' => 'tab_title_hover_bg',
			)
		)
	);

	$widget->add_responsive_control(
		'tab_content_padding',
		array(
			'label'      => esc_html__( 'Content Padding', 'mortgates' ),
			'type'       => Elementor\Controls_Manager::DIMENSIONS,
			'size_units' => array( 'px', '%', 'em' ),
			'selectors'  => array(
				'{{WRAPPER}} .elementor-tab-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			),
		)
	);

}

/**
 * Add column additional classes.
 *
 * @param \Elementor\Element_Base $element
 */
function mortgates_add_column_additional_classes( \Elementor\Element_Base $element ) {

	if( 'column' === $element->get_name() ) {

		$custom_padding = $element->get_settings( 'padding' );

		if ( '' !== $custom_padding['top']
			|| '' !== $custom_padding['bottom']
			|| '' !== $custom_padding['left']
			|| '' !== $custom_padding['right']
		) {
			$element->add_render_attribute(
				'_wrapper',
				array(
					'class' => 'elementor-column-custom-padding',
				)
			);
		}
	}
}

/**
 * Add columns settings into text-editor widget.
 *
 * @param object $widget Widget object.
 * @param array  $args   Widget arguments.
 */
function mortgates_add_columns_to_text_editor( $widget, $args ) {

	$widget->add_control(
		'multi_columns',
		array(
			'label'              => esc_html__( 'Multi Columns Layout', 'mortgates' ),
			'type'               => Elementor\Controls_Manager::SWITCHER,
			'label_off'          => esc_html__( 'Off', 'mortgates' ),
			'label_on'           => esc_html__( 'On', 'mortgates' ),
			'prefix_class'       => 'elementor-multi-columns-',
			'frontend_available' => true,
		)
	);


	$widget->add_responsive_control(
		'multi_columns_count',
		array(
			'label'     => esc_html__( 'Columns Count', 'mortgates' ),
			'type'      => Elementor\Controls_Manager::SLIDER,
			'default'   => array(
				'size' => 2,
			),
			'range'     => array(
				'px' => array(
					'min' => 0,
					'max' => 6,
				),
			),
			'selectors' => array(
				'{{WRAPPER}} .elementor-text-editor' => 'column-count: {{SIZE}};',
			),
			'condition' => array(
				'multi_columns' => 'yes',
			),
		)
	);

	$widget->add_responsive_control(
		'multi_columns_gap',
		array(
			'label'     => esc_html__( 'Gap Between Columns', 'mortgates' ),
			'type'      => Elementor\Controls_Manager::SLIDER,
			'default'   => array(
				'size' => 30,
			),
			'range'     => array(
				'px' => array(
					'min' => 0,
					'max' => 100,
				),
			),
			'selectors' => array(
				'{{WRAPPER}} .elementor-text-editor' => 'column-gap: {{SIZE}}{{UNIT}};',
			),
			'condition' => array(
				'multi_columns' => 'yes',
			),
		)
	);

}

/**
 * Add additional classes into social-icons widget.
 *
 * @param object $widget Widget object.
 * @param array  $args   Widget arguments.
 */
function mortgates_social_icons_additional_classes( $widget, $args ) {
	$widget->update_control(
		'icon_color',
		array(
			'prefix_class' => 'elementor-social-icons-color-',
		)
	);
}

/**
 * Modify jet-posts atts.
 *
 * @param array $atts Shortcode atts.
 *
 * @return array
 */
function mortgates_modify_jet_posts_atts( $atts = array() ) {

	$new_atts = array(
		'avatar_size' => array(
			'type'      => 'number',
			'label'     => esc_html__( 'Avatar Size', 'mortgates' ),
			'default'   => 50,
			'min'       => 30,
			'max'       => 100,
			'step'      => 1,
			'condition' => array(
				'show_author' => array( 'yes' ),
				'show_meta'   => array( 'yes' ),
			),
		),
	);

	$new_atts_2 = array(
		'show_category' => array(
			'type'         => 'switcher',
			'label'        => esc_html__( 'Show Categories', 'mortgates' ),
			'label_on'     => esc_html__( 'Yes', 'mortgates' ),
			'label_off'    => esc_html__( 'No', 'mortgates' ),
			'return_value' => 'yes',
			'default'      => '',
			'condition'    => array(
				'show_meta' => array( 'yes' ),
			),
		),

		'badge' => array(
			'type'         => 'switcher',
			'label'        => esc_html__( 'Badge', 'mortgates' ),
			'label_on'     => esc_html__( 'Yes', 'mortgates' ),
			'label_off'    => esc_html__( 'No', 'mortgates' ),
			'return_value' => 'yes',
			'default'      => '',
		),

		'badge_tax' => array(
			'type'      => 'select',
			'label'     => esc_html__( 'Badge Taxonomy', 'mortgates' ),
			'options'   => array(
				'category' => esc_html__( 'Categories', 'mortgates' ),
				'post_tag' => esc_html__( 'Tags', 'mortgates' ),
			),
			'default'   => 'post_tag',
			'condition' => array(
				'badge' => array( 'yes' ),
			),
		),
	);

	$atts = mortgates_array_merge_after_key( $atts, $new_atts, 'show_author' );
	$atts = mortgates_array_merge_after_key( $atts, $new_atts_2, 'show_comments' );

	return $atts;
}

/**
 * Add additional styling option into jet-post widget.
 *
 * @param object $widget Widget object.
 * @param array  $args   Widget arguments.
 */
function mortgates_jet_posts_additional_style_options( $widget, $args ) {

	$css_selectors = array(
		'author'         => '.posted-by',
		'author-content' => '.posted-by__content',
		'badge'          => '.post-badge',
		'badge-link'     => '.post-badge a',
	);

	// Author Block Style Section
	$widget->start_controls_section(
		'section_author_style',
		array(
			'label'      => esc_html__( 'Author Block', 'mortgates' ),
			'tab'        => Elementor\Controls_Manager::TAB_STYLE,
			'show_label' => false,
			'condition' => array(
				'show_author' => array( 'yes' ),
			),
		)
	);

	$widget->add_control(
		'author_color',
		array(
			'label'     => esc_html__( 'Color', 'mortgates' ),
			'type'      => Elementor\Controls_Manager::COLOR,
			'selectors' => array(
				'{{WRAPPER}} ' . $css_selectors['author-content'] => 'color: {{VALUE}}',
			),
		)
	);

	$widget->add_control(
		'author_link_color',
		array(
			'label'     => esc_html__( 'Link Color', 'mortgates' ),
			'type'      => Elementor\Controls_Manager::COLOR,
			'selectors' => array(
				'{{WRAPPER}} ' . $css_selectors['author-content'] . ' a' => 'color: {{VALUE}}',
			),
		)
	);

	$widget->add_control(
		'author_link_color_hover',
		array(
			'label'     => esc_html__( 'Link Hover Color', 'mortgates' ),
			'type'      => Elementor\Controls_Manager::COLOR,
			'selectors' => array(
				'{{WRAPPER}} ' . $css_selectors['author-content'] . ' a:hover' => 'color: {{VALUE}}',
			),
		)
	);

	$widget->add_group_control(
		Elementor\Group_Control_Typography::get_type(),
		array(
			'name'     => 'author_typography',
			'label'    => esc_html__( 'Typography', 'mortgates' ),
			'selector' => '{{WRAPPER}} ' . $css_selectors['author-content'],
		)
	);

	$widget->add_responsive_control(
		'author_padding',
		array(
			'label'      => esc_html__( 'Padding', 'mortgates' ),
			'type'       => Elementor\Controls_Manager::DIMENSIONS,
			'size_units' => array( 'px', '%', 'em' ),
			'selectors'  => array(
				'{{WRAPPER}} '  . $css_selectors['author'] => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			),
		)
	);

	$widget->add_responsive_control(
		'author_margin',
		array(
			'label'      => esc_html__( 'Margin', 'mortgates' ),
			'type'       => Elementor\Controls_Manager::DIMENSIONS,
			'size_units' => array( 'px', '%', 'em' ),
			'selectors'  => array(
				'{{WRAPPER}} '  . $css_selectors['author'] => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			),
		)
	);

	$widget->end_controls_section();

	// Badge Style Section
	$widget->start_controls_section(
		'section_badge_style',
		array(
			'label'      => esc_html__( 'Badge', 'mortgates' ),
			'tab'        => Elementor\Controls_Manager::TAB_STYLE,
			'show_label' => false,
			'condition'  => array(
				'badge' => array( 'yes' ),
			),
		)
	);

	$widget->add_control(
		'badge_spacing',
		array(
			'label'     => esc_html__( 'Spacing', 'mortgates' ),
			'type'      => Elementor\Controls_Manager::SLIDER,
			'range'     => array(
				'px' => array(
					'max' => 50,
				),
			),
			'selectors' => array(
				'{{WRAPPER}} ' . $css_selectors['badge-link'] . ':not(:last-child)' => 'margin-right: {{SIZE}}{{UNIT}}',
			),
		)
	);

	$widget->add_responsive_control(
		'badge_margin',
		array(
			'label'      => esc_html__( 'Margin', 'mortgates' ),
			'type'       => Elementor\Controls_Manager::DIMENSIONS,
			'size_units' => array( 'px', '%', 'em' ),
			'selectors'  => array(
				'{{WRAPPER}} '  . $css_selectors['badge'] => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			),
		)
	);

	$widget->start_controls_tabs( 'tabs_badge_style' );

	$widget->start_controls_tab(
		'tab_badge_normal',
		array(
			'label' => esc_html__( 'Normal', 'mortgates' ),
		)
	);

	$widget->add_control(
		'badge_bg_color',
		array(
			'label' => esc_html__( 'Background Color', 'mortgates' ),
			'type' => Elementor\Controls_Manager::COLOR,
			'selectors' => array(
				'{{WRAPPER}} ' . $css_selectors['badge-link'] => 'background-color: {{VALUE}}',
			),
		)
	);

	$widget->add_control(
		'badge_color',
		array(
			'label' => esc_html__( 'Text Color', 'mortgates' ),
			'type' => Elementor\Controls_Manager::COLOR,
			'selectors' => array(
				'{{WRAPPER}} ' . $css_selectors['badge-link'] => 'color: {{VALUE}}',
			),
		)
	);

	$widget->add_group_control(
		Elementor\Group_Control_Typography::get_type(),
		array(
			'name' => 'badge_typography',
			'label' => esc_html__( 'Typography', 'mortgates' ),
			'selector' => '{{WRAPPER}}  ' . $css_selectors['badge-link'],
		)
	);

	$widget->add_responsive_control(
		'badge_padding',
		array(
			'label'      => esc_html__( 'Padding', 'mortgates' ),
			'type'       => Elementor\Controls_Manager::DIMENSIONS,
			'size_units' => array( 'px', '%', 'em' ),
			'selectors'  => array(
				'{{WRAPPER}} ' . $css_selectors['badge-link'] => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			),
		)
	);

	$widget->add_responsive_control(
		'badge_border_radius',
		array(
			'label'      => esc_html__( 'Border Radius', 'mortgates' ),
			'type'       => Elementor\Controls_Manager::DIMENSIONS,
			'size_units' => array( 'px', '%' ),
			'selectors'  => array(
				'{{WRAPPER}} ' . $css_selectors['badge-link'] => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			),
		)
	);

	$widget->add_group_control(
		Elementor\Group_Control_Border::get_type(),
		array(
			'name'     => 'badge_border',
			'label'    => esc_html__( 'Border', 'mortgates' ),
			'selector' => '{{WRAPPER}} ' . $css_selectors['badge-link'],
		)
	);

	$widget->add_group_control(
		Elementor\Group_Control_Box_Shadow::get_type(),
		array(
			'name'     => 'badge_box_shadow',
			'selector' => '{{WRAPPER}} ' . $css_selectors['badge-link'],
		)
	);

	$widget->end_controls_tab();

	$widget->start_controls_tab(
		'tab_badge_hover',
		array(
			'label' => esc_html__( 'Hover', 'mortgates' ),
		)
	);

	$widget->add_control(
		'badge_hover_bg_color',
		array(
			'label'     => esc_html__( 'Background Color', 'mortgates' ),
			'type'      => Elementor\Controls_Manager::COLOR,
			'selectors' => array(
				'{{WRAPPER}} ' . $css_selectors['badge-link'] . ':hover' => 'background-color: {{VALUE}}',
			),
		)
	);

	$widget->add_control(
		'badge_hover_color',
		array(
			'label'     => esc_html__( 'Text Color', 'mortgates' ),
			'type'      => Elementor\Controls_Manager::COLOR,
			'selectors' => array(
				'{{WRAPPER}} ' . $css_selectors['badge-link'] . ':hover' => 'color: {{VALUE}}',
			),
		)
	);

	$widget->add_group_control(
		Elementor\Group_Control_Typography::get_type(),
		array(
			'name'     => 'badge_hover_typography',
			'label'    => esc_html__( 'Typography', 'mortgates' ),
			'selector' => '{{WRAPPER}}  ' . $css_selectors['badge-link'] . ':hover',
		)
	);

	$widget->add_responsive_control(
		'badge_hover_padding',
		array(
			'label'      => esc_html__( 'Padding', 'mortgates' ),
			'type'       => Elementor\Controls_Manager::DIMENSIONS,
			'size_units' => array( 'px', '%', 'em' ),
			'selectors'  => array(
				'{{WRAPPER}} ' . $css_selectors['badge-link'] . ':hover' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			),
		)
	);

	$widget->add_responsive_control(
		'badge_hover_border_radius',
		array(
			'label'      => esc_html__( 'Border Radius', 'mortgates' ),
			'type'       => Elementor\Controls_Manager::DIMENSIONS,
			'size_units' => array( 'px', '%' ),
			'selectors'  => array(
				'{{WRAPPER}} ' . $css_selectors['badge-link'] . ':hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			),
		)
	);

	$widget->add_group_control(
		Elementor\Group_Control_Border::get_type(),
		array(
			'name'     => 'badge_hover_border',
			'label'    => esc_html__( 'Border', 'mortgates' ),
			'selector' => '{{WRAPPER}} ' . $css_selectors['badge-link'] . ':hover',
		)
	);

	$widget->add_group_control(
		Elementor\Group_Control_Box_Shadow::get_type(),
		array(
			'name'     => 'badge_hover_box_shadow',
			'selector' => '{{WRAPPER}} ' . $css_selectors['badge-link'] . ':hover',
		)
	);

	$widget->end_controls_tab();

	$widget->end_controls_tabs();

	$widget->end_controls_section();
}

/**
 * FIX Responsive Custom Column Width Bug on tablet.
 *
 * @link https://github.com/pojome/elementor/issues/1928
 *
 * @param object $element Element object.
 * @param array  $args    Element arguments.
 */
function mortgates_fix_responsive_column_width_bug( $element, $args ) {

	$tablet_suffix = Elementor\Controls_Stack::RESPONSIVE_TABLET;

	$element->update_control(
		'_inline_size_' . $tablet_suffix,
		array(
			'selectors' => array(
				'{{WRAPPER}}.elementor-column' => 'width: {{VALUE}}%',
			),
		)
	);
}

/**
 * UPD column heading selectors.
 *
 * @param object $element Element object.
 * @param array  $args    Element arguments.
 */
function mortgates_update_column_typog_heading_selectors( $element, $args ) {

	$element->update_control(
		'heading_color',
		array(
			'selectors' => array(
				'{{WRAPPER}} .elementor-element-populated .elementor-heading-title,
				{{WRAPPER}} .elementor-element-populated h1,
				{{WRAPPER}} .elementor-element-populated h2,
				{{WRAPPER}} .elementor-element-populated h3,
				{{WRAPPER}} .elementor-element-populated h4,
				{{WRAPPER}} .elementor-element-populated h5,
				{{WRAPPER}} .elementor-element-populated h6' => 'color: {{VALUE}};',
			),
		)
	);

}

/**
 * Modify content container type into elementor library page.
 *
 * @param string $value Content container type
 *
 * @return string
 */
function mortgates_elementor_library_content_container_type( $value ) {

	if ( is_singular( 'elementor_library' ) ) {
		return 'fullwidth';
	}

	return $value;
}

/**
 * Modify video widget.
 *
 * @param object $widget Widget object.
 * @param array  $args   Widget arguments.
 */
function mortgates_modify_elementor_video_widget( $widget, $args ) {
	$widget->update_control(
		'play_icon_size',
		array(
			'selectors' => array(
				'{{WRAPPER}} .elementor-custom-embed-play' => 'font-size: {{SIZE}}{{UNIT}}',
			),
		)
	);
}

/**
 * Modify progress bar widget.
 *
 * @param object $widget Widget object.
 * @param array  $args   Widget arguments.
 */
function mortgates_add_controls_to_section_progress_style( $widget, $args ) {

	$widget->remove_control( 'bar_color' );

	$widget->update_control(
		'bar_bg_color',
		array(
			'label'     => esc_html__( 'Wrapper Background Color', 'mortgates' ),
			'separator' => 'before',
		)
	);

	$widget->add_group_control(
		Elementor\Group_Control_Background::get_type(),
		array(
			'name'     => 'progress_bg',
			'types'    => array( 'classic', 'gradient' ),
			'selector' => '{{WRAPPER}} .elementor-progress-wrapper .elementor-progress-bar',
			'exclude'  => array(
				'image',
			),
		),
		array(
			'position' => array(
				'at' => 'before',
				'of' => 'bar_bg_color',
			)
		)
	);

	$widget->add_group_control(
		Elementor\Group_Control_Typography::get_type(),
		array(
			'name'     => 'bar_inner_text_typography',
			'selector' => '{{WRAPPER}} .elementor-progress-text',
		)
	);

	$widget->update_control(
		'bar_inner_text_typography_typography',
		array(
			'label' => esc_html__( 'Inner Text Typography', 'mortgates' ),
		)
	);

	$widget->add_responsive_control(
		'bar_padding',
		array(
			'label'      => esc_html__( 'Padding', 'mortgates' ),
			'type'       => Elementor\Controls_Manager::DIMENSIONS,
			'size_units' => array( 'px', '%', 'em' ),
			'selectors'  => array(
				'{{WRAPPER}} .elementor-progress-bar' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			),
		)
	);

	$widget->add_responsive_control(
		'bar_border_radius',
		array(
			'label'      => esc_html__( 'Border Radius', 'mortgates' ),
			'type'       => Elementor\Controls_Manager::DIMENSIONS,
			'size_units' => array( 'px', '%' ),
			'selectors'  => array(
				'{{WRAPPER}} .elementor-progress-bar' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			),
		)
	);

	$widget->add_responsive_control(
		'bar_wrapper_padding',
		array(
			'label'      => esc_html__( 'Wrapper Padding', 'mortgates' ),
			'type'       => Elementor\Controls_Manager::DIMENSIONS,
			'size_units' => array( 'px', '%', 'em' ),
			'selectors'  => array(
				'{{WRAPPER}} .elementor-progress-wrapper' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			),
		)
	);

	$widget->add_responsive_control(
		'bar_wrapper_border_radius',
		array(
			'label'      => esc_html__( 'Wrapper Border Radius', 'mortgates' ),
			'type'       => Elementor\Controls_Manager::DIMENSIONS,
			'size_units' => array( 'px', '%' ),
			'selectors'  => array(
				'{{WRAPPER}} .elementor-progress-wrapper' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			),
		)
	);
}

/**
 * Add section percentage style to the progress bar widget.
 *
 * @param object $widget Widget object.
 * @param array  $args   Widget arguments.
 */
function mortgates_add_section_progress_percentage_style( $widget, $args ) {

	$widget->start_controls_section(
		'section_percentage_style',
		array(
			'label'      => esc_html__( 'Percentage Style', 'mortgates' ),
			'tab'        => Elementor\Controls_Manager::TAB_STYLE,
			'show_label' => false,
			'condition'  => array(
				'display_percentage' => array( 'show' ),
			),
		)
	);

	$widget->add_control(
		'bar_percentage_color',
		array(
			'label'     => esc_html__( 'Percentage Color', 'mortgates' ),
			'type'      => Elementor\Controls_Manager::COLOR,
			'selectors' => array(
				'{{WRAPPER}} .elementor-progress-percentage' => 'color: {{VALUE}};',
			),

		)
	);

	$widget->add_group_control(
		Elementor\Group_Control_Typography::get_type(),
		array(
			'name'      => 'bar_percentage_typography',
			'label'     => esc_html__( 'Percentage Typography', 'mortgates' ),
			'selector'  => '{{WRAPPER}} .elementor-progress-percentage',
		)
	);

	$widget->end_controls_section();
}

/**
 * Modify wp widget arguments.
 *
 * @param array  $widget_args Widgets arguments.
 * @param object $widget      Elementor widget object.
 *
 * @return array
 */
function mortgates_modify_elementor_wp_widget_args( $widget_args, $widget ) {

	$instance       = $widget->get_widget_instance();
	$uniq_widget_id = sprintf( '%1$s-%2$s', $widget->get_name(), $widget->get_id() );

	$widget_args['widget_id']     = $uniq_widget_id;
	$widget_args['before_widget'] = sprintf( '<aside id="%1$s" class="widget %2$s">', $uniq_widget_id, $instance->widget_options['classname'] );
	$widget_args['after_widget']  = '</aside>';
	$widget_args['before_title']  = '<h5 class="widget-title">';
	$widget_args['after_title']   = '</h5>';

	return $widget_args;
}

/**
 * Add additional control to the countdown timer widget.
 *
 * @param object $widget Widget object.
 * @param array  $args   Widget arguments.
 */
function mortgates_countdown_timer_additional_control( $widget, $args ) {

	$widget->add_responsive_control(
		'label_alignment',
		array(
			'label'   => esc_html__( 'Alignment', 'mortgates' ),
			'type'    => Elementor\Controls_Manager::CHOOSE,
			'options' => array(
				'left'    => array(
					'title' => esc_html__( 'Left', 'mortgates' ),
					'icon'  => 'fa fa-align-left',
				),
				'center' => array(
					'title' => esc_html__( 'Center', 'mortgates' ),
					'icon'  => 'fa fa-align-center',
				),
				'right' => array(
					'title' => esc_html__( 'Right', 'mortgates' ),
					'icon'  => 'fa fa-align-right',
				),
			),
			'selectors'  => array(
				'{{WRAPPER}} .jet-countdown-timer__item-label' => 'text-align: {{VALUE}};',
			),
		),
		array(
			'position' => array(
				'of' => 'label_color',
			)
		)
	);
}

/**
 * Modify accordion widget.
 *
 * @param object $widget Widget object.
 * @param array  $args   Widget arguments.
 */
function mortgates_modify_accordion_widget ( $widget, $args ) {

	$widget->add_control(
		'title_hover_background',
		array(
			'label' => esc_html__( 'Hover Background', 'mortgates' ),
			'type' => Elementor\Controls_Manager::COLOR,
			'selectors' => array(
				'{{WRAPPER}} .elementor-accordion .elementor-accordion-title:hover' => 'background-color: {{VALUE}};',
			),
		),
		array(
			'position' => array(
				'of' => 'title_background',
			)
		)
	);

	$widget->add_control(
		'title_active_background',
		array(
			'label' => esc_html__( 'Active Background', 'mortgates' ),
			'type' => Elementor\Controls_Manager::COLOR,
			'selectors' => array(
				'{{WRAPPER}} .elementor-accordion .elementor-tab-title.elementor-active' => 'background-color: {{VALUE}};',
			),
		),
		array(
			'position' => array(
				'of' => 'title_hover_background',
			)
		)
	);

	$widget->add_control(
		'title_hover_color',
		[
			'label' => esc_html__( 'Hover Color', 'mortgates' ),
			'type' => Elementor\Controls_Manager::COLOR,
			'selectors' => [
				'{{WRAPPER}} .elementor-accordion .elementor-tab-title:hover' => 'color: {{VALUE}};',
			],
		],
		array(
			'position' => array(
				'of' => 'title_color',
			)
		)
	);
}
