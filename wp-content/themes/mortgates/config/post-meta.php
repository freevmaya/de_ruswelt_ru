<?php
/**
 * Post meta configuration.
 *
 * @package Mortgates
 */

/**
 * Get post meta settings.
 *
 * @return array
 */
function mortgates_get_post_meta_settings() {

	$container_options = array(
		'inherit'   => array(
			'label'   => esc_html__( 'Inherit', 'mortgates' ),
			'img_src' => trailingslashit( MORTGATES_THEME_URI ) . 'assets/images/admin/inherit.svg',
		),
		'boxed'     => array(
			'label'   => esc_html__( 'Boxed', 'mortgates' ),
			'img_src' => trailingslashit( MORTGATES_THEME_URI ) . 'assets/images/admin/type-boxed.svg',
		),
		'fullwidth' => array(
			'label'   => esc_html__( 'Fullwidth', 'mortgates' ),
			'img_src' => trailingslashit( MORTGATES_THEME_URI ) . 'assets/images/admin/type-fullwidth.svg',
		),
	);

	return apply_filters( 'mortgates_get_post_meta_settings',  array(
		'id'            => 'page-settings',
		'title'         => esc_html__( 'Page settings', 'mortgates' ),
		'page'          => array( 'post', 'page', 'team', 'projects', 'cherry-services' ),
		'context'       => 'normal',
		'priority'      => 'high',
		'callback_args' => false,
		'fields'        => array(
			'tabs' => array(
				'element' => 'component',
				'type'    => 'component-tab-horizontal',
			),
			'layout_tab' => array(
				'element'     => 'settings',
				'parent'      => 'tabs',
				'title'       => esc_html__( 'Layout Options', 'mortgates' ),
			),
			'header_tab' => array(
				'element'     => 'settings',
				'parent'      => 'tabs',
				'title'       => esc_html__( 'Header Style', 'mortgates' ),
				'description' => esc_html__( 'Header style settings', 'mortgates' ),
			),
			'header_elements_tab' => array(
				'element'     => 'settings',
				'parent'      => 'tabs',
				'title'       => esc_html__( 'Header Elements', 'mortgates' ),
				'description' => esc_html__( 'Enable/Disable header elements', 'mortgates' ),
			),
			'breadcrumbs_tab' => array(
				'element'     => 'settings',
				'parent'      => 'tabs',
				'title'       => esc_html__( 'Breadcrumbs', 'mortgates' ),
				'description' => esc_html__( 'Breadcrumbs settings', 'mortgates' ),
			),
			'footer_tab' => array(
				'element'     => 'settings',
				'parent'      => 'tabs',
				'title'       => esc_html__( 'Footer Settings', 'mortgates' ),
				'description' => esc_html__( 'Footer settings', 'mortgates' ),
			),
			'mortgates_sidebar_position' => array(
				'type'          => 'radio',
				'parent'        => 'layout_tab',
				'title'         => esc_html__( 'Sidebar layout', 'mortgates' ),
				'description'   => esc_html__( 'Sidebar position global settings redefining. If you select inherit option, global setting will be applied for this layout', 'mortgates' ),
				'value'         => 'inherit',
				'display_input' => false,
				'options'       => array(
					'inherit' => array(
						'label'   => esc_html__( 'Inherit', 'mortgates' ),
						'img_src' => trailingslashit( MORTGATES_THEME_URI ) . 'assets/images/admin/inherit.svg',
					),
					'one-left-sidebar' => array(
						'label'   => esc_html__( 'Sidebar on left side', 'mortgates' ),
						'img_src' => trailingslashit( MORTGATES_THEME_URI ) . 'assets/images/admin/page-layout-left-sidebar.svg',
					),
					'one-right-sidebar' => array(
						'label'   => esc_html__( 'Sidebar on right side', 'mortgates' ),
						'img_src' => trailingslashit( MORTGATES_THEME_URI ) . 'assets/images/admin/page-layout-right-sidebar.svg',
					),
					'fullwidth' => array(
						'label'   => esc_html__( 'No sidebar', 'mortgates' ),
						'img_src' => trailingslashit( MORTGATES_THEME_URI ) . 'assets/images/admin/page-layout-fullwidth.svg',
					),
				),
			),
			'mortgates_page_container_type' => array(
				'type'          => 'radio',
				'parent'        => 'layout_tab',
				'title'         => esc_html__( 'Page type', 'mortgates' ),
				'description'   => esc_html__( 'Page type global settings redefining. If you select inherit option, global setting will be applied for this layout', 'mortgates' ),
				'value'         => 'inherit',
				'display_input' => false,
				'options'       => $container_options,
			),
			'mortgates_header_container_type' => array(
				'type'          => 'radio',
				'parent'        => 'layout_tab',
				'title'         => esc_html__( 'Header container type', 'mortgates' ),
				'description'   => esc_html__( 'Header container type global settings redefining. If you select inherit option, global setting will be applied for this layout', 'mortgates' ),
				'value'         => 'inherit',
				'display_input' => false,
				'options'       => $container_options,
			),
			'mortgates_breadcrumbs_container_type' => array(
				'type'          => 'radio',
				'parent'        => 'layout_tab',
				'title'         => esc_html__( 'Breadcrumbs container type', 'mortgates' ),
				'description'   => esc_html__( 'Breadcrumbs container type global settings redefining. If you select inherit option, global setting will be applied for this layout', 'mortgates' ),
				'value'         => 'inherit',
				'display_input' => false,
				'options'       => $container_options,
			),
			'mortgates_content_container_type' => array(
				'type'          => 'radio',
				'parent'        => 'layout_tab',
				'title'         => esc_html__( 'Content container type', 'mortgates' ),
				'description'   => esc_html__( 'Content container type global settings redefining. If you select inherit option, global setting will be applied for this layout', 'mortgates' ),
				'value'         => 'inherit',
				'display_input' => false,
				'options'       => $container_options,
			),
			'mortgates_footer_container_type'  => array(
				'type'          => 'radio',
				'parent'        => 'layout_tab',
				'title'         => esc_html__( 'Footer container type', 'mortgates' ),
				'description'   => esc_html__( 'Footer container type global settings redefining. If you select inherit option, global setting will be applied for this layout', 'mortgates' ),
				'value'         => 'inherit',
				'display_input' => false,
				'options'       => $container_options,
			),
			'mortgates_header_layout_type' => array(
				'type'    => 'select',
				'parent'  => 'header_tab',
				'title'   => esc_html__( 'Header Layout', 'mortgates' ),
				'value'   => 'inherit',
				'options' => mortgates_get_header_layout_pm_options(),
			),
			'mortgates_header_transparent_layout' => array(
				'type'          => 'radio',
				'parent'        => 'header_tab',
				'title'         => esc_html__( 'Header Transparent Overlay', 'mortgates' ),
				'value'         => 'inherit',
				'display_input' => false,
				'options' => array(
					'inherit' => array(
						'label' => esc_html__( 'Inherit', 'mortgates' ),
					),
					'true'    => array(
						'label' => esc_html__( 'Enable', 'mortgates' ),
						'slave' => 'header-transparent',
					),
					'false'   => array(
						'label' => esc_html__( 'Disable', 'mortgates' ),
					),
				),
			),
			'mortgates_header_transparent_bg' => array(
				'type'          => 'colorpicker',
				'parent'        => 'header_tab',
				'title'         => esc_html__( 'Header Transparent Background', 'mortgates' ),
				'value'         => '',
				'master'        => 'header-transparent',
				'display_input' => false,
			),
			'mortgates_header_transparent_bg_alpha' => array(
				'type'          => 'slider',
				'parent'        => 'header_tab',
				'title'         => esc_html__( 'Header Transparent Background Alpha', 'mortgates' ),
				'max_value'     => 100,
				'min_value'     => -1,
				'step_value'    => 1,
				'master'        => 'header-transparent',
				'display_input' => false,
			),
			'mortgates_header_invert_color_scheme' => array(
				'type'          => 'radio',
				'parent'        => 'header_tab',
				'title'         => esc_html__( 'Invert Color Scheme', 'mortgates' ),
				'value'         => 'inherit',
				'display_input' => false,
				'options' => array(
					'inherit' => array(
						'label' => esc_html__( 'Inherit', 'mortgates' ),
					),
					'true'    => array(
						'label' => esc_html__( 'Enable', 'mortgates' ),
					),
					'false'   => array(
						'label' => esc_html__( 'Disable', 'mortgates' ),
					),
				),
			),
			'mortgates_top_panel_visibility' => array(
				'type'          => 'select',
				'parent'        => 'header_elements_tab',
				'title'         => esc_html__( 'Top panel', 'mortgates' ),
				'value'         => 'inherit',
				'display_input' => false,
				'options' => array(
					'inherit' => esc_html__( 'Inherit', 'mortgates' ),
					'true'    => esc_html__( 'Enable', 'mortgates' ),
					'false'   => esc_html__( 'Disable', 'mortgates' ),
				),
			),
			'mortgates_header_contact_block_visibility' => array(
				'type'          => 'select',
				'parent'        => 'header_elements_tab',
				'title'         => esc_html__( 'Header Contact Block', 'mortgates' ),
				'value'         => 'inherit',
				'display_input' => false,
				'options' => array(
					'inherit' => esc_html__( 'Inherit', 'mortgates' ),
					'true'    => esc_html__( 'Enable', 'mortgates' ),
					'false'   => esc_html__( 'Disable', 'mortgates' ),
				),
			),
			'mortgates_header_search' => array(
				'type'          => 'select',
				'parent'        => 'header_elements_tab',
				'title'         => esc_html__( 'Header Search', 'mortgates' ),
				'value'         => 'inherit',
				'display_input' => false,
				'options' => array(
					'inherit' => esc_html__( 'Inherit', 'mortgates' ),
					'true'    => esc_html__( 'Enable', 'mortgates' ),
					'false'   => esc_html__( 'Disable', 'mortgates' ),
				),
			),
			'mortgates_breadcrumbs_visibillity' => array(
				'type'          => 'radio',
				'parent'        => 'breadcrumbs_tab',
				'title'         => esc_html__( 'Breadcrumbs visibillity', 'mortgates' ),
				'value'         => 'inherit',
				'display_input' => false,
				'options' => array(
					'inherit' => array(
						'label' => esc_html__( 'Inherit', 'mortgates' ),
					),
					'true'    => array(
						'label' => esc_html__( 'Enable', 'mortgates' ),
					),
					'false'   => array(
						'label' => esc_html__( 'Disable', 'mortgates' ),
					),
				),
			),
			'mortgates_footer_layout_type' => array(
				'type'    => 'select',
				'parent'  => 'footer_tab',
				'title'   => esc_html__( 'Footer Layout', 'mortgates' ),
				'value'   => 'inherit',
				'options' => mortgates_get_footer_layout_pm_options(),
			),
			'mortgates_footer_widget_area_visibility' => array(
				'type'          => 'select',
				'parent'        => 'footer_tab',
				'title'         => esc_html__( 'Footer Widgets Area', 'mortgates' ),
				'value'         => 'inherit',
				'display_input' => false,
				'options' => array(
					'inherit' => esc_html__( 'Inherit', 'mortgates' ),
					'true'    => esc_html__( 'Enable', 'mortgates' ),
					'false'   => esc_html__( 'Disable', 'mortgates' ),
				),
			),
			'mortgates_footer_contact_block_visibility' => array(
				'type'          => 'select',
				'parent'        => 'footer_tab',
				'title'         => esc_html__( 'Footer Contact Block', 'mortgates' ),
				'value'         => 'inherit',
				'display_input' => false,
				'options' => array(
					'inherit' => esc_html__( 'Inherit', 'mortgates' ),
					'true'    => esc_html__( 'Enable', 'mortgates' ),
					'false'   => esc_html__( 'Disable', 'mortgates' ),
				),
			),
		),
	) ) ;
}
