<?php
	session_start();
	if (isset($_SESSION['unik_id'])) {
		include_once "config.php";

		$outgoing_id = mysqli_real_escape_string($connect, $_POST['outgoing_id']);
		$incoming_id = mysqli_real_escape_string($connect, $_POST['incoming_id']);
		$pesan = mysqli_real_escape_string($connect, $_POST['pesan']);

		if (!empty($pesan)) {
			$sql = mysqli_query($connect, "INSERT INTO percakapan (incoming_psn_id, outgoing_psn_id, psn)
				VALUES ({$incoming_id}, {$outgoing_id}, '{$pesan}')") or die();
		}
	} else {
		header("../login.php");
	}
?>