<?php
/**
 * The template for displaying the calculate age.
 */

require_once 'header.php';
/**
 *  Get Age by dob.
 *
 * @param string $dob dob dob of user.
 */
function findage( $dob ) {
	$localtime = getdate();
	$today     = $localtime['mday'] . '-' . $localtime['mon'] . '-' . $localtime['year'];
	$dob_a     = explode( '-', $dob );
	$today_a   = explode( '-', $today );
	$dob_d     = $dob_a[2];
	$dob_m     = $dob_a[1];
	$dob_y     = $dob_a[0];
	$today_d   = $today_a[0];
	$today_m   = $today_a[1];
	$today_y   = $today_a[2];
	$years     = $today_y - $dob_y;
	$months    = $today_m - $dob_m;
	$days      = $today_d - $dob_d;
	if ( $today_m . $today_d < $dob_m . $dob_d ) {
		$years--;
		$months = 12 + $today_m - $dob_m;

	}
	if ( $today_d < $dob_d ) {
		$months--;
	}
	$firstMonths  = array( 1, 3, 5, 7, 8, 10, 12 );
	$secondMonths = array( 4, 6, 9, 11 );
	$thirdMonths  = array( 2 );
	if ( $today_m - $dob_m == 1 ) {
		if ( in_array( $dob_m, $firstMonths ) ) {
			array_push( $firstMonths, 0 );
		} elseif ( in_array( $dob_m, $secondMonths ) ) {
			array_push( $secondMonths, 0 );
		} elseif ( in_array( $dob_m, $thirdMonths ) ) {
			array_push( $thirdMonths, 0 );
		}
	}
	echo "<h3 class='w3-text-white' align='center'><strong> Age is $years years $months months $days Days.</strong></h3>";
}
if ( isset( $_POST['save'] ) ) {
	$my = $_POST['birth_day'];
	findage( "$my" );
}
?>
	<form method="post">
		<p align="center"><input type="date" class="w3-input w3-border" name="birth_day" value="<?php echo date( 'Y-m-d' ); ?>" style="width:50%"></p>
		<p align="center"> <input type="submit" class="w3-btn w3-brown w3-round" name="save" value="Know your age"></p>
	</form>
<?php require_once 'footer.php'; ?>
