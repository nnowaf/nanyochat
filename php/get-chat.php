<?php
	session_start();
	if (isset($_SESSION['unik_id'])) {
		include_once "config.php";

		$outgoing_id = mysqli_real_escape_string($connect, $_POST['outgoing_id']);
		$incoming_id = mysqli_real_escape_string($connect, $_POST['incoming_id']);
		
		$output = "";

		$sql = "SELECT * FROM percakapan LEFT JOIN user ON user.unik_id = percakapan.outgoing_psn_id WHERE (outgoing_psn_id = {$outgoing_id} AND incoming_psn_id = {$incoming_id}) OR (outgoing_psn_id = {$incoming_id} AND incoming_psn_id = {$outgoing_id}) ORDER BY psn_id";

		$query = mysqli_query($connect, $sql);

		if (mysqli_num_rows($query) > 0) {
			while ($row = mysqli_fetch_assoc($query)) {
				if ($row['outgoing_psn_id'] === $outgoing_id) { //ini pengirim
					$output .= '<div class="chat outgoing">
									<div class="details">
										<p>'. $row['psn'] .'</p>
									</div>
								</div>';
				} else { //ini pesan untuk penerima 
					$output .= '<div class="chat incoming">
									<img src="php/imageuser/'. $row['gambar'] .'" alt="">
									<div class="details">
										<p>'. $row['psn'] .'</p>
									</div>
								</div>';
				}
			}

			echo $output;
		}
	} else {
		header("../login.php");
	}
?>