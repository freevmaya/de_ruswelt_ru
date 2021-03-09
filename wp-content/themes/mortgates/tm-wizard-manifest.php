<?php
/**
 * TM Wizard configuration.
 *
 * @var array
 *
 * @package Mortgates
 */
$plugins = array(
	'jet-data-importer' => array(
		'name'   => esc_html__( 'Jet  Data Importer', 'mortgates' ),
		'source' => 'remote', // 'local', 'remote', 'wordpress' (default).
		'path'   => 'https://github.com/ZemezLab/jet-data-importer/archive/master.zip',
		'access' => 'base',
	),
	'cherry-projects' => array(
		'name'   => esc_html__( 'Cherry Projects', 'mortgates' ),
		'access' => 'skins',
	),
	'cherry-team-members' => array(
		'name'   => esc_html__( 'Cherry Team Members', 'mortgates' ),
		'access' => 'skins',
	),
	'cherry-testi' => array(
		'name'   => esc_html__( 'Cherry Testimonials', 'mortgates' ),
		'access' => 'skins',
	),
	'cherry-services-list' => array(
		'name'   => esc_html__( 'Cherry Services List', 'mortgates' ),
		'access' => 'skins',
	),
	'cherry-sidebars' => array(
		'name'   => esc_html__( 'Cherry Sidebars', 'mortgates' ),
		'access' => 'skins',
	),
	'cherry-search' => array(
		'name'   => esc_html__( 'Cherry Search', 'mortgates' ),
		'access' => 'skins',
	),
	'cherry-popups' => array(
		'name'   => esc_html__( 'Cherry Popups', 'mortgates' ),
		'access' => 'skins',
	),
	'cherry-trending-posts' => array(
		'name'   => esc_html__( 'Cherry Trending Posts', 'mortgates' ),
		'access' => 'skins',
	),
	'wordpress-social-login' => array(
		'name'   => esc_html__( 'WordPress Social Login', 'mortgates' ),
		'access' => 'skins',
	),
	'elementor' => array(
		'name'   => esc_html__( 'Elementor Page Builder', 'mortgates' ),
		'access' => 'base',
	),
	'jet-menu' => array(
		'name'   => esc_html__( 'Jet Menu', 'mortgates' ),
		'source' => 'local',
		'path'   => MORTGATES_THEME_DIR . '/assets/includes/plugins/jet-menu.zip',
		'access' => 'base',
	),
	'jet-elements' => array(
		'name'   => esc_html__( 'Jet Elements', 'mortgates' ),
		'source' => 'local',
		'path'   => MORTGATES_THEME_DIR . '/assets/includes/plugins/jet-elements.zip',
		'access' => 'base',
	),
	'tm-photo-gallery' => array(
		'name'   => esc_html__( 'TM Photo Gallery', 'mortgates' ),
		'access' => 'skins',
	),
	'tm-timeline' => array(
		'name'   => esc_html__( 'TM Timeline', 'mortgates' ),
		'access' => 'skins',
	),
	'contact-form-7' => array(
		'name'   => esc_html__( 'Contact Form 7', 'mortgates' ),
		'access' => 'skins',
	),
	'the-events-calendar' => array(
		'name'   => esc_html__( 'The Events Calendar', 'mortgates' ),
		'access' => 'skins',
	),
    'calculated-fields-form' => array(
        'name'   => esc_html__( 'Calculated Fields Form', 'mortgates' ),
        'access' => 'skins',
    ),
);

/**
 * Skins configuration example
 *
 * @var array
 */
$skins = array(
	'base' => array(
		'elementor',
		'jet-elements',
		'jet-menu',
		'jet-data-importer',
	),
	'advanced' => array(
		'default' => array(
			'full'  => array(
				'cherry-projects',
				'cherry-team-members',
				'cherry-testi',
				'cherry-services-list',
				'cherry-sidebars',
				'cherry-trending-posts',
				'cherry-search',
				'cherry-popups',
				'wordpress-social-login',
				'tm-photo-gallery',
				'tm-timeline',
				'contact-form-7',
				'the-events-calendar',
                'calculated-fields-form',
			),
			'lite'  => false,
			'demo'  => 'https://ld-wp.template-help.com/monstroid1/prod-13745/',
			'thumb' => get_template_directory_uri() . '/assets/demo-content/default/default.png',
			'name'  => esc_html__( 'Mortgates', 'mortgates' ),
		),
	),
);

$texts = array(
	'theme-name' => esc_html__( 'Mortgates', 'mortgates' ),
);
