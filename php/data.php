<?php
	while ($row = mysqli_fetch_assoc($sql)) {

		$sql2 = "SELECT * FROM percakapan 
		WHERE (incoming_psn_id = {$row['unik_id']} OR outgoing_psn_id = {$row['unik_id']}) AND (outgoing_psn_id = {$outgoing_id} OR incoming_psn_id = {$outgoing_id}) ORDER BY psn_id DESC LIMIT 1";

		$query2 = mysqli_query($connect, $sql2);
		$row2 = mysqli_fetch_assoc($query2);

		//pemberitahuan kalo chat masuk
		if (mysqli_num_rows($query2) > 0) {
			$result = $row2['psn'];
		} else { //jika pesan tidak ada atau belum memulai percakapan antar kontaknya
			$result ="Pesan belum ada";
		} 

		//ini untuk menampilkan teks jika berlebih maka ada ... di akhir teksnya
		(strlen($result) > 28) ? $msg = substr($result, 0, 28).'...' : $msg = $result;

		//untuk penanda kalo yang mengirim adalah si pengirim
		if(isset($row2['outgoing_psn_id'])){
            ($outgoing_id == $row2['outgoing_psn_id']) ? $anda = "Anda: " : $anda = "";
        }else{
            $anda = "";
        }

        //pengecekan user aktif atau tidak

        if ($row['status'] == "Ga Aktif") {
        	$offline = "offline";
        } else {
        	$offline = "";
        }

		$output .= '<a href="chat.php?user_id='.$row['unik_id'].'">
						<div class="content">
							<img src="php/imageuser/'. $row['gambar'] .'" alt="">
							<div class="detail">
								<span>
									'. $row['ndepan'] . " " . $row['nbelakang'] .'
								</span>
								<p>'. $anda . $msg .'</p>
							</div>
						</div>

						<div class="status-dot '.$offline.'">
							<i class="fas fa-circle"></i>
						</div>
					</a>';
	}
?>