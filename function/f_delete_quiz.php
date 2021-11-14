<?php 
// koneksi database
include '../config.php';
 
// menangkap data id yang di kirim dari url
$id = $_GET['id_quiz'];
 
 
// menghapus data dari database
mysqli_query($koneksi,"delete from tbl_quiz where id_quiz='$id'");
 
// mengalihkan halaman kembali ke index.php
header("location:../admin/tambah_quiz.php");
 
?>