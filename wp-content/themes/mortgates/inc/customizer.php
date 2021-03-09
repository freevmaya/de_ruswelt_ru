<?php
/**
 * Theme Customizer.
 *
 * @package Mortgates
 */

/**
 * Retrieve a holder for Customizer options.
 *
 * @since  1.0.0
 * @return array
 */
function mortgates_get_customizer_options() {
	/**
	 * Filter a holder for Customizer options (for theme/plugin developer customization).
	 *
	 * @since 1.0.0
	 */
	return apply_filters( 'mortgates_get_customizer_options' , array(
		'prefix'     => 'mortgates',
		'capability' => 'edit_theme_options',
		'type'       => 'theme_mod',
		'options'    => array(

			/** `Site Identity` section */
			'show_tagline' => array(
				'title'    => esc_html__( 'Show tagline after logo', 'mortgates' ),
				'section'  => 'title_tagline',
				'priority' => 60,
				'default'  => false,
				'field'    => 'checkbox',
				'type'     => 'control',
			),
			'totop_visibility' => array(
				'title'    => esc_html__( 'Show ToTop button', 'mortgates' ),
				'section'  => 'title_tagline',
				'priority' => 61,
				'default'  => true,
				'field'    => 'checkbox',
				'type'     => 'control',
			),

			/** `General Site settings` panel */
			'general_settings' => array(
				'title'    => esc_html__( 'General Site settings', 'mortgates' ),
				'priority' => 40,
				'type'     => 'panel',
			),

			/** `Logo & Favicon` section */
			'logo_favicon' => array(
				'title'    => esc_html__( 'Logo &amp; Favicon', 'mortgates' ),
				'priority' => 25,
				'panel'    => 'general_settings',
				'type'     => 'section',
			),
			'header_logo_type' => array(
				'title'   => esc_html__( 'Logo Type', 'mortgates' ),
				'section' => 'logo_favicon',
				'default' => 'image',
				'field'   => 'radio',
				'choices' => array(
					'image' => esc_html__( 'Image', 'mortgates' ),
					'text'  => esc_html__( 'Text', 'mortgates' ),
				),
				'type' => 'control',
			),
			'header_logo_url' => array(
				'title'           => esc_html__( 'Logo Upload', 'mortgates' ),
				'description'     => esc_html__( 'Upload logo image', 'mortgates' ),
				'section'         => 'logo_favicon',
				'default'         => '%s/assets/images/logo.png',
				'field'           => 'image',
				'type'            => 'control',
				'active_callback' => 'mortgates_is_header_logo_image',
			),
			'invert_header_logo_url' => array(
				'title'           => esc_html__( 'Invert Logo Upload', 'mortgates' ),
				'description'     => esc_html__( 'Upload logo image', 'mortgates' ),
				'section'         => 'logo_favicon',
				'default'         => '%s/assets/images/invert-logo.png',
				'field'           => 'image',
				'type'            => 'control',
				'active_callback' => 'mortgates_is_header_logo_image',
			),
			'retina_header_logo_url' => array(
				'title'           => esc_html__( 'Retina Logo Upload', 'mortgates' ),
				'description'     => esc_html__( 'Upload logo for retina-ready devices', 'mortgates' ),
				'section'         => 'logo_favicon',
				'field'           => 'image',
				'type'            => 'control',
				'active_callback' => 'mortgates_is_header_logo_image',
			),
			'invert_retina_header_logo_url' => array(
				'title'           => esc_html__( 'Invert Retina Logo Upload', 'mortgates' ),
				'description'     => esc_html__( 'Upload logo for retina-ready devices', 'mortgates' ),
				'section'         => 'logo_favicon',
				'default'         => false,
				'field'           => 'image',
				'type'            => 'control',
				'active_callback' => 'mortgates_is_header_logo_image',
			),
			'header_logo_font_family' => array(
				'title'           => esc_html__( 'Font Family', 'mortgates' ),
				'section'         => 'logo_favicon',
				'default'         => 'Montserrat, sans-serif',
				'field'           => 'fonts',
				'type'            => 'control',
				'active_callback' => 'mortgates_is_header_logo_text',
			),
			'header_logo_font_style' => array(
				'title'           => esc_html__( 'Font Style', 'mortgates' ),
				'section'         => 'logo_favicon',
				'default'         => 'normal',
				'field'           => 'select',
				'choices'         => mortgates_get_font_styles(),
				'type'            => 'control',
				'active_callback' => 'mortgates_is_header_logo_text',
			),
			'header_logo_font_weight' => array(
				'title'           => esc_html__( 'Font Weight', 'mortgates' ),
				'section'         => 'logo_favicon',
				'default'         => '700',
				'field'           => 'select',
				'choices'         => mortgates_get_font_weight(),
				'type'            => 'control',
				'active_callback' => 'mortgates_is_header_logo_text',
			),
			'header_logo_font_size' => array(
				'title'           => esc_html__( 'Font Size, px', 'mortgates' ),
				'section'         => 'logo_favicon',
				'default'         => '24',
				'field'           => 'number',
				'input_attrs'     => array(
					'min'  => 6,
					'max'  => 50,
					'step' => 1,
				),
				'type'            => 'control',
				'active_callback' => 'mortgates_is_header_logo_text',
			),
			'header_logo_line_height' => array(
				'title'       => esc_html__( 'Line Height', 'mortgates' ),
				'description' => esc_html__( 'Relative to the font-size of the element', 'mortgates' ),
				'section'     => 'logo_favicon',
				'default'     => '1',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type' => 'control',
				'active_callback' => 'mortgates_is_header_logo_text',
			),
			'header_logo_letter_spacing' => array(
				'title'       => esc_html__( 'Letter Spacing, em', 'mortgates' ),
				'section'     => 'logo_favicon',
				'default'     => '0.1',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => -1,
					'max'  => 1,
					'step' => 0.01,
				),
				'type' => 'control',
				'active_callback' => 'mortgates_is_header_logo_text',
			),
			'header_logo_character_set' => array(
				'title'           => esc_html__( 'Character Set', 'mortgates' ),
				'section'         => 'logo_favicon',
				'default'         => 'latin',
				'field'           => 'select',
				'choices'         => mortgates_get_character_sets(),
				'type'            => 'control',
				'active_callback' => 'mortgates_is_header_logo_text',
			),
			'header_logo_text_transform' => array(
				'title'   => esc_html__( 'Text Transform', 'mortgates' ),
				'section' => 'logo_favicon',
				'default' => 'uppercase',
				'field'   => 'select',
				'choices' => mortgates_get_text_transform(),
				'type'    => 'control',
				'active_callback' => 'mortgates_is_header_logo_text',
			),

			/** `Breadcrumbs` section */
			'breadcrumbs' => array(
				'title'    => esc_html__( 'Breadcrumbs', 'mortgates' ),
				'priority' => 30,
				'type'     => 'section',
				'panel'    => 'general_settings',
			),
			'breadcrumbs_visibillity' => array(
				'title'   => esc_html__( 'Enable Breadcrumbs', 'mortgates' ),
				'section' => 'breadcrumbs',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'breadcrumbs_front_visibillity' => array(
				'title'   => esc_html__( 'Enable Breadcrumbs on front page', 'mortgates' ),
				'section' => 'breadcrumbs',
				'default' => false,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'breadcrumbs_page_title' => array(
				'title'   => esc_html__( 'Enable page title in breadcrumbs area', 'mortgates' ),
				'section' => 'breadcrumbs',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'breadcrumbs_path_type' => array(
				'title'   => esc_html__( 'Show full/minified path', 'mortgates' ),
				'section' => 'breadcrumbs',
				'default' => 'full',
				'field'   => 'select',
				'choices' => array(
					'full'     => esc_html__( 'Full', 'mortgates' ),
					'minified' => esc_html__( 'Minified', 'mortgates' ),
				),
				'type'    => 'control',
			),
			'breadcrumbs_bg_color' => array(
				'title'   => esc_html__( 'Background Color', 'mortgates' ),
				'section' => 'breadcrumbs',
				'default' => '#42474C',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'breadcrumbs_bg_image' => array(
				'title'   => esc_html__( 'Background Image', 'mortgates' ),
				'section' => 'breadcrumbs',
				'default' => '%s/assets/images/breadcrumbs_bg.jpg',
				'field'   => 'image',
				'type'    => 'control',
			),
			'breadcrumbs_bg_repeat' => array(
				'title'   => esc_html__( 'Background Repeat', 'mortgates' ),
				'section' => 'breadcrumbs',
				'default' => 'no-repeat',
				'field'   => 'select',
				'choices' => mortgates_get_bg_repeat(),
				'type'    => 'control',
			),
			'breadcrumbs_bg_position' => array(
				'title'   => esc_html__( 'Background Position', 'mortgates' ),
				'section' => 'breadcrumbs',
				'default' => 'center',
				'field'   => 'select',
				'choices' => mortgates_get_bg_position(),
				'type'    => 'control',
			),
			'breadcrumbs_bg_size' => array(
				'title'   => esc_html__( 'Background Size', 'mortgates' ),
				'section' => 'breadcrumbs',
				'default' => 'cover',
				'field'   => 'select',
				'choices' => mortgates_get_bg_size(),
				'type'    => 'control',
			),
			'breadcrumbs_bg_attachment' => array(
				'title'   => esc_html__( 'Background Attachment', 'mortgates' ),
				'section' => 'breadcrumbs',
				'default' => 'scroll',
				'field'   => 'select',
				'choices' => mortgates_get_bg_attachment(),
				'type'    => 'control',
			),
			'breadcrumbs_text_color' => array(
				'title'       => esc_html__( 'Text Color', 'mortgates' ),
				'description' => esc_html__( 'Here you can choose whether your text should be light or dark. If you are working with a dark background, then your text should be light. If your background is light, then your text should be set to dark.', 'mortgates' ),
				'section'     => 'breadcrumbs',
				'default'     => 'light',
				'field'       => 'select',
				'choices'     => mortgates_get_text_color(),
				'type'        => 'control',
			),
			'breadcrumbs_padding_y' => array(
				'title'       => esc_html__( 'Desktop Padding Top Bottom (px)', 'mortgates' ),
				'section'     => 'breadcrumbs',
				'default'     => 70,
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 5,
					'max'  => 120,
					'step' => 1,
				),
				'type' => 'control',
			),
			'breadcrumbs_padding_y_tablet' => array(
				'title'       => esc_html__( 'Tablet Padding Top Bottom (px)', 'mortgates' ),
				'section'     => 'breadcrumbs',
				'default'     => 40,
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 5,
					'max'  => 120,
					'step' => 1,
				),
				'type' => 'control',
			),
			'breadcrumbs_padding_y_mobile' => array(
				'title'       => esc_html__( 'Mobile Padding Top Bottom (px)', 'mortgates' ),
				'section'     => 'breadcrumbs',
				'default'     => 20,
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 5,
					'max'  => 120,
					'step' => 1,
				),
				'type' => 'control',
			),

			/** `Social links` section */
			'social_links' => array(
				'title'    => esc_html__( 'Social links', 'mortgates' ),
				'priority' => 50,
				'type'     => 'section',
				'panel'    => 'general_settings',
			),
			'header_social_links' => array(
				'title'   => esc_html__( 'Show social links in header', 'mortgates' ),
				'section' => 'social_links',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'footer_social_links' => array(
				'title'   => esc_html__( 'Show social links in footer', 'mortgates' ),
				'section' => 'social_links',
				'default' => false,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'blog_post_share_buttons' => array(
				'title'   => esc_html__( 'Show social sharing to blog posts', 'mortgates' ),
				'section' => 'social_links',
				'default' => false,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'single_post_share_buttons' => array(
				'title'   => esc_html__( 'Show social sharing to single blog post', 'mortgates' ),
				'section' => 'social_links',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),

			/** `Page Layout` section */
			'page_layout' => array(
				'title'    => esc_html__( 'Page Layout', 'mortgates' ),
				'priority' => 55,
				'type'     => 'section',
				'panel'    => 'general_settings',
			),
			'page_container_type' => array(
				'title'   => esc_html__( 'Page type', 'mortgates' ),
				'section' => 'page_layout',
				'default' => 'fullwidth',
				'field'   => 'select',
				'choices' => array(
					'boxed'     => esc_html__( 'Boxed', 'mortgates' ),
					'fullwidth' => esc_html__( 'Fullwidth', 'mortgates' ),
				),
				'type' => 'control',
			),
			'page_boxed_width' => array(
				'title'       => esc_html__( 'Page boxed width (px)', 'mortgates' ),
				'section'     => 'page_layout',
				'default'     => 1200,
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 960,
					'max'  => 1920,
					'step' => 1,
				),
				'type' => 'control',
				'active_callback' => 'mortgates_is_page_type_boxed',
			),
			'header_container_type' => array(
				'title'   => esc_html__( 'Header container type', 'mortgates' ),
				'section' => 'page_layout',
				'default' => 'boxed',
				'field'   => 'select',
				'choices' => array(
					'boxed'     => esc_html__( 'Boxed', 'mortgates' ),
					'fullwidth' => esc_html__( 'Fullwidth', 'mortgates' ),
				),
				'type' => 'control',
			),
			'breadcrumbs_container_type' => array(
				'title'   => esc_html__( 'Breadcrumbs container type', 'mortgates' ),
				'section' => 'page_layout',
				'default' => 'boxed',
				'field'   => 'select',
				'choices' => array(
					'boxed'     => esc_html__( 'Boxed', 'mortgates' ),
					'fullwidth' => esc_html__( 'Fullwidth', 'mortgates' ),
				),
				'type' => 'control',
			),
			'content_container_type' => array(
				'title'   => esc_html__( 'Content container type', 'mortgates' ),
				'section' => 'page_layout',
				'default' => 'boxed',
				'field'   => 'select',
				'choices' => array(
					'boxed'     => esc_html__( 'Boxed', 'mortgates' ),
					'fullwidth' => esc_html__( 'Fullwidth', 'mortgates' ),
				),
				'type' => 'control',
			),
			'footer_container_type' => array(
				'title'   => esc_html__( 'Footer container type', 'mortgates' ),
				'section' => 'page_layout',
				'default' => 'boxed',
				'field'   => 'select',
				'choices' => array(
					'boxed'     => esc_html__( 'Boxed', 'mortgates' ),
					'fullwidth' => esc_html__( 'Fullwidth', 'mortgates' ),
				),
				'type' => 'control',
			),
			'container_width' => array(
				'title'       => esc_html__( 'Container width (px)', 'mortgates' ),
				'section'     => 'page_layout',
				'default'     => 1200,
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 960,
					'max'  => 1920,
					'step' => 1,
				),
				'type' => 'control',
			),
			'sidebar_width' => array(
				'title'   => esc_html__( 'Sidebar width', 'mortgates' ),
				'section' => 'page_layout',
				'default' => '1/3',
				'field'   => 'select',
				'choices' => array(
					'1/3' => '1/3',
					'1/4' => '1/4',
				),
				'sanitize_callback' => 'sanitize_text_field',
				'type'              => 'control',
			),

			/** `Page Preloader` section */
			'page_preloader_section' => array(
				'title'    => esc_html__( 'Page Preloader', 'mortgates' ),
				'priority' => 60,
				'type'     => 'section',
				'panel'    => 'general_settings',
			),

			'page_preloader' => array(
				'title'    => esc_html__( 'Show page preloader', 'mortgates' ),
				'section'  => 'page_preloader_section',
				'priority' => 10,
				'default'  => true,
				'field'    => 'checkbox',
				'type'     => 'control',
			),

			'page_preloader_bg' => array(
				'title'           => esc_html__( 'Preloader Cover Background Color', 'mortgates' ),
				'section'         => 'page_preloader_section',
				'default'         => '#fff',
				'field'           => 'hex_color',
				'type'            => 'control',
				'active_callback' => 'mortgates_is_page_preloader_enable',
			),

			'page_preloader_url' => array(
				'title'           => esc_html__( 'Preloader Image Upload', 'mortgates' ),
				'section'         => 'page_preloader_section',
				'field'           => 'image',
				'default'         => '%s/assets/images/preloader-image.png',
				'type'            => 'control',
				'active_callback' => 'mortgates_is_page_preloader_enable',
			),

			/** `Color Scheme` panel */
			'color_scheme' => array(
				'title'       => esc_html__( 'Color Scheme', 'mortgates' ),
				'description' => esc_html__( 'Configure Color Scheme', 'mortgates' ),
				'priority'    => 40,
				'type'        => 'panel',
			),

			/** `Regular scheme` section */
			'regular_scheme' => array(
				'title'       => esc_html__( 'Regular scheme', 'mortgates' ),
				'priority'    => 10,
				'panel'       => 'color_scheme',
				'type'        => 'section',
			),
			'regular_accent_color_1' => array(
				'title'   => esc_html__( 'Accent color (1)', 'mortgates' ),
				'section' => 'regular_scheme',
				'default' => '#4fd2ab',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'regular_accent_color_2' => array(
				'title'   => esc_html__( 'Accent color (2)', 'mortgates' ),
				'section' => 'regular_scheme',
				'default' => '#444c5c',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'regular_text_color' => array(
				'title'   => esc_html__( 'Text color', 'mortgates' ),
				'section' => 'regular_scheme',
				'default' => '#42474c',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'regular_link_color' => array(
				'title'   => esc_html__( 'Link color', 'mortgates' ),
				'section' => 'regular_scheme',
				'default' => '#899296',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'regular_link_hover_color' => array(
				'title'   => esc_html__( 'Link hover color', 'mortgates' ),
				'section' => 'regular_scheme',
				'default' => '#4fd2ab',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'regular_h1_color' => array(
				'title'   => esc_html__( 'H1 color', 'mortgates' ),
				'section' => 'regular_scheme',
				'default' => '#262d36',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'regular_h2_color' => array(
				'title'   => esc_html__( 'H2 color', 'mortgates' ),
				'section' => 'regular_scheme',
				'default' => '#262d36',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'regular_h3_color' => array(
				'title'   => esc_html__( 'H3 color', 'mortgates' ),
				'section' => 'regular_scheme',
				'default' => '#262d36',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'regular_h4_color' => array(
				'title'   => esc_html__( 'H4 color', 'mortgates' ),
				'section' => 'regular_scheme',
				'default' => '#262d36',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'regular_h5_color' => array(
				'title'   => esc_html__( 'H5 color', 'mortgates' ),
				'section' => 'regular_scheme',
				'default' => '#262d36',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'regular_h6_color' => array(
				'title'   => esc_html__( 'H6 color', 'mortgates' ),
				'section' => 'regular_scheme',
				'default' => '#42474c',
				'field'   => 'hex_color',
				'type'    => 'control',
			),

			/** `Invert scheme` section */
			'invert_scheme' => array(
				'title'       => esc_html__( 'Invert scheme', 'mortgates' ),
				'priority'    => 20,
				'panel'       => 'color_scheme',
				'type'        => 'section',
			),
			'invert_accent_color_1' => array(
				'title'   => esc_html__( 'Accent color (1)', 'mortgates' ),
				'section' => 'invert_scheme',
				'default' => '#ffffff',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'invert_text_color' => array(
				'title'   => esc_html__( 'Text color', 'mortgates' ),
				'section' => 'invert_scheme',
				'default' => '#ffffff',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'invert_link_color' => array(
				'title'   => esc_html__( 'Link color', 'mortgates' ),
				'section' => 'invert_scheme',
				'default' => '#ffffff',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'invert_link_hover_color' => array(
				'title'   => esc_html__( 'Link hover color', 'mortgates' ),
				'section' => 'invert_scheme',
				'default' => '#4fd2ab',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'invert_h1_color' => array(
				'title'   => esc_html__( 'H1 color', 'mortgates' ),
				'section' => 'invert_scheme',
				'default' => '#ffffff',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'invert_h2_color' => array(
				'title'   => esc_html__( 'H2 color', 'mortgates' ),
				'section' => 'invert_scheme',
				'default' => '#ffffff',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'invert_h3_color' => array(
				'title'   => esc_html__( 'H3 color', 'mortgates' ),
				'section' => 'invert_scheme',
				'default' => '#ffffff',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'invert_h4_color' => array(
				'title'   => esc_html__( 'H4 color', 'mortgates' ),
				'section' => 'invert_scheme',
				'default' => '#ffffff',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'invert_h5_color' => array(
				'title'   => esc_html__( 'H5 color', 'mortgates' ),
				'section' => 'invert_scheme',
				'default' => '#ffffff',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'invert_h6_color' => array(
				'title'   => esc_html__( 'H6 color', 'mortgates' ),
				'section' => 'invert_scheme',
				'default' => '#ffffff',
				'field'   => 'hex_color',
				'type'    => 'control',
			),

			/** `Greyscale colors` section */
			'grey_scheme' => array(
				'title'       => esc_html__( 'Greyscale colors', 'mortgates' ),
				'priority'    => 30,
				'panel'       => 'color_scheme',
				'type'        => 'section',
			),

			'grey_color_1' => array(
				'title'   => esc_html__( 'Grey color (1)', 'mortgates' ),
				'section' => 'grey_scheme',
				'default' => '#f7f7f7',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'grey_color_2' => array(
				'title'   => esc_html__( 'Grey color (2)', 'mortgates' ),
				'section' => 'grey_scheme',
				'default' => '#f5f7f8',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'grey_color_3' => array(
				'title'   => esc_html__( 'Grey color (3)', 'mortgates' ),
				'section' => 'grey_scheme',
				'default' => '#89929b',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'grey_color_4' => array(
				'title'   => esc_html__( 'Grey color (4)', 'mortgates' ),
				'section' => 'grey_scheme',
				'default' => '#bdbfc1',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'grey_color_5' => array(
				'title'   => esc_html__( 'Grey color (5)', 'mortgates' ),
				'section' => 'grey_scheme',
				'default' => '#d7dce1',
				'field'   => 'hex_color',
				'type'    => 'control',
			),

			/** `Colors` section */
			'page_bg_color' => array(
				'title'   => esc_html__( 'Page Background Color', 'mortgates' ),
				'section' => 'colors',
				'default' => '#ffffff',
				'field'   => 'hex_color',
				'type'    => 'control',
			),

			/** `Typography Settings` panel */
			'typography' => array(
				'title'       => esc_html__( 'Typography', 'mortgates' ),
				'description' => esc_html__( 'Configure typography settings', 'mortgates' ),
				'priority'    => 50,
				'type'        => 'panel',
			),

			/** `Body text` section */
			'body_typography' => array(
				'title'       => esc_html__( 'Body text', 'mortgates' ),
				'priority'    => 5,
				'panel'       => 'typography',
				'type'        => 'section',
			),
			'body_font_family' => array(
				'title'   => esc_html__( 'Font Family', 'mortgates' ),
				'section' => 'body_typography',
				'default' => 'Lato, sans-serif',
				'field'   => 'fonts',
				'type'    => 'control',
			),
			'body_font_style' => array(
				'title'   => esc_html__( 'Font Style', 'mortgates' ),
				'section' => 'body_typography',
				'default' => 'normal',
				'field'   => 'select',
				'choices' => mortgates_get_font_styles(),
				'type'    => 'control',
			),
			'body_font_weight' => array(
				'title'   => esc_html__( 'Font Weight', 'mortgates' ),
				'section' => 'body_typography',
				'default' => '300',
				'field'   => 'select',
				'choices' => mortgates_get_font_weight(),
				'type'    => 'control',
			),
			'body_font_size' => array(
				'title'       => esc_html__( 'Font Size, px', 'mortgates' ),
				'section'     => 'body_typography',
				'default'     => '16',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 6,
					'max'  => 50,
					'step' => 1,
				),
				'type' => 'control',
			),
			'body_line_height' => array(
				'title'       => esc_html__( 'Line Height', 'mortgates' ),
				'description' => esc_html__( 'Relative to the font-size of the element', 'mortgates' ),
				'section'     => 'body_typography',
				'default'     => '1.5',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'body_letter_spacing' => array(
				'title'       => esc_html__( 'Letter Spacing, em', 'mortgates' ),
				'section'     => 'body_typography',
				'default'     => '0',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => -1,
					'max'  => 1,
					'step' => 0.01,
				),
				'type' => 'control',
			),
			'body_character_set' => array(
				'title'   => esc_html__( 'Character Set', 'mortgates' ),
				'section' => 'body_typography',
				'default' => 'latin',
				'field'   => 'select',
				'choices' => mortgates_get_character_sets(),
				'type'    => 'control',
			),
			'body_text_align' => array(
				'title'   => esc_html__( 'Text Align', 'mortgates' ),
				'section' => 'body_typography',
				'default' => 'inherit',
				'field'   => 'select',
				'choices' => mortgates_get_text_aligns(),
				'type'    => 'control',
			),
			'body_text_transform' => array(
				'title'   => esc_html__( 'Text Transform', 'mortgates' ),
				'section' => 'body_typography',
				'default' => 'none',
				'field'   => 'select',
				'choices' => mortgates_get_text_transform(),
				'type'    => 'control',
			),

			/** `H1 Heading` section */
			'h1_typography' => array(
				'title'    => esc_html__( 'H1 Heading', 'mortgates' ),
				'priority' => 10,
				'panel'    => 'typography',
				'type'     => 'section',
			),
			'h1_font_family' => array(
				'title'   => esc_html__( 'Font Family', 'mortgates' ),
				'section' => 'h1_typography',
				'default' => 'Poppins, sans-serif',
				'field'   => 'fonts',
				'type'    => 'control',
			),
			'h1_font_style' => array(
				'title'   => esc_html__( 'Font Style', 'mortgates' ),
				'section' => 'h1_typography',
				'default' => 'normal',
				'field'   => 'select',
				'choices' => mortgates_get_font_styles(),
				'type'    => 'control',
			),
			'h1_font_weight' => array(
				'title'   => esc_html__( 'Font Weight', 'mortgates' ),
				'section' => 'h1_typography',
				'default' => '600',
				'field'   => 'select',
				'choices' => mortgates_get_font_weight(),
				'type'    => 'control',
			),
			'h1_font_size' => array(
				'title'       => esc_html__( 'Font Size, px', 'mortgates' ),
				'section'     => 'h1_typography',
				'default'     => '45',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 10,
					'max'  => 200,
					'step' => 1,
				),
				'type' => 'control',
			),
			'h1_line_height' => array(
				'title'       => esc_html__( 'Line Height', 'mortgates' ),
				'description' => esc_html__( 'Relative to the font-size of the element', 'mortgates' ),
				'section'     => 'h1_typography',
				'default'     => '1.2',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'h1_letter_spacing' => array(
				'title'       => esc_html__( 'Letter Spacing, em', 'mortgates' ),
				'section'     => 'h1_typography',
				'default'     => '0.035',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => -1,
					'max'  => 1,
					'step' => 0.01,
				),
				'type' => 'control',
			),
			'h1_character_set' => array(
				'title'   => esc_html__( 'Character Set', 'mortgates' ),
				'section' => 'h1_typography',
				'default' => 'latin',
				'field'   => 'select',
				'choices' => mortgates_get_character_sets(),
				'type'    => 'control',
			),
			'h1_text_align' => array(
				'title'   => esc_html__( 'Text Align', 'mortgates' ),
				'section' => 'h1_typography',
				'default' => 'inherit',
				'field'   => 'select',
				'choices' => mortgates_get_text_aligns(),
				'type'    => 'control',
			),
			'h1_text_transform' => array(
				'title'   => esc_html__( 'Text Transform', 'mortgates' ),
				'section' => 'h1_typography',
				'default' => 'none',
				'field'   => 'select',
				'choices' => mortgates_get_text_transform(),
				'type'    => 'control',
			),

			/** `H2 Heading` section */
			'h2_typography' => array(
				'title'    => esc_html__( 'H2 Heading', 'mortgates' ),
				'priority' => 15,
				'panel'    => 'typography',
				'type'     => 'section',
			),
			'h2_font_family' => array(
				'title'   => esc_html__( 'Font Family', 'mortgates' ),
				'section' => 'h2_typography',
				'default' => 'Poppins, sans-serif',
				'field'   => 'fonts',
				'type'    => 'control',
			),
			'h2_font_style' => array(
				'title'   => esc_html__( 'Font Style', 'mortgates' ),
				'section' => 'h2_typography',
				'default' => 'normal',
				'field'   => 'select',
				'choices' => mortgates_get_font_styles(),
				'type'    => 'control',
			),
			'h2_font_weight' => array(
				'title'   => esc_html__( 'Font Weight', 'mortgates' ),
				'section' => 'h2_typography',
				'default' => '500',
				'field'   => 'select',
				'choices' => mortgates_get_font_weight(),
				'type'    => 'control',
			),
			'h2_font_size' => array(
				'title'       => esc_html__( 'Font Size, px', 'mortgates' ),
				'section'     => 'h2_typography',
				'default'     => '36',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 10,
					'max'  => 200,
					'step' => 1,
				),
				'type' => 'control',
			),
			'h2_line_height' => array(
				'title'       => esc_html__( 'Line Height', 'mortgates' ),
				'description' => esc_html__( 'Relative to the font-size of the element', 'mortgates' ),
				'section'     => 'h2_typography',
				'default'     => '1.2',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'h2_letter_spacing' => array(
				'title'       => esc_html__( 'Letter Spacing, em', 'mortgates' ),
				'section'     => 'h2_typography',
				'default'     => '0',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => -1,
					'max'  => 1,
					'step' => 0.01,
				),
				'type' => 'control',
			),
			'h2_character_set' => array(
				'title'   => esc_html__( 'Character Set', 'mortgates' ),
				'section' => 'h2_typography',
				'default' => 'latin',
				'field'   => 'select',
				'choices' => mortgates_get_character_sets(),
				'type'    => 'control',
			),
			'h2_text_align' => array(
				'title'   => esc_html__( 'Text Align', 'mortgates' ),
				'section' => 'h2_typography',
				'default' => 'inherit',
				'field'   => 'select',
				'choices' => mortgates_get_text_aligns(),
				'type'    => 'control',
			),
			'h2_text_transform' => array(
				'title'   => esc_html__( 'Text Transform', 'mortgates' ),
				'section' => 'h2_typography',
				'default' => 'none',
				'field'   => 'select',
				'choices' => mortgates_get_text_transform(),
				'type'    => 'control',
			),

			/** `H3 Heading` section */
			'h3_typography' => array(
				'title'    => esc_html__( 'H3 Heading', 'mortgates' ),
				'priority' => 20,
				'panel'    => 'typography',
				'type'     => 'section',
			),
			'h3_font_family' => array(
				'title'   => esc_html__( 'Font Family', 'mortgates' ),
				'section' => 'h3_typography',
				'default' => 'Poppins, sans-serif',
				'field'   => 'fonts',
				'type'    => 'control',
			),
			'h3_font_style' => array(
				'title'   => esc_html__( 'Font Style', 'mortgates' ),
				'section' => 'h3_typography',
				'default' => 'normal',
				'field'   => 'select',
				'choices' => mortgates_get_font_styles(),
				'type'    => 'control',
			),
			'h3_font_weight' => array(
				'title'   => esc_html__( 'Font Weight', 'mortgates' ),
				'section' => 'h3_typography',
				'default' => '500',
				'field'   => 'select',
				'choices' => mortgates_get_font_weight(),
				'type'    => 'control',
			),
			'h3_font_size' => array(
				'title'       => esc_html__( 'Font Size, px', 'mortgates' ),
				'section'     => 'h3_typography',
				'default'     => '30',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 10,
					'max'  => 200,
					'step' => 1,
				),
				'type' => 'control',
			),
			'h3_line_height' => array(
				'title'       => esc_html__( 'Line Height', 'mortgates' ),
				'description' => esc_html__( 'Relative to the font-size of the element', 'mortgates' ),
				'section'     => 'h3_typography',
				'default'     => '1.2',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'h3_letter_spacing' => array(
				'title'       => esc_html__( 'Letter Spacing, em', 'mortgates' ),
				'section'     => 'h3_typography',
				'default'     => '0',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => -1,
					'max'  => 1,
					'step' => 0.01,
				),
				'type' => 'control',
			),
			'h3_character_set' => array(
				'title'   => esc_html__( 'Character Set', 'mortgates' ),
				'section' => 'h3_typography',
				'default' => 'latin',
				'field'   => 'select',
				'choices' => mortgates_get_character_sets(),
				'type'    => 'control',
			),
			'h3_text_align' => array(
				'title'   => esc_html__( 'Text Align', 'mortgates' ),
				'section' => 'h3_typography',
				'default' => 'inherit',
				'field'   => 'select',
				'choices' => mortgates_get_text_aligns(),
				'type'    => 'control',
			),
			'h3_text_transform' => array(
				'title'   => esc_html__( 'Text Transform', 'mortgates' ),
				'section' => 'h3_typography',
				'default' => 'none',
				'field'   => 'select',
				'choices' => mortgates_get_text_transform(),
				'type'    => 'control',
			),

			/** `H4 Heading` section */
			'h4_typography' => array(
				'title'    => esc_html__( 'H4 Heading', 'mortgates' ),
				'priority' => 25,
				'panel'    => 'typography',
				'type'     => 'section',
			),
			'h4_font_family' => array(
				'title'   => esc_html__( 'Font Family', 'mortgates' ),
				'section' => 'h4_typography',
				'default' => 'Poppins, sans-serif',
				'field'   => 'fonts',
				'type'    => 'control',
			),
			'h4_font_style' => array(
				'title'   => esc_html__( 'Font Style', 'mortgates' ),
				'section' => 'h4_typography',
				'default' => 'normal',
				'field'   => 'select',
				'choices' => mortgates_get_font_styles(),
				'type'    => 'control',
			),
			'h4_font_weight' => array(
				'title'   => esc_html__( 'Font Weight', 'mortgates' ),
				'section' => 'h4_typography',
				'default' => '600',
				'field'   => 'select',
				'choices' => mortgates_get_font_weight(),
				'type'    => 'control',
			),
			'h4_font_size' => array(
				'title'       => esc_html__( 'Font Size, px', 'mortgates' ),
				'section'     => 'h4_typography',
				'default'     => '22',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 10,
					'max'  => 200,
					'step' => 1,
				),
				'type' => 'control',
			),
			'h4_line_height' => array(
				'title'       => esc_html__( 'Line Height', 'mortgates' ),
				'description' => esc_html__( 'Relative to the font-size of the element', 'mortgates' ),
				'section'     => 'h4_typography',
				'default'     => '1.63',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'h4_letter_spacing' => array(
				'title'       => esc_html__( 'Letter Spacing, em', 'mortgates' ),
				'section'     => 'h4_typography',
				'default'     => '0',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => -1,
					'max'  => 1,
					'step' => 0.01,
				),
				'type' => 'control',
			),
			'h4_character_set' => array(
				'title'   => esc_html__( 'Character Set', 'mortgates' ),
				'section' => 'h4_typography',
				'default' => 'latin',
				'field'   => 'select',
				'choices' => mortgates_get_character_sets(),
				'type'    => 'control',
			),
			'h4_text_align' => array(
				'title'   => esc_html__( 'Text Align', 'mortgates' ),
				'section' => 'h4_typography',
				'default' => 'inherit',
				'field'   => 'select',
				'choices' => mortgates_get_text_aligns(),
				'type'    => 'control',
			),
			'h4_text_transform' => array(
				'title'   => esc_html__( 'Text Transform', 'mortgates' ),
				'section' => 'h4_typography',
				'default' => 'none',
				'field'   => 'select',
				'choices' => mortgates_get_text_transform(),
				'type'    => 'control',
			),

			/** `H5 Heading` section */
			'h5_typography' => array(
				'title'    => esc_html__( 'H5 Heading', 'mortgates' ),
				'priority' => 30,
				'panel'    => 'typography',
				'type'     => 'section',
			),
			'h5_font_family' => array(
				'title'   => esc_html__( 'Font Family', 'mortgates' ),
				'section' => 'h5_typography',
				'default' => 'Poppins, sans-serif',
				'field'   => 'fonts',
				'type'    => 'control',
			),
			'h5_font_style' => array(
				'title'   => esc_html__( 'Font Style', 'mortgates' ),
				'section' => 'h5_typography',
				'default' => 'normal',
				'field'   => 'select',
				'choices' => mortgates_get_font_styles(),
				'type'    => 'control',
			),
			'h5_font_weight' => array(
				'title'   => esc_html__( 'Font Weight', 'mortgates' ),
				'section' => 'h5_typography',
				'default' => '600',
				'field'   => 'select',
				'choices' => mortgates_get_font_weight(),
				'type'    => 'control',
			),
			'h5_font_size' => array(
				'title'       => esc_html__( 'Font Size, px', 'mortgates' ),
				'section'     => 'h5_typography',
				'default'     => '20',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 10,
					'max'  => 200,
					'step' => 1,
				),
				'type' => 'control',
			),
			'h5_line_height' => array(
				'title'       => esc_html__( 'Line Height', 'mortgates' ),
				'description' => esc_html__( 'Relative to the font-size of the element', 'mortgates' ),
				'section'     => 'h5_typography',
				'default'     => '1.2',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'h5_letter_spacing' => array(
				'title'       => esc_html__( 'Letter Spacing, em', 'mortgates' ),
				'section'     => 'h5_typography',
				'default'     => '0',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => -1,
					'max'  => 1,
					'step' => 0.01,
				),
				'type' => 'control',
			),
			'h5_character_set' => array(
				'title'   => esc_html__( 'Character Set', 'mortgates' ),
				'section' => 'h5_typography',
				'default' => 'latin',
				'field'   => 'select',
				'choices' => mortgates_get_character_sets(),
				'type'    => 'control',
			),
			'h5_text_align' => array(
				'title'   => esc_html__( 'Text Align', 'mortgates' ),
				'section' => 'h5_typography',
				'default' => 'inherit',
				'field'   => 'select',
				'choices' => mortgates_get_text_aligns(),
				'type'    => 'control',
			),
			'h5_text_transform' => array(
				'title'   => esc_html__( 'Text Transform', 'mortgates' ),
				'section' => 'h5_typography',
				'default' => 'uppercase',
				'field'   => 'select',
				'choices' => mortgates_get_text_transform(),
				'type'    => 'control',
			),

			/** `H6 Heading` section */
			'h6_typography' => array(
				'title'    => esc_html__( 'H6 Heading', 'mortgates' ),
				'priority' => 35,
				'panel'    => 'typography',
				'type'     => 'section',
			),
			'h6_font_family' => array(
				'title'   => esc_html__( 'Font Family', 'mortgates' ),
				'section' => 'h6_typography',
				'default' => 'Poppins, sans-serif',
				'field'   => 'fonts',
				'type'    => 'control',
			),
			'h6_font_style' => array(
				'title'   => esc_html__( 'Font Style', 'mortgates' ),
				'section' => 'h6_typography',
				'default' => 'normal',
				'field'   => 'select',
				'choices' => mortgates_get_font_styles(),
				'type'    => 'control',
			),
			'h6_font_weight' => array(
				'title'   => esc_html__( 'Font Weight', 'mortgates' ),
				'section' => 'h6_typography',
				'default' => '500',
				'field'   => 'select',
				'choices' => mortgates_get_font_weight(),
				'type'    => 'control',
			),
			'h6_font_size' => array(
				'title'       => esc_html__( 'Font Size, px', 'mortgates' ),
				'section'     => 'h6_typography',
				'default'     => '14',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 10,
					'max'  => 200,
					'step' => 1,
				),
				'type' => 'control',
			),
			'h6_line_height' => array(
				'title'       => esc_html__( 'Line Height', 'mortgates' ),
				'description' => esc_html__( 'Relative to the font-size of the element', 'mortgates' ),
				'section'     => 'h6_typography',
				'default'     => '1.2',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'h6_letter_spacing' => array(
				'title'       => esc_html__( 'Letter Spacing, em', 'mortgates' ),
				'section'     => 'h6_typography',
				'default'     => '0.23',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => -1,
					'max'  => 1,
					'step' => 0.01,
				),
				'type' => 'control',
			),
			'h6_character_set' => array(
				'title'   => esc_html__( 'Character Set', 'mortgates' ),
				'section' => 'h6_typography',
				'default' => 'latin',
				'field'   => 'select',
				'choices' => mortgates_get_character_sets(),
				'type'    => 'control',
			),
			'h6_text_align' => array(
				'title'   => esc_html__( 'Text Align', 'mortgates' ),
				'section' => 'h6_typography',
				'default' => 'inherit',
				'field'   => 'select',
				'choices' => mortgates_get_text_aligns(),
				'type'    => 'control',
			),
			'h6_text_transform' => array(
				'title'   => esc_html__( 'Text Transform', 'mortgates' ),
				'section' => 'h6_typography',
				'default' => 'uppercase',
				'field'   => 'select',
				'choices' => mortgates_get_text_transform(),
				'type'    => 'control',
			),

			/** `Accent Text` section */
			'accent_typography' => array(
				'title'    => esc_html__( 'Accent Text', 'mortgates' ),
				'priority' => 45,
				'panel'    => 'typography',
				'type'     => 'section',
			),
			'accent_font_family' => array(
				'title'   => esc_html__( 'Font Family', 'mortgates' ),
				'section' => 'accent_typography',
				'default' => 'Poppins, serif',
				'field'   => 'fonts',
				'type'    => 'control',
			),
			'accent_font_style' => array(
				'title'   => esc_html__( 'Font Style', 'mortgates' ),
				'section' => 'accent_typography',
				'default' => 'normal',
				'field'   => 'select',
				'choices' => mortgates_get_font_styles(),
				'type'    => 'control',
			),
			'accent_font_weight' => array(
				'title'   => esc_html__( 'Font Weight', 'mortgates' ),
				'section' => 'accent_typography',
				'default' => '500',
				'field'   => 'select',
				'choices' => mortgates_get_font_weight(),
				'type'    => 'control',
			),
			'accent_letter_spacing' => array(
				'title'       => esc_html__( 'Letter Spacing, em', 'mortgates' ),
				'section'     => 'accent_typography',
				'default'     => '0',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => -1,
					'max'  => 1,
					'step' => 0.01,
				),
				'type' => 'control',
			),
			'accent_character_set' => array(
				'title'   => esc_html__( 'Character Set', 'mortgates' ),
				'section' => 'accent_typography',
				'default' => 'latin',
				'field'   => 'select',
				'choices' => mortgates_get_character_sets(),
				'type'    => 'control',
			),
			'accent_text_transform' => array(
				'title'   => esc_html__( 'Text Transform', 'mortgates' ),
				'section' => 'accent_typography',
				'default' => 'none',
				'field'   => 'select',
				'choices' => mortgates_get_text_transform(),
				'type'    => 'control',
			),

			/** `Breadcrumbs` section */
			'breadcrumbs_typography' => array(
				'title'    => esc_html__( 'Breadcrumbs', 'mortgates' ),
				'priority' => 45,
				'panel'    => 'typography',
				'type'     => 'section',
			),
			'breadcrumbs_font_family' => array(
				'title'   => esc_html__( 'Font Family', 'mortgates' ),
				'section' => 'breadcrumbs_typography',
				'default' => 'Lato, sans-serif',
				'field'   => 'fonts',
				'type'    => 'control',
			),
			'breadcrumbs_font_style' => array(
				'title'   => esc_html__( 'Font Style', 'mortgates' ),
				'section' => 'breadcrumbs_typography',
				'default' => 'normal',
				'field'   => 'select',
				'choices' => mortgates_get_font_styles(),
				'type'    => 'control',
			),
			'breadcrumbs_font_weight' => array(
				'title'   => esc_html__( 'Font Weight', 'mortgates' ),
				'section' => 'breadcrumbs_typography',
				'default' => '400',
				'field'   => 'select',
				'choices' => mortgates_get_font_weight(),
				'type'    => 'control',
			),
			'breadcrumbs_font_size' => array(
				'title'       => esc_html__( 'Font Size, px', 'mortgates' ),
				'section'     => 'breadcrumbs_typography',
				'default'     => '14',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 6,
					'max'  => 50,
					'step' => 1,
				),
				'type' => 'control',
			),
			'breadcrumbs_line_height' => array(
				'title'       => esc_html__( 'Line Height', 'mortgates' ),
				'description' => esc_html__( 'Relative to the font-size of the element', 'mortgates' ),
				'section'     => 'breadcrumbs_typography',
				'default'     => '1.5',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'breadcrumbs_letter_spacing' => array(
				'title'       => esc_html__( 'Letter Spacing, em', 'mortgates' ),
				'section'     => 'breadcrumbs_typography',
				'default'     => '0',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => -1,
					'max'  => 1,
					'step' => 0.01,
				),
				'type' => 'control',
			),
			'breadcrumbs_character_set' => array(
				'title'   => esc_html__( 'Character Set', 'mortgates' ),
				'section' => 'breadcrumbs_typography',
				'default' => 'latin',
				'field'   => 'select',
				'choices' => mortgates_get_character_sets(),
				'type'    => 'control',
			),
			'breadcrumbs_text_transform' => array(
				'title'   => esc_html__( 'Text Transform', 'mortgates' ),
				'section' => 'breadcrumbs_typography',
				'default' => 'none',
				'field'   => 'select',
				'choices' => mortgates_get_text_transform(),
				'type'    => 'control',
			),

			/** `Meta` section */
			'meta_typography' => array(
				'title'       => esc_html__( 'Meta', 'mortgates' ),
				'priority'    => 50,
				'panel'       => 'typography',
				'type'        => 'section',
			),
			'meta_font_family' => array(
				'title'   => esc_html__( 'Font Family', 'mortgates' ),
				'section' => 'meta_typography',
				'default' => 'Lato, sans-serif',
				'field'   => 'fonts',
				'type'    => 'control',
			),
			'meta_font_style' => array(
				'title'   => esc_html__( 'Font Style', 'mortgates' ),
				'section' => 'meta_typography',
				'default' => 'normal',
				'field'   => 'select',
				'choices' => mortgates_get_font_styles(),
				'type'    => 'control',
			),
			'meta_font_weight' => array(
				'title'   => esc_html__( 'Font Weight', 'mortgates' ),
				'section' => 'meta_typography',
				'default' => '400',
				'field'   => 'select',
				'choices' => mortgates_get_font_weight(),
				'type'    => 'control',
			),
			'meta_font_size' => array(
				'title'       => esc_html__( 'Font Size, px', 'mortgates' ),
				'section'     => 'meta_typography',
				'default'     => '14',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 10,
					'max'  => 200,
					'step' => 1,
				),
				'type' => 'control',
			),
			'meta_line_height' => array(
				'title'       => esc_html__( 'Line Height', 'mortgates' ),
				'description' => esc_html__( 'Relative to the font-size of the element', 'mortgates' ),
				'section'     => 'meta_typography',
				'default'     => '1.75',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'meta_letter_spacing' => array(
				'title'       => esc_html__( 'Letter Spacing, em', 'mortgates' ),
				'section'     => 'meta_typography',
				'default'     => '0',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => -1,
					'max'  => 1,
					'step' => 0.01,
				),
				'type' => 'control',
			),
			'meta_character_set' => array(
				'title'   => esc_html__( 'Character Set', 'mortgates' ),
				'section' => 'meta_typography',
				'default' => 'latin',
				'field'   => 'select',
				'choices' => mortgates_get_character_sets(),
				'type'    => 'control',
			),
			'meta_text_transform' => array(
				'title'   => esc_html__( 'Text Transform', 'mortgates' ),
				'section' => 'meta_typography',
				'default' => 'none',
				'field'   => 'select',
				'choices' => mortgates_get_text_transform(),
				'type'    => 'control',
			),

			/** `Typography misc` section */
			'misc_styles' => array(
				'title'    => esc_html__( 'Misc', 'mortgates' ),
				'priority' => 60,
				'panel'    => 'typography',
				'type'     => 'section',
			),
			'word_wrap' => array(
				'title'   => esc_html__( 'Enable Word Wrap', 'mortgates' ),
				'section' => 'misc_styles',
				'default' => false,
				'field'   => 'checkbox',
				'type'    => 'control',
			),

			/** `Header` panel */
			'header_options' => array(
				'title'    => esc_html__( 'Header', 'mortgates' ),
				'priority' => 60,
				'type'     => 'panel',
			),

			/** `Header styles` section */
			'header_styles' => array(
				'title'    => esc_html__( 'Header Styles', 'mortgates' ),
				'priority' => 5,
				'panel'    => 'header_options',
				'type'     => 'section',
			),
			'header_layout_type' => array(
				'title'   => esc_html__( 'Layout', 'mortgates' ),
				'section' => 'header_styles',
				'default' => 'style-1',
				'field'   => 'select',
				'choices' => mortgates_get_header_layout_options(),
				'type'    => 'control',
			),
			'header_transparent_layout' => array(
				'title'   => esc_html__( 'Header transparent overlay', 'mortgates' ),
				'section' => 'header_styles',
				'default' => false,
				'field'   => 'checkbox',
				'type'    => 'control',
				'active_callback' => '__return_false',
			),
			'header_transparent_bg' => array(
				'title'   => esc_html__( 'Header Transparent Background', 'mortgates' ),
				'section' => 'header_styles',
				'field'   => 'hex_color',
				'default' => '#42474c',
				'type'    => 'control',
				'active_callback' => '__return_false',
			),
			'header_transparent_bg_alpha' => array(
				'title'           => esc_html__( 'Header Transparent Background Alpha', 'mortgates' ),
				'section'         => 'header_styles',
				'default'         => '20',
				'field'           => 'number',
				'input_attrs'     => array(
					'min'  => 0,
					'max'  => 100,
					'step' => 1,
				),
				'type'            => 'control',
				'active_callback' => '__return_false',
			),
			'header_invert_color_scheme' => array(
				'title'   => esc_html__( 'Enable invert color scheme', 'mortgates' ),
				'section' => 'header_styles',
				'default' => false,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'header_bg_color' => array(
				'title'   => esc_html__( 'Background Color', 'mortgates' ),
				'section' => 'header_styles',
				'field'   => 'hex_color',
				'default' => '#ffffff',
				'type'    => 'control',
			),
			'header_bg_image' => array(
				'title'   => esc_html__( 'Background Image', 'mortgates' ),
				'section' => 'header_styles',
				'field'   => 'image',
				'type'    => 'control',
			),
			'header_bg_repeat' => array(
				'title'   => esc_html__( 'Background Repeat', 'mortgates' ),
				'section' => 'header_styles',
				'default' => 'no-repeat',
				'field'   => 'select',
				'choices' => mortgates_get_bg_repeat(),
				'type'    => 'control',
			),
			'header_bg_position' => array(
				'title'   => esc_html__( 'Background Position', 'mortgates' ),
				'section' => 'header_styles',
				'default' => 'center',
				'field'   => 'select',
				'choices' => mortgates_get_bg_position(),
				'type'    => 'control',
			),
			'header_bg_size' => array(
				'title'   => esc_html__( 'Background Size', 'mortgates' ),
				'section' => 'header_styles',
				'default' => 'cover',
				'field'   => 'select',
				'choices' => mortgates_get_bg_size(),
				'type'    => 'control',
			),
			'header_bg_attachment' => array(
				'title'   => esc_html__( 'Background Attachment', 'mortgates' ),
				'section' => 'header_styles',
				'default' => 'scroll',
				'field'   => 'select',
				'choices' => mortgates_get_bg_attachment(),
				'type'    => 'control',
			),
			'header_search' => array(
				'title'   => esc_html__( 'Show search', 'mortgates' ),
				'section' => 'header_styles',
				'default' => false,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'header_btn_visibility' => array(
				'title'   => esc_html__( 'Show header call to action button', 'mortgates' ),
				'section' => 'header_styles',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'header_btn_text' => array(
				'title'           => esc_html__( 'Header call to action button', 'mortgates' ),
				'description'     => esc_html__( 'Button text', 'mortgates' ),
				'section'         => 'header_styles',
				'default'         => esc_html__( 'Get In Touch', 'mortgates' ),
				'field'           => 'text',
				'type'            => 'control',
				'active_callback' => 'mortgates_is_header_btn_enable',
			),
			'header_btn_url' => array(
				'title'           => '',
				'description'     => esc_html__( 'Button url', 'mortgates' ),
				'section'         => 'header_styles',
				'default'         => '#',
				'field'           => 'text',
				'type'            => 'control',
				'active_callback' => 'mortgates_is_header_btn_enable',
			),
			'header_btn_target' => array(
				'title'           => esc_html__( 'Open Link in New Tab', 'mortgates' ),
				'section'         => 'header_styles',
				'default'         => false,
				'field'           => 'checkbox',
				'type'            => 'control',
				'active_callback' => 'mortgates_is_header_btn_enable',
			),
			'header_btn_style_preset' => array(
				'title'   => esc_html__( 'Button Style Preset', 'mortgates' ),
				'section' => 'header_styles',
				'default' => 'primary-transparent',
				'field'   => 'select',
				'choices' => mortgates_get_btn_style_presets(),
				'type'    => 'control',
				'active_callback' => 'mortgates_is_header_btn_enable',
			),

			/** `Top Panel` section */
			'header_top_panel' => array(
				'title'    => esc_html__( 'Top Panel', 'mortgates' ),
				'priority' => 10,
				'panel'    => 'header_options',
				'type'     => 'section',
			),
			'top_panel_visibility' => array(
				'title'   => esc_html__( 'Enable top panel', 'mortgates' ),
				'section' => 'header_top_panel',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'top_panel_text' => array(
				'title'           => esc_html__( 'Disclaimer Text', 'mortgates' ),
				'description'     => esc_html__( 'HTML formatting support', 'mortgates' ),
				'section'         => 'header_top_panel',
				'default'         => '',
				'field'           => 'textarea',
				'type'            => 'control',
				'active_callback' => 'mortgates_is_top_panel_enable',
			),
			'top_panel_bg'        => array(
				'title'           => esc_html__( 'Background color', 'mortgates' ),
				'section'         => 'header_top_panel',
				'default'         => '#42474c',
				'field'           => 'hex_color',
				'type'            => 'control',
				'active_callback' => 'mortgates_is_top_panel_enable',
			),
			'top_menu_visibility' => array(
				'title'           => esc_html__( 'Show top menu', 'mortgates' ),
				'section'         => 'header_top_panel',
				'default'         => false,
				'field'           => 'checkbox',
				'type'            => 'control',
				'active_callback' => 'mortgates_is_top_panel_enable',
			),

			/** `Header contact block` section */
			'header_contact_block' => array(
				'title'       => esc_html__( 'Header Contact Block', 'mortgates' ),
				'description' => esc_html__( 'This block shows only if Top Panel section is enabled!', 'mortgates' ),
				'priority'    => 20,
				'panel'       => 'header_options',
				'type'        => 'section',
			),
			'header_contact_block_visibility' => array(
				'title'   => esc_html__( 'Show Header Contact Block', 'mortgates' ),
				'section' => 'header_contact_block',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'header_contact_icon_1' => array(
				'title'           => esc_html__( 'Contact item 1', 'mortgates' ),
				'description'     => esc_html__( 'Choose icon', 'mortgates' ),
				'section'         => 'header_contact_block',
				'field'           => 'iconpicker',
				'default'         => 'fa-phone',
				'icon_data'       => mortgates_get_fa_icons_data(),
				'type'            => 'control',
				'active_callback' => 'mortgates_is_header_contact_block_enable',
			),
			'header_contact_label_1' => array(
				'title'           => '',
				'description'     => esc_html__( 'Label', 'mortgates' ),
				'section'         => 'header_contact_block',
				'default'         => '',
				'field'           => 'text',
				'type'            => 'control',
				'active_callback' => 'mortgates_is_header_contact_block_enable',
			),
			'header_contact_text_1' => array(
				'title'           => '',
				'description'     => esc_html__( 'Description', 'mortgates' ),
				'section'         => 'header_contact_block',
				'default'         => mortgates_get_default_contact_information( 'phones' ),
				'field'           => 'textarea',
				'type'            => 'control',
				'active_callback' => 'mortgates_is_header_contact_block_enable',
			),
			'header_contact_icon_2' => array(
				'title'           => esc_html__( 'Contact item 2', 'mortgates' ),
				'description'     => esc_html__( 'Choose icon', 'mortgates' ),
				'section'         => 'header_contact_block',
				'field'           => 'iconpicker',
				'default'         => 'fa-envelope',
				'icon_data'       => mortgates_get_fa_icons_data(),
				'type'            => 'control',
				'active_callback' => 'mortgates_is_header_contact_block_enable',
			),
			'header_contact_label_2' => array(
				'title'           => '',
				'description'     => esc_html__( 'Label', 'mortgates' ),
				'section'         => 'header_contact_block',
				'default'         => '',
				'field'           => 'text',
				'type'            => 'control',
				'active_callback' => 'mortgates_is_header_contact_block_enable',
			),
			'header_contact_text_2' => array(
				'title'           => '',
				'description'     => esc_html__( 'Description', 'mortgates' ),
				'section'         => 'header_contact_block',
				'default'         => mortgates_get_default_contact_information( 'email' ),
				'field'           => 'textarea',
				'type'            => 'control',
				'active_callback' => 'mortgates_is_header_contact_block_enable',
			),
			'header_contact_icon_3' => array(
				'title'           => esc_html__( 'Contact item 3', 'mortgates' ),
				'description'     => esc_html__( 'Choose icon', 'mortgates' ),
				'section'         => 'header_contact_block',
				'field'           => 'iconpicker',
				'default'         => 'fa-map-marker',
				'icon_data'       => mortgates_get_fa_icons_data(),
				'type'            => 'control',
				'active_callback' => 'mortgates_is_header_contact_block_enable',
			),
			'header_contact_label_3' => array(
				'title'           => '',
				'description'     => esc_html__( 'Label', 'mortgates' ),
				'section'         => 'header_contact_block',
				'default'         => '',
				'field'           => 'text',
				'type'            => 'control',
				'active_callback' => 'mortgates_is_header_contact_block_enable',
			),
			'header_contact_text_3' => array(
				'title'           => '',
				'description'     => esc_html__( 'Description', 'mortgates' ),
				'section'         => 'header_contact_block',
				'default'         => mortgates_get_default_contact_information( 'address-2' ),
				'field'           => 'textarea',
				'type'            => 'control',
				'active_callback' => 'mortgates_is_header_contact_block_enable',
			),

			/** `Main Menu` section */
			'header_main_menu' => array(
				'title'    => esc_html__( 'Main Menu', 'mortgates' ),
				'priority' => 20,
				'panel'    => 'header_options',
				'type'     => 'section',
			),
			'header_menu_sticky' => array(
				'title'   => esc_html__( 'Enable sticky menu', 'mortgates' ),
				'section' => 'header_main_menu',
				'default' => false,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'header_menu_attributes' => array(
				'title'   => esc_html__( 'Enable description', 'mortgates' ),
				'section' => 'header_main_menu',
				'default' => false,
				'field'   => 'checkbox',
				'type'    => 'control',
			),

			/** `Sidebar` section */
			'sidebar_settings' => array(
				'title'    => esc_html__( 'Sidebar', 'mortgates' ),
				'priority' => 105,
				'type'     => 'section',
			),
			'sidebar_position' => array(
				'title'   => esc_html__( 'Sidebar Position', 'mortgates' ),
				'section' => 'sidebar_settings',
				'default' => 'fullwidth',
				'field'   => 'select',
				'choices' => array(
					'one-left-sidebar'  => esc_html__( 'Sidebar on left side', 'mortgates' ),
					'one-right-sidebar' => esc_html__( 'Sidebar on right side', 'mortgates' ),
					'fullwidth'         => esc_html__( 'No sidebars', 'mortgates' ),
				),
				'type' => 'control',
			),

			'sidebar_position_post_listing' => array(
				'title'   => esc_html__( 'Sidebar Position on Blog Listing', 'mortgates' ),
				'section' => 'sidebar_settings',
				'default' => 'one-right-sidebar',
				'field'   => 'select',
				'choices' => array(
					'one-left-sidebar'  => esc_html__( 'Sidebar on left side', 'mortgates' ),
					'one-right-sidebar' => esc_html__( 'Sidebar on right side', 'mortgates' ),
					'fullwidth'         => esc_html__( 'No sidebars', 'mortgates' ),
				),
				'type' => 'control',
			),

			'sidebar_position_post' => array(
				'title'   => esc_html__( 'Sidebar Position on Blog Post', 'mortgates' ),
				'section' => 'sidebar_settings',
				'default' => 'one-right-sidebar',
				'field'   => 'select',
				'choices' => array(
					'one-left-sidebar'  => esc_html__( 'Sidebar on left side', 'mortgates' ),
					'one-right-sidebar' => esc_html__( 'Sidebar on right side', 'mortgates' ),
					'fullwidth'         => esc_html__( 'No sidebars', 'mortgates' ),
				),
				'type' => 'control',
			),

			/** `MailChimp` section */
			'mailchimp' => array(
				'title'       => esc_html__( 'MailChimp', 'mortgates' ),
				'description' => esc_html__( 'Setup MailChimp settings for subscribe widget', 'mortgates' ),
				'priority'    => 109,
				'type'        => 'section',
			),
			'mailchimp_api_key' => array(
				'title'   => esc_html__( 'MailChimp API key', 'mortgates' ),
				'section' => 'mailchimp',
				'field'   => 'text',
				'type'    => 'control',
			),
			'mailchimp_list_id' => array(
				'title'   => esc_html__( 'MailChimp list ID', 'mortgates' ),
				'section' => 'mailchimp',
				'field'   => 'text',
				'type'    => 'control',
			),

			/** `Ads Management` panel */
			'ads_management' => array(
				'title'    => esc_html__( 'Ads Management', 'mortgates' ),
				'priority' => 110,
				'type'     => 'section',
			),
			'ads_header' => array(
				'title'             => esc_html__( 'Header', 'mortgates' ),
				'section'           => 'ads_management',
				'field'             => 'textarea',
				'default'           => '',
				'sanitize_callback' => 'esc_html',
				'type'              => 'control',
			),
			'ads_home_before_loop' => array(
				'title'             => esc_html__( 'Front Page Before Loop', 'mortgates' ),
				'section'           => 'ads_management',
				'field'             => 'textarea',
				'default'           => '',
				'sanitize_callback' => 'esc_html',
				'type'              => 'control',
			),
			'ads_post_before_content' => array(
				'title'             => esc_html__( 'Post Before Content', 'mortgates' ),
				'section'           => 'ads_management',
				'field'             => 'textarea',
				'default'           => '',
				'sanitize_callback' => 'esc_html',
				'type'              => 'control',
			),
			'ads_post_before_comments' => array(
				'title'             => esc_html__( 'Post Before Comments', 'mortgates' ),
				'section'           => 'ads_management',
				'field'             => 'textarea',
				'default'           => '',
				'sanitize_callback' => 'esc_html',
				'type'              => 'control',
			),

			/** `Footer` panel */
			'footer_options' => array(
				'title'    => esc_html__( 'Footer', 'mortgates' ),
				'priority' => 110,
				'type'     => 'panel',
			),

			/** `Footer styles` section */
			'footer_styles' => array(
				'title'    => esc_html__( 'Footer Styles', 'mortgates' ),
				'priority' => 5,
				'panel'    => 'footer_options',
				'type'     => 'section',
			),
			'footer_logo_visibility' => array(
				'title'   => esc_html__( 'Show Footer Logo', 'mortgates' ),
				'section' => 'footer_styles',
				'default' => false,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'footer_logo_url' => array(
				'title'           => esc_html__( 'Logo upload', 'mortgates' ),
				'section'         => 'footer_styles',
				'field'           => 'image',
				'default'         => '%s/assets/images/footer-logo.png',
				'type'            => 'control',
				'active_callback' => 'mortgates_is_footer_logo_enable',
			),
			'footer_copyright' => array(
				'title'   => esc_html__( 'Copyright text', 'mortgates' ),
				'section' => 'footer_styles',
				'default' => mortgates_get_default_footer_copyright(),
				'field'   => 'textarea',
				'type'    => 'control',
			),
			'footer_layout_type' => array(
				'title'   => esc_html__( 'Layout', 'mortgates' ),
				'section' => 'footer_styles',
				'default' => 'style-1',
				'field'   => 'select',
				'choices' => mortgates_get_footer_layout_options(),
				'type' => 'control',
			),
			'footer_bg' => array(
				'title'   => esc_html__( 'Footer Background color', 'mortgates' ),
				'section' => 'footer_styles',
				'default' => '#444c5c',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'footer_widget_area_visibility' => array(
				'title'   => esc_html__( 'Show Footer Widgets Area', 'mortgates' ),
				'section' => 'footer_styles',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'footer_widget_columns' => array(
				'title'           => esc_html__( 'Widget Area Columns', 'mortgates' ),
				'section'         => 'footer_styles',
				'default'         => '4',
				'field'           => 'select',
				'choices'         => array(
					'1' => '1',
					'2' => '2',
					'3' => '3',
					'4' => '4',
				),
				'type'            => 'control',
				'active_callback' => 'mortgates_is_footer_area_enable',
			),
			'footer_widgets_bg' => array(
				'title'           => esc_html__( 'Footer Widgets Area Background color', 'mortgates' ),
				'section'         => 'footer_styles',
				'default'         => '#444c5c',
				'field'           => 'hex_color',
				'type'            => 'control',
				'active_callback' => 'mortgates_is_footer_area_enable',
			),
			'footer_menu_visibility' => array(
				'title'   => esc_html__( 'Show Footer Menu', 'mortgates' ),
				'section' => 'footer_styles',
				'default' => false,
				'field'   => 'checkbox',
				'type'    => 'control',
			),

			/** `Footer contact block` section */
			'footer_contact_block' => array(
				'title'    => esc_html__( 'Footer Contact Block', 'mortgates' ),
				'priority' => 10,
				'panel'    => 'footer_options',
				'type'     => 'section',
			),
			'footer_contact_block_visibility' => array(
				'title'   => esc_html__( 'Show Footer Contact Block', 'mortgates' ),
				'section' => 'footer_contact_block',
				'default' => false,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'footer_contact_icon_1' => array(
				'title'           => esc_html__( 'Contact item 1', 'mortgates' ),
				'description'     => esc_html__( 'Choose icon', 'mortgates' ),
				'section'         => 'footer_contact_block',
				'field'           => 'iconpicker',
				'default'         => '',
				'icon_data'       => mortgates_get_fa_icons_data(),
				'type'            => 'control',
				'active_callback' => 'mortgates_is_footer_contact_block_enable',
			),
			'footer_contact_label_1' => array(
				'title'           => '',
				'description'     => esc_html__( 'Label', 'mortgates' ),
				'section'         => 'footer_contact_block',
				'default'         => esc_html__( 'Address:', 'mortgates' ),
				'field'           => 'text',
				'type'            => 'control',
				'active_callback' => 'mortgates_is_footer_contact_block_enable',
			),
			'footer_contact_text_1' => array(
				'title'           => '',
				'description'     => esc_html__( 'Value (HTML formatting support)', 'mortgates' ),
				'section'         => 'footer_contact_block',
				'default'         => mortgates_get_default_contact_information( 'address' ),
				'field'           => 'textarea',
				'type'            => 'control',
				'active_callback' => 'mortgates_is_footer_contact_block_enable',
			),
			'footer_contact_icon_2' => array(
				'title'           => esc_html__( 'Contact item 2', 'mortgates' ),
				'description'     => esc_html__( 'Choose icon', 'mortgates' ),
				'section'         => 'footer_contact_block',
				'field'           => 'iconpicker',
				'default'         => '',
				'icon_data'       => mortgates_get_fa_icons_data(),
				'type'            => 'control',
				'active_callback' => 'mortgates_is_footer_contact_block_enable',
			),
			'footer_contact_label_2' => array(
				'title'           => '',
				'description'     => esc_html__( 'Label', 'mortgates' ),
				'section'         => 'footer_contact_block',
				'default'         => esc_html__( 'E-mail:', 'mortgates' ),
				'field'           => 'text',
				'type'            => 'control',
				'active_callback' => 'mortgates_is_footer_contact_block_enable',
			),
			'footer_contact_text_2' => array(
				'title'           => '',
				'description'     => esc_html__( 'Value (HTML formatting support)', 'mortgates' ),
				'section'         => 'footer_contact_block',
				'default'         => mortgates_get_default_contact_information( 'email' ),
				'field'           => 'textarea',
				'type'            => 'control',
				'active_callback' => 'mortgates_is_footer_contact_block_enable',
			),
			'footer_contact_icon_3' => array(
				'title'           => esc_html__( 'Contact item 3', 'mortgates' ),
				'description'     => esc_html__( 'Choose icon', 'mortgates' ),
				'section'         => 'footer_contact_block',
				'field'           => 'iconpicker',
				'default'         => '',
				'icon_data'       => mortgates_get_fa_icons_data(),
				'type'            => 'control',
				'active_callback' => 'mortgates_is_footer_contact_block_enable',
			),
			'footer_contact_label_3' => array(
				'title'           => '',
				'description'     => esc_html__( 'Label', 'mortgates' ),
				'section'         => 'footer_contact_block',
				'default'         => esc_html__( 'Phone:', 'mortgates' ),
				'field'           => 'text',
				'type'            => 'control',
				'active_callback' => 'mortgates_is_footer_contact_block_enable',
			),
			'footer_contact_text_3' => array(
				'title'           => '',
				'description'     => esc_html__( 'Value (HTML formatting support)', 'mortgates' ),
				'section'         => 'footer_contact_block',
				'default'         => mortgates_get_default_contact_information( 'phones' ),
				'field'           => 'textarea',
				'type'            => 'control',
				'active_callback' => 'mortgates_is_footer_contact_block_enable',
			),

			/** `Blog Settings` panel */
			'blog_settings' => array(
				'title'    => esc_html__( 'Blog Settings', 'mortgates' ),
				'priority' => 115,
				'type'     => 'panel',
			),

			/** `Blog` section */
			'blog' => array(
				'title'           => esc_html__( 'Blog', 'mortgates' ),
				'panel'           => 'blog_settings',
				'priority'        => 10,
				'type'            => 'section',
				'active_callback' => 'is_home',
			),
			'blog_layout_type' => array(
				'title'   => esc_html__( 'Layout', 'mortgates' ),
				'section' => 'blog',
				'default' => 'default',
				'field'   => 'select',
				'choices' => array(
					'default'          => esc_html__( 'Listing', 'mortgates' ),
					'grid'             => esc_html__( 'Grid', 'mortgates' ),
					'masonry'          => esc_html__( 'Masonry', 'mortgates' ),
					'vertical-justify' => esc_html__( 'Vertical Justify', 'mortgates' ),
				),
				'type' => 'control',
			),
			'blog_layout_columns' => array(
				'title'           => esc_html__( 'Columns', 'mortgates' ),
				'section'         => 'blog',
				'default'         => '2-cols',
				'field'           => 'select',
				'choices'         => array(
					'2-cols' => esc_html__( '2 columns', 'mortgates' ),
					'3-cols' => esc_html__( '3 columns', 'mortgates' ),
					'4-cols' => esc_html__( '4 columns', 'mortgates' ),
				),
				'type'            => 'control',
				'active_callback' => 'mortgates_is_blog_layout_type_grid_masonry',
			),
			'blog_sticky_type' => array(
				'title'   => esc_html__( 'Sticky label type', 'mortgates' ),
				'section' => 'blog',
				'default' => 'icon',
				'field'   => 'select',
				'choices' => array(
					'label' => esc_html__( 'Text Label', 'mortgates' ),
					'icon'  => esc_html__( 'Font Icon', 'mortgates' ),
					'both'  => esc_html__( 'Text with Icon', 'mortgates' ),
				),
				'type' => 'control',
			),
			'blog_sticky_icon' => array(
				'title'           => esc_html__( 'Icon for sticky post', 'mortgates' ),
				'section'         => 'blog',
				'field'           => 'iconpicker',
				'default'         => 'fa-star-o',
				'icon_data'       => mortgates_get_fa_icons_data(),
				'type'            => 'control',
				'transport'       => 'postMessage',
				'active_callback' => 'mortgates_is_sticky_icon',
			),
			'blog_sticky_label' => array(
				'title'           => esc_html__( 'Featured Post Label', 'mortgates' ),
				'description'     => esc_html__( 'Label for sticky post', 'mortgates' ),
				'section'         => 'blog',
				'default'         => esc_html__( 'Featured', 'mortgates' ),
				'field'           => 'text',
				'active_callback' => 'mortgates_is_sticky_text',
				'type'            => 'control',
				'transport'       => 'postMessage',
			),
			'blog_featured_image' => array(
				'title'           => esc_html__( 'Featured image', 'mortgates' ),
				'section'         => 'blog',
				'default'         => 'fullwidth',
				'field'           => 'select',
				'choices'         => array(
					'small'     => esc_html__( 'Small', 'mortgates' ),
					'fullwidth' => esc_html__( 'Fullwidth', 'mortgates' ),
				),
				'type'            => 'control',
				'active_callback' => 'mortgates_is_blog_featured_image',
			),
			'blog_posts_content' => array(
				'title'   => esc_html__( 'Post content', 'mortgates' ),
				'section' => 'blog',
				'default' => 'excerpt',
				'field'   => 'select',
				'choices' => array(
					'excerpt' => esc_html__( 'Only excerpt', 'mortgates' ),
					'full'    => esc_html__( 'Full content', 'mortgates' ),
					'none'    => esc_html__( 'Hide', 'mortgates' ),
				),
				'type' => 'control',
			),
			'blog_posts_content_length' => array(
				'title'           => esc_html__( 'Number of words in the excerpt', 'mortgates' ),
				'section'         => 'blog',
				'default'         => '30',
				'field'           => 'number',
				'input_attrs'     => array(
					'min'  => 1,
					'max'  => 100,
					'step' => 1,
				),
				'type'            => 'control',
				'active_callback' => 'mortgates_is_blog_posts_content_type_excerpt',
			),
			'blog_read_more_btn' => array(
				'title'   => esc_html__( 'Show Read More button', 'mortgates' ),
				'section' => 'blog',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'blog_read_more_text' => array(
				'title'           => esc_html__( 'Read More button text', 'mortgates' ),
				'section'         => 'blog',
				'default'         => esc_html__( 'Read more', 'mortgates' ),
				'field'           => 'text',
				'type'            => 'control',
				'transport'       => 'postMessage',
				'active_callback' => 'mortgates_is_blog_read_more_btn_enable',
			),
			'blog_post_author' => array(
				'title'   => esc_html__( 'Show post author', 'mortgates' ),
				'section' => 'blog',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'blog_post_publish_date' => array(
				'title'   => esc_html__( 'Show publish date', 'mortgates' ),
				'section' => 'blog',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'blog_post_categories' => array(
				'title'   => esc_html__( 'Show categories', 'mortgates' ),
				'section' => 'blog',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'blog_post_tags' => array(
				'title'   => esc_html__( 'Show tags', 'mortgates' ),
				'section' => 'blog',
				'default' => false,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'blog_post_comments' => array(
				'title'   => esc_html__( 'Show comments', 'mortgates' ),
				'section' => 'blog',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'blog_post_trend_views' => array(
				'title'   => esc_html__( 'Show views counter', 'mortgates' ),
				'section' => 'blog',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
				'active_callback' => 'mortgates_is_cherry_trending_posts_activated',
			),

			/** `Post` section */
			'blog_post' => array(
				'title'           => esc_html__( 'Post', 'mortgates' ),
				'panel'           => 'blog_settings',
				'priority'        => 20,
				'type'            => 'section',
				'active_callback' => 'callback_single',
			),
			'single_post_author' => array(
				'title'   => esc_html__( 'Show post author', 'mortgates' ),
				'section' => 'blog_post',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'single_post_publish_date' => array(
				'title'   => esc_html__( 'Show publish date', 'mortgates' ),
				'section' => 'blog_post',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'single_post_categories' => array(
				'title'   => esc_html__( 'Show categories', 'mortgates' ),
				'section' => 'blog_post',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'single_post_tags' => array(
				'title'   => esc_html__( 'Show tags', 'mortgates' ),
				'section' => 'blog_post',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'single_post_comments' => array(
				'title'   => esc_html__( 'Show comments', 'mortgates' ),
				'section' => 'blog_post',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'single_post_trend_views' => array(
				'title'   => esc_html__( 'Show views counter', 'mortgates' ),
				'section' => 'blog_post',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
				'active_callback' => 'mortgates_is_cherry_trending_posts_activated',
			),
			'single_post_trend_rating' => array(
				'title'   => esc_html__( 'Show rating', 'mortgates' ),
				'section' => 'blog_post',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
				'active_callback' => 'mortgates_is_cherry_trending_posts_activated',
			),
			'single_author_block' => array(
				'title'   => esc_html__( 'Enable the author block after each post', 'mortgates' ),
				'section' => 'blog_post',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'single_post_navigation' => array(
				'title'   => esc_html__( 'Enable post navigation', 'mortgates' ),
				'section' => 'blog_post',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),

			/** `Related Posts` section */
			'related_posts' => array(
				'title'           => esc_html__( 'Related posts block', 'mortgates' ),
				'panel'           => 'blog_settings',
				'priority'        => 30,
				'type'            => 'section',
				'active_callback' => 'callback_single',
			),
			'related_posts_visible' => array(
				'title'   => esc_html__( 'Show related posts block', 'mortgates' ),
				'section' => 'related_posts',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'related_posts_block_title' => array(
				'title'           => esc_html__( 'Related posts block title', 'mortgates' ),
				'section'         => 'related_posts',
				'default'         => esc_html__( 'Related posts', 'mortgates' ),
				'field'           => 'text',
				'type'            => 'control',
				'active_callback' => 'mortgates_is_related_posts_enable',
				'transport'       => 'postMessage',
			),
			'related_posts_count' => array(
				'title'           => esc_html__( 'Number of post', 'mortgates' ),
				'section'         => 'related_posts',
				'default'         => '2',
				'field'           => 'text',
				'type'            => 'control',
				'active_callback' => 'mortgates_is_related_posts_enable',
			),
			'related_posts_grid' => array(
				'title'           => esc_html__( 'Layout', 'mortgates' ),
				'section'         => 'related_posts',
				'default'         => '2',
				'field'           => 'select',
				'choices'         => array(
					'2' => esc_html__( '2 columns', 'mortgates' ),
					'3' => esc_html__( '3 columns', 'mortgates' ),
					'4' => esc_html__( '4 columns', 'mortgates' ),
				),
				'type'            => 'control',
				'active_callback' => 'mortgates_is_related_posts_enable',
			),
			'related_posts_title' => array(
				'title'           => esc_html__( 'Show post title', 'mortgates' ),
				'section'         => 'related_posts',
				'default'         => true,
				'field'           => 'checkbox',
				'type'            => 'control',
				'active_callback' => 'mortgates_is_related_posts_enable',
			),
			'related_posts_title_length' => array(
				'title'           => esc_html__( 'Number of words in the title', 'mortgates' ),
				'section'         => 'related_posts',
				'default'         => '10',
				'field'           => 'text',
				'type'            => 'control',
				'active_callback' => 'mortgates_is_related_posts_enable',
			),
			'related_posts_image' => array(
				'title'           => esc_html__( 'Show post image', 'mortgates' ),
				'section'         => 'related_posts',
				'default'         => true,
				'field'           => 'checkbox',
				'type'            => 'control',
				'active_callback' => 'mortgates_is_related_posts_enable',
			),
			'related_posts_content' => array(
				'title'           => esc_html__( 'Display content', 'mortgates' ),
				'section'         => 'related_posts',
				'default'         => 'hide',
				'field'           => 'select',
				'choices'         => array(
					'hide'         => esc_html__( 'Hide', 'mortgates' ),
					'post_excerpt' => esc_html__( 'Excerpt', 'mortgates' ),
					'post_content' => esc_html__( 'Content', 'mortgates' ),
				),
				'type'            => 'control',
				'active_callback' => 'mortgates_is_related_posts_enable',
			),
			'related_posts_content_length' => array(
				'title'           => esc_html__( 'Number of words in the content', 'mortgates' ),
				'section'         => 'related_posts',
				'default'         => '10',
				'field'           => 'text',
				'type'            => 'control',
				'active_callback' => 'mortgates_is_related_posts_enable',
			),
			'related_posts_categories' => array(
				'title'           => esc_html__( 'Show post categories', 'mortgates' ),
				'section'         => 'related_posts',
				'default'         => false,
				'field'           => 'checkbox',
				'type'            => 'control',
				'active_callback' => 'mortgates_is_related_posts_enable',
			),
			'related_posts_tags' => array(
				'title'           => esc_html__( 'Show post tags', 'mortgates' ),
				'section'         => 'related_posts',
				'default'         => false,
				'field'           => 'checkbox',
				'type'            => 'control',
				'active_callback' => 'mortgates_is_related_posts_enable',
			),
			'related_posts_author' => array(
				'title'           => esc_html__( 'Show post author', 'mortgates' ),
				'section'         => 'related_posts',
				'default'         => false,
				'field'           => 'checkbox',
				'type'            => 'control',
				'active_callback' => 'mortgates_is_related_posts_enable',
			),
			'related_posts_publish_date' => array(
				'title'           => esc_html__( 'Show post publish date', 'mortgates' ),
				'section'         => 'related_posts',
				'default'         => true,
				'field'           => 'checkbox',
				'type'            => 'control',
				'active_callback' => 'mortgates_is_related_posts_enable',
			),
			'related_posts_comment_count' => array(
				'title'           => esc_html__( 'Show post comment count', 'mortgates' ),
				'section'         => 'related_posts',
				'default'         => false,
				'field'           => 'checkbox',
				'type'            => 'control',
				'active_callback' => 'mortgates_is_related_posts_enable',
			),

			/** `404` panel */
			'page_404_options' => array(
				'title'    => esc_html__( '404 Page Style', 'mortgates' ),
				'priority' => 130,
				'type'     => 'section',
			),
			'page_404_bg_color' => array(
				'title'     => esc_html__( 'Background Color', 'mortgates' ),
				'section'   => 'page_404_options',
				'field'     => 'hex_color',
				'default'   => '#000000',
				'type'      => 'control',
			),
			'page_404_bg_image' => array(
				'title'   => esc_html__( 'Background Image', 'mortgates' ),
				'section' => 'page_404_options',
				'field'   => 'image',
				'default' => '%s/assets/images/bg_404.jpg',
				'type'    => 'control',
			),
			'page_404_bg_repeat' => array(
				'title'   => esc_html__( 'Background Repeat', 'mortgates' ),
				'section' => 'page_404_options',
				'default' => 'no-repeat',
				'field'   => 'select',
				'choices' => mortgates_get_bg_repeat(),
				'type' => 'control',
			),
			'page_404_bg_position' => array(
				'title'   => esc_html__( 'Background Position', 'mortgates' ),
				'section' => 'page_404_options',
				'default' => 'center',
				'field'   => 'select',
				'choices' => mortgates_get_bg_position(),
				'type' => 'control',
			),
			'page_404_bg_size' => array(
				'title'   => esc_html__( 'Background Size', 'mortgates' ),
				'section' => 'page_404_options',
				'default' => 'cover',
				'field'   => 'select',
				'choices' => mortgates_get_bg_size(),
				'type' => 'control',
			),
			'page_404_bg_attachment' => array(
				'title'   => esc_html__( 'Background Attachment', 'mortgates' ),
				'section' => 'page_404_options',
				'default' => 'scroll',
				'field'   => 'select',
				'choices' => mortgates_get_bg_attachment(),
				'type' => 'control',
			),
			'page_404_text_color' => array(
				'title'       => esc_html__( 'Text Color', 'mortgates' ),
				'description' => esc_html__( 'Here you can choose whether your text should be light or dark. If you are working with a dark background, then your text should be light. If your background is light, then your text should be set to dark.', 'mortgates' ),
				'section'     => 'page_404_options',
				'default'     => 'light',
				'field'       => 'select',
				'choices'     => mortgates_get_text_color(),
				'type'        => 'control',
			),
			'page_404_btn_style_preset' => array(
				'title'   => esc_html__( 'Button Style Preset', 'mortgates' ),
				'section' => 'page_404_options',
				'default' => 'primary',
				'field'   => 'select',
				'choices' => mortgates_get_btn_style_presets(),
				'type'    => 'control',
			),
		),
	) );
}

/**
 * Return true if setting is value. Otherwise - return false.
 *
 * @param  object $control Parent control.
 * @param  string $setting Setting name to check.
 * @param  string $value   Setting value to compare.
 * @return bool
 */
function mortgates_is_setting( $control, $setting, $value ) {

	if ( $value == $control->manager->get_setting( $setting )->value() ) {
		return true;
	}

	return false;
}

/**
 * Return true if value of passed setting is not equal with passed value.
 *
 * @param  object $control Parent control.
 * @param  string $setting Setting name to check.
 * @param  string $value   Setting value to compare.
 * @return bool
 */
function mortgates_is_not_setting( $control, $setting, $value ) {

	if ( $value !== $control->manager->get_setting( $setting )->value() ) {
		return true;
	}

	return false;
}

/**
 * Return true if logo in header has image type. Otherwise - return false.
 *
 * @param  object $control Parent control.
 * @return bool
 */
function mortgates_is_header_logo_image( $control ) {
	return mortgates_is_setting( $control, 'header_logo_type', 'image' );
}

/**
 * Return true if logo in header has text type. Otherwise - return false.
 *
 * @param  object $control Parent control.
 * @return bool
 */
function mortgates_is_header_logo_text( $control ) {
	return mortgates_is_setting( $control, 'header_logo_type', 'text' );
}

/**
 * Return blog-featured-image true if blog layout type is default. Otherwise - return false.
 *
 * @param  object $control Parent control.
 * @return bool
 */
function mortgates_is_blog_featured_image( $control ) {
	return mortgates_is_setting( $control, 'blog_layout_type', 'default' );
}

/**
 * Return true if sticky label type set to text or text with icon.
 *
 * @param  object $control Parent control.
 * @return bool
 */
function mortgates_is_sticky_text( $control ) {
	return mortgates_is_not_setting( $control, 'blog_sticky_type', 'icon' );
}

/**
 * Return true if sticky label type set to icon or text with icon.
 *
 * @param  object $control Parent control.
 * @return bool
 */
function mortgates_is_sticky_icon( $control ) {
	return mortgates_is_not_setting( $control, 'blog_sticky_type', 'label' );
}

/**
 * Return true if option Show Header Contact Block is enable. Otherwise - return false.
 *
 * @param  object $control Parent control.
 * @return bool
 */
function mortgates_is_header_contact_block_enable( $control ) {
	return mortgates_is_setting( $control, 'header_contact_block_visibility', true );
}

/**
 * Return true if option Show Footer Contact Block is enable. Otherwise - return false.
 *
 * @param  object $control Parent control.
 * @return bool
 */
function mortgates_is_footer_contact_block_enable( $control ) {
	return mortgates_is_setting( $control, 'footer_contact_block_visibility', true );
}

/**
 * Return true if option Show Related Posts Block is enable. Otherwise - return false.
 *
 * @param  object $control Parent control.
 * @return bool
 */
function mortgates_is_related_posts_enable( $control ) {
	return mortgates_is_setting( $control, 'related_posts_visible', true );
}

/**
 * Return true if option Enable Top Panel is enable. Otherwise - return false.
 *
 * @param  object $control Parent control.
 * @return bool
 */
function mortgates_is_top_panel_enable( $control ) {
	return mortgates_is_setting( $control, 'top_panel_visibility', true );
}

/**
 * Return true if option Show Footer Logo is enable. Otherwise - return false.
 *
 * @param  object $control Parent control.
 * @return bool
 */
function mortgates_is_footer_logo_enable( $control ) {
	return mortgates_is_setting( $control, 'footer_logo_visibility', true );
}

/**
 * Return true if option Show Footer Widgets Area is enable. Otherwise - return false.
 *
 * @param  object $control Parent control.
 * @return bool
 */
function mortgates_is_footer_area_enable( $control ) {
	return mortgates_is_setting( $control, 'footer_widget_area_visibility', true );
}

/**
 * Return true if option Blog posts content is excerpt. Otherwise - return false.
 *
 * @param  object $control Parent control.
 * @return bool
 */
function mortgates_is_blog_posts_content_type_excerpt( $control ) {
	return mortgates_is_setting( $control, 'blog_posts_content', 'excerpt' );
}

/**
 * Return true if option Show Read More button is enable. Otherwise - return false.
 *
 * @param  object $control Parent control.
 * @return bool
 */
function mortgates_is_blog_read_more_btn_enable( $control ) {
	return mortgates_is_setting( $control, 'blog_read_more_btn', true );
}

/**
 * Return true if Blog layout selected Grid or Masonry. Otherwise - return false.
 *
 * @param  object $control Parent control.
 * @return bool
 */
function mortgates_is_blog_layout_type_grid_masonry( $control ) {
	if ( in_array( $control->manager->get_setting( 'blog_layout_type' )->value(), array( 'grid', 'masonry' ) ) ) {
		return true;
	}

	return false;
}

/**
 * Return true if option Show header call to action button is enable. Otherwise - return false.
 *
 * @param  object $control Parent control.
 * @return bool
 */
function mortgates_is_header_btn_enable( $control ) {
	return mortgates_is_setting( $control, 'header_btn_visibility', true );
}

/**
 * Return true if option Show Page Preloader is enable. Otherwise - return false.
 *
 * @param  object $control Parent control.
 * @return bool
 */
function mortgates_is_page_preloader_enable( $control ) {
	return mortgates_is_setting( $control, 'page_preloader', true );
}

/**
 * Return true if option Page type is boxed. Otherwise - return false.
 *
 * @param  object $control Parent control.
 * @return bool
 */
function mortgates_is_page_type_boxed( $control ) {
	return mortgates_is_setting( $control, 'page_container_type', 'boxed' );
}

/**
 * Get default header layouts.
 *
 * @since  1.0.0
 * @return array
 */
function mortgates_get_header_layout_options() {
	return apply_filters( 'mortgates_header_layout_options', array(
		'style-1' => esc_html__( 'Style 1', 'mortgates' ),
		'style-2' => esc_html__( 'Style 2', 'mortgates' ),
		'style-3' => esc_html__( 'Style 3', 'mortgates' ),
		'style-4' => esc_html__( 'Style 4', 'mortgates' ),
	) );
}

/**
 * Get default footer layouts.
 *
 * @since  1.0.0
 * @return array
 */
function mortgates_get_footer_layout_options() {
	return apply_filters( 'mortgates_footer_layout_options', array(
		'style-1' => esc_html__( 'Style 1', 'mortgates' ),
		'style-2' => esc_html__( 'Style 2', 'mortgates' ),
	) );
}

/**
 * Get default header layouts options for Post Meta boxes
 *
 * @return array
 */
function mortgates_get_header_layout_pm_options() {
	$inherit_option = array(
		'inherit' => esc_html__( 'Inherit', 'mortgates' ),
	);

	$options = mortgates_get_header_layout_options();

	return array_merge( $inherit_option, $options );
}

/**
 * Get default footer layouts options for Post Meta boxes
 *
 * @return array
 */
function mortgates_get_footer_layout_pm_options() {
	$inherit_option = array(
		'inherit' => esc_html__( 'Inherit', 'mortgates' ),
	);

	$options = mortgates_get_footer_layout_options();

	return array_merge( $inherit_option, $options );
}

// Change native customizer control (based on WordPress core).
add_action( 'customize_register', 'mortgates_customizer_change_core_controls', 20 );

// Bind JS handlers to instantly live-preview changes.
add_action( 'customize_preview_init', 'mortgates_customize_preview_js' );

/**
 * Change native customize control (based on WordPress core).
 *
 * @since 1.0.0
 * @param  object $wp_customize Object wp_customize.
 * @return void
 */
function mortgates_customizer_change_core_controls( $wp_customize ) {
	$wp_customize->get_control( 'site_icon' )->section         = 'mortgates_logo_favicon';
	$wp_customize->get_section( 'background_image' )->priority = 45;
	$wp_customize->get_control( 'background_color' )->label    = esc_html__( 'Body Background Color', 'mortgates' );

	$wp_customize->get_setting( 'blogname' )->transport        = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';
}

/**
 * Bind JS handlers to instantly live-preview changes.
 */
function mortgates_customize_preview_js() {
	wp_enqueue_script( 'mortgates-customize-preview', MORTGATES_THEME_JS . '/customize-preview.js', array( 'customize-preview' ), '1.0', true );
}

// Set customize selective refresh.
add_action( 'customize_register', 'mortgates_customizer_selective_refresh', 20 );

/**
 * Set customize selective refresh.
 *
 * @since 1.0.0
 * @param  object $wp_customize Object wp_customize.
 * @return void
 */
function mortgates_customizer_selective_refresh( $wp_customize ) {}

// Typography utility function
/**
 * Get font styles
 *
 * @since 1.0.0
 * @return array
 */
function mortgates_get_font_styles() {
	return apply_filters( 'mortgates_get_font_styles', array(
		'normal'  => esc_html__( 'Normal', 'mortgates' ),
		'italic'  => esc_html__( 'Italic', 'mortgates' ),
		'oblique' => esc_html__( 'Oblique', 'mortgates' ),
		'inherit' => esc_html__( 'Inherit', 'mortgates' ),
	) );
}

/**
 * Get character sets
 *
 * @since 1.0.0
 * @return array
 */
function mortgates_get_character_sets() {
	return apply_filters( 'mortgates_get_character_sets', array(
		'latin'        => esc_html__( 'Latin', 'mortgates' ),
		'greek'        => esc_html__( 'Greek', 'mortgates' ),
		'greek-ext'    => esc_html__( 'Greek Extended', 'mortgates' ),
		'vietnamese'   => esc_html__( 'Vietnamese', 'mortgates' ),
		'cyrillic-ext' => esc_html__( 'Cyrillic Extended', 'mortgates' ),
		'latin-ext'    => esc_html__( 'Latin Extended', 'mortgates' ),
		'cyrillic'     => esc_html__( 'Cyrillic', 'mortgates' ),
	) );
}

/**
 * Get text aligns
 *
 * @since 1.0.0
 * @return array
 */
function mortgates_get_text_aligns() {
	return apply_filters( 'mortgates_get_text_aligns', array(
		'inherit' => esc_html__( 'Inherit', 'mortgates' ),
		'center'  => esc_html__( 'Center', 'mortgates' ),
		'justify' => esc_html__( 'Justify', 'mortgates' ),
		'left'    => esc_html__( 'Left', 'mortgates' ),
		'right'   => esc_html__( 'Right', 'mortgates' ),
	) );
}

/**
 * Get font weights
 *
 * @since 1.0.0
 * @return array
 */
function mortgates_get_font_weight() {
	return apply_filters( 'mortgates_get_font_weight', array(
		'100' => '100',
		'200' => '200',
		'300' => '300',
		'400' => '400',
		'500' => '500',
		'600' => '600',
		'700' => '700',
		'800' => '800',
		'900' => '900',
	) );
}

/**
 * Get tesx transform.
 *
 * @since 1.0.0
 * @return array
 */
function mortgates_get_text_transform() {
	return apply_filters( 'mortgates_get_text_transform', array(
		'none'       => esc_html__( 'None ', 'mortgates' ),
		'uppercase'  => esc_html__( 'Uppercase ', 'mortgates' ),
		'lowercase'  => esc_html__( 'Lowercase', 'mortgates' ),
		'capitalize' => esc_html__( 'Capitalize', 'mortgates' ),
	) );
}

// Background utility function
/**
 * Get background position
 *
 * @since 1.0.0
 * @return array
 */
function mortgates_get_bg_position() {
	return apply_filters( 'mortgates_get_bg_position', array(
		'top-left'      => esc_html__( 'Top Left', 'mortgates' ),
		'top-center'    => esc_html__( 'Top Center', 'mortgates' ),
		'top-right'     => esc_html__( 'Top Right', 'mortgates' ),
		'center-left'   => esc_html__( 'Middle Left', 'mortgates' ),
		'center'        => esc_html__( 'Middle Center', 'mortgates' ),
		'center-right'  => esc_html__( 'Middle Right', 'mortgates' ),
		'bottom-left'   => esc_html__( 'Bottom Left', 'mortgates' ),
		'bottom-center' => esc_html__( 'Bottom Center', 'mortgates' ),
		'bottom-right'  => esc_html__( 'Bottom Right', 'mortgates' ),
	) );
}

/**
 * Get background size
 *
 * @since 1.0.0
 * @return array
 */
function mortgates_get_bg_size() {
	return apply_filters( 'mortgates_get_bg_size', array(
		'auto'    => esc_html__( 'Auto', 'mortgates' ),
		'cover'   => esc_html__( 'Cover', 'mortgates' ),
		'contain' => esc_html__( 'Contain', 'mortgates' ),
	) );
}

/**
 * Get background repeat
 *
 * @since 1.0.0
 * @return array
 */
function mortgates_get_bg_repeat() {
	return apply_filters( 'mortgates_get_bg_repeat', array(
		'no-repeat' => esc_html__( 'No Repeat', 'mortgates' ),
		'repeat'    => esc_html__( 'Tile', 'mortgates' ),
		'repeat-x'  => esc_html__( 'Tile Horizontally', 'mortgates' ),
		'repeat-y'  => esc_html__( 'Tile Vertically', 'mortgates' ),
	) );
}

/**
 * Get background attachment
 *
 * @since 1.0.0
 * @return array
 */
function mortgates_get_bg_attachment() {
	return apply_filters( 'mortgates_get_bg_attachment', array(
		'scroll' => esc_html__( 'Scroll', 'mortgates' ),
		'fixed'  => esc_html__( 'Fixed', 'mortgates' ),
	) );
}

/**
 * Get text color
 *
 * @since 1.0.0
 * @return array
 */
function mortgates_get_text_color() {
	return apply_filters( 'mortgates_get_text_color', array(
		'light' => esc_html__( 'Light', 'mortgates' ),
		'dark'  => esc_html__( 'Dark', 'mortgates' ),
	) );
}

/**
 * Return array of arguments for dynamic CSS module
 *
 * @return array
 */
function mortgates_get_dynamic_css_options() {
	return apply_filters( 'mortgates_get_dynamic_css_options', array(
		'prefix'        => 'mortgates',
		'type'          => 'theme_mod',
		'parent_handle' => 'mortgates-theme-style',
		'single'        => true,
		'css_files'     => array(
			mortgates_get_locate_template( 'assets/css/dynamic/dynamic.css' ),

			mortgates_get_locate_template( 'assets/css/dynamic/site/elements.css' ),
			mortgates_get_locate_template( 'assets/css/dynamic/site/header.css' ),
			mortgates_get_locate_template( 'assets/css/dynamic/site/forms.css' ),
			mortgates_get_locate_template( 'assets/css/dynamic/site/social.css' ),
			mortgates_get_locate_template( 'assets/css/dynamic/site/menus.css' ),
			mortgates_get_locate_template( 'assets/css/dynamic/site/post.css' ),
			mortgates_get_locate_template( 'assets/css/dynamic/site/navigation.css' ),
			mortgates_get_locate_template( 'assets/css/dynamic/site/footer.css' ),
			mortgates_get_locate_template( 'assets/css/dynamic/site/misc.css' ),
			mortgates_get_locate_template( 'assets/css/dynamic/site/buttons.css' ),

			mortgates_get_locate_template( 'assets/css/dynamic/widgets/widget-default.css' ),
			mortgates_get_locate_template( 'assets/css/dynamic/widgets/subscribe.css' ),
			mortgates_get_locate_template( 'assets/css/dynamic/widgets/custom-posts.css' ),
			mortgates_get_locate_template( 'assets/css/dynamic/widgets/contact-information.css' ),

			mortgates_get_locate_template( 'assets/css/dynamic/plugins/jet-elements.css' ),
			mortgates_get_locate_template( 'assets/css/dynamic/plugins/calculated-fields-form.css' ),
		),
		'options' => array(
			'header_logo_font_style',
			'header_logo_font_weight',
			'header_logo_font_size',
			'header_logo_line_height',
			'header_logo_font_family',
			'header_logo_letter_spacing',
			'header_logo_text_transform',

			'body_font_style',
			'body_font_weight',
			'body_font_size',
			'body_line_height',
			'body_font_family',
			'body_letter_spacing',
			'body_text_align',
			'body_text_transform',

			'h1_font_style',
			'h1_font_weight',
			'h1_font_size',
			'h1_line_height',
			'h1_font_family',
			'h1_letter_spacing',
			'h1_text_align',
			'h1_text_transform',

			'h2_font_style',
			'h2_font_weight',
			'h2_font_size',
			'h2_line_height',
			'h2_font_family',
			'h2_letter_spacing',
			'h2_text_align',
			'h2_text_transform',

			'h3_font_style',
			'h3_font_weight',
			'h3_font_size',
			'h3_line_height',
			'h3_font_family',
			'h3_letter_spacing',
			'h3_text_align',
			'h3_text_transform',

			'h4_font_style',
			'h4_font_weight',
			'h4_font_size',
			'h4_line_height',
			'h4_font_family',
			'h4_letter_spacing',
			'h4_text_align',
			'h4_text_transform',

			'h5_font_style',
			'h5_font_weight',
			'h5_font_size',
			'h5_line_height',
			'h5_font_family',
			'h5_letter_spacing',
			'h5_text_align',
			'h5_text_transform',

			'h6_font_style',
			'h6_font_weight',
			'h6_font_size',
			'h6_line_height',
			'h6_font_family',
			'h6_letter_spacing',
			'h6_text_align',
			'h6_text_transform',

			'breadcrumbs_font_style',
			'breadcrumbs_font_weight',
			'breadcrumbs_font_size',
			'breadcrumbs_line_height',
			'breadcrumbs_font_family',
			'breadcrumbs_letter_spacing',
			'breadcrumbs_text_transform',

			'breadcrumbs_bg_color',
			'breadcrumbs_bg_image',
			'breadcrumbs_bg_repeat',
			'breadcrumbs_bg_position',
			'breadcrumbs_bg_size',
			'breadcrumbs_bg_attachment',
			'breadcrumbs_padding_y',
			'breadcrumbs_padding_y_tablet',
			'breadcrumbs_padding_y_mobile',

			'meta_font_style',
			'meta_font_weight',
			'meta_font_size',
			'meta_line_height',
			'meta_font_family',
			'meta_letter_spacing',
			'meta_text_transform',

			'accent_font_style',
			'accent_font_weight',
			'accent_font_family',
			'accent_letter_spacing',
			'accent_text_transform',

			'regular_accent_color_1',
			'regular_accent_color_2',
			'regular_text_color',
			'regular_link_color',
			'regular_link_hover_color',
			'regular_h1_color',
			'regular_h2_color',
			'regular_h3_color',
			'regular_h4_color',
			'regular_h5_color',
			'regular_h6_color',

			'invert_accent_color_1',
			'invert_text_color',
			'invert_link_color',
			'invert_link_hover_color',
			'invert_h1_color',
			'invert_h2_color',
			'invert_h3_color',
			'invert_h4_color',
			'invert_h5_color',
			'invert_h6_color',

			'grey_color_1',
			'grey_color_2',
			'grey_color_3',
			'grey_color_4',
			'grey_color_5',

			'page_bg_color',

			'header_bg_color',
			'header_bg_image',
			'header_bg_repeat',
			'header_bg_position',
			'header_bg_attachment',
			'header_bg_size',

			'header_transparent_bg',
			'header_transparent_bg_alpha',

			'page_404_bg_color',
			'page_404_bg_image',
			'page_404_bg_repeat',
			'page_404_bg_position',
			'page_404_bg_attachment',
			'page_404_bg_size',

			'top_panel_bg',
			'page_preloader_bg',

			'page_boxed_width',
			'container_width',

			'footer_widgets_bg',
			'footer_bg',

			'onsale_badge_bg',
			'featured_badge_bg',
			'new_badge_bg',
		),
	) );
}

/**
 * Return array of arguments for Google Font loader module.
 *
 * @since  1.0.0
 * @return array
 */
function mortgates_get_fonts_options() {
	return apply_filters( 'mortgates_get_fonts_options', array(
		'prefix'  => 'mortgates',
		'type'    => 'theme_mod',
		'single'  => true,
		'options' => array(
			'body' => array(
				'family'  => 'body_font_family',
				'style'   => 'body_font_style',
				'weight'  => 'body_font_weight',
				'charset' => 'body_character_set',
			),
			'h1' => array(
				'family'  => 'h1_font_family',
				'style'   => 'h1_font_style',
				'weight'  => 'h1_font_weight',
				'charset' => 'h1_character_set',
			),
			'h2' => array(
				'family'  => 'h2_font_family',
				'style'   => 'h2_font_style',
				'weight'  => 'h2_font_weight',
				'charset' => 'h2_character_set',
			),
			'h3' => array(
				'family'  => 'h3_font_family',
				'style'   => 'h3_font_style',
				'weight'  => 'h3_font_weight',
				'charset' => 'h3_character_set',
			),
			'h4' => array(
				'family'  => 'h4_font_family',
				'style'   => 'h4_font_style',
				'weight'  => 'h4_font_weight',
				'charset' => 'h4_character_set',
			),
			'h5' => array(
				'family'  => 'h5_font_family',
				'style'   => 'h5_font_style',
				'weight'  => 'h5_font_weight',
				'charset' => 'h5_character_set',
			),
			'h6' => array(
				'family'  => 'h6_font_family',
				'style'   => 'h6_font_style',
				'weight'  => 'h6_font_weight',
				'charset' => 'h6_character_set',
			),
			'meta' => array(
				'family'  => 'meta_font_family',
				'style'   => 'meta_font_style',
				'weight'  => 'meta_font_weight',
				'charset' => 'meta_character_set',
			),
			'header_logo' => array(
				'family'  => 'header_logo_font_family',
				'style'   => 'header_logo_font_style',
				'weight'  => 'header_logo_font_weight',
				'charset' => 'header_logo_character_set',
			),
			'accent' => array(
				'family'  => 'accent_font_family',
				'style'   => 'accent_font_style',
				'weight'  => 'accent_font_weight',
				'charset' => 'accent_character_set',
			),
			'breadcrumbs' => array(
				'family'  => 'breadcrumbs_font_family',
				'style'   => 'breadcrumbs_font_style',
				'weight'  => 'breadcrumbs_font_weight',
				'charset' => 'breadcrumbs_character_set',
			),
		),
	) );
}

/**
 * Get default footer copyright.
 *
 * @since  1.0.0
 * @return string
 */
function mortgates_get_default_footer_copyright() {
	return esc_html__( '&copy; %%year%% %%site-name%%. All rights reserved.', 'mortgates' );
}

/**
 * Get default contact information.
 *
 * @since  1.0.0
 * @return string
 */
function mortgates_get_default_contact_information( $value ) {
	$contact_information = array(
		'address'   => esc_html__( '4096 N Highland St, Arlington VA 32101, USA', 'mortgates' ),
		'address-2' => esc_html__( '121 WallStreet Street, NY York, USA', 'mortgates' ),
		'phones'    => sprintf( '<a href="tel:#">%1$s</a>', esc_html__( '800 1234 56 78', 'mortgates' ) ),
		'email'     => sprintf( '<a href="mailto:%1$s">%1$s</a>', esc_html__( 'info@company.com', 'mortgates' ) ),
	);

	return $contact_information[ $value ];
}

/**
 * Get FontAwesome icons set
 *
 * @return array
 */
function mortgates_get_icons_set() {

	static $font_icons;

	if ( ! $font_icons ) {

		ob_start();

		include MORTGATES_THEME_DIR . '/assets/js/icons.json';
		$json = ob_get_clean();

		$font_icons = array();
		$icons      = json_decode( $json, true );

		foreach ( $icons['icons'] as $icon ) {
			$font_icons[] = $icon['id'];
		}
	}

	return $font_icons;
}

function mortgates_get_fa_icons_data() {
	return apply_filters( 'mortgates_get_fa_icons_data', array(
		'icon_set'    => 'mortgatesFontAwesome',
		'icon_css'    => MORTGATES_THEME_URI . '/assets/css/font-awesome.min.css',
		'icon_base'   => 'fa',
		'icon_prefix' => 'fa-',
		'icons'       => mortgates_get_icons_set(),
	) );
}

/**
 * Get iconsmind icons set.
 *
 * @return array
 */
function mortgates_get_iconsmind_icons_set() {

	static $iconsmind_icons;

	if ( ! $iconsmind_icons ) {
		ob_start();

		include MORTGATES_THEME_DIR . '/assets/css/linearicons-free.css';

		$result = ob_get_clean();

		preg_match_all( '/\.([-_a-zA-Z0-9]+):before[, {]/', $result, $matches );

		if ( ! is_array( $matches ) || empty( $matches[1] ) ) {
			return;
		}

		$iconsmind_icons = $matches[1];
	}

	return $iconsmind_icons;
}

/**
 * Get iconsmind icons data for iconpicker control.
 *
 * @return array
 */
function mortgates_get_iconsmind_icons_data() {
	return apply_filters( 'mortgates_get_iconsmind_icons_data', array(
		'icon_set'    => 'mortgatesLnrIcons',
		'icon_css'    => MORTGATES_THEME_URI . '/assets/css/linearicons-free.css',
		'icon_base'   => 'lnr',
		'icon_prefix' => '',
		'icons'       => mortgates_get_iconsmind_icons_set(),
	) );
}

/**
 * Get header button style presets.
 *
 * @return array
 */
function mortgates_get_btn_style_presets() {
	return apply_filters( 'mortgates_get_btn_style_presets', array(
		'primary'             => esc_html__( 'Primary', 'mortgates' ),
		'secondary'           => esc_html__( 'Secondary', 'mortgates' ),
		'primary-transparent' => esc_html__( 'Primary Transparent', 'mortgates' ),
		'grey'                => esc_html__( 'Grey', 'mortgates' ),
	) );
}
