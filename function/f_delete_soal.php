<?php 
// koneksi database
include '../config.php';
 
// menangkap data id yang di kirim dari url
$id = $_GET['id_soal'];
$id_quiz = $_GET['id_quiz'];
 
 
// menghapus data dari database
mysqli_query($koneksi,"delete from tbl_soal where id_soal='$id'");
 
// mengalihkan halaman kembali ke index.php
header("location:../admin/tambah_soal.php?id_quiz=$id_quiz");
 
?>