<?php
/**
 * Template part for style-2 header layout.
 *
 * @link    https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Solidbuild
 */

$search_visible        = get_theme_mod( 'header_search', solidbuild_theme()->customizer->get_default( 'header_search' ) );
?>
<div class="header-container_wrap container">

	<div class="header-row__flex">
		<div class="site-branding">
			<?php solidbuild_header_logo() ?>
			<?php solidbuild_site_description(); ?>
		</div>

		<div class="header-row__flex header-components__contact-button"><?php
			solidbuild_contact_block( 'header' );
			solidbuild_header_btn();
		?></div>
	</div>

	<div class="header-nav-wrapper">
		<?php solidbuild_main_menu(); ?>

		<?php if ( $search_visible ) : ?>
			<div class="header-components header-components__search-cart"><?php
				solidbuild_header_search_toggle();
			?></div>
		<?php endif; ?>

		<?php solidbuild_header_search( '<div class="header-search">%s<span class="search-form__close"></span></div>' ); ?>
	</div>

</div>
