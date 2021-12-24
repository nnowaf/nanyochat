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
		<section class="chat-area">
			<header>
				<?php
					include_once "php/config.php";
					$user_id = mysqli_real_escape_string($connect, $_GET['user_id']);
					$sql = mysqli_query($connect, "SELECT * FROM user WHERE unik_id = {$user_id}");
					if (mysqli_num_rows($sql) > 0) {
						$row = mysqli_fetch_assoc($sql);
					} else {
						header("location: user.php");
					}
				?>
				<a href="user.php" class="back-icon">
					<i class="fas fa-arrow-left"></i>
				</a>
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
			</header>

			<div class="chat-box">
				
				
			</div>
			<form action="#" class="typing-area" autocomplete="off">
				<input type="text" name="outgoing_id" value="<?php echo $_SESSION['unik_id']; ?>" hidden>
				<input type="text" name="incoming_id" value="<?php echo $user_id; ?>" hidden>
				<input type="text" name="pesan" placeholder="Ketik pesan..." class="input-field" autfocomplete="off">
				<button>
					<i class="fab fa-telegram-plane"></i>
				</button>
			</form>
		</section>
	</div>

	<script src="js/chat.js"></script>
</body>
</html>