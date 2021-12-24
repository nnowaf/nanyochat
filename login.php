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
		<section class="form login">
			<header>NanyoChat Login</header>
			<form action="#">
				<div class="error-txt"></div>
				
				<div class="field input">
						<label>Alamat Email</label>
						<input type="text" placeholder="Masukkan Email" name="email">
				</div>

				<div class="field input">
					<label>Password</label>
					<input type="password" placeholder="Masukkan Password" name="password">
					<i class="fas fa-eye"></i>
				</div>

				<div class="field tombol">
					<input type="submit" value="Cus, lanjut ke chat!">
				</div>
			</form>
			<div class="akunada">Belum punya akun? <a href="index.php">Daftar disini!</a></div>
		</section>
	</div>

	<script src="js/pwd-shw-hide.js"></script>
	<script src="js/masuk.js"></script>
</body>
</html>