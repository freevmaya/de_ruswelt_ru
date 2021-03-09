<?php
/**
 * Template part for displaying a message that posts cannot be found.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Mortgates
 */
?>
<section class="no-results not-found">
	<header class="page-header">
		<h1 class="page-title h2-style"><?php esc_html_e( 'Nothing Found', 'mortgates' ); ?></h1>
	</header><!-- .page-header -->

	<div class="page-content">
		<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

			<p><?php printf( '%3$s <a href="%1$s">%2$s</a>', esc_url( admin_url( 'post-new.php' ) ), esc_html__( 'Get started here', 'mortgates' ), esc_html__( 'Ready to publish your first post?', 'mortgates' ) ) ?></p>

		<?php elseif ( is_search() ) : ?>

			<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'mortgates' ); ?></p>

			<?php get_search_form();

		else : ?>

			<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'mortgates' ); ?></p>

			<?php get_search_form();

		endif; ?>

	</div><!-- .page-content -->
</section><!-- .no-results -->
