<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Mortgates
 */

/**
 * Sidebar position
 */
add_filter( 'theme_mod_sidebar_position', 'mortgates_set_post_meta_value', 20 );

/**
 * Page type
 */
add_filter( 'theme_mod_page_container_type', 'mortgates_set_post_meta_value' );

/**
 * Header container type
 */
add_filter( 'theme_mod_header_container_type', 'mortgates_set_post_meta_value' );

/**
 * Breadcrumbs container type
 */
add_filter( 'theme_mod_breadcrumbs_container_type', 'mortgates_set_post_meta_value' );

/**
 * Content container type
 */
add_filter( 'theme_mod_content_container_type', 'mortgates_set_post_meta_value' );

/**
 * Footer container type
 */
add_filter( 'theme_mod_footer_container_type', 'mortgates_set_post_meta_value' );

/**
 * Header layout type
 */
add_filter( 'theme_mod_header_layout_type', 'mortgates_set_post_meta_value' );

/**
 * Header transparent layout
 */
add_filter( 'theme_mod_header_transparent_layout', 'mortgates_pre_set_post_meta_value' );

/**
 * Header transparent background
 */
add_filter( 'theme_mod_header_transparent_bg', 'mortgates_set_post_meta_value' );

/**
 * Header transparent background alpha
 */
add_filter( 'theme_mod_header_transparent_bg_alpha', 'mortgates_set_post_meta_value' );

/**
 * Header invert color scheme
 */
add_filter( 'theme_mod_header_invert_color_scheme', 'mortgates_pre_set_post_meta_value' );

/**
 * Enable/disable breadcrumbs
 */
add_filter( 'theme_mod_breadcrumbs_visibillity', 'mortgates_pre_set_post_meta_value' );

/**
 * Enable/disable top panel
 */
add_filter( 'theme_mod_top_panel_visibility', 'mortgates_pre_set_post_meta_value' );

/**
 * Enable/disable header contact block
 */
add_filter( 'theme_mod_header_contact_block_visibility', 'mortgates_pre_set_post_meta_value' );

/**
 * Enable/disable header search
 */
add_filter( 'theme_mod_header_search', 'mortgates_pre_set_post_meta_value' );

/**
 * Footer layout type
 */
add_filter( 'theme_mod_footer_layout_type', 'mortgates_set_post_meta_value' );

/**
 * Enable/disable footer widget area
 */
add_filter( 'theme_mod_footer_widget_area_visibility', 'mortgates_pre_set_post_meta_value' );

/**
 * Enable/disable footer contact block
 */
add_filter( 'theme_mod_footer_contact_block_visibility', 'mortgates_pre_set_post_meta_value' );


/**
 * Set post meta.
 */
function mortgates_pre_set_post_meta_value( $value ) {

	$value = mortgates_set_post_meta_value( $value );

	if ( 'true' === $value || 'false' === $value  ) {
		return wp_validate_boolean( $value );
	}

	return $value;
}

/**
 * Set post specific meta value.
 *
 * @param  string $value Default meta-value.
 * @return string
 */
function mortgates_set_post_meta_value( $value ) {
	$queried_obj = mortgates_get_queried_obj();

	if ( ! $queried_obj ) {
		return $value;
	}

	$meta_key   = 'mortgates_' . str_replace( 'theme_mod_', '', current_filter() );
	$meta_value = get_post_meta( $queried_obj, $meta_key, true );

	if ( ! $meta_value || 'inherit' === $meta_value ) {
		return $value;
	}

	return $meta_value;
}

/**
 * Get queried object.
 *
 * @return string|boolean
 */
function mortgates_get_queried_obj() {
	$queried_obj = apply_filters( 'mortgates_queried_object_id', false );

	if ( ! $queried_obj && ! mortgates_maybe_need_rewrite_mod() ) {
		return false;
	}

	$queried_obj = is_home() ? get_option( 'page_for_posts' ) : $queried_obj;
	$queried_obj = ! $queried_obj ? get_the_id() : $queried_obj;

	return $queried_obj;
}

/**
 * Check if we need to try rewrite theme mod or not
 *
 * @return boolean
 */
