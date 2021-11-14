<?php 
// koneksi database
include '../config.php';

// menangkap data yang di kirim dari form
$id_user = $_POST['id_user'];
$keterangan = $_POST['keterangan'];
$kelas = $_POST['kelas'];

$lokasi_file = $_FILES['modul']['tmp_name'];
$nama_file = $_FILES['modul']['name'];
$angka_acak = rand(1,999);
$nama_file_baru = $angka_acak.'-'.$nama_file;
$folder = "../admin/modul/$nama_file_baru";
// $folder1 = "http://gi.yazuha.com/admin/modul/$nama_file_baru";

 
if (move_uploaded_file($lokasi_file, "$folder")) {
	// menginput data ke database
	mysqli_query($koneksi,"insert into tbl_modul (id_user,keterangan,kelas,modul,create_date) values('$id_user','$keterangan','$kelas','$nama_file_baru',NOW())");

	// mengalihkan halaman kembali ke index.php
	header("location:../admin/tambah_modul.php");
}else{
	echo "<script>alert('Gagal')</script>";
}

 