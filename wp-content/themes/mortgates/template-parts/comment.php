<?php
/**
 * The template for displaying comments.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy
 *
 * @package Mortgates
 */
?>
<div class="comment-author vcard">
	<?php echo mortgates_comment_author_avatar(); ?>
</div>
<div class="comment-content-wrap">
	<footer class="comment-meta">
		<div class="comment-metadata">
			<?php echo mortgates_get_comment_author_link(); ?>
			<?php echo mortgates_get_comment_date(); ?>
		</div>
		<div class="reply">
			<?php echo mortgates_get_comment_reply_link( array(
				'before'     => '<i class="fa fa-comments"></i>',
				'reply_text' => esc_html__( 'Reply', 'mortgates' ),
			) ); ?>
		</div>
	</footer>
	<div class="comment-content">
		<?php echo mortgates_get_comment_text(); ?>
	</div>
</div>
