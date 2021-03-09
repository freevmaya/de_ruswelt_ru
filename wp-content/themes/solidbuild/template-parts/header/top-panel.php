<?php
/**
 * Template part for top panel in header.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Solidbuild
 */

// Don't show top panel if all elements are disabled.
if ( ! solidbuild_is_top_panel_visible() ) {
	return;
}
?>

<div <?php echo solidbuild_get_html_attr_class( array( 'top-panel' ), 'top_panel_bg' ); ?>>
	<div class="container">
		<div class="top-panel__container">
			<?php solidbuild_top_message( '<div class="top-panel__message">%s</div>' ); ?>
			<?php solidbuild_contact_block( 'header_top_panel' ); ?>

			<div class="top-panel__wrap-items">
				<div class="top-panel__menus">
					<?php solidbuild_top_menu(); ?>
					<?php solidbuild_login_link(); ?>
					<?php solidbuild_social_list( 'header' ); ?>
				</div>
			</div>
		</div>
	</div>
</div><!-- .top-panel -->
