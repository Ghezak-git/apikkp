<?php 

require_once 'connect.php';

	$id_siswa = $_POST['id_siswa'];
	$id_quiz = $_POST['id_quiz'];
	$nilai = $_POST['nilai'];
	
	$queryselect = "SELECT * FROM tbl_hasil where id_siswa = '$id_siswa' AND id_quiz = '$id_quiz' ";
	$resultselect = mysqli_query($koneksi,$queryselect);
	$cekada = mysqli_num_rows($resultselect);
	
	if($cekada > 0){
	    $query = "UPDATE tbl_hasil SET nilai = '$nilai' WHERE id_siswa = '$id_siswa' AND id_quiz = '$id_quiz' ";
    	$result = array();
    	if(mysqli_query($koneksi, $query)){
    	    $result["success"] = "1";
    	    $result["message"] = "Kuis Berakhir";
    	}else{
    	    $result["success"] = "0";
    	    $result["message"] = "error";
    	}
    	
	}else{
	    $query = "INSERT INTO tbl_hasil (id_siswa, id_quiz, nilai) VALUES ('$id_siswa' , '$id_quiz' , '$nilai')";
    	$result = array();
    	if(mysqli_query($koneksi, $query)){
    	    $result["success"] = "1";
    	    $result["message"] = "Kuis Berakhir";
    	}else{
    	    $result["success"] = "0";
    	    $result["message"] = "error";
    	}
	}
echo json_encode($result);
	


 ?>