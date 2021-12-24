<?php 
	$connect = mysqli_connect("localhost", "root", "", "chat");

	if (!$connect) {
		echo "Koneksi database error".mysqli_connect_error();
	}
?>