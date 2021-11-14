<?php
include "../../config.php";

//$id = '1001';
$id = $_GET['id_soal'];
$res = mysqli_query($koneksi,"SELECT * FROM tbl_soal WHERE id_soal='$id'");
$data = mysqli_fetch_array($res);
// if ($jumlah==1){
// 	$rows['nama_produk'] = $data['nama_produk'];
// }
echo json_encode($data);
?>