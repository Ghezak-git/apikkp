<?php 
// koneksi database
include '../config.php';
 
// menangkap data id yang di kirim dari url
$id = $_GET['id_user'];
$file = $_GET['file'];

$del = substr($file,32);
 
// menghapus data dari database
mysqli_query($koneksi,"delete from tbl_user where id_user='$id'");
unlink('../admin/modul/'.$del); 
 
// mengalihkan halaman kembali ke index.php
header("location:../admin/tambah_user.php");
 
?>