function mortgates_maybe_need_rewrite_mod() {

	if ( is_front_page() && 'page' !== get_option( 'show_on_front' ) ) {
		return false;
	}

	if ( is_home() && 'page' == get_option( 'show_on_front' ) ) {
		return true;
	}

	if ( ! is_singular() ) {
		return false;
	}

	return true;
}

/**
 * Render existing macros in passed string.
 *
 * @since  1.0.0
 * @param  string $string String to parse.
 * @return string
 */
function mortgates_render_macros( $string ) {

	static $macros;

	if ( ! $macros ) {
		$macros = apply_filters( 'mortgates_data_macros', array(
			'/%%year%%/'      => date( 'Y' ),
			'/%%date%%/'      => date( get_option( 'date_format' ) ),
			'/%%site-name%%/' => get_bloginfo( 'name' ),
			'/%%home_url%%/'  => esc_url( home_url( '/' ) ),
			'/%%theme_url%%/' => get_stylesheet_directory_uri(),
		) );
	}

	return preg_replace( array_keys( $macros ), array_values( $macros ), $string );
}

/**
 * Render font icons in content
 *
 * @param  string $content Content to render.
 * @return string
 */
function mortgates_render_icons( $content ) {
	$icons     = mortgates_get_render_icons_set();
	$icons_set = implode( '|', array_keys( $icons ) );

	$regex = '/icon:(' . $icons_set . ')?:?([a-zA-Z0-9-_]+)/';

	return preg_replace_callback( $regex, 'mortgates_render_icons_callback', $content );
}

/**
 * Callback for icons render.
 *
 * @param  array $matches Search matches array.
 * @return string
 */
function mortgates_render_icons_callback( $matches ) {

	if ( empty( $matches[1] ) && empty( $matches[2] ) ) {
		return $matches[0];
	}

	if ( empty( $matches[1] ) ) {
		return sprintf( '<i class="fa fa-%s"></i>', $matches[2] );
	}

	$icons = mortgates_get_render_icons_set();

	if ( ! isset( $icons[ $matches[1] ] ) ) {
		return $matches[0];
	}

	return sprintf( $icons[ $matches[1] ], $matches[2] );
}

/**
 * Get list of icons to render.
 *
 * @return array
 */
function mortgates_get_render_icons_set() {
	return apply_filters( 'mortgates_render_icons_set', array(
		'fa' => '<i class="fa fa-%s"></i>',
	) );
}

/**
 * Replace %s with theme URL.
 *
 * @param  string $url Formatted URL to parse.
 * @return string
 */
function mortgates_render_theme_url( $url ) {
	$path = apply_filters( 'mortgates_render_theme_url_path', get_template_directory_uri() );
	return sprintf( $url, $path );
}

/**
 * Get image ID by URL.
 *
 * @param  string $image_src Image URL to search it in database.
 * @return int|bool false
 */
function mortgates_get_image_id_by_url( $image_src ) {
	global $wpdb;

	$query = "SELECT ID FROM {$wpdb->posts} WHERE guid = %s";
	$id    = $wpdb->get_var( $wpdb->prepare( $query, esc_url( $image_src ) ) );

	return $id;
}

/**
 * Check if passed meta data is visible in current context.
 *
 * @since  1.0.0
 * @param  string $meta    Meta setting to check.
 * @param  string $context Current post context - 'single' or 'loop'.
 * @return bool
 */
function mortgates_is_meta_visible( $meta, $context = 'loop' ) {

	if ( ! $meta ) {
		return false;
	}

	$meta_enabled = get_theme_mod( $meta, mortgates_theme()->customizer->get_default( $meta ) );

	switch ( $context ) {

		case 'loop':

			if ( ! is_single() && $meta_enabled ) {
				return true;
			} else {
				return false;
			}

		case 'single':

			if ( is_single() && $meta_enabled ) {
				return true;
			} else {
				return false;
			}
	}

	return false;
}

/**
 * Get post thumbnail size.
 *
 * @param array $args Arguments.
 *
 * @return array
 */
