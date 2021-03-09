<?php
/**
 * The template for displaying the style-2 footer layout.
 *
 * @package Solidbuild
 */
?>

<div <?php solidbuild_footer_container_class(); ?>>
	<div class="site-info container"><?php
		solidbuild_footer_logo();
		solidbuild_footer_menu();
		solidbuild_contact_block( 'footer' );
		solidbuild_social_list( 'footer' );
		solidbuild_footer_copyright();
	?></div><!-- .site-info -->
</div><!-- .container -->
