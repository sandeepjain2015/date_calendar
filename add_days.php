<?php
/**
 * The template for displaying the add days.
 */
require_once 'header.php';
if ( isset( $_POST['save'] ) ) {
	$seldate  = $_POST['selDate'];
	$addorsub = $_POST['addsub'];
	$days     = $_POST['days'];
	$months   = $_POST['months'];
	$years    = $_POST['years'];
	// In a single line we are adding days, months and years to the $selDate (selected date)
	$addDays = strtotime( $seldate . $addorsub . $days . ' days' . $addorsub . $months . ' months' . $addorsub . $years . ' years' );
	// ouput the result
	print '<b>Selected Date: </b>' . date( 'm-d-Y', strtotime( $seldate ) ) . '<br />';
	print '<b>New Date: </b>' . date( 'm-d-Y', $addDays ) . '<br />';
}
?>
	<form action="" name="myform" id="myform" method="post">
	  Select a date:  <input type="date" name="selDate" value="<?php echo date( 'Y-m-d' ); ?>" /><br /><br />
	  Add or Sub <select name="addsub" style="padding: 3px;"><option>+</option><option>-</option></select><br /><br />
	  Days <input type="number" min="0" max="10000" value="0" name="days" />&nbsp;
	  Months <input type="number" min="0" max="10000" value="0" name="months" />&nbsp;
	  Years <input type="number" min="0" max="10000" value="0" name="years" />&nbsp;
	  <br /><br />
	  <input type="submit" class="w3-btn w3-brown w3-round" name="save" value="Find new date!">
	</form>
<?php require_once 'footer.php'; ?>
