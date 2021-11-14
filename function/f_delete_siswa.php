<?php 
// koneksi database
include '../config.php';
 
// menangkap data id yang di kirim dari url
$id = $_GET['id_siswa'];
$file = $_GET['file'];

// menghapus data dari database
mysqli_query($koneksi,"delete from tbl_siswa where id_siswa='$id'");
unlink('../admin/modul/'.$file); 
 
// mengalihkan halaman kembali ke index.php
header("location:../admin/tambah_siswa.php");
 
?>