<?php 

require_once 'connect.php';

$id_siswa = $_POST['id_siswa'];

$querycek = "SELECT h.id_hasil,h.id_quiz,h.id_siswa,h.nilai,q.nama FROM tbl_hasil h JOIN tbl_quiz q on q.id_quiz = h.id_quiz WHERE id_siswa = '$id_siswa'";
$result = mysqli_query($koneksi, $querycek);
$arraydata = array();

while ($baris = mysqli_fetch_assoc($result)) {
	$arraydata[] = $baris;
}

echo json_encode(array('nilai' => $arraydata));


 ?>