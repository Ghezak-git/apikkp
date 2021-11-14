<?php

include('../config.php');
$g_id_soal = $_GET['g_id_soal'];
$id_quiz = $_GET['id_quiz'];
$soal = $_GET['soal'];
$option_a = $_GET['option_a'];
$option_b = $_GET['option_b'];
$option_c = $_GET['option_c'];
$option_d = $_GET['option_d'];
$jawaban = $_GET['jawaban'];
$pembahasan = $_GET['pembahasan'];
//query update
$query = "UPDATE tbl_soal SET soal='$soal' , pilihan_1='$option_a' , pilihan_2='$option_b', pilihan_3='$option_c', pilihan_4='$option_d', jawaban='$jawaban' , pembahasan='$pembahasan' , update_date=NOW() WHERE id_soal='$g_id_soal' ";
mysqli_query($koneksi,$query);
header("location:../admin/tambah_soal.php?id_quiz=$id_quiz");    

?>