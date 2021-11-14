<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	
	$id_siswa = $_POST['id_siswa'];
	$gambar = $_POST['gambar'];

// 	$angka_acak = rand(1,9999);
// 	$nama_baru1= $angka_acak.'-'.$id_siswa;
	
	$path = "$id_siswa.jpg";
	$path2 = "../admin/modul/$id_siswa.jpg";
	require_once 'connect.php';
	
    $selsql = "SELECT * FROM tbl_siswa WHERE id_siswa = '$id_siswa'";
    $cek = mysqli_query($koneksi, $selsql);
	$data = mysqli_fetch_array($cek);
	$delgam = $data['gambar'];
    unlink('../admin/modul/'.$delgam); 

	$sql = "UPDATE tbl_siswa SET gambar = '$path' WHERE id_siswa = '$id_siswa'";

	if (mysqli_query($koneksi, $sql)) {
	    if(file_put_contents($path2, base64_decode($gambar))){
			$result['success'] = "1";
			$result['message'] = "success";
	    }
		
	}else{
    	$result["success"] = "0";
    	$result["message"] = "error1!";
    }
    
echo json_encode($result);
}
