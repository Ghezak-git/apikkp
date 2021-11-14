<?php 

require_once 'connect.php';

	$query = "SELECT * FROM tbl_quiz";
	$result = mysqli_query($koneksi,$query);

	$arraydata = array();

	while ($baris = mysqli_fetch_assoc($result)) {
		$arraydata[] = $baris;
	}

	echo json_encode(array('kuis' => $arraydata));

