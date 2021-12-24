<?php
	session_start();
	if (isset($_SESSION['unik_id'])) {
		header("location: user.php");
	} 
?>

<?php include_once "php/header.php"; ?>

<body>
	<!-- div dengan class wrapper buat satuin tag tag di dalemnya-->
	<div class="wrapper">
		<section class="form signup">
			<header>NanyoChat Daftar</header>
			<form action="#" enctype="multipart/form-data" autocomplete="off">
				<div class="error-txt"></div>
				<div class="name-details">
					<div class="field input">
						<label>Nama depan</label>
						<input type="text" placeholder="Nama depan" name="ndepan" required="">
					</div>

					<div class="field input">
						<label>Nama belakang</label>
						<input type="text" placeholder="Nama belakang" name="nbelakang" required="">
					</div>
				</div>

				<div class="field input">
						<label>Alamat Email</label>
						<input type="text" placeholder="Masukkan Email" name="email" required="">
				</div>

				<div class="field input">
					<label>Password</label>
					<input type="password" placeholder="Masukkan Password" name="password" required="">
					<i class="fas fa-eye"></i>
				</div>

				<div class="field gambar">
					<label>Pilih Gambar!</label>
					<input type="file" name="foto" accept=".png , .jpeg, .png"required="">
				</div>

				<div class="field tombol">
					<input type="submit" value="Cus, lanjut ke chat!">
				</div>
			</form>
			<div class="akunada">Udah punya akun? <a href="login.php">Login disini!</a></div>
			<div class="promosi">
				<a href="https://github.com/nnowaf" target="_blank">
					<img src="image/github.png">
				</a>
				<a href="https://mohammad-nowaf.blogspot.com/" target="_blank">
					<img src="image/icon.png">
				</a>
				<a href="https://www.linkedin.com/in/mohammad-nowaf-272368196/" target="_blank">
					<img src="image/linked.png">
				</a>
			</div>
		</section>
	</div>

	<script src="js/pwd-shw-hide.js"></script>
	<script src="js/daftar.js"></script>
</body>
</html>