<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Mortgates
 */

$btn_style_preset = get_theme_mod( 'page_404_btn_style_preset', mortgates_theme()->customizer->get_default( 'page_404_btn_style_preset' ) );
$text_color       = get_theme_mod( 'page_404_text_color', mortgates_theme()->customizer->get_default( 'page_404_text_color' ) );
$additional_class = ( 'light' === $text_color ) ? 'invert' : 'regular';
?>
<section class="error-404 not-found <?php echo $additional_class; ?>">
	<header class="page-header">
		<h1 class="page-title screen-reader-text"><?php esc_html_e( '404', 'mortgates' ); ?></h1>
	</header><!-- .page-header -->

	<div class="page-content">
		<h6><?php esc_html_e( 'Unfortunately the page you were looking for could not be found.', 'mortgates' ); ?></h6>
		<h2><?php printf( '%1$s <em>%2$s</em>', esc_html__( 'Page', 'mortgates' ), esc_html__( 'Not Found', 'mortgates' ) ); ?></h2>
		<p><a class="btn btn-<?php echo sanitize_html_class( $btn_style_preset ); ?>" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Back to home', 'mortgates' ); ?></a></p>
	</div><!-- .page-content -->
</section><!-- .error-404 -->
