<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Solidbuild
 */
?>

	</div><!-- #content -->

	<footer id="colophon" <?php solidbuild_footer_class() ?> role="contentinfo">
		<?php solidbuild_get_template_part( 'template-parts/footer/footer-area' ); ?>
		<?php solidbuild_get_template_part( 'template-parts/footer/layout', get_theme_mod( 'footer_layout_type', solidbuild_theme()->customizer->get_default( 'footer_layout_type' ) ) ); ?>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
