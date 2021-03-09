<?php
/**
 * The template for displaying the default footer layout.
 *
 * @package Mortgates
 */
?>

<div <?php mortgates_footer_container_class(); ?>>
	<div <?php echo mortgates_get_container_classes( array(), 'footer' ) ?>>
		<div class="site-info">
			<div class="site-info-wrap"><?php
				mortgates_footer_logo();
				mortgates_footer_copyright();
				mortgates_footer_menu();
				mortgates_contact_block( 'footer' );
				mortgates_social_list( 'footer' );
			?></div>
		</div><!-- .site-info -->
	</div>
</div><!-- .footer-container -->
