<?php
/**
 * The template for displaying related posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Mortgates
 * @subpackage single-post
 */
?>
<div class="<?php echo esc_attr( $grid_class ); ?>">
	<article class="related-post hentry <?php echo esc_attr( $thumb_class ); ?>">
		<figure class="post-thumbnail"><?php
			echo $image;
		?></figure>
		<div class="related-post__content">
			<header class="entry-header"><?php
				echo $tag;
				echo $title;
			?></header>
			<div class="entry-meta"><?php
				echo $date;
				echo $category;
				echo $comment_count;
				echo $author;
			?></div>
			<div class="entry-content"><?php
				echo $excerpt;
			?></div>
		</div>
	</article><!--.related-post-->
</div>
