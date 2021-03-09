<?php
/**
 * The base template.
 *
 * @package Solidbuild
 */
?>
<?php get_header( solidbuild_template_base() ); ?>

	<?php solidbuild_site_breadcrumbs(); ?>

	<?php solidbuild_single_post_full_width_section(); ?>

	<?php do_action( 'solidbuild_render_widget_area', 'full-width-header-area' ); ?>

	<div <?php solidbuild_content_wrap_class(); ?>>

		<?php do_action( 'solidbuild_render_widget_area', 'before-content-area' ); ?>

		<div class="row">

			<div id="primary" <?php solidbuild_primary_content_class(); ?>>

				<?php do_action( 'solidbuild_render_widget_area', 'before-loop-area' ); ?>

				<main id="main" class="site-main" role="main">

					<?php include solidbuild_template_path(); ?>

				</main><!-- #main -->

				<?php do_action( 'solidbuild_render_widget_area', 'after-loop-area' ); ?>

			</div><!-- #primary -->

			<?php get_sidebar(); // Loads the sidebar.php. ?>

		</div><!-- .row -->

		<?php do_action( 'solidbuild_render_widget_area', 'after-content-area' ); ?>

	</div><!-- .site-content_wrap -->

	<?php do_action( 'solidbuild_render_widget_area', 'after-content-full-width-area' ); ?>

<?php get_footer( solidbuild_template_base() ); ?>
