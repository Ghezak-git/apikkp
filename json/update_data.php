<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	
	$name = $_POST['name'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$id_siswa = $_POST['id_siswa'];

	require_once 'connect.php';

	$sql = "UPDATE tbl_siswa SET name = '$name', email='$email', password='$password' WHERE id_siswa='$id_siswa' ";

	if (mysqli_query($koneksi, $sql)) {
		$result["success"] = "1";
		$result["message"] = "success";
	}

}

else{

	$result["success"] = "0";
	$result["message"] = "error1!";
}

	echo json_encode($result);