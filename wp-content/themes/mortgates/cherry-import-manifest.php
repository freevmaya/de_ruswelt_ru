<?php
/**
 * Theme import manifest file.
 *
 * @var array
 *
 * @package Mortgates
 */
$settings = array(
	'xml' => false,
    'advanced_import' => array(
        'default' => array(
            'label'    => esc_html__( 'Mortgates', 'mortgates' ),
            'full'     => get_template_directory() . '/assets/demo-content/default/default.xml',
            'lite'     => false,
            'thumb'    => get_template_directory_uri() . '/assets/demo-content/default/default.png',
            'demo_url' => 'https://ld-wp.template-help.com/monstroid1/prod-13745/',
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
			'cherry-search',
			'cherry-search-default',
			'revslider-global-settings',
			'elementor_cpt_support',
			'elementor_disable_color_schemes',
			'elementor_disable_typography_schemes',
			'elementor_container_width',
			'elementor_css_print_method',
			'elementor_global_image_lightbox',
			'site_icon',
			'wsl_settings_social_icon_set',
			'toastie_smsb_li',
			'toastie_smsb_gp',
			'toastie_smsb_fb',
			'toastie_smsb_tw',
			'toastie_smsb_custom_fb',
			'toastie_smsb_custom_tw',
			'toastie_smsb_custom_gp',
			'toastie_smsb_custom_li',
			'toastie_smsb_format',
			'toastie_smsb_tu',
			'toastie_smsb_pi',
			'toastie_smsb_st',
			'toastie_smsb_vk',
			'toastie_smsb_em',
			'toastie_smsb_title',
			'toastie_smsb_email',
			'toastie_smsb_opengraph',
			'toastie_smsb_custom_pi',
			'toastie_smsb_custom_tu',
			'toastie_smsb_custom_st',
			'toastie_smsb_custom_vk',
			'toastie_smsb_custom_em',
			'jet-elements-settings',
		),
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
