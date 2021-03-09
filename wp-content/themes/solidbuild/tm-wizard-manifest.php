<?php
/**
 * TM-Wizard configuration.
 *
 * @var array
 *
 * @package Solidbuild
 */

$plugins = array(
	'jet-data-importer' => array(
		'name'   => esc_html__( 'Jet  Data Importer', 'solidbuild' ),
		'source' => 'remote', // 'local', 'remote', 'wordpress' (default).
		'path'   => 'https://github.com/ZemezLab/jet-data-importer/archive/master.zip',
		'access' => 'base',
	),
	'elementor' => array(
		'name'   => esc_html__( 'Elementor Page Builder', 'solidbuild' ),
		'access' => 'base',
	),
	'cherry-projects' => array(
		'name'   => esc_html__( 'Cherry Projects', 'solidbuild' ),
		'access' => 'skins',
	),
	'cherry-popups' => array(
		'name'   => esc_html__( 'Cherry PopUps', 'solidbuild' ),
		'access' => 'base',
	),
	'cherry-team-members' => array(
		'name'   => esc_html__( 'Cherry Team Members', 'solidbuild' ),
		'access' => 'skins',
	),
	'cherry-testi' => array(
		'name'   => esc_html__( 'Cherry Testimonials', 'solidbuild' ),
		'access' => 'skins',
	),
	'cherry-services-list' => array(
		'name'   => esc_html__( 'Cherry Services List', 'solidbuild' ),
		'access' => 'skins',
	),
	'cherry-sidebars' => array(
		'name'   => esc_html__( 'Cherry Sidebars', 'solidbuild' ),
		'access' => 'base',
	),
	'cherry-socialize' => array(
		'name'   => esc_html__( 'Cherry Socialize', 'solidbuild' ),
		'access' => 'base',
	),
	'cherry-trending-posts' => array(
		'name'   => esc_html__( 'Cherry Trending Posts', 'solidbuild' ),
		'access' => 'skins',
	),
	'booked' => array(
		'name'   => esc_html__( 'Booked Appointments', 'solidbuild' ),
		'source' => 'local',
		'path'   => SOLIDBUILD_THEME_DIR . '/assets/includes/plugins/booked.zip',
		'access' => 'skins',
	),
	'jet-elements' => array(
		'name'   => esc_html__( 'Jet Elements addon For Elementor', 'solidbuild' ),
		'source' => 'local',
		'path'   => SOLIDBUILD_THEME_DIR . '/assets/includes/plugins/jet-elements.zip',
		'access' => 'base',
	),
	'tm-mega-menu' => array(
		'name'   => esc_html__( 'TM Mega Menu', 'solidbuild' ),
		'source' => 'remote',
		'path'   => 'http://cloud.cherryframework.com/downloads/free-plugins/tm-mega-menu.zip',
		'access' => 'skins',
	),
	'tm-photo-gallery' => array(
		'name'   => esc_html__( 'TM Photo Gallery', 'solidbuild' ),
		'access' => 'base',
	),
	'tm-timeline' => array(
		'name'   => esc_html__( 'TM Timeline', 'solidbuild' ),
		'access' => 'skins',
	),
	'contact-form-7' => array(
		'name'   => esc_html__( 'Contact Form 7', 'solidbuild' ),
		'access' => 'skins',
	),
	'simple-file-downloader' => array(
		'name'   => esc_html__( 'Simple File Downloader', 'solidbuild' ),
		'access' => 'skins',
	),
	'shortcode-widget' => array(
		'name'   => esc_html__( 'Shortcode Widget', 'solidbuild' ),
		'access' => 'skins',
	),
	'wordpress-social-login' => array(
		'name'   => esc_html__( 'WordPress Social Login', 'solidbuild' ),
		'access' => 'skins',
	),
);

/**
 * Skins configuration.
 *
 * @var array
 */
$skins = array(
	'base' => array(
		'jet-data-importer',
		'cherry-popups',
		'cherry-sidebars',
		'cherry-socialize',
		'jet-elements',
		'elementor',
		'tm-photo-gallery',
	),
	'advanced' => array(
		'default' => array(
			'full'  => array(
				'booked',
				'cherry-projects',
				'cherry-services-list',
				'cherry-team-members',
				'cherry-testi',
				'cherry-trending-posts',
				'tm-mega-menu',
				'tm-timeline',
				'contact-form-7',
				'simple-file-downloader',
				'shortcode-widget',
				'wordpress-social-login',
			),
			'lite'  => false,
			'demo'  => 'http://ld-wp.template-help.com/monstroid1/prod-11346/',
			'thumb' => get_template_directory_uri() . '/assets/demo-content/default-thumb.png',
			'name'  => esc_html__( 'Solidbuild', 'solidbuild' ),
		),
	),
);

$texts = array(
	'theme-name' => esc_html__( 'Solidbuild', 'solidbuild' ),
);
