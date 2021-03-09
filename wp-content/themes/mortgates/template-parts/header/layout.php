<?php
/**
 * Template part for default header layout.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Mortgates
 */

$search_visible = get_theme_mod( 'header_search', mortgates_theme()->customizer->get_default( 'header_search' ) );
?>
<div <?php echo mortgates_get_container_classes( array(), 'header' ) ?>>
	<div class="header-container_wrap">
		<div class="header-container__flex">
			<div class="site-branding">
				<?php mortgates_header_logo() ?>
				<?php mortgates_site_description(); ?>
			</div>

			<div class="header-nav-wrapper">
				<?php mortgates_main_menu(); ?>

				<?php if ( $search_visible ) : ?>
					<div class="header-components"><?php
						mortgates_header_search_toggle();
					?></div>
				<?php endif; ?>
				<?php mortgates_header_search( '<div class="header-search">%s<button class="search-form__close"></button></div>' ); ?>
			</div>

			<?php mortgates_header_btn(); ?>
		</div>
	</div>
</div>
