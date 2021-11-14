<?php 
// koneksi database
include '../config.php';
 
// menangkap data yang di kirim dari form
$nik = $_POST['nik_siswa'];
$fullname = $_POST['fullname'];
$email = $_POST['email'];
$password = $_POST['password'];
$kelas = $_POST['kelas'];
$gambar = $_FILES['gambar']['name'];

if ($gambar != "") {
	$extensi_boleh = array('png','jpg');
	$x = explode('.', $gambar);
	$ekstensi = strtolower(end($x));
	$file_tmp = $_FILES['gambar']['tmp_name'];
	$angka_acak = rand(1,999);
// 	$nama_baru = 'http://gi.yazuha.com/admin/modul/'.$angka_acak.'-'.$gambar;
	$nama_baru1= $angka_acak.'-'.$gambar;
	if (in_array($ekstensi, $extensi_boleh) == true) {
		move_uploaded_file($file_tmp, '../admin/modul/'.$nama_baru1);
		// menginput data ke database
		mysqli_query($koneksi,"insert into tbl_siswa (nik_siswa,name,gambar,email,password,kelas,status,create_date) values($nik,'$fullname','$nama_baru1','$email','$password','$kelas','aktif',NOW())");
		 
		// mengalihkan halaman kembali ke index.php
		header("location:../admin/tambah_siswa.php");
	}else{
		echo "<script>alert('Maaf Hanya JPG atau PNG yang bisa');location='javascript:history.go(-1)';</script>";
	}
}else{
	echo "<script>alert('Maaf Gambar tidak boleh kosong');location='javascript:history.go(-1)';</script>";
}

 
