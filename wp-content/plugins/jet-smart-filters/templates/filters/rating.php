<?php

if ( empty( $args ) ) {
	return;
}

$options   = $args['options'];
$widget_id = $args['__widget_id'];
$query_var = $args['query_var'];

if ( ! $options ) {
	return;
}

$current = $this->get_current_filter_value( $args );

?>
<div class="jet-rating" <?php $this->filter_data_atts( $args, $filter ); ?>>
	<?php include jet_smart_filters()->get_template( 'common/filter-label.php' ); ?>
	<div class="jet-rating__control">
		<div class="jet-rating-stars">
			<fieldset class="jet-rating-stars__fields">
		  <?php

		  $options = array_reverse( $options );

		  foreach ( $options as $key => $value ) {

			  $checked = '';

			  if ( $current ) {

				  if ( is_array( $current ) && in_array( $value, $current ) ) {
					  $checked = ' checked';
				  }

				  if ( ! is_array( $current ) && $value == $current ) {
					  $checked = ' checked';
				  }

			  }

			  ?>
			  <input
				  class="jet-rating-star__input"
				  type="radio"
				  id="jet-rating-<?php echo $widget_id . '-' . $value ?>"
				  autocomplete="off"
				  name="<?php echo $query_var; ?>"
				  <?php jet_smart_filters()->filter_types->control_data_atts( $args ); ?>
				  value="<?php echo $value; ?>"
				  <?php echo $checked; ?>
			  />
			  <label class="jet-rating-star__label" for="jet-rating-<?php echo $widget_id . '-' . $value ?>"><span class="jet-rating-star__icon"><?php echo $args['rating_icon']; ?></span></label>
		    <?php
		  }

		  ?>
			</fieldset>
		</div>
	</div>
</div>
