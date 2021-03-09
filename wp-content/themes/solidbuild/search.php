<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Solidbuild
 */

if ( have_posts() ) : ?>

	<header class="page-header">
		<h1 class="page-title screen-reader-text"><?php printf( esc_html__( 'Search Results for: %s', 'solidbuild' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
	</header><!-- .page-header -->

	<div <?php solidbuild_posts_list_class(); ?>>

	<?php
	/* Start the Loop */
	while ( have_posts() ) : the_post();

		/**
		 * Run the loop for the search to output the results.
		 * If you want to overload this in a child theme then include a file
		 * called content-search.php and that will be used instead.
		 */
		solidbuild_get_template_part( 'template-parts/content', 'search' );

	endwhile; ?>

	</div><!-- .posts-list -->

	<?php solidbuild_get_template_part( 'template-parts/content', 'pagination' );

else :

	solidbuild_get_template_part( 'template-parts/content', 'none' );

endif; ?>
