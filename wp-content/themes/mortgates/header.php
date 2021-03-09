<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Mortgates
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-MZGCMKM');</script>
<!-- End Google Tag Manager -->

<meta charset="<?php bloginfo( 'charset' ); ?>">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php mortgates_get_page_preloader(); ?>
	<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MZGCMKM"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<div id="page" <?php mortgates_site_class(); ?>>
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'mortgates' ); ?></a>
	<header id="masthead" <?php mortgates_header_class(); ?> role="banner">
		<?php mortgates_ads_header() ?>
		<?php mortgates_get_template_part( 'template-parts/header/top-panel', get_theme_mod( 'header_layout_type', mortgates_theme()->customizer->get_default( 'header_layout_type' ) ) ); ?>

		<div <?php mortgates_header_container_class(); ?>>
			<?php mortgates_get_template_part( 'template-parts/header/layout', get_theme_mod( 'header_layout_type', mortgates_theme()->customizer->get_default( 'header_layout_type' ) ) ); ?>
		</div><!-- .header-container -->
	</header><!-- #masthead -->

	<div id="content" <?php mortgates_content_class(); ?>>
