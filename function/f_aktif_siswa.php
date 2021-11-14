<?php 

include('../config.php');
$id = $_GET['id_siswa'];
$status = $_GET['status'];


$query2 = "UPDATE tbl_siswa SET status='tidak_aktif' WHERE id_siswa='$id' ";
$query3 = "UPDATE tbl_siswa SET status='aktif' WHERE id_siswa='$id' ";

if ($status =="aktif") {
	if (mysqli_query($koneksi,$query2)) {
	    # credirect ke page index
	    header("location:../admin/tambah_siswa.php");    
	}
	else{
	    echo "ERROR, data gagal diupdate". mysqli_error();
	}
}else{
	if (mysqli_query($koneksi,$query3)) {
	    # credirect ke page index
	    header("location:../admin/tambah_siswa.php");    
	}
	else{
	    echo "ERROR, data gagal diupdate". mysqli_error();
	}
}


 ?>