<?php
/**
 * Template part to display subscribe form.
 *
 * @package Mortgates
 * @subpackage widgets
 */

$btn_classes_array = array();
$btn_style         = $this->instance['subscribe_btn_style'];
$btn_type          = $this->instance['subscribe_submit_type'];

if ( 'icon' === $btn_type ) {
	$btn_classes_array = array(
		'subscribe-block__submit--icon',
	);
} else {
	$btn_classes_array = array(
		'btn',
		'btn-sm',
		sprintf( 'btn-%s', $btn_style ),
	);
}

$layout_class = ( 'text' === $btn_type ) ? 'layout-1' : 'layout-2';
$btn_classes  = join( ' ', apply_filters( 'mortgates_subscribe_submit_classes', $btn_classes_array, $this ) );

?>
<div class="subscribe-block">

	<?php echo $this->get_block_title( 'subscribe' ); ?>
	<?php echo $this->get_block_message( 'subscribe' ); ?>

	<form method="POST" action="#" class="subscribe-block__form">
		<?php echo $this->get_nonce_field(); ?>
		<div class="subscribe-block__input-group <?php echo $layout_class; ?>">
			<div class="subscribe-block__input-wrap">
				<?php echo $this->get_subscribe_input(); ?>
			</div>
			<?php echo $this->get_subscribe_submit( $btn_classes ); ?>
		</div>
		<?php echo $this->get_subscribe_messages(); ?>
	</form>
</div>
