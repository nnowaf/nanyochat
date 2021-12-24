<?php 
	session_start();
	include_once "config.php";
	$email = mysqli_real_escape_string($connect, $_POST['email']);
	$password = mysqli_real_escape_string($connect, $_POST['password']);

	if (!empty($email) && !empty($password)) {
		//pengecekan semua email dan password di database;
		$sql = mysqli_query($connect, "SELECT * FROM user WHERE email = '{$email}' AND password = '{$password}'"); //keluarannya boolean (true atau false)

		if (mysqli_num_rows($sql) > 0) { //kalo akun ketemu di database
			$row = mysqli_fetch_assoc($sql);

			$status = "Lagi Aktif";
			//sql code untuk update value menjadi Lagi Aktif
			$sqlUpdateStatus2 = "UPDATE user SET status = '{$status}' WHERE unik_id = {$row['unik_id']}";
			//masukin ke database
			$queryLogin = mysqli_query($connect, $sqlUpdateStatus2);

			if ($queryLogin) {
				$_SESSION['unik_id'] = $row['unik_id'];
				echo "berhasil";  
			}

		} else { //kalo akun tidak ketemu di database
			echo "Email atau Password salah!";
		}
	} else {
		echo("Kudu di isi ya :D !");
	}
?>