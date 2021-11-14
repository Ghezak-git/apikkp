<?php

if ($_SERVER['REQUEST_METHOD']=='POST'){
    $id_siswa = $_POST['id_siswa'];
    
    require_once 'connect.php';

    $sql = "SELECT * FROM tbl_siswa WHERE id_siswa = '$id_siswa'";

    $response = mysqli_query($koneksi, $sql);

    $result = array();
    $result['read'] = array();

    if (mysqli_num_rows($response) == 1) {
    	
    	if ($row = mysqli_fetch_assoc($response)) {
    		
    		$h['name'] = $row['name'];
    		$h['email'] = $row['email'];
    		$h['password'] = $row['password'];
    		$h['gambar'] = $row['gambar'];

    		array_push($result["read"], $h);

    		$result["success"] = "1";
    	}
    }
}else {
	$result["success"] = "0";
	$result["message"] = "error!";
}

    		echo json_encode($result);