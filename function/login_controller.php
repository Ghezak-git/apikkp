<?php 
	session_start();

	include '../config.php';

	$username = $_POST['username'];
	$password = $_POST['password'];

	$sql = mysqli_query($koneksi,"SELECT * FROM tbl_user WHERE username='$username' AND password='$password'");
 
	$cek = mysqli_num_rows($sql);

	$data = mysqli_fetch_array($sql);

	if ($data['keadaan'] == "tidak_aktif") {
		echo "<script>alert('Maaf Akun Tidak Aktif ! Tolong Verifikasi Akun Anda!');location='javascript:history.go(-1)';</script>";
	}else{
		if($cek > 0){
			if ($data['status'] == "admin") {
				$_SESSION['id_user'] = $data['id_user'];
				$_SESSION['username'] = $data['username'];
				$_SESSION['fullname'] = $data['fullname'];
				$_SESSION['gambar'] = $data['gambar'];
				$_SESSION['email'] = $data['email'];
				$_SESSION['status'] = $data['status'];
				$_SESSION['status1'] = "login";
				header("location:../admin/admin.php");
			}else{
				$_SESSION['id_user'] = $data['id_user'];
				$_SESSION['username'] = $data['username'];
				$_SESSION['fullname'] = $data['fullname'];
				$_SESSION['gambar'] = $data['gambar'];
				$_SESSION['email'] = $data['email'];
				$_SESSION['status'] = $data['status'];
				$_SESSION['status1'] = "login";
				header("location:../admin/guru.php");
			}
			
		}else{
			header("location:../index.php?pesan=gagal");
		}

	}
 ?>