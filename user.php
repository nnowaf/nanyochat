<?php 
	session_start();
	include_once "php/config.php";
	if (!isset($_SESSION['unik_id'])) { //jika langsung merujuk ke user.php dengan kondisi belum login, maka kita balik lagi ke page login.php 
		header("location: login.php");
	}
?>

<?php include_once "php/header.php"; ?>

<body>
	<!-- div dengan class wrapper buat satuin tag tag di dalemnya-->
	<div class="wrapper">
		<section class="user">
			<header>
				<div class="content">
					<?php
						include_once "php/config.php";

						$sql = mysqli_query($connect, "SELECT * FROM user WHERE unik_id = {$_SESSION['unik_id']}");
						if (mysqli_num_rows($sql) > 0) {
							$row = mysqli_fetch_assoc($sql);
						}
					?>
					<img src="php/imageuser/<?php echo $row['gambar']; ?>" alt="">
					<div class="detail">
						<span>
							<?php
								echo $row['ndepan'] . " " . $row['nbelakang'];
							?>
						</span>
						<p>
							<?php
								echo $row['status'];
							?>
						</p>
					</div>
				</div>
				<a href="php/logout.php?logout_id=<?php echo $row['unik_id'] ?>" class="logout">Logout</a>
			</header>
			<div class="search">
				<span class="text">Pilih user untuk memulai percakapan</span>
				<input type="text" placeholder="Cari namanya...">
				<button title="button"><i class="fas fa-search"></i></button>
			</div>

			<div class="user-list">
				
			</div>
		</section>
	</div>

	<script src="js/userdansearch.js"></script>
</body>
</html>