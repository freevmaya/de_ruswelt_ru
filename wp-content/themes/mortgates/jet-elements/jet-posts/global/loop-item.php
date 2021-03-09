<?php
/**
 * Posts loop start template
 */
$thumb_classes   = array();
$thumb_classes[] = ( 'yes' === $this->get_attr( 'show_image' ) && has_post_thumbnail() ) ? 'has-thumb' : 'no-thumb';
$thumb_classes[] = ( 'background' === $this->get_attr( 'show_image_as' ) ) ? 'thumb-box-bg' : '';

?>
<div class="jet-posts__item <?php echo jet_elements_tools()->col_classes( array(
	'desk' => $this->get_attr( 'columns' ),
	'tab'  => $this->get_attr( 'columns_tablet' ),
	'mob'  => $this->get_attr( 'columns_mobile' ),
) ); ?>">
	<div class="jet-posts__inner-box <?php echo join( ' ', $thumb_classes ); ?>"<?php $this->add_box_bg(); ?>><?php

		include $this->get_template( 'item-thumb' );

		echo '<div class="jet-posts__inner-content">';
			include $this->get_template( 'item-badge' );
			include $this->get_template( 'item-title' );
			include $this->get_template( 'item-meta' );
			include $this->get_template( 'item-content' );
			include $this->get_template( 'item-author' );
			include $this->get_template( 'item-more' );
		echo '</div>';

	?></div>
</div>
