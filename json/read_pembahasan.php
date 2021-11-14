<?php 

require_once 'connect.php';

    $id_quiz = $_POST['id_quiz'];

	$query = "SELECT * FROM tbl_soal where id_quiz = '$id_quiz' ";
	$result = mysqli_query($koneksi,$query);

	$arraydata = array();

	while ($baris = mysqli_fetch_assoc($result)) {
		$arraydata[] = $baris;
	}

	echo json_encode(array('pembahasan' => $arraydata));

