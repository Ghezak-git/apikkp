<?php 
	
	if ($_SERVER['REQUEST_METHOD']=='POST') {
		
		$email = $_POST['email'];
		$password = $_POST['password'];

		require_once 'connect.php';

		$sql = "SELECT * FROM tbl_siswa WHERE email = '$email'";

		$response = mysqli_query($koneksi, $sql);

		$result = array();
		$result['login'] = array();

		if (mysqli_num_rows($response) == 1) {
			$row = mysqli_fetch_assoc($response);

			if ($password == $row['password']) {
				$index['name'] = $row['name'];
				$index['email'] = $row['email'];
				$index['password'] = $row['password'];
				$index['gambar'] = $row['gambar'];
				$index['id_siswa'] = $row['id_siswa'];
			    $index['kelas'] = $row['kelas'];

				array_push($result['login'], $index);

				$result['success'] = "1";
				$result['message'] = "success";
			} else {
				$result['success'] = "0";
				$result['message'] = "error";	
				
			}
		}

	}
echo json_encode($result);