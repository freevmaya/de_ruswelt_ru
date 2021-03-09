<?php
/**
 * The template for displaying the style-2 footer layout.
 *
 * @package Mortgates
 */
?>

<div <?php mortgates_footer_container_class(); ?>>
	<div <?php echo mortgates_get_container_classes( array(), 'footer' ) ?>>
		<div class="site-info"><?php
			mortgates_footer_logo();
			mortgates_footer_menu();
			mortgates_contact_block( 'footer' );
			mortgates_social_list( 'footer' );
			mortgates_footer_copyright();
		?></div><!-- .site-info -->
	</div>
</div><!-- .footer-container -->
