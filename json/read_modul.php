<?php 

require_once 'connect.php';

    $kelas = $_POST['kelas'];

	$query = "SELECT * FROM tbl_modul where kelas = '$kelas' ";
	$result = mysqli_query($koneksi,$query);

	$arraydata = array();

	while ($baris = mysqli_fetch_assoc($result)) {
		$arraydata[] = $baris;
	}

	echo json_encode(array('modul' => $arraydata));

