<?php
include('../config.php');
$id = $_POST['id_siswa'];
$nik = $_POST['e_nik1_siswa'];
$fullname = $_POST['e_fullname'];
$email = $_POST['e_email'];
$password = $_POST['e_password'];
$kelas = $_POST['e_kelas'];
$g_gambar = $_POST['g_gambar'];
$gambar = $_FILES['e_gambar']['name'];

if ($gambar != "") {
	$extensi_boleh = array('png','jpg');
	$x = explode('.', $gambar);
	$ekstensi = strtolower(end($x));
	$file_tmp = $_FILES['e_gambar']['tmp_name'];
	$angka_acak = rand(1,999);
// 	$nama_baru = 'http://gi.yazuha.com/admin/modul/'.$angka_acak.'-'.$gambar;
	$nama_baru1 = $angka_acak.'-'.$gambar;
	if (in_array($ekstensi, $extensi_boleh) == true) {
		unlink('../admin/modul/'.$g_gambar); 

		move_uploaded_file($file_tmp, '../admin/modul/'.$nama_baru1);
		//query update
		//query update
		$query = "UPDATE tbl_siswa SET nik_siswa='$nik' , name='$fullname', gambar='$nama_baru1', email='$email', password='$password', kelas='$kelas' , update_date=NOW() WHERE id_siswa='$id' ";
		if (mysqli_query($koneksi,$query)) {
		    # credirect ke page index
		    header("location:../admin/tambah_siswa.php");    
		}
		else{
		    echo "ERROR, data gagal diupdate". mysql_error();
		}
		//mysql_close($host);
	}else{
		echo "<script>alert('Maaf Hanya JPG atau PNG yang bisa');location='javascript:history.go(-1)';</script>";
	}
}else{
	//query update
	$query = "UPDATE tbl_siswa SET nik_siswa='$nik' , name='$fullname', email='$email', password='$password', kelas='$kelas' , update_date=NOW() WHERE id_siswa='$id' ";
	if (mysqli_query($koneksi,$query)) {
		# credirect ke page index
		header("location:../admin/tambah_siswa.php");    
	}
	else{
		echo "ERROR, data gagal diupdate". mysql_error();
	}
}


?>