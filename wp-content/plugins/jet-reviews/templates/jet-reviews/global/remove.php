<?php
$settings = $this->get_settings();

$content_source = isset( $settings['content_source'] ) ? $settings['content_source'] : 'manually';

$curent_user_id = $this->get_curent_user_id();

if ( ! $curent_user_id || 'manually' === $content_source || 'wp-review' === $content_source ) {
	return false;
}

$user_review_id = $review_data['user_id'];

if ( $curent_user_id !== $user_review_id ) {
	return false;
}

?><div class="jet-review__item-remove"><div class="jet-review-remove-spinner"></div><i class="fa fa-trash"></i></div>
