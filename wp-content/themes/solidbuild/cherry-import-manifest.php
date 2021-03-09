<?php
/**
 * Default manifest file
 *
 * @var array
 *
 * @package Solidbuild
 */

$settings = array(
	'xml' => false,
	'advanced_import' => array(
		'default' => array(
			'label'    => esc_html__( 'Solidbuild', 'solidbuild' ),
			'full'     => get_template_directory() . '/assets/demo-content/default.xml',
			'thumb'    => get_template_directory_uri() . '/assets/demo-content/default-thumb.png',
			'demo_url' => 'http://ld-wp.template-help.com/monstroid1/prod-11346/',
		),

	),
	'import' => array(
		'chunk_size' => 3,
	),
	'slider' => array(
		'path' => 'https://raw.githubusercontent.com/JetImpex/wizard-slides/master/slides.json',
	),
	'export' => array(
		'options' => array(
			'cherry_projects_options',
			'cherry_projects_options_default',
			'cherry-team',
			'cherry-team_default',
			'cherry-services',
			'cherry-services_default',
			'elementor_default_generic_fonts',
			'elementor_container_width',
			'elementor_cpt_support',
			'elementor_disable_color_schemes',
			'elementor_disable_typography_schemes',
			'elementor_css_print_method',
			'elementor_editor_break_lines',
			'elementor_global_image_lightbox',
			'tm-mega-menu-effect',
			'tm-mega-menu-duration',
			'tm-mega-menu-parent-container',
			'tm-mega-menu-location',
			'tm-mega-menu-mobile-trigger',
			'site_icon',
		),
		'tables' => array(),
	),
	'success-links' => array(
		'home' => array(
			'label'  => __('View your site', 'jet-date-importer'),
			'type'   => 'primary',
			'target' => '_self',
			'icon'   => 'dashicons-welcome-view-site',
			'desc'   => __( 'Take a look at your site', 'jet-data-importer' ),
			'url'    => home_url( '/' ),
		),
		'edit' => array(
			'label'  => __('Start editing', 'jet-date-importer'),
			'type'   => 'primary',
			'target' => '_self',
			'icon'   => 'dashicons-welcome-write-blog',
			'desc'   => __( 'Proceed to editing pages', 'jet-data-importer' ),
			'url'    => admin_url( 'edit.php?post_type=page' ),
		),
		'knowledge-base' => array(
			'label'  => __('Knowledge Base', 'jet-data-importer'),
			'type'   => 'primary',
			'target' => '_blank',
			'icon'   => 'dashicons-sos',
			'desc'   => __( 'Access the vast knowledge base', 'jet-data-importer' ),
			'url'    => 'https://zemez.io/wordpress/support/knowledge-base',
		),
	),
);
