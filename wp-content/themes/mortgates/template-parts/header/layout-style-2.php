<?php
/**
 * Template part for style-2 header layout.
 *
 * @link    https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Mortgates
 */

$search_visible = get_theme_mod( 'header_search', mortgates_theme()->customizer->get_default( 'header_search' ) );
$header_btn     = get_theme_mod( 'header_btn_visibility', mortgates_theme()->customizer->get_default( 'header_btn_visibility' ) );

$header_components          = ( $search_visible ) ? true : false;
$header_comps_visible_class = $header_components ? ' header-components-visible' : '';

$col_classes = ! $header_btn ? 'col-xs-12' : 'col-xs-12 col-md-4 col-md-push-4';

?>
<div <?php echo mortgates_get_container_classes( array(), 'header' ) ?>>
	<div class="header-container_wrap">
		<div class="row row-md-center">
			<div class="<?php echo $col_classes; ?>">
				<div class="site-branding">
					<?php mortgates_header_logo() ?>
					<?php mortgates_site_description(); ?>
				</div>
			</div>

			<?php if( $header_btn ): ?>
				<div class="col-xs-12 col-md-4 col-md-push-4">
					<?php mortgates_header_btn(); ?>
				</div>
			<?php endif; ?>
		</div>

		<div class="header-nav-wrapper<?php echo $header_comps_visible_class; ?>">
			<?php mortgates_main_menu(); ?>

			<?php if ( $header_components ) : ?>
				<div class="header-components"><?php
					mortgates_header_search_toggle();
				?></div>
			<?php endif; ?>
			<?php mortgates_header_search( '<div class="header-search">%s<button class="search-form__close"></button></div>' ); ?>
		</div>
	</div>
</div>
