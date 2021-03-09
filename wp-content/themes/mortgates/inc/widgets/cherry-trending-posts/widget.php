<?php
/**
 * Represents the view for the `Cherry Trending Posts` widget.
 *
 * @package   Cherry_Trending_Posts
 * @author    Template Monster
 * @license   GPL-3.0+
 * @copyright 2012 - 2016, Template Monster
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
} ?>

<div class="cherry-trend-widget-list__item cherry-trend-post">
	<div class="cherry-trend-post__media">
		<?php echo $image; ?>
		<?php echo $tag; ?>
	</div>

	<div class="cherry-trend-post__content-wrapper">
		<div class="cherry-trend-post__header">
			<?php echo '<h4 class="cherry-trend-post__title">' . $title . '</h4>'; ?>
		</div>
		<div class="cherry-trend-post__meta entry-meta">
			<?php echo $date; ?>
			<?php echo $category; ?>
			<?php echo $comments; ?>
			<?php echo $author; ?>
			<?php echo $view; ?>
		</div>
		<div class="cherry-trend-post__content">
			<?php echo $excerpt; ?>
		</div>
		<?php echo $rating; ?>
		<?php echo $button; ?>
	</div>
</div>
