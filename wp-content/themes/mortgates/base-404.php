<?php
/**
 * The base template for displaying 404 pages (not found).
 *
 * @package Mortgates
 */
?>
<?php get_header( mortgates_template_base() ); ?>

	<div <?php mortgates_content_wrap_class(); ?>>

		<div class="row">

			<div id="primary" <?php mortgates_primary_content_class(); ?>>

				<main id="main" class="site-main" role="main">

					<?php include mortgates_template_path(); ?>

				</main><!-- #main -->

			</div><!-- #primary -->

			<?php get_sidebar(); // Loads the sidebar.php. ?>

		</div><!-- .row -->

	</div><!-- .site-content_wrap -->

<?php get_footer( mortgates_template_base() ); ?>
