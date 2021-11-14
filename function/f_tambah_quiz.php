<?php 
session_start();
// koneksi database
include '../config.php';
 
// menangkap data yang di kirim dari form
$id_user = $_POST['id_user'];
$nama = $_POST['nama'];
$kelas = $_POST['kelas'];

// id_sequence
$hasil = mysqli_query($koneksi,"SELECT MAX(id_quiz) as maxId FROM tbl_quiz");
$data = mysqli_fetch_array($hasil);
$id_quiz = $data['maxId'];

$noUrut = (int) substr($id_quiz, 3, 3);

$noUrut++;

$char = "QZI";
$id_quiz = $char . sprintf("%03s" , $noUrut);

 
// menginput data ke database
mysqli_query($koneksi,"insert into tbl_quiz (id_quiz,id_user,nama,kelas,create_date) values('$id_quiz','$id_user','$nama','$kelas',NOW())");

// mengalihkan halaman kembali ke index.php
header("location:../admin/tambah_soal.php?id_quiz=$id_quiz");
 