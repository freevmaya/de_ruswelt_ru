<?php
/**
 * Loop item badge
 */

jet_elements()->utility()->meta_data->get_terms( array(
	'visible' => $this->get_attr( 'badge' ),
	'type'    => $this->get_attr( 'badge_tax' ),
	'before'  => '<div class="post-badge">',
	'after'   => '</div>',
	'echo'    => true,
) );
