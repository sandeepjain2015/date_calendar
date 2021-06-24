<?php
/**
 * The template for displaying the count days.
 */

require_once 'header.php';
if ( isset( $_POST['save'] ) ) {
	$start_date = date_create( $_POST['start_date'] );
	$end_date   = date_create( $_POST['end_date'] );
	$diff       = date_diff( $start_date, $end_date );
	echo sprintf(
		"<h3 class='w3-text-white' align='center'><strong>%s</strong></h3>",
		$diff->format( '%R%a days' )
	);
}
?>
	<form method="post">
		<p align="center"><input type="date" class="w3-input w3-border" name="start_date" value="<?php echo date( 'Y-m-d' ); ?>" style="width:50%"></p>
		<p align="center"><input type="date" class="w3-input w3-border" name="end_date" value="<?php echo date( 'Y-m-d' ); ?>" style="width:50%"></p>
		<p align="center"> <input type="submit" class="w3-btn w3-brown w3-round" name="save" value="Calculate duration"></p>
	</form>
<?php require_once 'footer.php'; ?>
