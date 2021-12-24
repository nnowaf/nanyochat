<?php
	session_start();
	include_once "config.php";
	$outgoing_id = $_SESSION['unik_id'];
	//get nilai string di value input
	$searchTerm = mysqli_real_escape_string($connect, $_POST['searchTerm']); 
	//pencarian nama dari nilai input dengan data di mysql
	$sql = mysqli_query($connect, "SELECT * FROM user WHERE NOT unik_id = {$outgoing_id} AND (ndepan LIKE '%{$searchTerm}%' OR nbelakang LIKE '%{$searchTerm}%')");

	$output = "";

	if (mysqli_num_rows($sql) > 0) {
		include "data.php";
	} else {
		$output .= "Yang dicari ga ada, yang dikejar lari, yang ditunggu, yang diharap, biarkanlah semesta bekerja, UNTUKMU.";
	}

	echo $output;
?>