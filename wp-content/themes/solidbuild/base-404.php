<?php
/**
 * The base template for displaying 404 pages (not found).
 *
 * @package Grimm
 */

$page_404_image     = get_theme_mod( 'page_404_image', solidbuild_theme()->customizer->get_default( 'page_404_image' ) );
$btn_style_preset   = get_theme_mod( 'page_404_btn_style_preset', solidbuild_theme()->customizer->get_default( 'page_404_btn_style_preset' ) );
$text_color         = get_theme_mod( 'page_404_text_color', solidbuild_theme()->customizer->get_default( 'page_404_text_color' ) );
$additional_class   = ( 'light' === $text_color ) ? 'invert' : 'regular';
$page_404_image_url = '';

if ( $page_404_image ) {
	$page_404_image_url = esc_url( solidbuild_render_theme_url( $page_404_image ) );
}
?>
<?php get_header( solidbuild_template_base() ); ?>

	<?php solidbuild_site_breadcrumbs(); ?>
	<div style="background: url(<?php echo $page_404_image_url; ?>) center no-repeat ; -webkit-background-size: cover;
	background-size: cover; padding: 226px 0;">
		<div <?php solidbuild_content_wrap_class(); ?>>

			<div class="row">

				<div id="primary" <?php solidbuild_primary_content_class(); ?>>

					<main id="main" class="site-main" role="main">

						<?php include solidbuild_template_path(); ?>

					</main><!-- #main -->

				</div><!-- #primary -->

				<?php get_sidebar(); // Loads the sidebar.php. ?>

			</div><!-- .row -->

		</div><!-- .site-content_wrap -->
	</div>
<?php get_footer( solidbuild_template_base() ); ?>