function mortgates_post_thumbnail_size( $args = array() ) {
	global $wp_query;

	$sidebar_position = get_theme_mod( 'sidebar_position', mortgates_theme()->customizer->get_default( 'sidebar_position' ) );

	$args = wp_parse_args( $args, array(
		'small'        => 'post-thumbnail',
		'fullwidth'    => ( 'fullwidth' !== $sidebar_position ) ? 'mortgates-thumb-l' : 'mortgates-thumb-xl',
		'masonry'      => 'mortgates-thumb-masonry',
		'justify'      => 'mortgates-thumb-l-2',
		'class_prefix' => '',
	) );

	$layout      = get_theme_mod( 'blog_layout_type', mortgates_theme()->customizer->get_default( 'blog_layout_type' ) );
	$size_option = get_theme_mod( 'blog_featured_image', mortgates_theme()->customizer->get_default( 'blog_featured_image' ) );
	$size        = $args[ $size_option ];
	$link_class  = sanitize_html_class( $args['class_prefix'] . $size_option );
	$format      = get_post_format();

	$valid_justify_post_1 = mortgates_nth_child_post_item( 7, 2 );
	$valid_justify_post_2 = mortgates_nth_child_post_item( 7, 3 );

	if ( 'default' !== $layout ) {
		$size       = $args['small'];
		$link_class = $args['class_prefix'] . 'fullwidth';
	}

	if ( 'masonry' === $layout && 'gallery' !== $format && ! in_array( $format, array( 'gallery', 'video' ) ) ) {
		$size = $args['masonry'];
	}

	if ( 'vertical-justify' === $layout && ! wp_is_mobile() && ( in_array( ( $wp_query->current_post + 1 ), $valid_justify_post_1 ) || in_array( ( $wp_query->current_post + 1 ), $valid_justify_post_2 ) ) ) {
		$size = $args['justify'];
	}

	if ( is_single() ) {
		$link_class = $args['class_prefix'] . 'fullwidth';
		$size       = $args['fullwidth'];
	}

	return array(
		'size'  => $size,
		'class' => $link_class,
	);
}

/**
 * PHP analog css selector :nth-child( $multiplier*n + $addition).
 *
 * @param int $multiplier Multiplier.
 * @param int $addition   Addition.
 *
 * @return array
 */
function mortgates_nth_child_post_item( $multiplier, $addition ) {
	global $posts_per_page;

	$valid_item = array();

	for ( $n = 0; $n < $posts_per_page; $n ++ ) {

		$result = $multiplier * $n + $addition;

		if ( $result > $posts_per_page ) {
			break;
		}

		$valid_item[] = $result;
	}

	return $valid_item;
}

/**
 * Check color is light or dark.
 *
 * @param string $color Hex color.
 *
 * @return null|string
 */
function mortgates_hex_color_is_light_or_dark( $color ) {

	if ( false === strpos( $color, '#' ) ) {
		// Not a hex-color
		return null;
	}

	$hex = str_replace( '#', '', $color );

	if ( 3 === strlen( $hex ) ) {
		$r = hexdec( substr( $hex, 0, 1 ) . substr( $hex, 0, 1 ) );
		$g = hexdec( substr( $hex, 1, 1 ) . substr( $hex, 1, 1 ) );
		$b = hexdec( substr( $hex, 2, 1 ) . substr( $hex, 2, 1 ) );
	} else if ( 6 === strlen( $hex ) ) {
		$r = hexdec( substr( $hex, 0, 2 ) );
		$g = hexdec( substr( $hex, 2, 2 ) );
		$b = hexdec( substr( $hex, 4, 2 ) );
	} else {
		return false;
	}

	$luminance = ( $r * 0.299 ) + ( $g * 0.587 ) + ( $b * 0.114 );

	$is_light_or_dark = ( $luminance >= 128 ) ? 'light' : 'dark';

 return apply_filters( 'mortgates_hex_color_is_light_or_dark', $is_light_or_dark, $color ) ;
}

/**
 * Merge arrays after key first array.
 *
 * @param array  $arr1
 * @param array  $arr2
 * @param string $key
 *
 * @return array
 */
function mortgates_array_merge_after_key( $arr1 = array(), $arr2 = array(), $key = '' ) {
	$arr1_keys = array_keys( $arr1 );
	$offset    = array_search( $key, $arr1_keys );

	if ( ! $offset ) {
		return array_merge( $arr1, $arr2 );
	}

	$result = array_merge (
		array_slice( $arr1, 0, $offset + 1, true ),
		$arr2,
		array_slice( $arr1, $offset + 1, null, true )
	);

	return $result;
}
