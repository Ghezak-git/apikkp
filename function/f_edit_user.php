<?php
include('../config.php');
$id = $_POST['id_user'];
$nip = $_POST['e_nip_guru'];
$email = $_POST['e_email'];
$fullname = $_POST['e_fullname'];
$username = $_POST['e_username'];
$password = $_POST['e_password'];
$status = $_POST['e_status'];
$g_gambar = $_POST['g_gambar'];
$gambar = $_FILES['e_gambar']['name'];

if ($gambar != "") {
	$extensi_boleh = array('png','jpg');
	$x = explode('.', $gambar);
	$ekstensi = strtolower(end($x));
	$file_tmp = $_FILES['e_gambar']['tmp_name'];
	$angka_acak = rand(1,999);
	$nama_baru = $angka_acak.'-'.$gambar;
	if (in_array($ekstensi, $extensi_boleh) == true) {
		unlink('../admin/modul/'.$g_gambar); 

		move_uploaded_file($file_tmp, '../admin/modul/'.$nama_baru);
		//query update
		$query = "UPDATE tbl_user SET nip_guru='$nip' , email='$email' , fullname='$fullname', gambar='$nama_baru', username='$username', password='$password', status='$status' , update_date=NOW() WHERE id_user='$id' ";
		if (mysqli_query($koneksi,$query)) {
		    # credirect ke page index
		    header("location:../admin/tambah_user.php");    
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
	$query = "UPDATE tbl_user SET nip_guru='$nip' , email='$email' , fullname='$fullname', username='$username', password='$password', status='$status' , update_date=NOW() WHERE id_user='$id' ";
	if (mysqli_query($koneksi,$query)) {
	    # credirect ke page index
	    header("location:../admin/tambah_user.php");    
	}
	else{
	    echo "ERROR, data gagal diupdate". mysqli_error();
	}
}


?>