<?php 
session_start();
// koneksi database
include '../config.php';
 
// menangkap data yang di kirim dari form
$id_quiz = $_POST['id_quiz'];
$soal = $_POST['soal'];
$option_a = $_POST['option_a'];
$option_b = $_POST['option_b'];
$option_c = $_POST['option_c'];
$option_d = $_POST['option_d'];
$jawaban = $_POST['jawaban'];
$pembahasan = $_POST['pembahasan'];

mysqli_query($koneksi,"INSERT INTO tbl_soal (id_quiz,soal,pilihan_1,pilihan_2,pilihan_3,pilihan_4,jawaban,pembahasan,create_date) VALUES ('$id_quiz','$soal','$option_a','$option_b','$option_c','$option_d','$jawaban','$pembahasan',NOW())");


// mengalihkan halaman kembali ke index.php
header("location:../admin/tambah_soal.php?id_quiz=$id_quiz");
 