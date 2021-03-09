<?php
/**
 * Menu Template Functions.
 *
 * @package Mortgates
 */

/**
 * Get main menu.
 *
 * @since  1.0.0
 * @return string
 */
function mortgates_get_main_menu() {
	$args = apply_filters( 'mortgates_main_menu_args', array(
		'theme_location'   => 'main',
		'container'        => '',
		'menu_id'          => 'main-menu',
		'echo'             => false,
		'fallback_cb'      => 'mortgates_set_nav_menu',
		'fallback_message' => esc_html__( 'Set main menu', 'mortgates' ),
	) );

	return wp_nav_menu( $args );
}

/**
 * Show main menu.
 * 
 * @since  1.0.0
 * @return void
 */
function mortgates_main_menu() {

	$main_menu = mortgates_get_main_menu();
	$menu_btn  = mortgates_get_menu_toggle();

	printf( '<nav id="site-navigation" class="main-navigation" role="navigation">%2$s%1$s</nav><!-- #site-navigation -->', $main_menu, $menu_btn );
}

/**
 * Show footer menu.
 *
 * @since  1.0.0
 * @return void
 */
function mortgates_footer_menu() {
	if ( ! get_theme_mod( 'footer_menu_visibility', mortgates_theme()->customizer->get_default( 'footer_menu_visibility' ) ) ) {
		return;
	}

	$args = apply_filters( 'mortgates_footer_menu_args', array(
		'theme_location'   => 'footer',
		'container'        => '',
		'menu_id'          => 'footer-menu-items',
		'menu_class'       => 'footer-menu__items',
		'depth'            => 1,
		'echo'             => false,
		'fallback_cb'      => 'mortgates_set_nav_menu',
		'fallback_message' => esc_html__( 'Set footer menu', 'mortgates' ),
	) );

	printf('<nav id="footer-navigation" class="footer-menu" role="navigation">%s</nav><!-- #footer-navigation -->', wp_nav_menu( $args ) );
}

/**
 * Show top page menu if active.
 *
 * @since  1.0.0
 * @return void
 */
function mortgates_top_menu() {
	
	if ( ! mortgates_is_top_menu_visible() ) {
		return;
	}

	wp_nav_menu( apply_filters( 'mortgates_top_menu_args', array(
		'theme_location'  => 'top',
		'container'       => 'div',
		'container_class' => 'top-panel__menu',
		'menu_class'      => 'top-panel__menu-list inline-list',
		'depth'           => 1,
	) ) );
}

/**
 * Check visibility top menu.
 *
 * @return bool
 */
function mortgates_is_top_menu_visible() {

	$is_visible = false;

	if ( has_nav_menu( 'top' ) && get_theme_mod( 'top_menu_visibility', mortgates_theme()->customizer->get_default( 'top_menu_visibility' ) ) ) {
		$is_visible = true;
	}

	return $is_visible;
}

/**
 * Get social nav menu.
 *
 * @since  1.0.0
 * @since  1.0.0  Added new param - $item.
 * @since  1.0.1  Added arguments to the filter.
 * @param  string $context Current post context - 'single' or 'loop'.
 * @param  string $type    Content type - icon, text or both.
 * @return string
 */
function mortgates_get_social_list( $context, $type = 'icon' ) {
	static $instance = 0;
	$instance++;

	$container_class = array( 'social-list' );

	if ( ! empty( $context ) ) {
		$container_class[] = sprintf( 'social-list--%s', sanitize_html_class( $context ) );
	}

	$container_class[] = sprintf( 'social-list--%s', sanitize_html_class( $type ) );

	$args = apply_filters( 'mortgates_social_list_args', array(
		'theme_location'   => 'social',
		'container'        => 'div',
		'container_class'  => join( ' ', $container_class ),
		'menu_id'          => "social-list-{$instance}",
		'menu_class'       => 'social-list__items inline-list',
		'depth'            => 1,
		'link_before'      => ( 'icon' == $type ) ? '<span class="screen-reader-text">' : '',
		'link_after'       => ( 'icon' == $type ) ? '</span>' : '',
		'echo'             => false,
		'fallback_cb'      => 'mortgates_set_nav_menu',
		'fallback_message' => esc_html__( 'Set social menu', 'mortgates' ),
	), $context, $type );

	return wp_nav_menu( $args );
}

/**
 * Set fallback callback for nav menu.
 *
 * @param  array $args Nav menu arguments.
 * @return null|string
 */
function mortgates_set_nav_menu( $args ) {

	if ( ! current_user_can( 'edit_theme_options' ) ) {
		return null;
	}

	$format = '<div class="set-menu %3$s"><a href="%2$s" target="_blank" class="set-menu_link">%1$s</a></div>';
	$label  = $args['fallback_message'];
	$url    = esc_url( admin_url( 'nav-menus.php' ) );

	return sprintf( $format, $label, $url, $args['container_class'] );
}

/**
 * Get menu button.
 *
 * @since  1.0.0
 *
 * @return string
 */
function mortgates_get_menu_toggle() {
	$format = apply_filters(
		'mortgates_menu_toggle_html',
		'<button class="menu-toggle" aria-expanded="false"><span class="menu-toggle-box"><span class="menu-toggle-inner"></span></span></button>'
	);

	return $format;
}
