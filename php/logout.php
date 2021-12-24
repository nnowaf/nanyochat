<?php
	session_start();
	if (isset($_SESSION['unik_id'])) {
		include_once "config.php";
		$logout_id = mysqli_real_escape_string($connect, $_GET['logout_id']);
		if (isset($logout_id)) {
			# code...
			$status = "Ga Aktif";
			//sql code untuk update value menjadi Ga Aktif
			$sqlUpdateStatus = "UPDATE user SET status = '{$status}' WHERE unik_id = {$logout_id}";
			//masukin ke database
			$query = mysqli_query($connect, $sqlUpdateStatus);

			if ($query) {
				session_unset();
				session_destroy();
				header("location: ../login.php");
			}
		} else {
			header("location: ../user.php");
		}
	} else {
		header("location: ../login.php");
	}
?>