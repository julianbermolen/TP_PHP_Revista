<?php
	include('lib/full/qrlib.php');
	$variable = $_GET['qr'];
	QRcode::png($variable);

?>