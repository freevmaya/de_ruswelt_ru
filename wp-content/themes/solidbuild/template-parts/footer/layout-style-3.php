<?php
/**
 * The template for displaying the style-3 footer layout.
 *
 * @package Solidbuild
 */
?>

<div <?php solidbuild_footer_container_class(); ?>>
	<div class="site-info container-wide">
		<div class="site-info-wrap">
			<div class="site-info-block"><?php
				solidbuild_footer_logo();
				solidbuild_footer_copyright();
			?></div>
			<?php solidbuild_footer_menu(); ?>
			<div class="site-info-block"><?php
				solidbuild_contact_block( 'footer' );
				solidbuild_social_list( 'footer' );
			?></div>
		</div>
	</div><!-- .site-info -->
</div><!-- .container -->
