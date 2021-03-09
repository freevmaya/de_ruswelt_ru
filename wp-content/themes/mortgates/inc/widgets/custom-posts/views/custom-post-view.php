<?php
/**
 * Template part to display Custom posts widget.
 *
 * @package Mortgates
 * @subpackage widgets
 */
?>
<div class="custom-posts__item post <?php echo esc_attr( $grid_class ); ?>">
	<div class="post-inner">
		<div class="post-thumbnail">
			<?php echo $image; ?>
		</div>
		<div class="post-content-wrap">
			<div class="entry-header">
				<?php echo $title; ?>
			</div>
			<div class="entry-meta"><?php
				echo $date;
				echo $category;
				echo $count;
				echo $author;
			?></div>
			<div class="entry-content">
				<?php echo $excerpt; ?>
			</div>
			<div class="entry-footer">
				<div class="entry-meta">
					<?php echo $tag; ?>
				</div>
				<?php echo $button; ?>
			</div>
		</div>
	</div>
</div>
