<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Mortgates
 */
?>

	</div><!-- #content -->

	<footer id="colophon" <?php mortgates_footer_class() ?> role="contentinfo">
		<?php mortgates_get_template_part( 'template-parts/footer/footer-area' ); ?>
		<?php mortgates_get_template_part( 'template-parts/footer/layout', get_theme_mod( 'footer_layout_type', mortgates_theme()->customizer->get_default( 'footer_layout_type' ) ) ); ?>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
