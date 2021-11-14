<?php 

require_once 'connect.php';

$id_siswa = $_POST['id_siswa'];
$kelas = $_POST['kelas'];

	$queryTampil = "SELECT * FROM tbl_quiz  WHERE kelas = '$kelas' ";
	$resultTampil = mysqli_query($koneksi, $queryTampil);
	$arraydata = array();
	while ($baris = mysqli_fetch_assoc($resultTampil)) {
		$arraydata[] = $baris;
	}
echo json_encode(array('kuis' => $arraydata));

 ?>