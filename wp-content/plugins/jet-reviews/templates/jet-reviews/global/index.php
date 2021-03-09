<?php
/**
 * Main review template
 */

$this->add_render_attribute( 'main-container',[
	'class'         => [
		'jet-review'
	],
	'data-settings' => htmlspecialchars( json_encode( [
		'post_id'   => $this->get_review_post_id(),
	] ) )
] );

$review_data = $this->__get_review_data();

?><div <?php echo $this->get_render_attribute_string( 'main-container' ); ?>><?php

	include $this->__get_global_template( 'header' );

	if ( ! empty( $review_data ) ) {
		foreach ( $review_data as $key => $review_data ) {

			?><div class="jet-review__item"><?php
				include $this->__get_global_template( 'remove' );
				include $this->__get_global_template( 'user' );
				include $this->__get_global_template( 'fields' );
				include $this->__get_global_template( 'summary' );
			?></div><?php
		}
	}

?></div>
