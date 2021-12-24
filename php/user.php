<?php
	session_start();
	include_once "config.php";
	$outgoing_id = $_SESSION['unik_id'];
	$sql = mysqli_query($connect, "SELECT * FROM user WHERE NOT unik_id = {$outgoing_id}");
	$output = "";

	if (mysqli_num_rows($sql) == 0) {
		$output .= "Tidak ada user untuk memulai percakapan.";
	} else if (mysqli_num_rows($sql) > 0) {
		include "data.php";
	}

	echo $output;
?>