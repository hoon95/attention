<?php
	include_once '../inc/dbcon.php';

	$value = $_POST['value'];
	$query = "DELETE FROM category WHERE cid = '$value'";

	$result = $mysqli->query($query);

	if ($result) {
		echo "1";
	} else {
		echo "error";
	}

	$mysqli->close();
?>
