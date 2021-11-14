<?php 
// koneksi database
include '../config.php';
 
// menangkap data id yang di kirim dari url
$id = $_GET['id_modul'];
$file = $_GET['file'];
 
// menghapus data dari database
mysqli_query($koneksi,"delete from tbl_modul where id_modul='$id'");
unlink('../admin/modul/'.$file); 
 
// mengalihkan halaman kembali ke index.php
header("location:../admin/tambah_modul.php");
 
?>