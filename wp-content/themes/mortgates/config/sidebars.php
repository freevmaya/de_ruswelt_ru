<?php
/**
 * Sidebars configuration.
 *
 * @package Mortgates
 */

add_action( 'after_setup_theme', 'mortgates_register_sidebars', 5 );
/**
 * Register sidebars.
 */
function mortgates_register_sidebars() {

	mortgates_widget_area()->widgets_settings = apply_filters( 'mortgates_widget_area_default_settings', array(
		'sidebar' => array(
			'name'           => esc_html__( 'Sidebar', 'mortgates' ),
			'description'    => '',
			'before_widget'  => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'   => '</aside>',
			'before_title'   => '<h5 class="widget-title">',
			'after_title'    => '</h5>',
			'before_wrapper' => '<div id="%1$s" %2$s role="complementary">',
			'after_wrapper'  => '</div>',
			'is_global'      => true,
		),
		'full-width-header-area' => array(
			'name'           => esc_html__( 'Header Fullwidth Area', 'mortgates' ),
			'description'    => '',
			'before_widget'  => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'   => '</aside>',
			'before_title'   => '<h5 class="widget-title">',
			'after_title'    => '</h5>',
			'before_wrapper' => '<section id="%1$s" %2$s>',
			'after_wrapper'  => '</section>',
			'is_global'      => true,
		),
		'after-content-full-width-area' => array(
			'name'           => esc_html__( 'After Content Fullwidth Area', 'mortgates' ),
			'description'    => '',
			'before_widget'  => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'   => '</aside>',
			'before_title'   => '<h5 class="widget-title">',
			'after_title'    => '</h5>',
			'before_wrapper' => '<section id="%1$s" %2$s>',
			'after_wrapper'  => '</section>',
			'is_global'      => true,
		),
		'footer-area' => array(
			'name'           => esc_html__( 'Footer Area', 'mortgates' ),
			'description'    => '',
			'before_widget'  => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'   => '</aside>',
			'before_title'   => '<h6 class="widget-title">',
			'after_title'    => '</h6>',
			'before_wrapper' => '<section id="%1$s" %2$s>',
			'after_wrapper'  => '</section>',
			'is_global'      => true,
		),
	) );
}
