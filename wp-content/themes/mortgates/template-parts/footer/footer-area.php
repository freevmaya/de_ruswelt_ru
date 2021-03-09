<?php
/**
 * The template for displaying footer widget area.
 *
 * @package Mortgates
 */
// Check footer-area visibility.
if ( ! get_theme_mod( 'footer_widget_area_visibility', mortgates_theme()->customizer->get_default( 'footer_widget_area_visibility' ) ) || ! is_active_sidebar( 'footer-area' ) ) {
	return;
} ?>

<div <?php echo mortgates_get_html_attr_class( array( 'footer-area-wrap' ), 'footer_widgets_bg' ); ?>>
	<div <?php echo mortgates_get_container_classes( array(), 'footer' ) ?>>
		<?php do_action( 'mortgates_render_widget_area', 'footer-area' ); ?>
	</div>
</div><!-- .footer-area-wrap -->
