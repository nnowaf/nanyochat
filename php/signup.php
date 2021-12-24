<?php 
	session_start();
	include_once "config.php";
	$ndepan = mysqli_real_escape_string($connect, $_POST['ndepan']);
	$nbelakang = mysqli_real_escape_string($connect, $_POST['nbelakang']);
	$email = mysqli_real_escape_string($connect, $_POST['email']);
	$password = mysqli_real_escape_string($connect, $_POST['password']);
	
	if (!empty($ndepan) && !empty($nbelakang) && !empty($email) && !empty($password)) { //jika nilai pada form ada
		//pengecekan user email
		if (filter_var($email, FILTER_VALIDATE_EMAIL)) { //kalo email valid
			//pengecekan apakah emai sudah terdaftar atau belum
			$sql = mysqli_query($connect, "SELECT email FROM user WHERE email = '{$email}'");
			if (mysqli_num_rows($sql) > 0) { //kalo email udah ada di database
				echo "$email Sudah terdaftar!";
			} else { //kalo email belum ada di dat abase 

				//cek apakah user sudah upload file gambar atau tidak
				if (isset($_FILES['foto'])) {
					$img_name = $_FILES['foto']['name']; //mengambil nama gambar
					$img_type = $_FILES['foto']['type']; //mengambil type gambar
					$tmp_name = $_FILES['foto']['tmp_name'];

					$img_explode = explode('.', $img_name);
					$img_ext = end($img_explode);

					$extensions = ["jpeg", "png", "jpg"];
					if (in_array($img_ext, $extensions)) {
						$time = time();
						$new_img_name = $time.$img_name;
						
						if (move_uploaded_file($tmp_name, "imageuser/".$new_img_name)) { 
							$random_id = rand(time(), 100000000); //random id untuk user
							$status = "Lagi Aktif";

							$insert_query = mysqli_query($connect, "INSERT INTO user (unik_id, ndepan, nbelakang, email, password, gambar, status)
								VALUES('{$random_id}', '{$ndepan}', '{$nbelakang}', '{$email}', '{$password}', '{$new_img_name}', '{$status}')");

							if ($insert_query) { //kalo data udah dimasukkan ke database
								$select_sql2 = mysqli_query($connect, "SELECT * FROM user WHERE email = '{$email}'");

								if (mysqli_num_rows($select_sql2)) {
									$row = mysqli_fetch_assoc($select_sql2);
									$_SESSION['unik_id'] = $row['unik_id'];
									echo "berhasil";  
								} 
							} else {
								echo "Ada yang salah!";
							}
						}

					} else {
						echo "Dimohon untuk memilih file gambar .jpeg, .jpg, atau png!";
					}
				} else {
					echo "Masukkan gambar!";
				}
			}
		} else { //kalo email ga valid
			echo "$email <= Tidak sesuai format email!";
		}
	} else { //jika nilai pada form tidak ada yang diisi atau salah satunya
		echo("Kudu di isi ya data datanya :D");
	}
?>